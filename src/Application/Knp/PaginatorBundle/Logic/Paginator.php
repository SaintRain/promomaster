<?php

/**
 * Класс для расширения основного класса пагинатора
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Knp\PaginatorBundle\Logic;

use Knp\Component\Pager\Paginator as Base;

class Paginator extends Base
{
    /**
     * Добавляем метод для полчения дефолтных настроек
     *
     * @return array
     */
    public function getPaginatorOptions() {
        return $this->defaultOptions;
    }

}
