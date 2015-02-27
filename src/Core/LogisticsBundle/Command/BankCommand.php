<?php

/**
 * Команда для парсинга банков из файла
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 * app/console logistics:bank:add_bik
 */

namespace Core\LogisticsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Core\LogisticsBundle\Entity\Bank;

class BankCommand extends ContainerAwareCommand
{

    public function __construct($name = null)
    {
        // Вызываем родительский конструктор
        parent::__construct($name);
    }

    /**
     * Конфигурации команды
     */
    protected function configure()
    {
        $this
                ->setName('logistics:bank:add_bik');
    }

    /**
     * Выполняемая команда
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<comment>Parcing is started</comment>');
        //читаем файл
        $filename = 'src/Core/LogisticsBundle/Resources/data/Bank/banks.xml';
        if (file_exists($filename)) {
            $xml = file_get_contents($filename);
        }

        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $createdRecords = 0;

        $em->getConnection()->beginTransaction(); // suspend auto-commit
        try {
            //парсим
            $document = new \DOMDocument();
            $document->loadXml($xml);
            $nodeList = $document->getElementsByTagName('bik');

            //перебираем элементы
            foreach ($nodeList as $d) {
                if ($d->getAttribute('regnum')) {
                    $isLicenseCanceled = true;
                } else {
                    $isLicenseCanceled = false;
                }

                //проверяем есть ли в базе такой банк
                $res = $em->getRepository('CoreLogisticsBundle:Bank')->findBank(['captionFull' => $d->getAttribute('name'), 'city' => $d->getAttribute('city')]);
                if (!$res['quantity']) {
                    $output->writeln($d->getAttribute('name'));
                    $bank = new Bank();
                    $bank->setCaption($d->getAttribute('namemini'))
                            ->setCaptionFull($d->getAttribute('name'))
                            ->setLicense($d->getAttribute('regnum'))
                            ->setIsLicenseCanceled($isLicenseCanceled)
                            ->setBic($d->getAttribute('bik'))
                            ->setSwift(NULL)
                            ->setCorrespondentAccount(NULL)
                            ->setOkpo($d->getAttribute('okpo'))
                            ->setParentBank(NULL)
                            ->setCity($d->getAttribute('city'))
                            ->setAddress($d->getAttribute('address'))
                            ->setPhones($d->getAttribute('phone'))
                            ->setSite(NULL)
                            ->setEmail(NULL);
                    $em->persist($bank);
                    $createdRecords++;
                }
            }

            $em->flush();
            $em->getConnection()->commit();
            $output->writeln('<comment>Created records ' . $createdRecords . '</comment>');
        } catch (Exception $e) {
            $em->getConnection()->rollback();
            $em->close();
            $output->writeln('<comment>Error ' . $e . '</comment>');
            throw $e;
        }
    }

}
