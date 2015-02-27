<?php

/**
 * Файл с конфигами для истории заказа
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Logic\AuditConfigs;

use Symfony\Component\Intl\Intl;

class Order
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
            'deliveryMethod' => array(
                'property' => array(
                    'captionRu'
                )),
            'deliveryCity' => array(
                'property' => array(
                    'name',
                    'area',
                )),
            'deliveryPoint' => array(
                'property' => array(
                    'captionRu',
                )),
            'contragent' => array(
                'property' => array(
                    'organization',
                    'firstName',
                    'lastName',
                )),
            'stock' => array(
                'property' => array(
                    'captionRu'
                )),
            'stockForCanceling' => array(
                'property' => array(
                    'captionRu'
                )),
            'seller' => array(
                'property' => array(
                    'caption',
                )),
            'checkedBy' => array(
                'property' => array(
                    'username',
                )),
            'extraStatus' => array(
                'property' => array(
                    'captionRu',
                )),
            'reasonForCanceling' => array(
                'property' => array(
                    'captionRu',
                )),
            'compositions' => array(
                'property' => array(
                    'product.captionRu',
                    'product.article',
                    'quantity',
                    'price',
                ),
                'link_format' => '%s (арт: %s)',
                'title_format' => '%s (арт: %s)',
                'suffixes' => array(
                    'price' => ' (' . $defaultValuteSymbol . ')',
                    'cost' => ' (' . $defaultValuteSymbol . ')'
                ),
//                'suffixes_value' => array(
//                    'price' => ' р.',
//                    'cost' => ' р.',
//                    ),
            ),
            'waybills' => array(
                'property' => array(
                    'number',
                    'price',
                ),
                'title_format' => '№: %s',
                'suffixes' => array(
                    'price' => ' (' . $defaultValuteSymbol . ')'
                ),
            ),
            'documentScans' => array(
                'property' => array(
                    'name',
                ),
                'exception' => array(
                    'indexPosition'
                ),
                'title_format' => 'Название файла: %s',
            ),
            'deliveryCost' => array(
                'suffix' => ' (' . $defaultValuteSymbol . ')',
            //'suffix_value' => ' '.$object->getSupply()->getGtdCurrency()->getCurrency().'',
            ),
            'cost' => array(
                'suffix' => ' (' . $defaultValuteSymbol . ')',
            ),
            'deliveryPrice' => array(
                'suffix' => ' (' . $defaultValuteSymbol . ')',
            //'suffix_value' => ' '.$object->getSupply()->getGtdCurrency()->getCurrency().'',
            ),
        );
        $exceptions = array('shippedOrderInfoHistory', 'indexPosition');

        return ['fields' => $fields, 'exceptions' => $exceptions];
    }

}
