<?php

/**
 * Админски контроллер для брендов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Controller\Admin;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\Form\FormError;

class BrandAdminController extends Controller
{

    /**
     * Переписываем метод вывода списка брендов для подсчета кол-ва товара у каждого бренда
     * fix: переполнение памяти при большом кол-ве товаров
     */
    public function listAction()
    {
        if (false === $this->admin->isGranted('LIST')) {
            throw new AccessDeniedException();
        }

        $datagrid = $this->admin->getDatagrid();
        $formView = $datagrid->getForm()->createView();

        $ids = array();
        foreach ($datagrid->getResults() as $manufacturer) {
            $ids[] = $manufacturer->getId();
        }

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('CoreManufacturerBundle:Brand');
        if ($ids) {
            $queryResult = $em->createQueryBuilder()
                    ->from($repository->getClassName(), 'b', 'b.id')
                    ->where('b.id IN (' . implode(',', $ids) . ')')
                    ->leftJoin('b.products', 'p', 'b.id')
                    ->select('COUNT(p) products_count')
                    ->addSelect('b.id')
                    ->groupBy('b.id')
                    ->getQuery()
                    ->getResult();
        }
        foreach ($datagrid->getResults() as $manufacturer) {
            $manufacturer->setCountProducts($queryResult[$manufacturer->getId()]['products_count']);
        }

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($formView, $this->admin->getFilterTheme());

        return $this->render($this->admin->getTemplate('list'), array(
                    'action' => 'list',
                    'form' => $formView,
                    'datagrid' => $datagrid,
                    'csrf_token' => $this->getCsrfToken('sonata.batch'),
        ));
    }

}
