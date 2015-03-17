<?php

/**
 *  Трансформирует даты для размещения
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;


class AdCompanyTransformer implements DataTransformerInterface
{


    public function reverseTransform($value)
    {

        if ($value->getStartDateTime()) {
            list($day, $month, $year) = explode('-', $value->getStartDateTime());
            $day++;
            $d = new \DateTime ($year . '-' . $month . '-' . $day);
            $value->setStartDateTime($d);
        }

        if ($value->getFinishDateTime()) {
            list($day, $month, $year) = explode('-', $value->getFinishDateTime());
            $day++;
            $d = new \DateTime ($year . '-' . $month . '-' . $day);
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

}
