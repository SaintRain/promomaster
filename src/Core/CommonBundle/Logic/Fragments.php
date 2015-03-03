<?php

/**
 * Бизнес-логика для фрагментов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Logic;

class Fragments {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

}
