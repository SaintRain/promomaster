<?php

/**
 * Файл с конфигами для истории "единицы товара на общем складе"
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Logic\AuditConfigs;

use Symfony\Component\Intl\Intl;

class UnitInStock
{

    /**
     * Функция возвращает крнфигурацию для построения истории
     *
     * @return array
     */
    public function getConfigs($options)
    {
        $defaultValuteSymbol = Intl::getCurrencyBundle()->getCurrencySymbol($options['currency'], 'ru');

        $fields = array(
            'stock' => array(
                'property' => array(
                    'captionRu'
                )),
            'seller' => array(
                'property' => array(
                    'caption'
                )),
            'product' => array(
                'property' => array(
                    'captionRu',
                    'article'
                ),
                'link_format' => '%s (арт: %s)',
            ),
            'status' => array(
                'property' => array(
                    'captionRu'
                )),
            'serials' => array(
                'property' => array(
                    'value'
                ),
                'title_format' => '%s',
            ),
            'defectReason' => array(
                'property' => array(
                    'captionRu'
                )),
            'supply' => array(
                'property' => array(
                    'id'
                ),
                'link_format' => '# %s',
            ),
//            'productInSupply' => array(
//                'property' => array(
//                    'captionRu',
//                    'article',
//                ),
//                //'link_format' => '%s (арт: %s)',
//                //'suffix' => ' (' . $defaultValuteSymbol . ')',
//            ),
            'priceInGtdCurrency' => array(
                'suffix' => ' (' . Intl::getCurrencyBundle()->getCurrencySymbol($options['object']->getProductInSupply()->getGtdCurrency()->getCurrency(), 'ru') . ')',
            //'suffix_value' => ' '.$object->getSupply()->getGtdCurrency()->getCurrency().'',
            ),
            'priceInGeneralCurrency' => array(
                'suffix' => ' (' . $defaultValuteSymbol . ')',
            //'suffix_value' => ' '.$object->getSupply()->getGtdCurrency()->getCurrency().'',
            ),
        );
        $exceptions = ['composition', 'productInSupply'];

        return ['fields' => $fields, 'exceptions' => $exceptions];
    }

}
