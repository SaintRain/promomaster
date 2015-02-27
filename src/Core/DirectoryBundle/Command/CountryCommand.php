<?php

/**
 * Команда для инициализации стран
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 * app/console directory:init:country --locale=ru
 */

namespace Core\DirectoryBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Intl\Intl;
use Core\DirectoryBundle\Entity\Country;

class CountryCommand extends ContainerAwareCommand
{

    // Локаль для которой будут выбираться страны
    protected $locale;

    public function __construct($name = null)
    {

        // Вызываем родительский конструктор
        parent::__construct($name);

        // Устанавливаем локаль по умолчанию
        $this->locale = 'ru';
    }

    /**
     * Конфигурации команды
     */
    protected function configure()
    {
        $this
            ->setName('directory:init:country')
            ->setDescription('Init directory country')
            ->addOption(
                'locale', null, InputOption::VALUE_OPTIONAL, 'Locale for get countries'
            )
        ;
    }

    /**
     * Выполняемая команда
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        // Устанавливаем полученную локаль
        if ($input->getOption('locale')) {
            $this->locale = $input->getOption('locale');
        }

        $output->writeln('Set locale: <info>' . $this->locale . '</info>');

        // Получаем entity manager'a
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        // Получаем от Symfony все имеющиеся страны
        $names = Intl::getRegionBundle()->getCountryNames($this->locale);

        $countInit = 0;
        $countTotal = 0;


        $csv = 'src/Core/DirectoryBundle/Resources/data/country/CSV/country.csv';
        $csvData = array();
        if (file_exists($csv)) {
            if (($handle = fopen($csv, "r")) !== FALSE) {
                while (($row = fgetcsv($handle)) !== FALSE) {
                    if (isset($row[1])) {
                        $csvData[$row[1]] = $row;
                    }
                }
            }
        }

        foreach ($names as $alpha2 => $cn) {
            // Ищем страну в БД
            $country = $em->getRepository('CoreDirectoryBundle:Country')->findOneByAlpha2($alpha2);
            // Если в БД нет валюты, то добавляем ее
            if (NULL === $country) {
                $country = new Country();
                $country->setAlpha2($alpha2);
                $countInit++;
            }

            // Добавляем трехцифренный код страны
            if (isset($csvData[$alpha2])) {
                if (isset($csvData[$alpha2][3]) && preg_match('/\d{3}/', $csvData[$alpha2][3])) {
                    $country->setNumeric($csvData[$alpha2][3]);
                }
            }

            $em->persist($country);
            $em->flush();
            $countTotal++;
        }

        // Вывод результатов
        if ($countTotal) {
            $output->writeln('Count of init countries: <info>' . $countInit . '</info>');
            $output->writeln('Count of updated countries: <info>' . ($countTotal - $countInit) . '</info>');
        } else {
            $output->writeln('<comment>Nothing found to init. Table "Country" already have all data.</comment>');
        }
    }

}
