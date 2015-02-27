<?php

/**
 * Админский контроллер стран
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Controller\Admin;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CountryAdminController extends Controller {
    /**
     * return the Response object associated to the list action
     *
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     *
     * @return Response
     */
    public function listAction()
    {
        if (false === $this->admin->isGranted('LIST')) {
            throw new AccessDeniedException();
        }

        $datagrid = $this->admin->getDatagrid();
        $ids = array();
        foreach($datagrid->getResults() as $val) {
            $ids[$val->getId()] = (int)$val->getId();
        }
        if (count($ids)) {
            $em = $this->getDoctrine()->getManager();
            $cities = $em->getRepository('CoreDirectoryBundle:City')->countByCountries($ids);
            $ids = array();
            foreach($cities as $city) {
                $ids[$city[0]->getCountry()->getId()] = $city['citiesAmount'];
            }
        }
        foreach($datagrid->getResults() as $val) {
            if (isset($ids[$val->getId()])) {
                $val->setCitiesAmount($ids[$val->getId()]);
            }
        }


        $formView = $datagrid->getForm()->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($formView, $this->admin->getFilterTheme());

        return $this->render($this->admin->getTemplate('list'), array(
            'action'     => 'list',
            'form'       => $formView,
            'datagrid'   => $datagrid,
            'csrf_token' => $this->getCsrfToken('sonata.batch'),
        ));
    }
}

