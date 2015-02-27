<?php

/**
 * Сервис для работы со статистиками связанными с продукцией
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Logic;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

class ProductStatisticsLogic {

    protected $timezone; // часовой пояс, получаем из parameters.yml
    protected $timeOffsetInSeconds; // смещение по часовому поясу в секундах, вычисляется в конструкторе
    protected $doctrine;
    protected $session;
    protected $auditReader; // сервис для нахождения изменений в сущностях

    public function __construct($timezone, $doctrine, $session, $auditReader) {

        $dateTime = new \DateTime('now', new \DateTimeZone($timezone));
        $this->timezone = $timezone;
        $this->timeOffsetInSeconds = $dateTime->getOffset();

        $this->doctrine = $doctrine;
        $this->session = $session;
        $this->auditReader = $auditReader;
    }

    public function getChartPriceHistory($id) {

        if (!$id || $id < 0) {
            throw new NotFoundHttpException('Cann\'t get id.' . "\n" . get_class() . '#' . __FUNCTION__);
        }

        $priceHistiry = array();
        $className = 'Core\ProductBundle\Entity\CommonProduct';
        $revisions = $this->auditReader->findRevisions($className, $id);

        if (is_array($revisions)) {

            foreach ($revisions as $i => $revision) {

                // получаем обект товара по ревизии
                $obj = $this->auditReader->find($className, [$id], $revision->getRev());

                // собираем массив для построения графика
                $priceHistiry[$i] = array(
                    'username' => $revision->getUsername(),
                    'date' => $revision->getTimestamp()->getTimestamp(),
                    'price' => $obj->getPrice(),
                );

                // удаляем одинаковые, рядом стоящие цены
                if ($i > 0 && $priceHistiry[$i]['price'] === $priceHistiry[$i - 1]['price']) {
                    unset($priceHistiry[$i - 1]);
                }
            }

            $priceHistiry = array_reverse($priceHistiry);

            // генерируем массив данных для передачи его в построение графика
            $data = array();
            foreach ($priceHistiry as $array) {
                $data[] = array(
                    'name' => $array['username'] ? $array['username'] : 'unknown user',
                    'x' => ($array['date'] + $this->timeOffsetInSeconds) * 1000,
                    'y' => (float) $array['price'],
                );
            }

            // находим текущую
            $current = $priceHistiry[count($priceHistiry) - 1];
            $current = array_merge($current, [
                'humanDate' => date('d.m.Y в H:i', $current['date'] + $this->timeOffsetInSeconds),
                'timeOffsetInHours' => $this->timeOffsetInSeconds / 60 / 60
                ]);

            return json_encode(
                array(
                    'series' => $data,
                    'current' => $current,
            ));
        }
        return false;
    }

}

