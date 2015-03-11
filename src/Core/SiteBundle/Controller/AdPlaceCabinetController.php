<?php

/**
 * Выдача страниц в личном кабинете для редактирования рекламных мест
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Core\SiteBundle\Entity\WebSite;
use Core\SiteBundle\Entity\AdPlace;
use Core\DirectoryBundle\Entity\Repository\AdPlaceSizeRepository;

class AdPlaceCabinetController extends Controller
{

    /**
     * Вывод списка рекламных мест пользователя в личном кабинете
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction($page = 1)
    {

        if ($url = $this->get('core_adplace_logic')->getRedirectUrlIfPageEqualOne('core_cabinet_adplace_list_first_page')) {
            return new RedirectResponse($url, 301);
        }

        $adplaces = $this->get('core_adplace_logic')->getDataInCabinetForPage($page);

        return $this->render('CoreSiteBundle:AdPlace\Cabinet:list.html.twig', ['adplaces' => $adplaces]);
    }


    /**
     * Редактирование рекламного места
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $adplace = $em->getRepository('CoreSiteBundle:AdPlace')->find($id);
        $form = $this->getForm($adplace);

        //Сохранения изменения
        //$request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

//            if ($this->checkIsExistSite($adplace)) {
//                $this->setFlash('edit_errors', 'Рекламное место с указанным именем было добавлено вами ранее.');
//                $isBadName=true;
//            }
//            else {
//                $isBadName=false;
//            }

         //   if (!$isBadName && $form->isValid()) {

            //ldd($form->getData()->getSections()->count());

            $this->container->get('core_adplace_logic')->setAuthoSize($adplace);

            if ($form->isValid()) {
                //ldd($adplace->getSections()->count());
                $em->flush();

                $this->setFlash('edit_success', 'Данные успешно обновлены');
                return new RedirectResponse($this->generateUrl('core_cabinet_adplace_edit', ['id' => $id]));
            } else {
                return $this->render('CoreSiteBundle:AdPlace\Cabinet:edit.html.twig', ['adplace' => $adplace, 'form' => $form->createView()]);
            }
        } else {
            return $this->render('CoreSiteBundle:AdPlace\Cabinet:edit.html.twig', ['adplace' => $adplace,  'form' => $form->createView()]);
        }
    }




    /**
     * Добавление рекламного места
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {

        $adplace = new AdPlace();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $adplace->setUser($user);
        $form = $this->getForm($adplace);
        $em = $this->getDoctrine()->getManager();


        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);
//            if ($this->checkIsExistSite($site)) {
//                $this->setFlash('edit_errors', 'Сайт с указанным адресом был добавлен вами ранее.');
//                $isBadName=true;
//            }
//            else {
//                $isBadName=false;
//            }
    //        if (!$isBadName && $form->isValid()) {

            $this->container->get('core_adplace_logic')->setAuthoSize($adplace);

            if ($form->isValid()) {

                $em->persist($adplace);
                $em->flush();

                $this->setFlash('edit_success', 'Новое рекламное место добавлено');
                return new RedirectResponse($this->generateUrl('core_cabinet_adplace_edit', ['id' => $adplace->getId()]));
            } else {
                return $this->render('CoreSiteBundle:AdPlace\Cabinet:edit.html.twig', ['adplace' => $adplace,  'form' => $form->createView()]);
            }
        } else {
            return $this->render('CoreSiteBundle:AdPlace\Cabinet:edit.html.twig', ['adplace' => $adplace, 'form' => $form->createView()]);
        }
    }

    /**
     * Форма рекламного места
     * @param $adplace
     * @return \Symfony\Component\Form\Form
     */
    private function getForm($adplace)
    {
        $form = $this->createFormBuilder($adplace)
            ->add('site', null, ['required' => true, 'property'=>'domain',
            ])
            ->add('name', 'text', ['required' => true])
            ->add('size', 'entity',
                [
                    'class'=>'CoreDirectoryBundle:AdPlaceSize',
                    'query_builder' => function(AdPlaceSizeRepository $er) {
                        return $er->createQueryBuilder('s')
                            ->where('s.isEnabled=1')
                            ->orderBy('s.id', 'ASC');
                    },
                    'required' => true, 'property'=>'captionRu',
                'attr' => array('data-extra' => ['name'])])
            ->add('width', 'text', ['required' => false])
            ->add('height', 'text', ['required' => false])
            ->add('isShowInCatalog', null, ['required' => false])
            ->add('sections', null, ['property'=>'name', 'required' => false, 'class' => 'CoreSiteBundle:Section', 'multiple' => true, 'expanded' => true, 'extraConfig' => [
                'field' => 'sections',
                'editUrl' => '',
                'deleteUrl' => '',
            ]])
            //->add('sections', null, ['property'=>'name', 'required' => false, 'multiple' => true, 'expanded' => true])
            ->getForm();

        return $form;
    }

    /**
     * Удаление рекламного места
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function deleteAction($id)
    {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $adplace = $em->getRepository('CoreSiteBundle:AdPlace')->findForDeleting(['id' => $id, 'user' => $user]);

        $msg = "Рекламное место  «{$adplace->getName()}» было удалено.";
        $em->remove($adplace);
        try {
            $em->flush();
            $this->setFlash('edit_success', $msg);
        } catch (\Exception $e) {
            $msg = "Невозможно удалить рекламное место «{$adplace->getName()}», т.к. оно задействовано в системе на данный момент.";
            $this->setFlash('edit_errors', $msg);
        }


        return new RedirectResponse($this->generateUrl('core_cabinet_adplace_list'));
    }


//    /**
//     * Проверяет есть ли у пользователя сайт с таким именем
//     * @param $domain
//     * @return mixed
//     */
//    private function checkIsExistSite($site) {
//
//        $user = $this->container->get('security.context')->getToken()->getUser();
//        $em = $this->getDoctrine()->getManager();
//        $res=$em->getRepository('CoreSiteBundle:Site')->findQuantityByOptions(['id'=>$site->getId(), 'user' => $user, 'domain' => $site->getDomain()]);
//
//        if ($res['quantity']) {
//            return true;
//        }
//        else {
//            return false;
//        }
//    }

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
