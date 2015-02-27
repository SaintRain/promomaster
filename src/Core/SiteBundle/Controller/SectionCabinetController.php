<?php

/**
 * Выдача страниц в личном кабинете для редактирования разделов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Core\SiteBundle\Entity\Section;


class SectionCabinetController extends Controller
{

    /**
     * Вывод списка разделов рекламных мест пользователя в личном кабинете
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction($page = 1)
    {

        if ($url = $this->get('core_section_logic')->getRedirectUrlIfPageEqualOne('core_cabinet_section_list_first_page')) {
            return new RedirectResponse($url, 301);
        }

        $sections = $this->get('core_section_logic')->getDataInCabinetForPage($page);


        return $this->render('CoreSiteBundle:Section\Cabinet:list.html.twig', ['sections' => $sections]);
    }


    /**
     * Редактирование рекламного места
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction($id)
    {

        $section = $this->getDoctrine()->getManager()->getRepository('CoreSiteBundle:Section')->find($id);
        $form = $this->getForm($section);

        //Сохранения изменения
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->flush();

                $this->setFlash('edit_success', 'Данные успешно обновлены');
                return new RedirectResponse($this->generateUrl('core_cabinet_section_edit', ['id' => $id]));
            } else {
                return $this->render('CoreSiteBundle:Section\Cabinet:edit.html.twig', ['section' => $section, 'form' => $form->createView()]);
            }
        } else {
            return $this->render('CoreSiteBundle:Section\Cabinet:edit.html.twig', ['section' => $section,  'form' => $form->createView()]);
        }
    }




    /**
     * Добавление раздела рекламного места
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {

        $section = new Section();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $section->setUser($user);
        $form = $this->getForm($section);
        $em = $this->getDoctrine()->getManager();


        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {

                $em->persist($section);
                $em->flush();

                $this->setFlash('edit_success', 'Новый раздел для рекламного места добавлен');
                return new RedirectResponse($this->generateUrl('core_cabinet_section_edit', ['id' => $section->getId()]));
            } else {
                return $this->render('CoreSiteBundle:Section\Cabinet:edit.html.twig', ['section' => $section,  'form' => $form->createView()]);
            }
        } else {
            return $this->render('CoreSiteBundle:Section\Cabinet:edit.html.twig', ['section' => $section, 'form' => $form->createView()]);
        }
    }

    /**
     * Форма раздела рекламного места
     * @param $section
     * @return \Symfony\Component\Form\Form
     */
    private function getForm($section)
    {

        $form = $this->createFormBuilder($section)

            ->add('name', 'text', ['required' => true])
            ->add('isAllPage', null, ['required' => false])
            ->add('urlTemplate', 'text', ['required' => false])
            ->getForm();

        return $form;
    }

    /**
     * Удаление раздела рекламного места
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction($id)
    {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $section = $em->getRepository('CoreSiteBundle:Section')->findForDeleting(['id' => $id, 'user' => $user]);

        $msg = "Раздел  «{$section->getName()}» был удален.";
        $em->remove($section);
        try {
            $em->flush();
            $this->setFlash('edit_success', $msg);
        } catch (\Exception $e) {
            $msg = "Невозможно удалить раздел «{$section->getName()}», т.к. он задействован в системе на данный момент.";
            $this->setFlash('edit_errors', $msg);
        }


        return new RedirectResponse($this->generateUrl('core_cabinet_section_list'));
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
