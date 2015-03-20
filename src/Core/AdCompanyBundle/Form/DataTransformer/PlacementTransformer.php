<?php

/**
 *  Трансформирует даты для размещения
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;


class PlacementTransformer implements DataTransformerInterface
{

    public function reverseTransform($value)
    {
        $UTC = new \DateTimeZone('UTC');
        if ($value->getStartDateTime()) {
            list($day, $month, $year) = explode('-', $value->getStartDateTime());
            $d = new \DateTime ($year . '-' . $month . '-' . $day . '00:00:00', $UTC);
            $value->setStartDateTime($d);
        }

        if ($value->getFinishDateTime()) {
            list($day, $month, $year) = explode('-', $value->getFinishDateTime());
            $d = new \DateTime ($year . '-' . $month . '-' . $day . ' ' . $this->getTime($year, $month, $day), $UTC);
            $value->setFinishDateTime($d);
        }
        return $value;
    }

    public function transform($value)
    {
        $d = $value->getStartDateTime();

        if ($d) {
            $value->setStartDateTime($d->format('d-m-Y'));
        }

        $d = $value->getFinishDateTime();
        if ($d) {
            $value->setFinishDateTime($d->format('d-m-Y'));
        }
        return $value;

    }

    private function  getTime($year, $year, $day)
    {
        if ($year || $year || $day) {
            $time = '23:59:59';
        } else {
            $time = '';
        }
        return $time;
    }

}
