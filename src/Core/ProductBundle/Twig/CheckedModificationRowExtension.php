<?php

/**
 * Расширения для восстановления галочек списка модификаций, если форма сломалась
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Twig;

class CheckedModificationRowExtension extends \Twig_Extension {

    private $productModificationLogic;
    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function getFunctions() {
        return array(
            'isCheckedForModificationDelete' => new \Twig_Function_Method($this, 'isCheckedForModificationDelete'),
            'isCheckedForModificationUndock' => new \Twig_Function_Method($this, 'isCheckedForModificationUndock'),
            'isGeneralForModification' => new \Twig_Function_Method($this, 'isGeneralForModification'),
            'getModificationDataList' => new \Twig_Function_Method($this, 'getModificationDataList'),
        );
    }

    /**
     * Запрашивает предварительно назначенные записи, если в форме что-то сломалось
     * @param type $data
     * @param type $dataNeed
     */
    public function getModificationDataList($data, $dInfo, $classname) {
        $this->productModificationLogic = $this->container->get('core_product_modification_logic');
        $newData = $this->productModificationLogic->getDataList($data, $dInfo, $classname);
        return $newData;
    }

    /**
     * Проверяет нужно ли выделить галочку для удаления
     * @param type $id
     * @param type $data
     * @return boolean
     */
    public function isCheckedForModificationDelete($id, $data) {
        $res = false;
        if (isset($data['_delete'])) {
            foreach ($data['_delete'] as $d_id) {
                if ($d_id == $id) {
                    $res = true;
                    break;
                }
            }
        }
        return $res;
    }

    /**
     * Проверяет нужно ли выделить галочку для открепления
     * @param type $id
     * @param type $data
     * @return boolean
     */
    public function isCheckedForModificationUndock($id, $data) {
        $res = false;
        if (isset($data['_undock'])) {
            foreach ($data['_undock'] as $d_id) {
                if ($d_id == $id) {
                    $res = true;
                    break;
                }
            }
        }
        return $res;
    }

    /**
     * Проверяет нужно ли выделить модификацию как главную
     * @param type $id
     * @param type $data
     * @return boolean
     */
    public function isGeneralForModification($id, $data) {
        $res = false;
        if (isset($data['general'])) {
            if ($data['general'] == $id) {
                $res = true;
            }
        }
        return $res;
    }

    public function getName() {
        return 'checked_modification';
    }

}