<?php

/**
 * Сервис для работы с цветами продукта
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ColorBundle\Logic;

use Core\ColorBundle\Lib\ColorThiefPHP;
use Imagine\Imagick\Imagine;
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;
use Imagine\Image\Box;

class ColorLogic {

    protected $translator;
    protected $doctrine;
    protected $session;

    public function __construct($translator, $doctrine, $session) {
        $this->translator = $translator;
        $this->doctrine = $doctrine;
        $this->session = $session;
    }

    public function getDominantColor($image) {
        $imagine = new Imagine();
        $temp = $imagine->open($image);
        $imagick = new \Imagick();

        $edge = 256;
        $rombusFactor = 0.7;
        $edgeRombus = ($edge - $edge * $rombusFactor) / 2;

        $imagick->readimageblob($temp->get('png'));
        $imagick->setImageFormat('png');
        $imagick->trimImage(0);
        $imagick->cropThumbnailImage($edge, $edge);
        $imagick->rotateImage('white', 45);
        $imagick->cropImage($edge * $rombusFactor, $edge * $rombusFactor, $edgeRombus, $edgeRombus);
        $imagick->roundCorners($edge * $rombusFactor / 2, $edge * $rombusFactor / 2);
        $imagick->modulateImage(115, 115, 100);
        $tempModify = $imagine->load($imagick->getimageblob());

        $tempModify->effects()
            //->blur(1)
            ->gamma(1.2)
            ;

        $response = array();
//        $colors = ColorThiefPHP::getPalette($tempModify->get('png'), 3, 1);
//        foreach ($colors as $color) {
//            $response[] = $this->RGB2HEX($color['0'], $color['1'], $color['2']);
//        }

        $color = ColorThiefPHP::getColor($tempModify->get('png'), 3);
        $response[] = $this->RGB2HEX($color['0'], $color['1'], $color['2']);

        return $response[0];
    }

    public function RGB2HEX($R, $G, $B) {

        $R = dechex($R);
        if (strlen($R) < 2) {
            $R = '0' . $R;
        }

        $G = dechex($G);
        if (strlen($G) < 2) {
            $G = '0' . $G;
        }

        $B = dechex($B);
        if (strlen($B) < 2) {
            $B = '0' . $B;
        }

        return '#' . $R . $G . $B;
    }

}

