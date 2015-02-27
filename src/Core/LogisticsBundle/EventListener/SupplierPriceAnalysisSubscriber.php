<?php

/**
 * Класс-подписчик на события для сохранения прайса от поставщика.
 * Разбираем файл прайса и сохраняем в базу как массив строк
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Core\LogisticsBundle\Entity\SupplierPriceAnalysis;
use Core\FileBundle\Logic\FileLogic;

class SupplierPriceAnalysisSubscriber implements EventSubscriber
{

    private $fileLogic;
    private $phpexcel;
    private $thingNeedUpdate=[];

    public function __construct($fileLogic, $phpexcel)
    {
        $this->fileLogic = $fileLogic;
        $this->phpexcel = $phpexcel;
    }

    public function getSubscribedEvents()
    {
        return array(
          //  'preUpdate',
            'prePersist',
            'postFlush'
        );
    }


    /**
     * Пишем в базу данные из распарсенного файла
     * @param type $event
     */
    public function postFlush($event)
    {
        if (count($this->thingNeedUpdate)) {
            $em = $event->getEntityManager();

            foreach ($this->thingNeedUpdate as $obj) {
                $file = $this->fileLogic->getAbsoluteFilePath($obj->getPriceFile()[0]);
                $excelObject = $this->phpexcel->createPHPExcelObject($file);

                foreach ($excelObject->getWorksheetIterator() as $worksheet) {
                    $rows = $worksheet->toArray();   //берем только первую страницу
                    break;
                }
                $obj->setSerializeRows($rows);
                $em->persist($obj);
            }

            $this->thingNeedUpdate = [];
            $em->flush();
        }
    }


    public function prePersist(LifecycleEventArgs $args)
    {
        $obj = $args->getEntity();
        //разбираем файл прайса и сохраняем в базу как массив строк
        if ($obj instanceof SupplierPriceAnalysis) {
            $this->thingNeedUpdate[] = $obj;
        }
    }



}
