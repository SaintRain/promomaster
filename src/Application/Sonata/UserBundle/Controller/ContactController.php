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
use FOS\UserBundle\Model\UserInterface;
use Application\Sonata\UserBundle\Entity\IndiContact;
use Application\Sonata\UserBundle\Entity\LegalContact;
use Application\Sonata\UserBundle\Entity\IndiContragent;
use Application\Sonata\UserBundle\Form\Type\IndiContactFormType;
use Application\Sonata\UserBundle\Form\Type\LegalContactFormType;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    public function createAction($contragentId, Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        
        $em = $this->getDoctrine()->getManager();
        $contragent = $em->getRepository('ApplicationSonataUserBundle:CommonContragent')->find((int)$contragentId);
        if (!$contragent || $contragent->getUser()->getId() != $user->getId()) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        if ($contragent instanceof IndiContragent) {
            $contact = new IndiContact();
            $form = $this->createForm(new IndiContactFormType(), $contact, array('contragent' => $contragent, 'needMark' => false));
        } else {
            $contact = new LegalContact();
            $form = $this->createForm(new LegalContactFormType(), $contact, array('contragent' => $contragent, 'needMark' => false));
        }
        if ($request->getMethod() == 'POST') {

            $form->submit($request);

            if ($form->isValid()) {
               
               $em->persist($contact);
               $em->flush();
               $flashMsg = ($contragent instanceof IndiContragent) ? 'flash.contact_indi_success' : 'flash.contact_legal_success';
               $this->get('session')->getFlashBag()->add('contragent_success_create', $flashMsg);
               return new RedirectResponse($this->generateUrl('application_sonata_user_contragent_index', []));
               /*
               return new RedirectResponse($this->generateUrl('application_sonata_user_contragent_edit', array(
                                                            'contragentId' => $contragentId,
                                                            'isIndi' => ($contragent instanceof IndiContragent) ? 1 : 0
                   )));
                * 
                */
            }
        }
        
        return $this->render('ApplicationSonataUserBundle:Contact:create.html.twig', array(
            'form' => $form->createView(),
            'contragent' => $contragent,
        ));
    }
    
    /**
     * Страница редатирования (получателя) контакта
     * @param type $contactId
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws AccessDeniedException
     */
    public function editAction($contactId, Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $em = $this->getDoctrine()->getManager();
        
        $contact = $em->getRepository('ApplicationSonataUserBundle:CommonContact')->find($contactId);

        if (!$contact || $contact->getContragent()->getUser()->getId() != $user->getId()) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        if ($contact instanceof IndiContact) {
            $form = $this->createForm(new IndiContactFormType(), $contact, ['needMark' => false]);
        } else {
            $form = $this->createForm(new LegalContactFormType(), $contact, ['needMark' => false]);
        }

        if ($request->getMethod() == 'POST') {

            $form->submit($request);
            
            if ($form->isValid()) {
                
                $em->flush();

                $this->get('session')->getFlashBag()->add('contact_success', 'Данные успешно обновлены');
                
                return new RedirectResponse($this->generateUrl('application_sonata_user_contact_edit', array(
                    'contactId' => $contact->getId()
                )));
            }
        }

        return $this->render('ApplicationSonataUserBundle:Contact:edit.html.twig', array(
            'form' => $form->createView(),
            'contact' => $contact
        ));
        
    }
    
    /**
     * Удаление контактного лица
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
        $contactId = $request->request->get('id');
        if (!$contactId || !(is_numeric($contactId))) {
            $answer = array(
                'errors' => true,
                'msg' => 'Invalid Data',
                'refresh' => false
            );
        } else {
            $em = $this->getDoctrine()->getManager();
            $contact = $em->getRepository('ApplicationSonataUserBundle:CommonContact')->find($contactId);
            if (!$contact || $contact->getContragent()->getUser()->getId() != $user->getId()) {
                $answer = array(
                    'errors' => true,
                    'msg' => 'Access Denied',
                    'refresh' => false
                );
            } else {
                $session = $this->get('session');
                if ($session->get('current_contact_id') && $session->get('current_contact_id') == $contact->getId()) {
                    $session->remove('current_contact_id');
                }
                
                $em->remove($contact);
                $em->flush();
                $answer = array(
                    'errors' => false,
                    'msg' => 'ok',
                );
            }
        }

        $response->setContent(json_encode($answer));
        
        return $response;
    }
}
