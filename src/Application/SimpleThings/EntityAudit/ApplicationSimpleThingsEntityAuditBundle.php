<?php

/**
 * Разширяем бандл SimpleThingsEntityAuditBundle
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\SimpleThings\EntityAudit;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationSimpleThingsEntityAuditBundle extends Bundle {

    public function getParent() {
        return 'SimpleThingsEntityAuditBundle';
    }

}