<?php
/**
 * Основная логика бандла
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\HolidayBundle\Logic;

class HolidayLogic
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Проверка на валидность праздника перед сохранением
     *
     * @param object $holiday
     * @return array
     */
    public function validate($holiday)
    {

        $response  = [];
        $em        = $this->container->get('doctrine')->getManager();

        $holiday->setStartedAt(new \DateTime($holiday->getStartedAt()->format('Y-m-dT00:00:00'), new \DateTimeZone('UTC')));
        $holiday->setEndedAt(new \DateTime($holiday->getEndedAt()->format('Y-m-dT23:59:59'), new \DateTimeZone('UTC')));

        $startedAt = $holiday->getStartedAt()->getTimestamp();
        $endedAt   = $holiday->getEndedAt()->getTimestamp();

        if ($startedAt > $endedAt) {
            $response['error'][] = 'Дата начала не может быть позднее даты окончания!';
        }

        $intersection = $em->getRepository('CoreHolidayBundle:Holiday')->intersection($holiday);
        if ($intersection[0]) {
            $obj  = $intersection[0];

            $str = 'Дата %s попала в уже существующий промежуток ("'.$obj->getCaptionRu().'" с '.$obj->getStartedAt()->format('d.m.Y').' по '.$obj->getEndedAt()->format('d.m.Y').' (включительно до 23:59:59))!';

            if ($intersection['startedAt'] > 0) {
                $response['error'][] = sprintf($str, 'начала');
            }

            if ($intersection['endedAt'] > 0) {
                $response['error'][] = sprintf($str, 'окончания');
            }

            if ($intersection['existInside'] > 0) {
                $response['error'][] = 'В выбранном прмежутке дат уже имеется праздник "'.$obj->getCaptionRu().'"!';
            }
        }

        return $response;
    }
}