<?php

/**
 * Выдача страниц в ЛК для редактирования рекламных компаний
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Core\AdCompanyBundle\Entity\AdPlace;
use  Core\AdCompanyBundle\Entity\AdCompany;

class AdCompanyCabinetController extends Controller
{

    /**
     * Вывод списка рекламных компаний пользователя в личном кабинете
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction($page = 1)
    {

        if ($url = $this->get('core_adcompany_logic')->getRedirectUrlIfPageEqualOne('core_cabinet_adcompany_list_first_page')) {
            return new RedirectResponse($url, 301);
        }

        $adcompanies = $this->get('core_adcompany_logic')->getDataInCabinetForPage($page);

        return $this->render('CoreAdCompanyBundle:AdCompany\Cabinet:list.html.twig', ['adcompanies' => $adcompanies]);
    }



    /**
     * Редактирование размещения
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
//    public function editAction($id)
//    {
//
//        $AdCompany = $this->getDoctrine()->getManager()->getRepository('CoreAdCompanyBundle:AdCompany')->find($id);
//        $form = $this->getForm($AdCompany);
//
//
//        $categories = $this->getDoctrine()->getManager()->getRepository('CoreCategoryBundle:AdCompanyCategory')
//            ->getBuildTree()[0]['__children'];
//
//
//        //Сохранения изменения
//        $request = $this->get('request');
//        if ($request->getMethod() == 'POST') {
//            $form->handleRequest($request);
//
//            if ($this->checkIsExistAdCompany($AdCompany)) {
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
////                $em->persist($AdCompany);
//                $em->flush();
//
//                $this->setFlash('edit_success', 'Данные успешно обновлены');
//                return new RedirectResponse($this->generateUrl('core_cabinet_adcompany_edit', ['id' => $id]));
//            } else {
//                return $this->render('CoreAdCompanyBundle:AdCompany\Cabinet:edit.html.twig', ['AdCompany' => $AdCompany, 'categories' => $categories, 'form' => $form->createView()]);
//            }
//        } else {
//            return $this->render('CoreAdCompanyBundle:AdCompany\Cabinet:edit.html.twig', ['AdCompany' => $AdCompany, 'categories' => $categories, 'form' => $form->createView()]);
//        }
//    }


    /**
     * Добавление размещения
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {

        $AdCompany = new AdCompany();
        $user = $this->container->get('security.context')->getToken()->getUser();
        //$AdCompany->setUser($user);
        $form = $this->getForm($AdCompany);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);
            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($AdCompany);
                $em->flush();

                $this->setFlash('edit_success', 'Новое размещение добавлено');
                return new RedirectResponse($this->generateUrl('core_cabinet_adcompany_edit', ['id' => $AdCompany->getId()]));
            } else {
                return $this->render('CoreAdCompanyBundle:AdCompany\Cabinet:edit.html.twig', ['AdCompany' => $AdCompany, 'form' => $form->createView()]);
            }
        } else {
            return $this->render('CoreAdCompanyBundle:AdCompany\Cabinet:edit.html.twig', ['AdCompany' => $AdCompany, 'form' => $form->createView()]);
        }

        
    }

    /**
     * Форма размещения
     * @param $AdCompany
     * @return \Symfony\Component\Form\Form
     */
    private function getForm($AdCompany)
    {
        $form = $this->createFormBuilder($AdCompany)
            ->add('adCompany', null, ['required' => true, 'property'=>'name'])
            ->add('adPlace', null, ['required' => true, 'property'=>'name'])
            ->add('AdCompanyBannersList', null, ['required' => true, 'property'=>'name'])
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
        $AdCompany = $em->getRepository('CoreAdCompanyBundle:AdCompany')->findForDeleting(['id' => $id, 'user' => $user]);

        $msg = "Сайт  «{$AdCompany->getDomain()}» был удален.";
        $em->remove($AdCompany);
        try {
            $em->flush();
            $this->setFlash('edit_success', $msg);
        } catch (\Exception $e) {
            $msg = "Невозможно удалить сайт «{$AdCompany->getDomain()}», т.к. он задействован в системе на данный момент.";
            $this->setFlash('edit_errors', $msg);
        }


        return new RedirectResponse($this->generateUrl('core_cabinet_adcompany_list'));
    }


    /**
     * Проверяет есть ли у пользователя сайт с таким именем
     * @param $domain
     * @return mixed
     */
    private function checkIsExistAdCompany($AdCompany) {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $res=$em->getRepository('CoreAdCompanyBundle:AdCompany')->findQuantityByOptions(['id'=>$AdCompany->getId(), 'user' => $user, 'domain' => $AdCompany->getDomain()]);

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
