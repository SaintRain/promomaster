<?php
/**
 * Запуск всех сценариев параллельно
 * --step - количество процессов
 * --path - директория, которую обрабатываем
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;

class BDDCommand extends ContainerAwareCommand
{
    private $res = [];  //собираем результат вывода

    /**
     * Конфигурации команды
     */

    protected function configure()
    {
        $this
            ->setName('bdd:run')
            ->addOption(
                'step', null, InputOption::VALUE_OPTIONAL,
                'Количество процессов:'
            )
            ->addOption(
                'path', null, InputOption::VALUE_OPTIONAL,
                'В какой директории искать:'
        );
    }

    /**
     * Выполняемая команда
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $start  = microtime(true);
        $errors = false;

        // сколько процессов будет запущенно паралельно
        if ($input->getOption('step')) {
            $step = $input->getOption('step');
        } else {
            $step = 10;
        }

        //1. Находим все сценарии
        $output->writeln('Поиск сценариев');
        $in = $this->getContainer()->get('kernel')->getRootdir().'/../src/'.$input->getOption('path');

        $finder   = new Finder();
        $iterator = $finder
            ->files()
            ->name('*.feature')
            ->in($in);

        foreach ($iterator as $file) {
            $handle = fopen($file->getRealpath(), 'r');
            while (!feof($handle)) {
                $buffer = trim(fgets($handle, 4096));
                if (substr($buffer, 0, 1) == '@') {
                    if ($buffer != '@javascript') {
                        $scenarios[$buffer] = [
                            'processed' => false
                        ];
                    }
                }
            }
            fclose($handle);
        }

        $output->writeln('Найдено <info>'.count($scenarios).'</info> сценариев');

        //запускаем процессы
        $processed = 0; //сколько обработано
        $procs     = []; //процессы, Который выполняются
        while ($processed < count($scenarios)) {
            //вычисляем сколько нужно добавить процессов на обработку
            foreach ($scenarios as $tag => $s) {
                $needToAdd = $step - count($procs);
                if (!$needToAdd) {
                    break;
                }
                //берем не обработанные сценарии
                if (!$s['processed']) {
                    $output->writeln('Запущен сценарий <info>'.$tag.'</info>');
                    $procs[$tag]                  = popen('bin/behat --tags '.$tag.' ',
                        'r');
                    $this->res[$tag]              = '';
                    $scenarios[$tag]['processed'] = true;
                }
            }

            $needBreak = false;
            while ($this->isHasNotIsset($procs)) {
                foreach ($procs as $tag => $proc) {
                    $this->res[$tag] .= stream_get_contents($proc);
                    if (feof($proc)) {
                        pclose($proc);
                        $needBreak   = true;
                        $processed++;
                        unset($procs[$tag]);
                        $isProcessed = [];
                        foreach ($procs as $tag2 => $proc2) {
                            $isProcessed[] = $tag2;
                        }
                        $output->writeln($this->res[$tag].'================================================================================');

                        if (count($isProcessed)) {
                            $output->writeln('Обрабатывается: <info>'.implode(', ',
                                    $isProcessed).'</info>'."\n\n");
                        }
                        break;
                    }
                    usleep(50000);
                }

                if ($needBreak) {
                    break;
                }
            }
            if ($this->isHasErrors($this->res[$tag])) {
                $output->writeln('<error>Обнаружены ошибки!</error>');
                $errors = true;
                break;
            }
        }


        //5. проверяем спеки
        if (!$errors) {
            $proc = popen('bin/phpspec run', 'r');
            while (!feof($proc)) {
                echo fread($proc, 4096);
            }
            pclose($proc);
        }

        //выводим время
        $end  = microtime(true);
        $time = number_format(($end - $start), 2);
        $output->writeln('Полное время обработки '.$time.' секунд');
    }

    /**
     * Проверяет наличие ошибок в отевете
     * @param $log
     * @return bool
     */
    public function isHasErrors($log)
    {

        $errorMessages = ['Проваленные сценарии', 'Fatal Error', 'Fatal error', 'ContextNotFoundException', ' An exception occurred while executing'];
        $res           = false;
        foreach ($errorMessages as $e) {
            if (mb_stripos($log, $e) !== false) {
                $res = true;
                break;
            }
        }

        return $res;
    }

    /**
     * Проверяет идет ли чтение из файлов
     * @param $procs
     * @return bool
     */
    public function isHasNotIsset($procs)
    {
        $res = false;
        foreach ($procs as $tag => $p) {
            if (!feof($p)) {
                $res = true;
                break;
            }
        }

        return $res;
    }
}