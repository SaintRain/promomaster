<?php

/**
 * Админски контроллер для отзывов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ReviewBundle\Controller\Admin;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\Intl\Intl;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;

class ReviewAdminController extends Controller
{

    public function createAction()
    {
        // the key used to lookup the template
        $templateKey = 'edit';

        if (false === $this->admin->isGranted('CREATE')) {
            throw new AccessDeniedException();
        }

        $object = $this->admin->getNewInstance();

        // Добавляем родительский отзыв, если передали а параметрах
        $em = $this->getDoctrine()->getManager();
        $GET = $this->get('request')->query;
        $parentId = $GET->get('review_parent_id');
        if ($parentId > 0) {
            $parent = $em->getRepository('CoreReviewBundle:Review')->find($parentId);
            if (null !== $parent) {
                $object->setParent($parent);

                // Добавляем продукт в отзыв
                $productId = $GET->get('review_product_id');
                if ($productId > 0) {
                    $product = $em->getRepository('CoreProductBundle:CommonProduct')->find($productId);
                    if (null !== $product) {
                        $object->setProduct($product);
                    }
                }
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

}
