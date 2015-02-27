<?php

/**
 * Контроллер для вывода статистических данных в админке
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Controller\Admin;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\Filesystem\Filesystem;

class StatisticsAdminController extends Controller {

    /**
     * Выводим дефолтную статистику
     * @return type
     */
    public function listAction() {
        return $this->stockStatisticsAction();
    }

    /**
     * Статистика по складу
     * @return type
     */
    public function stockStatisticsAction() {

        $data = $this->container->get('core_statistics_stock_logic')->generateStatistics();
        return $this->render('CoreStatisticsBundle:Admin/Crud:stockStatistics.html.twig', array(
                    'data' => $data
        ));
    }

    /**
     * Статистика по заканчивающимся товарам
     * @return type
     */
    public function deficitProductStatisticsAction() {

        $data = $this->container->get('core_statistics_deficit_product_logic')->generateStatistics();
        return $this->render('CoreStatisticsBundle:Admin/Crud:deficitProductStatistics.html.twig', array(
                    'data' => $data
        ));
    }

    /**
     * Вывод инвенторизации
     * @return type
     */
    public function inventoryStatisticsAction() {

        $data = $this->container->get('core_statistics_inventory_logic')->getFilterForm();
        return $this->render('CoreStatisticsBundle:Admin/Crud:inventoryStatistics.html.twig', array(
                    'data' => $data
        ));
    }

    /**
     * Вывод статистики по виртуальным продуктам
     * @return type
     */
    public function virtualUnitsStatisticsAction() {

        $data = $this->container->get('core_statistics_virtual_units_logic')->generateStatistics();
        return $this->render('CoreStatisticsBundle:Admin/Crud:virtualUnitsStatistics.html.twig', array(
                    'data' => $data
        ));
    }


//    public function createAction() {
//        if (!$this->isXmlHttpRequest()) {
//            return parent::createAction();
//        }
//
//        $object = $this->admin->getNewInstance();
//        $this->admin->setSubject($object);
//        $form = $this->admin->getForm();
//        $form->setData($object);
//
//        if ($this->getRestMethod() == 'POST') {
//            $form->bind($this->get('request'));
//            $isFormValid = $form->isValid();
//
//            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {
//                $this->admin->create($object);
//                $this->addFlash('sonata_flash_success', 'flash_create_success');
//            }
//
//            if (!$isFormValid) {
//                $this->addFlash('sonata_flash_error', 'flash_create_error');
//            }
//        }
//
//        $view = $form->createView();
//        // set the theme for the current Admin Form
//        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());
//
//        $formTplName = $this->getFormTplName();
//        return $this->render('CoreCategoryBundle:Admin:form.html.twig', array(
//                    'action' => 'list',
//                    'form' => $view,
//                    'object' => $object,
//                    'formTplName' => 'CoreCategoryBundle:Admin:' . $formTplName
//        ));
//    }
//
//
//
//    public function editAction($id = null) {
//
//        //если пришел не AJAX запрос, тоставим куки на подсвечивание и перекидываем
//        if (!$this->isXmlHttpRequest()) {
//            return $this->redirectToList();
//        }
//        $id = $this->get('request')->get($this->admin->getIdParameter());
//        $object = $this->admin->getObject($id);
//        $this->admin->setSubject($object);
//        $form = $this->admin->getForm();
//        $form->setData($object);
//        if ($this->getRestMethod() == 'POST') {
//            $uniqid = $this->get('request')->get('uniqid');
//            $data = $this->get('request')->get($uniqid);
//            //только переименовываем
//            if (isset($data['_rename'])) {
//                $object->setCaptionRu($data['captionRu']);
//                $form->setData($object);
//                $validator = $this->container->get('validator');
//                $isFormValid = $validator->validate($object);
//            }
//            //двигаем
//            else if (isset($data['_move'])) {
//
//                $object->setParent($this->admin->getObject($data['parent']));
//                $repo = $this->container->get('doctrine.orm.entity_manager')->getRepository($this->admin->getClass());
//                if ($data['parent'] != $data['prev_node_id']) {
//                    $repo->persistAsNextSiblingOf($object, $this->admin->getObject($data['prev_node_id']));
//                } else {
//                    $repo->persistAsFirstChild($object);
//                }
//
//                $form->setData($object);
//                $validator = $this->container->get('validator');
//                $isFormValid = $validator->validate($object);
//            } else {
//                $form->bind($this->get('request'));
//                $isFormValid = $form->isValid();
//            }
//
//            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {
//                $this->admin->update($object);
//                $this->addFlash('sonata_flash_success', 'flash_edit_success');
//            }
//
//            if (!$isFormValid) {
//                $this->addFlash('sonata_flash_error', 'flash_edit_error');
//            }
//        }
//
//        $view = $form->createView();
//
//        // set the theme for the current Admin Form
//        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());
//
//        $formTplName = $this->getFormTplName();
//        return $this->render('CoreCategoryBundle:Admin:form.html.twig', array(
//                    'action' => 'list',
//                    'form' => $view,
//                    'object' => $object,
//                    'formTplName' => 'CoreCategoryBundle:Admin:' . $formTplName
//        ));
//    }
//
//    /**
//     * Определяем имя шаблона из имени сущности
//     * @param type $action
//     * @return string
//     */
//    function getFormTplName($action = 'edit') {
//        $m = explode('\\', $this->admin->getClass());
//        $tplName = end($m) . '_' . $action . '.html.twig';
//
//        $fs = new Filesystem();
//
//        //если шаблона существует, тогда берём дефолтный
//        if (!$fs->exists(__DIR__ . '/../../Resources/views/Admin/' . $tplName)) {
//            $tplName = 'DefaultCategory_' . $action . '.html.twig';
//        }
//        return $tplName;
//    }
//
//    /**
//     * Переадресовывает на список категорий, помечая в куках редактируемый элемент
//     * @return \Symfony\Component\HttpFoundation\RedirectResponse
//     */
//    function redirectToList() {
//        $id = $this->get('request')->get($this->admin->getIdParameter());
//        $path = dirname($this->admin->generateUrl('list')); //генерируем путь и обрезаем
//
//        $response = new RedirectResponse($this->admin->generateUrl('list'));
//        $response->headers->setCookie(new Cookie('jstree_select', '#phtml_' . $id, 0, $path, null, false, false));
//
//        //ставим куки для подсветки дерева
//        $jstree_open = $this->getRequest()->cookies->get('jstree_open');
//        $mas = explode(',', $jstree_open);
//        if (count($mas) > 1) {
//            $need_add = true;
//            foreach ($mas as $m) {
//                if ($m == '#phtml_' . $id) {
//                    $need_add = false;
//                    break;
//                }
//            }
//            if ($need_add) {
//                $jstree_open_str = $jstree_open . ',#phtml_' . $id;
//            } else {
//                $jstree_open_str = '';
//            }
//        } else {
//            $jstree_open_str = '#phtml_' . $id;
//        }
//
//        $response->headers->setCookie(new Cookie('jstree_open', $jstree_open_str, 0, $path, null, false, false));
//
//        return $response;
//    }
}
