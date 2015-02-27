<?php

/**
 * Разширяем бандл KnpPaginatorBundle
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Knp\PaginatorBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationKnpPaginatorBundle extends Bundle {

    public function getParent() {
        return 'KnpPaginatorBundle';
    }

}