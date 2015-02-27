<?php

/**
 * Бизнес-логика характеристик
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Logic;

use Core\PropertyBundle\Entity\ProductDataProperty;
use Core\PropertyBundle\Entity\DataProperty;
use Core\PropertyBundle\Entity\Property;
use Doctrine\Common\Collections\ArrayCollection;

class PropertyLogic {

    private $em;

    public function __construct($em) {
        $this->em = $em;
    }

    /**
     * Получает заданные характеристики со всеми данными
     * @param type $obj
     * @param type $options
     * @return type
     */
    function getDataForDynamicPropertyFields($obj, $options = ['isEnabled' => true]) {
        $properties = $this->em
                ->getRepository('Core\PropertyBundle\Entity\Property')
                ->getAll($options);

        //берём значения характеристик для продукта
        $pdps = $obj->getProductDataProperty();
        $pdp_match = array();
        foreach ($pdps as $pdp) {
            if ($pdp->getData()) {
                $pdp_match[$pdp->getData()->getProperty()->getId()][] = $pdp;
            }
        }

        $categories_match = array();
        foreach ($properties as $key => $p) {
            if ($p->getGeneralSettingsCategory()->getIsEnabled() || $p->getGeneralSettingsCategory()->getIsUsedInFilter() || $p->getGeneralSettingsCategory()->getIsEnabledInYml()) {
                $categories = $p->getCategories();
                foreach ($categories as $c) {
                    $categories_match['_' . $c->getId()][] = $p->getId();
                }
            }
            //если в конечной настройке неактивно, тогда убираем из списка
            else {
                unset($properties[$key]);
            }
        }

        return array($properties, $categories_match, $pdp_match);
    }

    /**
     * Сохраняет значения характеристик для продукта
     * @param type $dataForm
     * @param type $obj
     */
    function updateProductDataProperty($dataForm, $obj) {
        //берём ранее сохранённые значения
        $old_pdps = array();
        $new_pdps = new ArrayCollection();
        foreach ($obj->getProductDataProperty() as $pdp) {
            $old_pdps[$pdp->getId()] = $pdp;
        }

        if (is_array($dataForm)) {
            //предварительно вычисляем записи, которые потребуются из базы, чтобы выбрать их сразу одним запросом
            $needData = array();
            foreach ($dataForm as $df) {
                //один вариант
                if (isset($df['id']) && isset($df['data']) && $df['data'] && (!isset($df['value']) || $df['value'])) {
                    //если нужно добавить новую запись
                    if (!$df['id']) {
                        $pdp = false;
                    } else {
                        $pdp = $old_pdps[$df['id']];
                    }
                    if (!$pdp || $pdp->getData() != $df['data']) {
                        $needData[] = $df['data'];
                    }
                } else if (isset($df['data']) && $df['data'] && !isset($df['value'])) {
                    $needData = array_merge($needData, $df['data']);
                }
            }

            //берём из базы данные
            $dataList = array();
            if (count($needData)) {
                $bdData = $this->em
                        ->getRepository('Core\PropertyBundle\Entity\DataProperty')
                        ->getDataPropertyMultiple(array('product' => $obj->getId(), 'dataIn' => $needData));
                foreach ($bdData as $d) {
                    $dataList[$d->getId()] = $d;
                }
            }

            foreach ($dataForm as $df) {
                //один вариант
                if (isset($df['id']) && isset($df['data']) && $df['data'] && (!isset($df['value']) || $df['value'])) {

                    //если нужно добавитьновую запись
                    if (!$df['id']) {
                        $pdp = new ProductDataProperty();
                    } else {
                        $pdp = $old_pdps[$df['id']];
                    }

                    //ставим текстовое значение
                    if (isset($df['value'])) {
                        //определяем в какое поле сохранять значение строка/число
                        if (is_array($df['data']) || $dataList[$df['data']]->getProperty()->getEditType() != 'input') {
                            $pdp->setValue($df['value']);
                            $pdp->setValueNumeric(NULL);
                        } else {
                            //если число
                            $pdp->setValue(NULL);
                            $pdp->setValueNumeric($df['value']);
                        }
                    }

                    if (!$pdp->getData() || $pdp->getData() != $df['data']) {
                        $data = $dataList[$df['data']];
                        $pdp->setData($data);
                    }

                    $pdp->setProduct($obj);
                    $new_pdps->add($pdp);
                }
                //несколько вариантов
                else if (isset($df['data']) && $df['data'] && !isset($df['value'])) {
                    foreach ($df['data'] as $dataId) {
                        $dp = $dataList[$dataId];
                        if ($dp->getProductDataProperty()->count()) {
                            $pdp = $dp->getProductDataProperty()->first();
                        } else {
                            $pdp = new ProductDataProperty();
                            $pdp->setData($dp);
                        }
                        $pdp->setProduct($obj);
                        $new_pdps->add($pdp);
                    }
                }
            }
        }

        if (count($old_pdps)) {
            //проверяем, что нужно удалить
            foreach ($old_pdps as $old_pdp_id => $old_pdp) {

                $remove = true;
                foreach ($new_pdps as $new_pdp) {
                    if ($old_pdp->getId() == $new_pdp->getId()) {
                        $remove = false;
                        break;
                    }
                }

                //удаляем связи кроме связей для текстовых полей                                       
                if ($remove) {

                    if (in_array($old_pdp->getData()->getProperty()->getEditType(), ['input', 'input_text', 'textarea', 'editor'])) {
                        $old_pdp->setValue(NULL);
                        $old_pdp->setValueNumeric(NULL);
                    } else {
                        $obj->removeProductDataProperty($old_pdp);
                    }
                }
            }
            //проверяем, что нужно добавить или обновить
            foreach ($new_pdps as $new_pdp) {
                if (isset($old_pdps[$new_pdp->getId()])) {
                    $old_pdps[$new_pdp->getId()]->setValue($new_pdp->getValue());
                    $old_pdps[$new_pdp->getId()]->setValueNumeric($new_pdp->getValueNumeric());
                    $old_pdps[$new_pdp->getId()]->setData($new_pdp->getData());
                } else {
                    $obj->addProductDataProperty($new_pdp);
                }
            }
        } else {
            $obj->setProductDataProperty($new_pdps);
        }
    }

}
