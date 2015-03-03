<?php

/**
 * Контроллер профиля пользователя
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\UserBundle\Model\UserInterface;
use Application\Sonata\UserBundle\Entity\IndiContragent;
use Application\Sonata\UserBundle\Entity\LegalContragent;
use Application\Sonata\UserBundle\Form\Type\IndiFormType;
use Application\Sonata\UserBundle\Form\Type\LegalFormType;
use Symfony\Component\HttpFoundation\Response;

class ContragentController extends Controller
{
    /**
     * Страница со списком контрагентов
     * @return type
     * @deprecated не сипользуется
     * @throws AccessDeniedException
     */
    
    public function indexAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $em = $this->getDoctrine()->getManager();
        $contragents = $em->getRepository('ApplicationSonataUserBundle:CommonContragent')->findWithSelfData($user->getId());

        return $this->render('ApplicationSonataUserBundle:Contragent:index.html.twig', array(
            'contragents' => $contragents
        ));
    }
    
    /**
     * Страница контрагент со списком контактов
     * @return type
     * @throws AccessDeniedException
     */
    public function contactAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $session = $this->get('session');
        $contragentId = $session->get('current_contragent_id');
        $contragentNamespace = $session->get('current_contragent_namespace');
        //$contragent = $em->getRepository('ApplicationSonataUserBundle:CommonContragent')->findWithSelfData($user->getId(), $contragentId);
        if ($contragentNamespace) {
            $em = $this->getDoctrine()->getManager();
            $contragent = $em->getRepository($contragentNamespace)->findOnePartialWithContact($contragentId);
        } else {
            $contragent = null;
        }

        return $this->render('ApplicationSonataUserBundle:Contragent:contact.html.twig', array(
            'contragent' => $contragent
        ));
    }

    public function createAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        if (count($this->getUser()->getContragents())) {
            return new RedirectResponse($this->generateUrl('application_sonata_user_contragent_index'));
        }
        $em = $this->getDoctrine()->getManager();
        $indiContragent = new IndiContragent();
        $legalContragent = new LegalContragent();
        $indiForm = $this->createForm($this->get('application_user_contragent_indi_form_type'), $indiContragent);
        $legalForm = $this->createForm($this->get('application_user_contragent_legal'), $legalContragent);
        $isIndi = false;
        if ($request->getMethod() == 'POST') {

            $isIndi = $request->query->get('isIndi');
            if ($isIndi) {
                $form = $indiForm;
                $contragent = $indiContragent;
            } else {
                $form = $legalForm;
                $contragent = $legalContragent;
            }
            $contragent->setUser($user);
            $form->submit($request);
            if ($form->isValid()) {
                $em->persist($contragent);
                $em->flush();
                // проставляем контрагента в сессию если он один
                if (!count($user->getContragents()) || (count($user->getContragents()) == 1)) {
                    $session = $this->get('session');
                    $session->set('current_contragent_id', $contragent->getId());
                    $session->set('current_contragent_namespace', get_class($contragent));
                }
                $this->get('session')->getFlashBag()->add('contragent_success_create', 'Плательщик добавлен успешно');
                return new RedirectResponse($this->generateUrl('application_sonata_user_contragent_index'));
            }
        }
        return $this->render('ApplicationSonataUserBundle:Contragent:create.html.twig', array(
            'indiForm' => $indiForm->createView(),
            'legalForm' => $legalForm->createView(),
            'contragent' => $indiContragent
        ));
    }
    
    /**
     * Страница редктирования контрагента
     * @param type $contragentId
     * @param type $isIndi
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type
     * @throws AccessDeniedException
     */
    public function editAction($isIndi, $contragentId, Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $em = $this->getDoctrine()->getManager();
        if ($isIndi) {
            $contragent = $em->getRepository('ApplicationSonataUserBundle:IndiContragent')->findWithContact($contragentId);
        } else {
            $contragent = $em->getRepository('ApplicationSonataUserBundle:LegalContragent')->findWithContact($contragentId);
        }
        

        if (!$contragent || $contragent->getUser()->getId() != $user->getId()) {
            throw new NotFoundHttpException('Контрагент не найден');
        }

        if ($contragent instanceof IndiContragent) {
            $form = $this->createForm($this->get('application_user_contragent_indi_form_type'), $contragent);
        } else {
            $form = $this->createForm($this->get('application_user_contragent_legal'), $contragent);
        }

        if ($request->getMethod() == 'POST') {

            $form->submit($request);
            
            if ($form->isValid()) {
                
                $em->flush();

                $this->get('session')->getFlashBag()->add('contragent_success_edit', 'Данные успешно обновлены');
                
                return new RedirectResponse($this->generateUrl('application_sonata_user_contragent_edit', array(
                    'contragentId' => $contragent->getId(),
                    'isIndi' => ($contragent instanceof IndiContragent) ? 1 : 0
                )));
            }
        }

        return $this->render('ApplicationSonataUserBundle:Contragent:edit.html.twig', array(
            'form' => $form->createView(),
            'contragent' => $contragent
        ));
        
    }
    
    /**
     * Удаление контрагента
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function deleteAction(Request $request)
    {
        $user = $this->getUser();
        if (!$request->isXmlHttpRequest() || !is_object($user) || !$user instanceof UserInterface) {
            $this->createNotFoundException('Page Not Found');
        }

        $response = new Response();
        
        $response->headers->set('Content-Type', 'application/json');
        $contragentId = $request->request->get('id');
        if (!$contragentId || !(is_numeric($contragentId))) {
            $answer = array(
                'errors' => true,
                'msg' => 'Invalid Data',
                'refresh' => false
            );
        } else {
            $em = $this->getDoctrine()->getManager();
            $contragent = $em->getRepository('ApplicationSonataUserBundle:CommonContragent')->find($contragentId);
            if (!$contragent || $contragent->getUser()->getId() != $user->getId() || count($contragent->getPayments())  ) {
                $answer = array(
                    'errors' => true,
                    'msg' => 'Access Denied',
                    'refresh' => false
                );
            } else {
                $session = $this->get('session');
                
                $em->remove($contragent);
                $em->flush();
                $answer = array(
                    'errors' => false,
                    'msg' => 'ok',
                    'refresh' => ($contragentId == $session->get('current_contragent_id')) ? true : false
                );
                if ($contragentId == $session->get('current_contragent_id')) {

                    if (count($user->getContragents()) == 1) {
                        $contragents = $user->getContragents();
                        $session->set('current_contragent_id', $contragents->first()->getId());
                        $session->set('current_contragent_namespace', get_class($contragents->first()));
                    } else {
                        $session->set('current_contragent_id', null);
                        $session->set('current_contragent_namespace', null);
                    }
                    
                }
            }
        }
        
        $response->setContent(json_encode($answer));
        return $response;
    }
}
