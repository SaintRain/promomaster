<?php

/**
 * Команда для инициализации валют
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 * app/console directory:init:currency --locale=en
 */

namespace Core\DirectoryBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Intl\Intl;
use Core\DirectoryBundle\Entity\Currency;

class CurrencyCommand extends ContainerAwareCommand {

    // Локаль для которой будут выбираться валюты
    protected $locale;

    public function __construct($name = null) {

        // Вызываем родительский конструктор
        parent::__construct($name);

        // Устанавливаем локаль по умолчанию
        $this->locale = 'ru';
    }

    /**
     * Конфигурации команды
     */
    protected function configure() {
        $this
                ->setName('directory:init:currency')
                ->setDescription('Init directory currency')
                ->addOption(
                        'locale', null, InputOption::VALUE_OPTIONAL, 'Locale for get symbol of currency'
                )
        ;
    }

    /**
     * Выполняемая команда
     */
    protected function execute(InputInterface $input, OutputInterface $output) {

        // Устанавливаем диалог
        $dialog = $this->getHelperSet()->get('dialog');

        // Устанавливаем полученную локаль
        if ($input->getOption('locale')) {
            $this->locale = $input->getOption('locale');
        }

        $output->writeln('Set locale: <info>' . $this->locale . '</info>');

        // Получаем entity manager'a
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        // Получаем от Symfony все имеющиеся валюты
        $names = Intl::getCurrencyBundle()->getCurrencyNames($this->locale);

        $countInit = 0;

        foreach ($names as $currency => $cn) {
            // Ищем валюту в БД
            $currencyExist = $em->getRepository('CoreDirectoryBundle:Currency')->findOneByCurrency($currency);
            // Если в БД нет валюты, то добавляем ее
            if (NULL === $currencyExist) {
                $currencyNew = new Currency();
                $currencyNew->setCurrency($currency);
                $em->persist($currencyNew);
                $countInit++;
            } else {
                // Спрашиваем у пользователя разрешене на обновление старой таблицы
                if (!isset($update)) {
                    if ($dialog->askConfirmation($output, '<question>Update old table [y, n]?</question> ', 'y')) {
                        $update = true;
                    } else {
                        $update = false;
                    }
                }

                if ($update) {
                    $currencyExist->setSymbol(Intl::getCurrencyBundle()->getCurrencySymbol($currency, $this->locale));
                    $em->persist($currencyExist);
                }
            }
        }

        $em->flush();

        // Вывод результатов
        // Если были добавлены записи
        if ($countInit) {
            $output->writeln('Count of init curencies: <info>' . $countInit . '</info>');
        }
        // Если пользователь дал добро на обновление данных
        if (isset($update) && $update) {
            $output->writeln('<info>Old table whas updated.</info>');
        }
        // Если ничего не изменилось
        if (!$countInit && !$update) {
            $output->writeln('<comment>Nothing found to init. Table "Currency" already have all data.</comment>');
        }
    }

}
