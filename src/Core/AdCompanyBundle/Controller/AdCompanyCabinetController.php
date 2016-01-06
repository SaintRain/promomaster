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
use Symfony\Component\HttpFoundation\Response;
use Core\AdCompanyBundle\Entity\AdPlace;
use Core\AdCompanyBundle\Entity\AdCompany;
use Core\AdCompanyBundle\Form\Type\AdCompanyType;

class AdCompanyCabinetController extends Controller
{


    /**
     * Ставит статус компании
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function setStatusAction(Request $request, $id, $status, $page=1)
    {

        if ($status == 'on') {
            $status = 1;
        } else {
            $status = 0;

        }

        $em=$this->getDoctrine()->getManager();

        $adCompany = $em->getRepository('CoreAdCompanyBundle:AdCompany')->findForStatus($id, $this->getUser()->getId());


        if ($adCompany) {
            $adCompany->setIsEnabled($status);
            $em->flush();

        } else {
            throw new \Exception('Необходима авторизация.');
        }


        $em->refresh($adCompany);

        $adcompanies = $this->get('core_adcompany_logic')->getDataInCabinetForPage($page);
        $stats = $this->getDoctrine()->getManager()->getRepository('CoreStatisticsBundle:Statistics')->getCommonStatisticsForAdCompanies($adcompanies);

        return $this->render('CoreAdCompanyBundle:AdCompany\Cabinet:list_ajax.html.twig', ['adcompanies' => $adcompanies, 'stats' => $stats]);

    }


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
        $stats = $this->getDoctrine()->getManager()->getRepository('CoreStatisticsBundle:Statistics')->getCommonStatisticsForAdCompanies($adcompanies);




        return $this->render('CoreAdCompanyBundle:AdCompany\Cabinet:list.html.twig', ['adcompanies' => $adcompanies, 'stats' => $stats]);
    }


    /**
     * Редактирование рекламной компании
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction($id)
    {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $adcompany = $this->getDoctrine()->getManager()->getRepository('CoreAdCompanyBundle:AdCompany')->find($id);


        //$form = $this->getForm($adcompany);
        $form = $this->createForm('ad_company_type', $adcompany);
        //Сохранения изменения
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($this->get('core_adcompany_logic')->checkIsExistAdCompany($adcompany, $user)) {
                $this->setFlash('edit_errors', 'Рекламная компания с указанным именем была добавлена вами ранее.');
                $isBadName = true;
            } else {
                $isBadName = false;
            }

            if (!$isBadName && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();

                $this->setFlash('edit_success', 'Данные успешно обновлены');
                return new RedirectResponse($this->generateUrl('core_cabinet_adcompany_edit', ['id' => $id]));
            } else {
                return $this->render('CoreAdCompanyBundle:AdCompany\Cabinet:edit.html.twig', ['adcompany' => $adcompany, 'form' => $form->createView()]);
            }
        } else {
            return $this->render('CoreAdCompanyBundle:AdCompany\Cabinet:edit.html.twig', ['adcompany' => $adcompany, 'form' => $form->createView()]);
        }
    }


    /**
     * Добавление рекламной компании
     * @return \Symfony\Component\HttpFoundation\Response
     */
    /*
    public function createAction()
    {

        $adcompany = new AdCompany();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $adcompany->setUser($user);
        //$form = $this->getForm($adcompany);
        $form = $this->createForm(new AdCompanyType(), $adcompany);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);
            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($adcompany);
                $em->flush();

                $this->setFlash('edit_success', 'Рекламная компания добавлена');
                return new RedirectResponse($this->generateUrl('core_cabinet_adcompany_edit', ['id' => $adcompany->getId()]));
            } else {
                return $this->render('CoreAdCompanyBundle:AdCompany\Cabinet:edit.html.twig', ['adcompany' => $adcompany, 'form' => $form->createView()]);
            }
        } else {
            return $this->render('CoreAdCompanyBundle:AdCompany\Cabinet:edit.html.twig', ['adcompany' => $adcompany, 'form' => $form->createView()]);
        }

        
    }
    */
    public function createAction()
    {
        return $this->createEmpty();

        $this->getUser();
        $adcompany = new AdCompany();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $adcompany->setUser($user);
        //$form = $this->getForm($adcompany);
        $form = $this->createForm('ad_company_type', $adcompany);
        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($adcompany);
                $em->flush();

                $this->setFlash('edit_success', 'Рекламная компания добавлена');

                return new RedirectResponse($this->generateUrl('core_cabinet_adcompany_edit', ['id' => $adcompany->getId()]));
            } else {
                return $this->render('CoreAdCompanyBundle:AdCompany\Cabinet:edit.html.twig', ['adcompany' => $adcompany, 'form' => $form->createView()]);
            }
        } else {
            return $this->render('CoreAdCompanyBundle:AdCompany\Cabinet:edit.html.twig', ['adcompany' => $adcompany, 'form' => $form->createView()]);
        }
    }

    /**
     * Сразу пишем в базу РК
     * @return RedirectResponse
     */
    public function createEmpty() {
        $adcompany = new AdCompany();
        $adcompany->setUser($this->getUser());
        $adcompany->setIsEnabled(true);
        $adcompany->setName('Новая рекламная компания');
        $em = $this->getDoctrine()->getManager();
        $em->persist($adcompany);
        $em->flush();
        $adcompany->setName('Новая рекламная компания #'.$adcompany->getId());
        $em->flush();

        return new RedirectResponse($this->generateUrl('core_cabinet_adcompany_edit', ['id' => $adcompany->getId()]));
    }


    /**
     * Удаление рекламной компании
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction($id)
    {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $adcompany = $em->getRepository('CoreAdCompanyBundle:AdCompany')->findForDeleting(['id' => $id, 'user' => $user]);

        $msg = "Рекламная компания  «{$adcompany->getName()}» была удалена.";
        $em->remove($adcompany);
        try {
            $em->flush();
            $this->setFlash('edit_success', $msg);
        } catch (\Exception $e) {
            $msg = "Невозможно рекламную компанию «{$adcompany->getName()}», т.к. она задействована в системе на данный момент.";
            $this->setFlash('edit_errors', $msg);
        }


        return new RedirectResponse($this->generateUrl('core_cabinet_adcompany_list'));
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
