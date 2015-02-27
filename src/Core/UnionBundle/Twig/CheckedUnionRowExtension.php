<?php

/**
 * Расширения для восстановления галочек, если форма сломалась
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\UnionBundle\Twig;

class CheckedUnionRowExtension extends \Twig_Extension {

    private $unionLogic;
    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function getFunctions() {
        return array(
            'isCheckedForUnionDelete' => new \Twig_Function_Method($this, 'isCheckedForUnionDelete'),
            'isCheckedForUnionUndock' => new \Twig_Function_Method($this, 'isCheckedForUnionUndock'),
            'getUnionDataList' => new \Twig_Function_Method($this, 'getUnionDataList'),
        );
    }

    /**
     * Запрашивает предварительно назначенные записи, если в форме что-то сломалось
     * @param type $data
     * @param type $dataNeed
     */
    public function getUnionDataList($data, $dInfo, $targetEntity, $classname) {
        $this->unionLogic = $this->container->get('core_union_logic');
        $newData = $this->unionLogic->getDataList($data, $dInfo, $targetEntity, $classname);
        return $newData;
    }

    /**
     * Проверяет нужно ли выделить галочку для удаления
     * @param type $id
     * @param type $data
     * @return boolean
     */
    public function isCheckedForUnionDelete($id, $data) {
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
    public function isCheckedForUnionUndock($id, $data) {
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

    public function getName() {
        return 'checked_union';
    }

}