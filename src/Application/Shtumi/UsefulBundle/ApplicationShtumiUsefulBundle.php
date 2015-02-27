<?php

/**
 * Разширяем бандл ShtumiUsefulBundle
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Shtumi\UsefulBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationShtumiUsefulBundle extends Bundle {

    public function getParent() {
        return 'ShtumiUsefulBundle';
    }

}