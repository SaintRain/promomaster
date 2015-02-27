<?php

/**
 * Админский контроллер для тикетов траблтикетов
 *
 * @author  Kaluzhny.N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\Controller\Admin;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TroubleTicketAdminController extends Controller {

    /**
     * return the Response object associated to the create action
     *
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     * @return Response
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

        if ($this->getRestMethod()== 'POST') {
            $form->bind($this->get('request'));

            $isFormValid = $form->isValid();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {
                $this->admin->create($object);

                //отправка письма автору тикета
                if  ($object->getUser()->getId() != $this->getUser()->getId()) {
                    $logMailer = $this->get('core_trouble_ticket_log_mailer');
                    $logMailer->sendCreationMessage($object);
                }
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
            'form'   => $view,
            'object' => $object,
        ));
    }

    public function copyAction($id = null) {
        // the key used to lookup the template
        $templateKey = 'edit';

        $id = $this->get('request')->get($this->admin->getIdParameter());

        $object = $this->getDoctrine()->getManager()->getRepository('CoreTroubleTicketBundle:TroubleTicket')->findWithAllData($id);
        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $id));
        }

        if (false === $this->admin->isGranted('EDIT', $object)) {
            throw new AccessDeniedException();
        }
        $object = clone $object;
        $object->setId(null);
        //$this->getConfigurationPool()->getContainer()->get('Doctrine')->getManager();
        $this->admin->setSubject($object);

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
                        'result'    => 'ok',
                        'objectId'  => $this->admin->getNormalizedIdentifier($object)
                    ));
                }
                //отправка письма автору тикета
                if  ($object->getUser()->getId() != $this->getUser()->getId()) {
                    $logMailer = $this->get('core_trouble_ticket_log_mailer');
                    $logMailer->sendCreationMessage($object);
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

        return $this->render('CoreTroubleTicketBundle:Admin\TroubleTicket:edit.html.twig', array(
            'object'     => $object,
            'action'     => 'edit',
            'form'       => $view,
            'deleteToken' => $this->getCsrfToken('sonata.delete')
        ));
    }

    /**
     * @TODO: Создание сущности с отправкой писем для подписчиков
     * @param type $id
     * @return type
     * @throws NotFoundHttpException
     * @throws AccessDeniedException
     */
    public  function editAction($id = null)
    {
        // the key used to lookup the template
        $templateKey = 'edit';
        $id = $this->get('request')->get($this->admin->getIdParameter());

        $object = $this->getDoctrine()->getManager()->getRepository('CoreTroubleTicketBundle:TroubleTicket')->findWithAllData($id);
        
        if (!$object) {
            throw $this->createNotFoundException(sprintf('unable to find the object with id : %s', $id));
        }

        $oldObject = clone $object;
        $ticketUser = ($object->getUser()) ? $object->getUser()->getId() : null;
        $user =  $this->getDoctrine()->getManager()->getRepository('ApplicationSonataUserBundle:User')->findForTroubleTicket($ticketUser);
        
        if (false === $this->admin->isGranted('EDIT', $object)) {
            throw new AccessDeniedException();
        }

        $this->admin->setSubject($object);

        $form = $this->admin->getForm();
        $form->setData($object);

        if ($this->getRestMethod() == 'POST') {
            $form->bind($this->get('request'));

            $isFormValid = $form->isValid();
            //var_dump($this->get('request')->get('s530c9bd32d3a2'));
            //die();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {

                $log = $object->getLogs()->last();

                $message = null;
                foreach($object->getMessages() as $mes) {
                    if (!$mes->getId()) {
                        $message = $mes;
                    }
                }
                $logMailer = $this->get('core_trouble_ticket_log_mailer');
                // если есть подписчики
                if (count($object->getWatchers())) {
                    $logMailer->sendNotificationEmailMessage($object, $oldObject, $message);
                }

                $session = $this->get('session');
                // нужно ли отправлять письмо пользователю
                if ($message || $session->get('uploadFiles')) {
                    $logMailer->sendEditMessage($object);
                    $object->setAdminAnswers(1);
                    $object->setIsAdminAnswer(0);
                    $object->setUpdatedDateTimeByManager(new \DateTime('now'));
                }
                $this->admin->update($object);
                $session->set('uploadFiles',null);

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
        $orders = 0;
        $contragentsId = array();
        if ($user) {
            foreach($user->getContragents() as $contragent) {
                if (count($contragent->getOrders())) {
                    $orders += count($contragent->getOrders());
                    $contragentsId[$contragent->getId()] = $contragent->getId();
                }
            }
        }
        
        
        $view = $form->createView();

        // добавлен ли тикет в наблюдаемые
        $watched = ($object->getWatchers()->contains($this->getUser())) ? true : false;

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        return $this->render('CoreTroubleTicketBundle:Admin\TroubleTicket:edit.html.twig', array(
            'object'     => $object,
            'oldObject'  => $oldObject,
            'action'     => 'edit',
            'form'       => $view,
            'watched'   => $watched,
            'user'      => $user,
            'deleteToken' => $this->getCsrfToken('sonata.delete'),
            'contragentsId' => implode(',', $contragentsId),
            'orders' => $orders
        ));
    }

    /**
     * Добавление подписчиков для тикета
     * @param int $id
     * @return array
     */
    public function watcherAction($id = null) {
        $id = $this->get('request')->get($this->admin->getIdParameter());
        $object = $this->admin->getObject($id);
        if (!$this->isXmlHttpRequest() || !$object || false === $this->admin->isGranted('EDIT', $object)) {
            return $this->renderJson(array(
                'result'    => false,
                'objectId'  => $this->admin->getNormalizedIdentifier($object)
            ));
        }

        $this->admin->setSubject($object);

        $currentUser = $this->getUser();
        $watchers = $object->getWatchers();
        if ($watchers->contains($currentUser)) {
            $object->removeWatcher($currentUser);
            $text = $this->admin->trans('watcher.remove');
        } else {
            $object->addWatcher($currentUser);
            $text = $this->admin->trans('watcher.add');
        }
        $this->admin->update($object);

        return $this->renderJson(array(
            'result'    => true,
            'text'      => $text,
            'objectId'  => $this->admin->getNormalizedIdentifier($object)
        ));

    }

    /**
     * Получение всего дерева категорий FAQ
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function categoriesAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new \Exception('Page Not Found');
        }
        $answer = [];

        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('CoreCategoryBundle:FaqCategory')->getFullTree();

        $categories = (count($categories)) ? $categories : [];
        $response = new Response(json_encode($categories));

        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Получение статей для заданной какегории
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function articlesByCategoryAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new \Exception('Page Not Found');
        }

        $catId = $request->request->get('id');
        if (!$catId) {
            throw new \Exception('Category Not Found');
        }
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('CoreFaqBundle:Article')->findPredifinedArticles($catId);
                        
        return $this->renderJson($articles);
    }
    
    /**
     * Получить определенную статью
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function articleAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new \Exception('Page Not Found');
        }
        
        $articleId = $request->request->get('id');
        if (!$articleId) {
            throw new \Exception('Category Not Found');
        }
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('CoreFaqBundle:Article')->find($articleId);

        return $this->renderJson($article);
    }

}