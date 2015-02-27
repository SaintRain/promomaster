<?php

/**
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Intl\Intl;

class ProductForTestCommand extends ContainerAwareCommand {

    private $count;

    public function __construct($name = null) {
        parent::__construct($name);
        $this->count = 100;
    }

    /**
     * Конфигурации команды
     */
    protected function configure() {
        $this
            ->setName('product:generate')
            ->setDescription('Init directory country')
            ->addOption(
                'count', null, InputOption::VALUE_OPTIONAL, 'Count:'
            )
        ;
    }

    /**
     * Выполняемая команда
     */
    protected function execute(InputInterface $input, OutputInterface $output) {

        // Устанавливаем полученную локаль
        if ($input->getOption('count')) {
            $this->count = $input->getOption('count');
        }

        $output->writeln('begin');

        $ProductLogic = $this->getContainer()->get('core_product_modification_logic');

        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $product = $em->getRepository('CoreProductBundle:Product')->find(986);

        for ($i = 6000; $i < 7000; $i++) {

            $producNew = $ProductLogic->cloneObject($product, $em);
            $producNew->setIndexPosition($i + 1000);
            $producNew->setCaptionRu('Продукт #' . $i);
            $producNew->setArticle('ART-BOT-' . $i);
            $producNew->setSku('SKU-BOT-' . $i);
            $producNew->setPrice(mt_rand(1000, 1000000));

            $keys = array();

            foreach ($producNew->getProductDataProperty() as $j => $pdp) {
                if (null !== $pdp->getValueNumeric()) {
                    $pdp->setValueNumeric(mt_rand(1000, 2015));
                } elseif (null !== $pdp->getValue()) {
                    $pdp->setValue('Продукт #' . $i);
                } else {
                    $a1 = array(68, 69, 70);
                    $a2 = array(431, 432, 433, 434, 435, 436);

                    if (in_array($pdp->getData()->getId(), $a1) || in_array($pdp->getData()->getId(), $a2)) {
                        $keys[] = $j;
                    }
                }
            }

            foreach ($keys as $key) {
                if (mt_rand(0, 1) > 0) {
                    unset($producNew->getProductDataProperty()[$key]);
                }
            }

            $em->persist($producNew);
            $em->flush($producNew);
            //
        }
        $output->writeln($i . ' - OK!');
    }

}
