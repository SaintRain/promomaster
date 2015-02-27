<?php
/**
 * Переписываем редактор, чтобы можно было переписать стили в редакторе 
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\IvoryCKEditorBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationIvoryCKEditorBundle extends Bundle {

    public function getParent() {
        return 'IvoryCKEditorBundle';
    }

}