<?php

/**
 * Выдача страниц в личном кабинете для редактирования рекламных мест
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Controller;

use Doctrine\ORM\Tools\EntityRepositoryGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Core\SiteBundle\Entity\WebSite;
use Core\SiteBundle\Entity\AdPlace;
use Core\DirectoryBundle\Entity\Repository\AdPlaceSizeRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Response;

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
        $gagsCount = $em->getRepository('CoreBannerBundle:CommonBanner')->getGagsCount($this->getUser()->getId());

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
                return $this->render('CoreSiteBundle:AdPlace\Cabinet:edit.html.twig', [
                    'adplace' => $adplace,
                    'form' => $form->createView(),
                    'gagsCount' => $gagsCount
                ]);
            }
        } else {
            return $this->render('CoreSiteBundle:AdPlace\Cabinet:edit.html.twig', [
                'adplace' => $adplace,
                'form' => $form->createView(),
                'gagsCount' => $gagsCount
            ]);
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
        $gagsCount = $em->getRepository('CoreBannerBundle:CommonBanner')->getGagsCount($this->getUser()->getId());

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
                return $this->render('CoreSiteBundle:AdPlace\Cabinet:edit.html.twig', [
                    'adplace' => $adplace,
                    'form' => $form->createView(),
                    'gagsCount' => $gagsCount
                ]);
            }
        } else {
            return $this->render('CoreSiteBundle:AdPlace\Cabinet:edit.html.twig', [
                'adplace' => $adplace,
                'form' => $form->createView(),
                'gagsCount' => $gagsCount
            ]);
        }
    }

    /**
     * Добавление рекламного места (ajax)
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAjaxAction(Request $request)
    {

        if (!$request->isXmlHttpRequest() || !$request->query->get('siteId')) {
            throw $this->createNotFoundException('Page Not Found');
        }

        $em = $this->getDoctrine()->getManager();
        $siteId = (int)$request->query->get('siteId');
        $site = $em->getRepository('CoreSiteBundle:CommonSite')->find($siteId);
        if (!$site) {
            throw $this->createNotFoundException('Page Not Found');
        }
        $adplace = new AdPlace();
        $adplace->setSite($site);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $adplace->setUser($user);
        $form = $this->getForm($adplace);

        $gagsCount = $em->getRepository('CoreBannerBundle:CommonBanner')->getGagsCount($this->getUser()->getId());

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
                $answer = [
                    'data' => ['id' => $adplace->getId(), 'name'=> $adplace->getName()],
                    'result' => true
                ];
            } else {
                $html = $this->render('CoreSiteBundle:AdPlace\Cabinet\Form:adplace_modal_form.html.twig', [
                    'adplace' => $adplace,
                    'form' => $form->createView(),
                    'gagsCount' => $gagsCount
                ])->getContent();

                $answer = [
                    'data' => $html,
                    'result' => false,
                ];
            }
        } else {
            $html = $this->render('CoreSiteBundle:AdPlace\Cabinet\Form:adplace_modal_form.html.twig', [
                'adplace' => $adplace,
                'form' => $form->createView(),
                'gagsCount' => $gagsCount
            ])->getContent();

            $answer = [
                'data' => $html,
                'result' => true,
            ];
        }

        $response = new Response(json_encode($answer));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Форма рекламного места
     * @param $adplace
     * @return \Symfony\Component\Form\Form
     */
    private function getForm($adplace)
    {
        $form = $this->createFormBuilder($adplace)
            ->add('site', null, ['required' => true, 'property' => 'domain',
            ])
            ->add('name', 'text', ['required' => true])
            ->add('size', 'entity',
                [
                    'class' => 'CoreDirectoryBundle:AdPlaceSize',
                    'query_builder' => function (AdPlaceSizeRepository $er) {
                        return $er->createQueryBuilder('s')
                            ->where('s.isEnabled=1')
                            ->orderBy('s.id', 'ASC');
                    },
                    'required' => true, 'property' => 'captionRu',
                    'attr' => array('data-extra' => ['name'])])
            ->add('width', 'text', ['required' => false])
            ->add('height', 'text', ['required' => false])
            ->add('isShowInCatalog', null, ['required' => false])
            ->add('gag', 'entity', [
                'class' => 'CoreBannerBundle:CommonBanner',
                'required' => false,
                'property' => 'name',
                'empty_value' => 'Необходимо выбрать',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.isGag = :isGag')
                        ->setParameter('isGag', true);
                }
            ])
            ->add('sections', null, [
                'property' => 'name',
                'required' => false,
                'class' => 'CoreSiteBundle:Section',

                'query_builder' => function(EntityRepository $er ) use ( $adplace ) {
                    return $er->createQueryBuilder('s')
                        ->where('s.user = :user')
                        ->setParameter('user', $adplace->getUser()->getId());
                },

                'multiple' => true,
                'expanded' => true,
                'extraConfig' => [
                'field' => 'sections',
                'editUrl' => '',
                'deleteUrl' => '',
            ]])
            /*
            ->add('countryList', 'country_form_frontend', [
                'class'     => 'CoreDirectoryBundle:Country',
                //'property'  => 'name',
                //'choices'   => $this->getChoices(),
                'expanded'  => true,
                'multiple'  => true,
                'required' => false
            ])
            */
            ->add('countryList', 'entity', [
                //'required' => false ,
                //'by_reference' => false,
                'class' => 'CoreDirectoryBundle:Country',
                //'property'  => 'name',
                'withSubset' => true,
                'expanded' => true,
                'multiple' => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->select('c, w')
                        ->innerJoin('c.worldSection', 'w');
                }
            ])
            /*
            ->add('prices', 'collection', [
                //'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'cascade_validation' => true,
                'type'   => 'ad_place_price_form',
            ])
            */
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
     * Вывод встраиваемого HTML-кода
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getCodeAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $adplace = $em->getRepository('CoreSiteBundle:AdPlace')->find($id);

        return $this->render('CoreSiteBundle:AdPlace\Cabinet:code.html.twig', ['adplace' => $adplace]);

    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAdplaceSectionsAction($id, Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $adplace = $em->getRepository('CoreSiteBundle:AdPlace')->find($id);
        $form = $this->getForm($adplace);

        //Сохранения изменения
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            $updated=true;
        }
        else {
            $updated=false;
        }


        return $this->render('CoreSiteBundle:AdPlace\Cabinet:editSections.html.twig', [
            'adplace' => $adplace,
            'form' => $form->createView(),
            'updated'=>$updated
        ]);

    }

    public function siteAdPlacesAjaxAction(Request $request)
    {
        if (!$request->isXmlHttpRequest() || !$request->request->get('siteId')) {
            throw $this->createNotFoundException('Page Not Found');
        }
        $em = $this->getDoctrine()->getManager();
        $siteId = (int)$request->request->get('siteId');
        $adPlaces = $em->getRepository('CoreSiteBundle:AdPlace')->findForSite($this->getUser()->getId(), $siteId);
        $answer = [];

        foreach ($adPlaces as $adPlace) {
            $answer[$adPlace->getId()]['id'] = $adPlace->getId();
            $answer[$adPlace->getId()]['name'] = $adPlace->getName();
        }

        $response = new Response(json_encode($answer));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

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
}
