<?php
/**
 * Админски контроллер для платежек
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Controller\Admin;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\Intl\Intl;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Core\PaymentBundle\Entity\Payment;

class PaymentAdminController extends Controller
{

    /**
     * return the Response object associated to the create action
     *
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     * @return Response
     */
    public function createAction()
    {
        // the key used to lookup the template
        $templateKey = 'edit';

        if (false === $this->admin->isGranted('CREATE')) {
            throw new AccessDeniedException();
        }

        $object = $this->admin->getNewInstance();

        // Добавляем заказ, если передали а параметрах
        $em      = $this->getDoctrine()->getManager();
        $GET     = $this->get('request')->query;
        $orderId = $GET->get('order_id');
        if ($orderId > 0) {
            $order = $em->getRepository('CoreOrderBundle:Order')->find($orderId);
            if (null !== $order) {
                $object->setOrder($order);
                $object->setCustomer($order->getContragent());
                $orderInso = $this->get('core_order_logic')->computeOrderCostInfo($order);
                $object->setAmount($orderInso['total_cost_all']);
                $object->setType(Payment::TYPE_IN);
            }
        }

        $this->admin->setSubject($object);

        /** @var $form \Symfony\Component\Form\Form */
        $form = $this->admin->getForm();
        $form->setData($object);

        if ($this->getRestMethod() == 'POST') {
            $form->bind($this->get('request'));

            $isFormValid = $form->isValid();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {
                $this->admin->create($object);

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

    /**
     * @inheritdoc
     */
    public function editAction($id = null)
    {
        // the key used to lookup the template
        $templateKey = 'edit';

        $id       = $this->get('request')->get($this->admin->getIdParameter());
        $object   = $this->admin->getObject($id);
        $response = [];

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

            if ($isFormValid && $object->getIsRefund() && $object->getSystem()) {
                $isRefund = $this->getDoctrine()->getManager()->getRepository('CorePaymentBundle:Payment')->isRefund($object);
                if (!$isRefund) {
                    $logic    = $this->get('core_payment_logic_'.strtolower($object->getSystem()->getSystem()));
                    $response = $logic->doRefund($object);
                    if (isset($response['error'])) {
                        $isFormValid = false;
                    }
                }
            }
            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {
                $this->admin->update($object);

                if ($this->isXmlHttpRequest()) {
                    return $this->renderJson(array(
                            'result' => 'ok',
                            'objectId' => $this->admin->getNormalizedIdentifier($object)
                    ));
                }

                $this->addFlash('sonata_flash_success', $this->admin->trans('flash_edit_success', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));
                if (isset($response['success'])) {
                    $this->addFlash('sonata_flash_success', implode('<br>', $response['success']));
                }
                // redirect to edit mode
                return $this->redirectTo($object);
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                if (!$this->isXmlHttpRequest()) {
                    $this->addFlash('sonata_flash_error', $this->admin->trans('flash_edit_error', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));
                }
                if (isset($response['error'])) {
                    $this->addFlash('sonata_flash_error', 'Невозможно выполнить возврат: <br/>'.implode('<br>', $response['error']));
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
        ));
    }
}