<?php

/**
 * Фильтры
 * Дополнительные расширения для Twig'а
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\Twig;

class FileFilterExtension extends \Twig_Extension {

    private $configs;
    private $logic;

    public function __construct($core_file, $core_file_logic) {
        $this->configs = $core_file;
        $this->logic = $core_file_logic;
    }

    public function getFilters() {
        return array(
            new \Twig_SimpleFilter('getImageSize', array($this, 'getImageSizeFilter')),
            new \Twig_SimpleFilter('getFileWebPath', array($this, 'getFileWebPathFilter')),
            new \Twig_SimpleFilter('getHumanFileSize', array($this, 'getHumanFileSizeFilter')),
        );
    }

    /**
     * Фильтр для получения размеров картинки
     *
     * @param type $obj
     * @param type $side - сторона
     * @return string
     */
    public function getImageSizeFilter($obj, $side = null) {
        $side = strtolower($side);
        $image = $this->configs['root_dir'] . '/../' . $this->configs['web_dir'] . $obj;
        $result = '';
        if (is_file($image)) {
            $option = @getimagesize($image);
            if ($option) {
                if (in_array($side, ['w', 'width', 'x'])) {
                    $result = $option[0];
                } elseif (in_array($side, ['h', 'height', 'y'])) {
                    $result = $option[1];
                } else {
                    $result = $option[0] . 'x' . $option[1] . 'px';
                }
            }
        }
        return $result;
    }

    /**
     * Получение пути файла для отображения
     *
     * @param $obj - объект картинки к которой применяется фильтр
     * @param string $dir - назкание папки
     * @param string $prefix - префикс файла
     * @return string
     */
    public function getFileWebPathFilter($obj, $dir = null, $prefix = null, $dammy = false) {
        return $this->logic->getFileWebPath($obj, $dir, $prefix, $dammy);
    }

    /**
     * Переводит байты в Kb, Mb, Gb или Tb
     *
     * @param integer $bytes - байты
     * @param integer $decimals - кол-во знаков после точки
     * @return string
     */
    public function getHumanFileSizeFilter($bytes, $decimals = 2) {
        $bytes = (int)$bytes;
        $sz = array(
            0 => 'B',
            1 => 'Kb',
            2 => 'Mb',
            3 => 'Gb',
            4 => 'Tb',
        );
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf('%.' . $decimals . 'f ', $bytes / pow(1024, $factor)) . @$sz[$factor];
    }

    public function getName() {
        return 'filter_extension';
    }

}