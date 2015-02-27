<?php
/**
 * Контроллер для вывода пересобранного меню
 *
 * @author Shapovalov.V
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sonata\AdminBundle\Controller\CoreController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;

class MenuAdminController extends CoreController
{

    /**
     * Вывод phpinfo()
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function menuAction(Request $request)
    {
        $yaml = new Parser();

        try {
            $menu = $yaml->parse(file_get_contents('../src/Application/Sonata/AdminBundle/Resources/config/menu.yml'));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }

        return $this->render('ApplicationSonataAdminBundle:Admin:menu.html.twig', array(
            'menu' => $menu,
        ));
    }
}