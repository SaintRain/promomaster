<?php
/**
 * Админски контроллер для праздников
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\HolidayBundle\Controller\Admin;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\Intl\Intl;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Core\PaymentBundle\Entity\Payment;

class HolidayAdminController extends Controller
{

    /**
     * @inheritdoc
     */
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

            // Проверяем полученый объект
            $vaditate = $this->get('core_holiday_logic')->validate($object);
            if (isset($vaditate['error'])) {
                $isFormValid = false;
            }

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
                if (isset($vaditate['error'])) {
                    $this->addFlash('sonata_flash_error', implode('<br>', $vaditate['error']));
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

        $id     = $this->get('request')->get($this->admin->getIdParameter());
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

            // Проверяем полученый объект
            $vaditate = $this->get('core_holiday_logic')->validate($object);
            if (isset($vaditate['error'])) {
                $isFormValid = false;
            }
            //ldd($object->getEndedAt()->format('Y-m-d H:i:s'));
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

                // redirect to edit mode
                return $this->redirectTo($object);
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                if (!$this->isXmlHttpRequest()) {
                    $this->addFlash('sonata_flash_error', $this->admin->trans('flash_edit_error', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));
                }
                if (isset($vaditate['error'])) {
                    $this->addFlash('sonata_flash_error', implode('<br>', $vaditate['error']));
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