<?php

/**
 * Контроллер для нестандартных страниц в админке
 *
 * @author Shapovalov.V
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sonata\AdminBundle\Controller\CoreController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomPagesAdminController extends CoreController
{

    /**
     * Вывод phpinfo()
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function printPhpInfoAction(Request $request)
    {

        phpinfo();
        return new Response('');
    }

    /**
     * Вывод log файл prod.log
     */
    public function printLogAction(Request $request)
    {
        $chars = $request->query->get('chars');

        $file = __DIR__.'/../../../../../app/logs/prod.log';
        $size = filesize($file);
        if ($chars > $size) {
            $chars = $size;
        } elseif ($chars == 0) {
            $chars = 10000;
        }
        $logs = file_get_contents($file, NULL, NULL, $size - $chars, $chars);
        echo 'Count last chars from file'.realpath($file).': <b>'.$chars.'</b><br>';
        if (is_file($file)) {
            echo '<pre style="width: 100%; white-space: pre-line;">';
            print_r($logs);
            echo '</pre>';
        } else {
            echo 'Cannot open file '.$file;
        }
        return new Response('');

//        $this->render('ApplicationSonataAdminBundle:Admin/CustomPages:phpinfo.html.twig', array(
//            'data' => $data,
//            'base_template'   => $this->getBaseTemplate(),
//            'admin_pool'      => $this->container->get('sonata.admin.pool'),
//            'blocks'          => $this->container->getParameter('sonata.admin.configuration.dashboard_blocks')
//        ));
    }

}
