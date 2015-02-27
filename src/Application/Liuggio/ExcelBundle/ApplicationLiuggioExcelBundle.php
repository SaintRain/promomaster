<?php
/**
 * Переписываем бандл, чтоб в экселе корректно отображалась кодировка. Для этого нужно перегрузить
 * переменную         $this->_codepage			= 'CP1251';
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
namespace Application\Liuggio\ExcelBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationLiuggioExcelBundle extends Bundle
{
    public function getParent() {
        return 'LiuggioExcelBundle';
    }

}
