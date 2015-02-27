<?php

/**
 * Форма для ответов на тикеты (Не используется)
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class TicketBodyTransformer implements DataTransformerInterface
{
    /**
     * @var user
     */
    private $user;

    /**
     * @param User $user
     */
    public function __construct($user = null)
    {
        $this->user = $user;
    }

    public function reverseTransform($value)
    {
        /*
        $value = str_replace('<br />',"\n",$value);
        $value = str_replace('<p>',"",$value);
        $value = str_replace('</p>',"",$value);
        */
        $values = explode("</p>",$value);
        foreach($values as $key => $val) {
            $val = trim(str_replace('<p>', '', $val));
            if (strlen($val)) {
                $values[$key] = $val;
            } else {
                unset($values[$key]);
            }
        }
        
        return implode("\n", $values);
    }

    public function transform($value)
    {
        //return '<p>'.nl2br($value).'</p>';
        return $this->nl2p($value);
    }

    private function nl2p($str) {
        $arr = explode("\n",$str);
        $out='';

        for($i=0;$i<count($arr);$i++) {
            if(strlen(trim($arr[$i]))>0)
                $out.='<p>'.trim($arr[$i]).'</p>';
        }
        return $out;
    }
}