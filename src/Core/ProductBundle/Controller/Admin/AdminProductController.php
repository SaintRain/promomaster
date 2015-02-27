<?php

/**
 * Админский контроллер для продукции
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Controller\Admin;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Form\FormError;

class AdminProductController extends Controller
{

    /**
     * Проверяем правильность заполнения характеристик
     * @param type $object
     * @param type $form
     * @param type $isFormValid
     * @return boolean
     */
    protected function checkPropetries($object, $form, $isFormValid)
    {
        if ($isFormValid) {
            //берём характеристики на основе выбранных категорий
            list($properties) = $this->container->get('core_shop_property_logic')->getDataForDynamicPropertyFields($object,
                ['categories' => $object->getCategories()]);
            //проверяем заполнение обязательных характеристик
            foreach ($properties as $p) {
                if ($p->getGeneralSettingsCategory()->getIsRequired()) {
                    $founded = false;
                    foreach ($object->getProductDataProperty() as $pdp) {
                        $property = $pdp->getData()->getProperty();
                        if ($p->getId() == $property->getId()) {
                            $founded = true;
                            if (in_array($property->getEditType(), ['input', 'input_text', 'textarea', 'editor'])) {
                                if (!$pdp->getValue()) {
                                    $isFormValid = false;
                                    break;
                                }
                            } else {
                                if (!$pdp->getData()) {
                                    $isFormValid = false;
                                    break;
                                }
                            }
                        }
                    }
                    if (!$founded || !$isFormValid) {
                        $error = new formerror('В характеристиках не заполнено обязательное поле «' . $p->getCaptionRu() . '»');
                        $form->get('productDataProperty')->addError($error);
                        $isFormValid = false;
                        break;
                    }
                }
            }
        }
        return $isFormValid;
    }

    public function listAction()
    {

        if (false === $this->admin->isGranted('LIST')) {
            throw new AccessDeniedException();
        }

        $datagrid = $this->admin->getDatagrid();
        $formView = $datagrid->getForm()->createView();

        $em = $this->container->get('doctrine.orm.entity_manager');
        $compQuantity = $em->getRepository('CoreOrderBundle:Composition')->getQuantityForProducts($datagrid->getResults());
        $compInSupply = $em->getRepository('CoreLogisticsBundle:ProductInSupply')->getQuantityForProducts($datagrid->getResults());

        foreach ($datagrid->getResults() as $r) {
            if (isset($compQuantity[$r->getId()]) || isset($compInSupply[$r->getId()])) {
                $r->cannotRemove = true;
            }
        }
        // записываем в сессию продукты
        $this->get('core_product_logic')->setProductsId($datagrid);

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($formView, $this->admin->getFilterTheme());

        return $this->render($this->admin->getTemplate('list'), array(
            'action' => 'list',
            'form' => $formView,
            'datagrid' => $datagrid,
            'csrf_token' => $this->getCsrfToken('sonata.batch'),
        ));
    }

    public function editAction($id = null)
    {

        // the key used to lookup the template
        $templateKey = 'edit';

        $id = $this->get('request')->get($this->admin->getIdParameter());

        $em = $this->container->get('doctrine.orm.entity_manager');
        $needIds = $this->get('core_product_logic')->getIds($id, false);
        $objects = $em->getRepository('CoreProductBundle:CommonProduct')->findPrevNext($needIds);
        foreach ($objects as $val) {
            if (isset($needIds['current']) && $val->getId() == $needIds['current']) {
                $object = $val;
            } elseif ($val->getId() == $needIds['prev']) {
                $prev = $val;
            } elseif ($val->getId() == $needIds['next']) {
                $next = $val;
            }
        }
        $object = $this->admin->getObject($id);

        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $id));
        }

        if (false === $this->admin->isGranted('EDIT', $object)) {
            throw new AccessDeniedException();
        }

        $this->admin->setSubject($object);

        /** @var $form \Symfony\Component\Form\Form */
        $form = $this->admin->getForm();
        $form->setData($object);

        if ($this->getRestMethod() == 'POST') {

            $form->bind($this->get('request'));

            $isFormValid = $form->isValid();

            $isFormValid = $this->checkPropetries($object, $form, $isFormValid);

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {

                $this->admin->update($object);

                if ($this->isXmlHttpRequest()) {
                    return $this->renderJson(array(
                        'result' => 'ok',
                        'objectId' => $this->admin->getNormalizedIdentifier($object)
                    ));
                }

                $this->addFlash('sonata_flash_success', 'flash_edit_success');
//exit;
                // redirect to edit mode
                return $this->redirectTo($object);
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                if (!$this->isXmlHttpRequest()) {
                    $this->addFlash('sonata_flash_error', 'flash_edit_error');
                }
            } elseif ($this->isPreviewRequested()) {
                // enable the preview template if the form was valid and preview was requested
                $templateKey = 'preview';
                $this->admin->getShow();
            }
        }

        $view = $form->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        return $this->render($this->admin->getTemplate($templateKey), array(
            'action' => 'edit',
            'form' => $view,
            'object' => $object,
            'prevObject' => (isset($prev)) ? $prev : null,
            'nextObject' => (isset($next)) ? $next : null,
        ));
    }

    public function createAction()
    {
        // the key used to lookup the template
        $templateKey = 'edit';

        if (false === $this->admin->isGranted('CREATE')) {
            throw new AccessDeniedException();
        }

        $object = $this->admin->getNewInstance();

        $this->admin->setSubject($object);

        /** @var $form \Symfony\Component\Form\Form */
        $form = $this->admin->getForm();
        $form->setData($object);

        if ($this->getRestMethod() == 'POST') {
            $form->bind($this->get('request'));

            $isFormValid = $form->isValid();
            $isFormValid = $this->checkPropetries($object, $form, $isFormValid);
//$isFormValid=false;
            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {

                $this->admin->create($object);

                if ($this->isXmlHttpRequest()) {
                    return $this->renderJson(array(
                        'result' => 'ok',
                        'objectId' => $this->admin->getNormalizedIdentifier($object)
                    ));
                }

                $this->addFlash('sonata_flash_success',
                    $this->admin->trans('flash_create_success', array('%name%' => $this->admin->toString($object)),
                        'SonataAdminBundle'));

                // redirect to edit mode
                return $this->redirectTo($object);
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                if (!$this->isXmlHttpRequest()) {
                    $this->addFlash('sonata_flash_error', 'flash_create_error');
                }
            } elseif ($this->isPreviewRequested()) {
                // pick the preview template if the form was valid and preview was requested
                $templateKey = 'preview';
                $this->admin->getShow();
            }
        }

        $view = $form->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        return $this->render($this->admin->getTemplate($templateKey), array(
            'action' => 'create',
            'form' => $view,
            'object' => $object,
        ));
    }

}
