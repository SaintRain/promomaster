<?php
/**
 * Команда для курса валют (запускается раз в сутки вечером)
 * @author Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 * app/console directory:currency:course
 */

namespace Core\DirectoryBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CurrencyCourseCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('directory:currency:course')
            ->setDescription('Kurs Valut')
            ->addOption(
                'log', null, InputOption::VALUE_NONE,
                'Если выставлено, то будет доступен вывод в консоль'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $total    = 0;
        $em       = $this->getContainer()->get('doctrine.orm.entity_manager');
        $curDate  = new \DateTime('now');
        $curDate->modify('+1 day'); //прибавляем один день, т.к. после полудня курс известен на следущий день
        $url      = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req='.$curDate->format('d.m.Y');
        $response = $this->sendRequest($url);
        //$response = file_get_contents(__DIR__. '/../Resources/public/XML_daily.xml');
        if ($response) {
            $response     = new \SimpleXMLElement($response);
            $dbCurrencies = $em->getRepository('CoreDirectoryBundle:Currency')->findBy(['isEnabled' => true]);

            $currencies = [];
            foreach ($response->Valute as $val) {
                $val                                    = json_decode(json_encode($val));
                $currencies[strtoupper($val->CharCode)] = ((str_replace(",",
                        ".", $val->Value)) * 1) / ($val->Nominal * 1);
            }
            foreach ($dbCurrencies as $val) {
                if (isset($currencies[$val->getCurrency()])) {
                    $val->setCurrencyRUB($currencies[$val->getCurrency()])
                        ->setCurrencyDateTime($curDate);
                    $total++;
                }
            }
            $em->getConnection()->beginTransaction();
            try {
                $em->flush();
                $em->getConnection()->commit();
            } catch (\Exception $e) {
                $em->getConnection()->rollback();
                $em->close();
                throw $e;
            }
        }
        
        if ($input->getOption('log')) {
            $output->writeln('Cron is runnig');
            $output->writeln('<comment>The was updated '.$total.' currencies</comment>');
            $output->writeln('Cron is finished');
        }
    }

    public function sendRequest($url)
    {
        $request = new \cURL\Request($url);

        $request->getOptions()
            ->set(CURLOPT_HEADER, false)
            ->set(CURLOPT_TIMEOUT, 90)
            ->set(CURLOPT_RETURNTRANSFER, true)
        ;

        $response = $request->send();

        return $response->getContent();
    }
}