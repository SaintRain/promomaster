<?php

/**
 * Админски контроллер для загруженных прайсов для последущего  анализа
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Controller\Admin;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\Form\FormError;

class SupplierPriceAnalysisAdminController extends Controller
{

    public function editAction($id = null)
    {
        // the key used to lookup the template
        $templateKey = 'edit';

        $id = $this->get('request')->get($this->admin->getIdParameter());
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

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {


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
            }
        }

        $view = $form->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        //если все записи обработаны кроном
        if ($object->getIsQuantityProcessed()) {
            $logic=$this->container->get('core_logistics_supplier_price_analysis_logic')->setPriceAnalysis($object);
            $priceHike=$logic->analysisPriceHike();
            $outOfStock=$logic->analysisOutOfStock();
            $analysisMRC=$logic->analysisMRC();
            $analysisBadRecords=$logic->analysisBadRecords();
            $summaryInfo=$logic->getSummaryInfo($priceHike, $outOfStock, $analysisMRC);
            $ph=$logic->getPHistories();
            $extra=[
                'priceHike'=>$priceHike,
                'outOfStock'=>$outOfStock,
                'analysisMRC'=>$analysisMRC,
                'analysisBadRecords'=>$analysisBadRecords,
                'summaryInfo'=>$summaryInfo,
                'ph'=>$ph

            ];
        }
        else {
            $extra=false;
        }

        return $this->render($this->admin->getTemplate($templateKey), array(
            'action' => 'edit',
            'form'   => $view,
            'object' => $object,
            'extra'=>$extra
        ));
    }

}
