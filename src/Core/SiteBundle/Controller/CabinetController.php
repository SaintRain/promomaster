<?php

/**
 * Выдача страниц в личном кабинете для редактирования сайтов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Core\SiteBundle\Entity\Site;

class CabinetController extends Controller
{

    /**
     * Вывод списка сайтов пользователя в личном кабинете
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction($page = 1)
    {

        if ($url = $this->get('core_site_logic')->getRedirectUrlIfPageEqualOne('core_cabinet_site_list_first_page')) {
            return new RedirectResponse($url, 301);
        }

        $sites = $this->get('core_site_logic')->getDataInCabinetForPage($page);

        return $this->render('CoreSiteBundle:Site\Cabinet:list.html.twig', ['sites' => $sites]);
    }


    /**
     * Редактирование сайта
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction($id)
    {

        $site = $this->getDoctrine()->getManager()->getRepository('CoreSiteBundle:Site')->find($id);
        $form = $this->getForm($site);


        $categories = $this->getDoctrine()->getManager()->getRepository('CoreCategoryBundle:SiteCategory')
            ->getBuildTree()[0]['__children'];


        //Сохранения изменения
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($this->checkIsExistSite($site)) {
                $this->setFlash('edit_errors', 'Сайт с указанным адресом был добавлен вами ранее.');
                $isBadName=true;
            }
            else {
                $isBadName=false;
            }

            if (!$isBadName && $form->isValid()) {

                $em = $this->getDoctrine()->getManager();
//                $em->persist($site);
                $em->flush();

                $this->setFlash('edit_success', 'Данные успешно обновлены');
                return new RedirectResponse($this->generateUrl('core_cabinet_site_edit', ['id' => $id]));
            } else {
                return $this->render('CoreSiteBundle:Site\Cabinet:edit.html.twig', ['site' => $site, 'categories' => $categories, 'form' => $form->createView()]);
            }
        } else {
            return $this->render('CoreSiteBundle:Site\Cabinet:edit.html.twig', ['site' => $site, 'categories' => $categories, 'form' => $form->createView()]);
        }
    }


    /**
     * Добавление сайта
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {

        $site = new Site();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $site->setUser($user);
        $form = $this->getForm($site);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);
            if ($this->checkIsExistSite($site)) {
                $this->setFlash('edit_errors', 'Сайт с указанным адресом был добавлен вами ранее.');
                $isBadName=true;
            }
            else {
                $isBadName=false;
            }
            if (!$isBadName && $form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($site);
                $em->flush();

                $this->setFlash('edit_success', 'Новый сайт добавлен');
                return new RedirectResponse($this->generateUrl('core_cabinet_site_edit', ['id' => $site->getId()]));
            } else {
                return $this->render('CoreSiteBundle:Site\Cabinet:edit.html.twig', ['site' => $site, 'form' => $form->createView()]);
            }
        } else {
            return $this->render('CoreSiteBundle:Site\Cabinet:edit.html.twig', ['site' => $site, 'form' => $form->createView()]);
        }
    }

    /**
     * Форма сайта
     * @param $site
     * @return \Symfony\Component\Form\Form
     */
    private function getForm($site)
    {
        $form = $this->createFormBuilder($site)
            ->add('domain', 'text', ['required' => true])
            ->add('mirrors', 'textarea', ['required' => false])
            ->add('keywords', 'textarea', ['required' => false, 'attr'=>['rows'=>5]])
            ->add('categories', 'FrontendCategory', ['required' => true,
                    'class' => 'Core\CategoryBundle\Entity\SiteCategory',
                    'multiple' => true
                ]
            )
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
        $site = $em->getRepository('CoreSiteBundle:Site')->findForDeleting(['id' => $id, 'user' => $user]);

        $msg = "Сайт  «{$site->getDomain()}» был удален.";
        $em->remove($site);
        try {
            $em->flush();
            $this->setFlash('edit_success', $msg);
        } catch (\Exception $e) {
            $msg = "Невозможно удалить сайт «{$site->getDomain()}», т.к. он задействован в системе на данный момент.";
            $this->setFlash('edit_errors', $msg);
        }


        return new RedirectResponse($this->generateUrl('core_cabinet_site_list'));
    }


    /**
     * Проверяет есть ли у пользователя сайт с таким именем
     * @param $domain
     * @return mixed
     */
    private function checkIsExistSite($site) {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $res=$em->getRepository('CoreSiteBundle:Site')->findQuantityByOptions(['id'=>$site->getId(), 'user' => $user, 'domain' => $site->getDomain()]);

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
