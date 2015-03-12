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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Form;

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
            ->add('isRegExpInUrlTemplate', null, ['required' => false])

            ->add('isSubmited', 'hidden', ['mapped' => false, 'data' =>1])
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

    public function createAjaxAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new NotFoundHttpException('Page Not Found');
        }
        $section = new Section();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $section->setUser($user);
        $form = $this->getForm($section);
        $em = $this->getDoctrine()->getManager();


        if (isset($request->get('form')['isSubmited']) && $request->get('form')['isSubmited'] == 1) {

            $form->handleRequest($request);

            if ($form->isValid()) {

                $em->persist($section);
                $em->flush();

                $answer = [
                    'result' => true,
                    'msg' => 'Новый раздел для рекламного места добавлен',
                    'data' => [
                        'section' => [
                            'id'    => $section->getId(),
                            'name'  => $section->getName()
                        ]
                    ]
                ];
            } else {
                $answer = [
                    'result' => false,
                    'msg' => 'Произошла ошибка',
                    'data' => [
                        'errors' => $this->getErrorMessages($form),
                        'form' => $this->render('CoreSiteBundle:Section\Cabinet\Form:section_modal.html.twig',
                            ['section' => $section,  'form' => $form->createView()])->getContent()
                    ]
                ];
            }
        } else {
            $answer = [
                'result'    => true,
                'data' => [
                    'form' => $this->render('CoreSiteBundle:Section\Cabinet\Form:section_modal.html.twig',
                        ['section' => $section,  'form' => $form->createView()])->getContent()
                ],
                'msg'       => 'form created'
            ];
        }

        $response = new Response(json_encode($answer));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function editAjaxAction($id, Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new NotFoundHttpException('Page Not Found');
        }
        $section = $this->getDoctrine()->getManager()->getRepository('CoreSiteBundle:Section')->find((int)$id);
        $form = $this->getForm($section);
        if (isset($request->get('form')['isSubmited']) && $request->get('form')['isSubmited'] == 1) {
            $form->handleRequest($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->flush();

                $answer = [
                    'result' => true,
                    'msg' => 'Данные успешно обновлены',
                    'data' => [
                        'section' => [
                            'id'    => $section->getId(),
                            'name'  => $section->getName()
                        ]
                    ]
                ];
            } else {
                $answer = [
                    'result' => false,
                    'msg' => 'Произошла ошибка',
                    'data' => [
                        'errors' => $this->getErrorMessages($form),
                        'form' => $this->render('CoreSiteBundle:Section\Cabinet\Form:section_modal.html.twig',
                            ['section' => $section,  'form' => $form->createView()])->getContent()
                    ]
                ];
            }
        } else {
            $answer = [
                'result'    => true,
                'data' => [
                    'form' => $this->render('CoreSiteBundle:Section\Cabinet\Form:section_modal.html.twig',
                                            ['section' => $section,  'form' => $form->createView()])->getContent()
                ],
                'msg'       => 'form created'
            ];
        }

        $response = new Response(json_encode($answer));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Удаление раздела рекламного места (Ajax)
     * @param Request $request
     * @return Response
     */
    public function deleteAjaxAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new NotFoundHttpException('Page Not Found');
        }
        $id = (int)$request->get('id');
        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $section = $em->getRepository('CoreSiteBundle:Section')->findForDeleting(['id' => $id, 'user' => $user]);

        if ($section) {
            $em->remove($section);
            $em->flush();
            $answer = [
               'result' => true,
                'msg' => "Раздел  «{$section->getName()}» был удален."
            ];
        } else {
            $answer = [
                'result' => false,
                'msg' => "Невозможно удалить раздел выбранный раздел"
            ];
        }
        $response = new Response(json_encode($answer));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
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

    private function getErrorMessages(Form $form) {
        $errors = array();

        foreach ($form->getErrors() as $key => $error) {
            if ($form->isRoot()) {
                $errors['#'][] = $error->getMessage();
            } else {
                $errors[] = $error->getMessage();
            }
        }

        foreach ($form->all() as $child) {
            if (!$child->isValid()) {
                $errors[$child->getName()] = $this->getErrorMessages($child);
            }
        }

        return $errors;
    }

}
