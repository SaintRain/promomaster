<?php

/**
 * Админский контроллер для предзаказов
 *
 * @author Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Controller\Admin;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Core\FaqBundle\Admin\Form\Type\SimpleArticleFormType;

class PreOrderAdminController extends Controller
{
    public function editAction($id = null)
    {
        // the key used to lookup the template
        $templateKey = 'edit';

        $id = $this->get('request')->get($this->admin->getIdParameter());
        $object = $this->admin->getObject($id);
        $oldStatus = $object->getStatus();
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
        $articleForm = $this->createForm(new SimpleArticleFormType());
        if ($this->getRestMethod() == 'POST') {
            $form->bind($this->get('request'));

            $isFormValid = $form->isValid();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved()) && !$this->isCreateOrderRequested()) {
                // отправка письма при статусе отменен
                if ($object->getStatus() && $object->getIsSendCancelMsg() && $object->getStatus()->getName() == 'canceled' && (!$oldStatus || ($oldStatus->getId() != $object->getStatus()->getId()))) {
                    $this->get('core_order_mailer_logic')->sendEmailOnPreOrderCancel($object, 'preorder-cancel-template', $this->container->getParameter('domain_ru'));
                }
                $this->admin->update($object);                
                if ($this->isXmlHttpRequest()) {
                    return $this->renderJson(array(
                        'result'    => 'ok',
                        'objectId'  => $this->admin->getNormalizedIdentifier($object)
                    ));
                }

                $this->addFlash('sonata_flash_success', $this->admin->trans('flash_edit_success', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));

                // redirect to edit mode
                return $this->redirectTo($object);
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                if (!$this->isXmlHttpRequest()) {
                    $this->addFlash('sonata_flash_error', $this->admin->trans('flash_edit_error', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));
                }
            } elseif ($this->isPreviewRequested()) {
                // enable the preview template if the form was valid and preview was requested
                $templateKey = 'preview';
                $this->admin->getShow();
            } elseif ($this->isCreateOrderRequested()) {
                // запрос на создание заказа
                $result = $this->get('core_pre_order_logic')->createOrder($object);
                if (isset($result['errors'])) {
                    // redirect to edit mode
                    $onCreateOrderError = true;
                    $this->addFlash('sonata_flash_error', $this->get('core_pre_order_logic')->errorStringify($result['errors']));
                    //return $this->redirectTo($object);
                } else {
                    $this->addFlash('sonata_flash_success', 'Заказ создан успешно');
                    return $this->redirect($this->generateUrl('admin_core_order_order_edit', ['id' => $result['orderId']]));
                    //return $this->redirectTo($object);
                }
                
            }
        }

        $view = $form->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        return $this->render($this->admin->getTemplate($templateKey), array(
            'action' => 'edit',
            'form'   => $view,
            'object' => $object,
            'onCreateOrderError' => (isset($onCreateOrderError) && $onCreateOrderError) ? true : false,
            'articleForm' => $articleForm->createView()
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
        $articleForm = $this->createForm(new SimpleArticleFormType());
        if ($this->getRestMethod()== 'POST') {
            $form->bind($this->get('request'));

            $isFormValid = $form->isValid();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved()) && !$this->isCreateOrderRequested()) {
                $this->admin->create($object);
                // отправка письма при статусе отменен
                if ($object->getStatus() && $object->getIsSendCancelMsg() && $object->getStatus()->getName() == 'canceled') {
                    $this->get('core_order_mailer_logic')->sendEmailOnPreOrderCancel($object, 'preorder-cancel-template', $this->container->getParameter('domain_ru'));
                }
                if ($this->isXmlHttpRequest()) {
                    return $this->renderJson(array(
                        'result' => 'ok',
                        'objectId' => $this->admin->getNormalizedIdentifier($object)
                    ));
                }

                $this->addFlash('sonata_flash_success', $this->admin->trans('flash_create_success', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));

                // redirect to edit mode
                return $this->redirectTo($object);
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                if (!$this->isXmlHttpRequest()) {
                    $this->addFlash('sonata_flash_error', $this->admin->trans('flash_create_error', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));
                }
            } elseif ($this->isPreviewRequested()) {
                // pick the preview template if the form was valid and preview was requested
                $templateKey = 'preview';
                $this->admin->getShow();
            } elseif ($this->isCreateOrderRequested()) {
                // запрос на создание заказа
                $result = $this->get('core_pre_order_logic')->createOrder($object);
                if (isset($result['errors'])) {
                    // redirect to edit mode
                    $onCreateOrderError = true;
                    $this->addFlash('sonata_flash_error', $this->get('core_pre_order_logic')->errorStringify($result['errors']));
                } else {
                    $this->addFlash('sonata_flash_success', 'Заказ создан успешно');
                    return $this->redirect($this->generateUrl('admin_core_order_order_edit', ['id' => $result['orderId']]));
                    //return $this->redirectTo($object);
                }

            }
        }

        $view = $form->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        return $this->render($this->admin->getTemplate($templateKey), array(
            'action' => 'create',
            'form'   => $view,
            'onCreateOrderError' => (isset($onCreateOrderError) && $onCreateOrderError) ? true : false,
            'object' => $object,
            'articleForm' => $articleForm->createView()
        ));
    }

    /**
     * Создание заказа через ajax
     * @return type
     * @throws NotFoundHttpException
     */
    public function createOderAction()
    {
        if (!$this->isXmlHttpRequest()) {
            throw new NotFoundHttpException('Page Not Found');
        }
        
        $request = $this->get('request_stack')->getCurrentRequest();
        $id = $request->request->get('id');
        
        $object = $this->admin->getObject($id);
        if (false === $this->admin->isGranted('EDIT', $object)) {
            return $this->renderJson(array(
                        'result'    => false,
                        'errors' => ['access' => 'Доступ запщен']
                    ));
        }

        if (!$object) {
            return $this->renderJson(array(
                        'result'    => false,
                        'errors' => ['object' => 'Предзаказ не найден']
                    ));
        }
        $result = $this->get('core_pre_order_logic')->createOrder($object);

        return $this->renderJson($result);

    }
    
    /**
     * Контакты выбранного контрагента
     * @return type
     * @throws NotFoundHttpException
     */
    public function contactAction()
    {
        if (!$this->isXmlHttpRequest()) {
            throw new NotFoundHttpException('Page Not Found');
        }
        $request = $this->get('request_stack')->getCurrentRequest();
        $id = $request->request->get('id');
        if (!$id) {
            return $this->renderJson(array(
                        'result'    => false,
                        'errors' => ['id' => 'Контрагент не указан']
                    ));
        }
        $result = $this->get('core_pre_order_logic')->getContacts($id);
        if (!count($result)) {
            return $this->renderJson(array(
                        'result'    => false,
                        'errors' => ['id' => 'У данного контрагента нет контактов']
                    ));
        } else {
            return $this->renderJson(array(
                        'result'    => true,
                        'contacts' => $result
                    ));
        }
        
    }
    
    /**
     * Запрос на создание заказа
     * @return boolean
     */
    protected function isCreateOrderRequested()
    {
        return ($this->get('request')->get('btn_create_order') !== null);
    }
    
    /**
     * Предпросмотр письма отмены предзаказа
     * @return type
     * @throws NotFoundHttpException
     */
    public function previewCancelMsgAction()
    {
        if (!$this->isXmlHttpRequest()) {
            throw new NotFoundHttpException('Page Not Found');
        }

        $request = $this->get('request_stack')->getCurrentRequest();
        $errors = [];
        $em = $this->getDoctrine()->getManager();
        $productId = (int)$request->request->get('productId');
        if ($productId) {
            $product = $em->getRepository('CoreProductBundle:CommonProduct')->find($productId);
        } else {
            $errors[] = 'Указанный продукт не найден';
        }
        
        
        $configLogic = $this->get('core_config_logic');
        
        $template = $configLogic->get('preorder-cancel-template');
        $phones = $configLogic->get('phones');
        if (!$template) {
            $errors[] = 'Шаблон письма не найден';
        }
        if (count($errors)) {
            return $this->renderJson(array(
                        'result' => false,
                        'errors' => $errors
                ));
        }
        $twig = $this->get('twig');
        $twig = clone $twig;
        $twig->setLoader(new \Twig_Loader_String());
        $renderedTemplate = $twig->render($template, array(
            'product' => $product,
            'phones' => $phones,
            'homeUrl' => $this->generateUrl('core_common_index', [], true),
            'productUrl' => $this->generateUrl('core_product', ['slug' => $product->getSlug()], true),
            'domain' => $this->container->getParameter('domain_ru'),
            'contactUrl'  => $this->generateUrl('trouble_ticket_contact', [], true),
            'cancelReason' => $request->request->get('cancelReason', [], true),
        ));
        
        return $this->renderJson(array(
                        'result' => true,
                        'body' => $renderedTemplate,
                        'errors' => []
                ));
    }
}