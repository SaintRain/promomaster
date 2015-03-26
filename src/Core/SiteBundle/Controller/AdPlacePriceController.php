<?php

 /**
 * 
 * @author  Kaluzhy N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Controller;


use Core\SiteBundle\Entity\AdPlacePrice;
use Core\SiteBundle\Form\Type\AdPlacePriceFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;


class AdPlacePriceController extends Controller
{
    /**
     * @todo Pagination
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $subjects = $em->getRepository('CoreSiteBundle:AdPlacePrice')->findForPlace((int)$id, $this->getUser()->getId());

        if (count($subjects)) {
            $adPlace = reset($subjects)->getAdPlace();
        } else {
            $adPlace = $em->getRepository('CoreSiteBundle:AdPlace')->findOneBy(['user' => $this->getUser(), 'id' => (int) $id]);
        }

        return $this->render('CoreSiteBundle:AdPlacePrice\Cabinet:list.html.twig',[
            'subjects' => $subjects,
            'adplace' => $adPlace
            ]);
    }

    public function createAction($id, Request $request)
    {
        /** @var \Doctrine\ORM\EntityManager */
        $em = $this->getDoctrine()->getManager();
        $subject = new AdPlacePrice();
        $adPlace = $em->getRepository('CoreSiteBundle:AdPlace')->findOneBy(['user' => $this->getUser(), 'id' => (int) $id]);
        if (!$adPlace) {
            throw $this->createNotFoundException('Page Not Found');
        }
        $subject->setAdPlace($adPlace);
        $form = $this->createForm(new AdPlacePriceFormType(), $subject);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->persist($subject);
                $em->flush();
                $this->setFlash('edit_success', 'Новая цена добавлена');
                return new RedirectResponse($this->generateUrl('core_cabinet_ad_place_price_list', ['id' => $adPlace->getId()]));
            }
            $this->setFlash('edit_errors', 'При добавлении цены произошли ошибки');
        }

        return $this->render('CoreSiteBundle:AdPlacePrice\Cabinet:edit.html.twig', [
            'form' => $form->createView(),
            'subject' => $subject,
            'adplace' => $adPlace
        ]);
    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $subject = $em->getRepository('CoreSiteBundle:AdPlacePrice')->findWithDiscounts($id, $this->getUser()->getId());
        if (!$subject) {
            throw $this->createNotFoundException('Page Not Found');
        }
        $form = $this->createForm(new AdPlacePriceFormType(), $subject);
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->flush();
                $this->setFlash('edit_success', 'Цена успешно обновлена');
                return new RedirectResponse($this->generateUrl('core_cabinet_ad_place_price_edit', ['id' => $subject->getId()]));
            }
            $this->setFlash('edit_errors', 'При изменении цены произошли ошибки');
        }

        return $this->render('CoreSiteBundle:AdPlacePrice\Cabinet:edit.html.twig',[
                'form' => $form->createView(),
                'subject' => $subject,
                'adplace' => $subject->getAdPlace()
        ]);
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $subject = $em->getRepository('CoreSiteBundle:AdPlacePrice')->findForDelete((int)$id, $this->getUser()->getId());
        if ($subject) {
            $em->remove($subject);
            $em->flush();
            $this->setFlash('edit_success', "Цена была успешно удалена.");
        }   else {
            $this->setFlash('edit_errors', "Невозможно удалить цену");
        }
        return new RedirectResponse($this->generateUrl('core_cabinet_ad_place_price_list', ['id' => $subject->getAdPlace()->getId()]));
    }

    /**
     * Установка сообщений
     * @param string $action
     * @param string $value
     */
    private function setFlash($action, $value)
    {
        $this->container->get('session')->getFlashBag()->set($action, $value);
    }

}