<?php
/**
 * Функции
 * Дополнительные расширения для Twig'а
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\HolidayBundle\Twig;

use Symfony\Component\Templating\Helper\AssetsHelper;

class HolidayFunctionExtension extends \Twig_Extension
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('getLogoLink', array($this, 'getLogoLinkFunction')),
        );
    }

    /**
     * Функция для вывода логотипа с учетом если текущая дата находиться в праздничном периоде
     *
     * @param object $obj
     * @return string
     */
    public function getLogoLinkFunction()
    {
        $em      = $this->container->get('doctrine')->getManager();
        $holiday = $em->getRepository('CoreHolidayBundle:Holiday')->getHoliday();

        if ($holiday) {
            $fileLogic = $this->container->get('core_file_logic');
            $src       = $fileLogic->getFileAssetWebPath($holiday->getLogo(), 'original', 'original_');
            $isHoliday = true;
        } else {
            $asset     = new AssetsHelper();
            $src       = $asset->getUrl('images/logo_olikids.png');
            $isHoliday = false;
        }

        return [
            'isHoliday' => $isHoliday,
            'src'       => $src,
        ];
    }

    public function getName()
    {
        return 'core_holiday_twig_function_extension';
    }
}