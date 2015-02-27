<?php
/**
 * Файл с конфигами для истории продукта
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Logic\AuditConfigs;

use Symfony\Component\Intl\Intl;

class CommonProduct
{

    /**
     * Функция возвращает крнфигурацию для построения истории
     *
     * @return array
     */
    static public function getConfigs($options)
    {
        $fields     = array(
            'manufacturers' => array(
                'property' => array(
                    'captionRu'
                )),
            'manufacturerMain' => array(
                'property' => array(
                    'captionRu'
                )),
//            'productDataProperty' => array(
//                'property' => array(
//                    'data.value',
//                ),
//                'exception' => ['id', 'data.id'],
//                'link_format' => '%s ',
//                'title_format' => '%s',
//            ),
//            'modificationUnion' => array(
//                'property' => array(
//                    'id'
//                )),
            'similars' => array(
                'property' => array(
                    'targetObject.captionRu',
                )),
            'services' => array(
                'property' => array(
                    'targetObject.captionRu',
                )),
            'accessories' => array(
                'property' => array(
                    'targetObject.captionRu',
                )),
            'countryOfOrigin' => array(
                'property' => array(
                    'alpha2',
                )),
            'virtualCategoryList' => array(
                'property' => array(
                    'captionRu',
                )),
//            'inOrderCompositions' => array(
//                'property' => array(
//                    'product.captionRu',
//                )),
//            'tickets' => array(
//                'property' => array(
//                    'title',
//                )),
//            'productAvailability' => array(
//                'property' => array(
//                    'quantity',
//                )),
            'quantityAlternative' => array(
                'property' => array(
                    'targetObject.captionRu',
                )),
            'unitOfMeasure' => array(
                'property' => array(
                    'captionRu',
                )),
            'productTags' => array(
                'property' => array(
                    'captionRu',
                )),
            'categories' => array(
                'property' => array(
                    'captionRu',
                )),
            'brand' => array(
                'property' => array(
                    'captionRu'
                ), 'title_format' => '№: %s',),
            'categoryMain' => array(
                'property' => array(
                    'captionRu'
                )),
            'brands' => array(
                'property' => array(
                    'captionRu',
                )),
            'color' => array(
                'property' => array(
                    'captionRu'
                )),
            'serie' => array(
                'property' => array(
                    'captionRu'
                )),
            'manufacturerMain' => array(
                'property' => array(
                    'captionRu'
                )),
            'images' => array(
                'property' => array(
                    'name',
                ),
                'exception' => array(
                    'indexPosition'
                ),
                'title_format' => 'Название файла: %s',
            ),
            'images' => array(
                'property' => array(
                    'name',
                ),
                'exception' => array(
                    'indexPosition'
                ),
                'title_format' => 'Название файла: %s',
            ),
            'instruction' => array(
                'property' => array(
                    'name',
                ),
                'exception' => array(
                    'indexPosition',
                    'halfPath'
                ),
                'title_format' => 'Название файла: %s',
            ),
            'remoteVideos' => array(
                'property' => array(
                    'captionRu',
                ),
                'title_format' => 'Название: %s',
            ),
            'alternative' => array(
                'property' => array(
                    'targetObject.captionRu',
                    'targetObject.sku',
                ),
                'link_format' => '%s (SKU: %s)',
                'title_format' => '%s (SKU: %s)',
            ),
        );
        $exceptions = ['modificationUnion'];

        return ['fields' => $fields, 'exceptions' => $exceptions];
    }
}