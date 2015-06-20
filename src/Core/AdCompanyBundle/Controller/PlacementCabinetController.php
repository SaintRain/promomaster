<?php

/**
 * Выдача страниц в ЛК для редактирования размещений
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Controller;

use Core\AdCompanyBundle\Form\Type\PlacementFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use  Core\AdCompanyBundle\Entity\Placement;
use  Core\AdCompanyBundle\Entity\AdCompany;
use Core\AdCompanyBundle\Form\DataTransformer\PlacementTransformer;
use Core\DirectoryBundle\Entity\Repository\PriceModelRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Response;

class PlacementCabinetController extends Controller
{

    /**
     * Вывод списка размещений пользователя в личном кабинете
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction($page = 1)
    {

        if ($url = $this->get('core_placement_logic')->getRedirectUrlIfPageEqualOne('core_cabinet_placement_list_first_page')) {
            return new RedirectResponse($url, 301);
        }

        $placements = $this->get('core_placement_logic')->getDataInCabinetForPage($page);

        return $this->render('CoreAdCompanyBundle:Placement\Cabinet:list.html.twig', ['placements' => $placements]);
    }


    /**
     * Редактирование размещения
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction($id)
    {
        $placement = $this->getDoctrine()->getManager()->getRepository('CoreAdCompanyBundle:Placement')->find($id);
        $form = $this->getForm($placement);


        //Сохранения изменения
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->flush();

                $this->setFlash('edit_success', 'Данные успешно обновлены');
                return new RedirectResponse($this->generateUrl('core_cabinet_placement_edit', ['id' => $id]));
            } else {
                return $this->render('CoreAdCompanyBundle:Placement\Cabinet:edit.html.twig', ['placement' => $placement, 'form' => $form->createView()]);
            }
        } else {
            return $this->render('CoreAdCompanyBundle:Placement\Cabinet:edit.html.twig', ['placement' => $placement, 'form' => $form->createView()]);
        }
    }


    /**
     * Добавление размещения
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {

        $placement = new Placement();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $form = $this->getForm($placement);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);

            //сетапим текущее время, если оно не указано явно
            if (!$placement->getStartDateTime()) {
                $placement->setStartDateTime(new \DateTime());
            }

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($placement);
                $em->flush();

                $this->setFlash('edit_success', 'Новое размещение добавлено');
                return new RedirectResponse($this->generateUrl('core_cabinet_placement_edit', ['id' => $placement->getId()]));
            } else {
                return $this->render('CoreAdCompanyBundle:Placement\Cabinet:edit.html.twig', ['placement' => $placement, 'form' => $form->createView()]);
            }
        } else {
            return $this->render('CoreAdCompanyBundle:Placement\Cabinet:edit.html.twig', ['placement' => $placement, 'form' => $form->createView()]);
        }


    }

    /**
     * Форма размещения
     * @param $placement
     * @return \Symfony\Component\Form\Form
     */
    private function getForm($placement)
    {
        $form = $this->createFormBuilder($placement)
            ->add('adCompany', null, ['required' => true, 'property' => 'name'])
            ->add('adPlace', null, ['required' => true, 'property' => 'name'])
            /*
            ->add('placementBannersList', 'entity', [
                'class'     => 'Core\AdCompanyBundle\Entity\PlacementBanner',
//                'expanded'  => true,
                'multiple'  => true,
                'required' => false,'property'=>'banner.name'])
            */
            ->add('startDateTime', 'text', ['required' => false , 'read_only'=>true])
            ->add('finishDateTime', 'text', ['required' => false, 'read_only'=>true])
            ->add('isEnabled', null, ['required' => false])
            ->add('quantity', null, ['required' => false])
            ->add('quantityModel', 'entity', [
                'class' => 'Core\DirectoryBundle\Entity\PriceModel',
                'query_builder' => function(PriceModelRepository $er ) {
                    return $er->createQueryBuilder('pm')->where('pm.name != :name')->setParameter('name','daysquantity');
                },
                'required' => false, 'property'=>'captionRu'])
           // ->add('defaultCountries', null, ['required' => false])
            ->add('defaultCountries', 'entity', [
                //'required' => false ,
                //'by_reference' => false,
                'class'     => 'CoreDirectoryBundle:Country',
                //'property'  => 'name',
                'withSubset' => true,
                'expanded'  => true,
                'multiple'  => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->select('c, w')
                        ->innerJoin('c.worldSection', 'w')
                        ;
                }
            ])

            ->add('placementBannersList', 'collection', [
                'by_reference' => false,
                'type' => 'placement_banner_form',
                'allow_add' => true,
                'allow_delete' => true,

            ])
            ->addModelTransformer(new PlacementTransformer())       //трансформер дат
            ->getForm();


        return $form;
    }


    /**
     * Удаление размещения
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction($id)
    {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $placement = $em->getRepository('CoreAdCompanyBundle:Placement')->findForDeleting(['id' => $id, 'user' => $user]);

        $msg = "Размещение  «{$placement->getId()}» было удалено.";
        $em->remove($placement);
        try {
            $em->flush();
            $this->setFlash('edit_success', $msg);
        } catch (\Exception $e) {
            $msg = "Невозможно удалить размещение «{$placement->getDomain()}», т.к. оно задействовано в системе на данный момент.";
            $this->setFlash('edit_errors', $msg);
        }


        return new RedirectResponse($this->generateUrl('core_cabinet_placement_list'));
    }

    public function adPlacesPlacementsAjaxAction(Request $request)
    {
        if (!$request->isXmlHttpRequest() || !$request->request->get('adPlaceId')) {
            throw $this->createNotFoundException('Page Not Found');
        }
        $em = $this->getDoctrine()->getManager();
        $adPlaceId = (int)$request->request->get('adPlaceId');
        $adPlacements = $em->getRepository('CoreAdCompanyBundle:Placement')->findForAdPlace($adPlaceId);
        $answer = [];

        foreach ($adPlacements as $val) {
            $answer[$val->getId()]['id'] = $val->getId();
            $answer[$val->getId()]['name'] = $val->getAdPlace()->getName();
            $answer[$val->getId()]['route'] = $this->generateUrl(
                'core_cabinet_adplaces_placements_ajax_edit',
                ['id' => $val->getId()]
            );
        }

        $response = new Response(json_encode($answer));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function deleteAjaxAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!$user || !$request->isXmlHttpRequest() || !$request->request->get('id')) {
            throw $this->createNotFoundException('Page Not Found');
        }
        $em = $this->getDoctrine()->getManager();
        $placement = $em->getRepository('CoreAdCompanyBundle:Placement')
            ->findForDeleting(['id' => $request->request->getInt('id'), 'user' => $user]);
        $msg = "Размещение  «{$placement->getId()}» было удалено.";
        $em->remove($placement);
        try {
            $em->flush();
            $answer = [
                'result' => true,
                'msg'   => $msg
            ];
        } catch (\Exception $e) {
            $msg = "Невозможно удалить размещение «{$placement->getDomain()}», т.к. оно задействовано в системе на данный момент.";
            $answer = [
                'result' => false,
                'msg'   => $msg
            ];
        }

        $response = new Response(json_encode($answer));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function editAjaxAction($id, Request $request)
    {
        if (!$this->getUser()) {
            return new JsonResponse(null, JsonResponse::HTTP_FORBIDDEN);
        }

        $placement = $this->getDoctrine()->getManager()->getRepository('CoreAdCompanyBundle:Placement')->find($id);

        if (!$placement) {
            return new JsonResponse(null, JsonResponse::HTTP_BAD_REQUEST);
        }

        $form = $this->createForm(
            new PlacementFormType(),
            $placement,
            ['adCompanyField' => false, 'adPlaceField' => false]
        );

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->flush();

                $msg = 'Данные успешно обновлены';
                $data = [
                    'result'    => true,
                    'data'      => null,
                    'msg'       => $msg
                ];
            } else {
                $html = $this->renderView('CoreAdCompanyBundle:Placement\Cabinet\Form:form_placement_modal.html.twig',
                    ['placement' => $placement, 'form' => $form->createView()
                ]);

                $data = [
                    'result'    => false,
                    'data'      => $html,
                    'msg'       => null
                ];

            }
        } else {
            $html = $this->renderView('CoreAdCompanyBundle:Placement\Cabinet\Form:form_placement_modal.html.twig',
                ['placement' => $placement, 'form' => $form->createView()
            ]);

            $data = [
                'result'    => true,
                'data'      => $html,
                'msg'       => null
            ];

        }

        $response = new Response(json_encode($data), JsonResponse::HTTP_OK);
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


}
