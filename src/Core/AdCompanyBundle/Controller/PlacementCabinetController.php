<?php

/**
 * Выдача страниц в ЛК для редактирования размещений
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Core\PlacementBundle\Entity\AdPlace;
use  Core\AdCompanyBundle\Entity\Placement;

class PlacementCabinetController extends Controller
{

    /**
     * Вывод списка размещений пользователя в личном кабинете
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction($page = 1)
    {

        if ($url = $this->get('core_placement_logic')->getRedirectUrlIfPageEqualOne('core_cabinet_placement_list_first_page')) {
            return new RedirectResponse($url, 301);
        }

        $placements = $this->get('core_placement_logic')->getDataInCabinetForPage($page);

        return $this->render('CoreAdCompanyBundle:Placement\Cabinet:list.html.twig', ['placements' => $placements]);
    }



    /**
     * Редактирование размещения
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
//    public function editAction($id)
//    {
//
//        $placement = $this->getDoctrine()->getManager()->getRepository('CoreAdCompanyBundle:Placement')->find($id);
//        $form = $this->getForm($placement);
//
//
//        $categories = $this->getDoctrine()->getManager()->getRepository('CoreCategoryBundle:PlacementCategory')
//            ->getBuildTree()[0]['__children'];
//
//
//        //Сохранения изменения
//        $request = $this->get('request');
//        if ($request->getMethod() == 'POST') {
//            $form->handleRequest($request);
//
//            if ($this->checkIsExistPlacement($placement)) {
//                $this->setFlash('edit_errors', 'Сайт с указанным адресом был добавлен вами ранее.');
//                $isBadName=true;
//            }
//            else {
//                $isBadName=false;
//            }
//
//            if (!$isBadName && $form->isValid()) {
//
//                $em = $this->getDoctrine()->getManager();
////                $em->persist($placement);
//                $em->flush();
//
//                $this->setFlash('edit_success', 'Данные успешно обновлены');
//                return new RedirectResponse($this->generateUrl('core_cabinet_Placement_edit', ['id' => $id]));
//            } else {
//                return $this->render('CoreAdCompanyBundle:Placement\Cabinet:edit.html.twig', ['placement' => $placement, 'categories' => $categories, 'form' => $form->createView()]);
//            }
//        } else {
//            return $this->render('CoreAdCompanyBundle:Placement\Cabinet:edit.html.twig', ['placement' => $placement, 'categories' => $categories, 'form' => $form->createView()]);
//        }
//    }


    /**
     * Добавление размещения
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {

        $placement = new Placement();
        $user = $this->container->get('security.context')->getToken()->getUser();
        //$placement->setUser($user);
        $form = $this->getForm($placement);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);
            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($placement);
                $em->flush();

                $this->setFlash('edit_success', 'Новое размещение добавлено');
                return new RedirectResponse($this->generateUrl('core_cabinet_Placement_edit', ['id' => $placement->getId()]));
            } else {
                return $this->render('CoreAdCompanyBundle:Placement\Cabinet:edit.html.twig', ['placement' => $placement, 'form' => $form->createView()]);
            }
        } else {
            return $this->render('CoreAdCompanyBundle:Placement\Cabinet:edit.html.twig', ['placement' => $placement, 'form' => $form->createView()]);
        }

        
    }

    /**
     * Форма размещения
     * @param $placement
     * @return \Symfony\Component\Form\Form
     */
    private function getForm($placement)
    {
        $form = $this->createFormBuilder($placement)
            ->add('adCompany', null, ['required' => true, 'property'=>'name'])
            ->add('adPlace', null, ['required' => true, 'property'=>'name'])
            ->add('placementBannersList', null, ['required' => true, 'property'=>'name'])
            ->add('startDateTime', 'text', ['required' => false])
            ->add('finishDateTime', 'text', ['required' => false])
            ->add('isEnabled', null, ['required' => false])
            ->add('defaultCountries', null, ['required' => false])
            ->getForm();

        return $form;
    }
    

    /**
     * Удаление сайта
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction($id)
    {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $placement = $em->getRepository('CoreAdCompanyBundle:Placement')->findForDeleting(['id' => $id, 'user' => $user]);

        $msg = "Сайт  «{$placement->getDomain()}» был удален.";
        $em->remove($placement);
        try {
            $em->flush();
            $this->setFlash('edit_success', $msg);
        } catch (\Exception $e) {
            $msg = "Невозможно удалить сайт «{$placement->getDomain()}», т.к. он задействован в системе на данный момент.";
            $this->setFlash('edit_errors', $msg);
        }


        return new RedirectResponse($this->generateUrl('core_cabinet_Placement_list'));
    }


    /**
     * Проверяет есть ли у пользователя сайт с таким именем
     * @param $domain
     * @return mixed
     */
    private function checkIsExistPlacement($placement) {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $res=$em->getRepository('CoreAdCompanyBundle:Placement')->findQuantityByOptions(['id'=>$placement->getId(), 'user' => $user, 'domain' => $placement->getDomain()]);

        if ($res['quantity']) {
            return true;
        }
        else {
            return false;
        }
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
