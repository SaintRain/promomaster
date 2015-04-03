<?php

/**
 * Выдача страниц в личном кабинете для редактирования баннеров
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\BannerBundle\Controller;

use Core\BannerBundle\Form\Type\CodeBannerFormType;
use Core\BannerBundle\Form\Type\FlashBannerFormType;
use Core\BannerBundle\Form\Type\GeneralBannerFormType;
use Core\BannerBundle\Form\Type\ImageBannerFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Core\BannerBundle\Entity\CommonBanner;
use Core\BannerBundle\Entity\ImageBanner;
use Core\BannerBundle\Entity\FlashBanner;
use Core\BannerBundle\Entity\CodeBanner;
use Symfony\Component\HttpFoundation\Response;
class CabinetController extends Controller
{

    /**
     * Вывод списка баннеров пользователя в личном кабинете
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction($page = 1)
    {

        if ($url = $this->get('core_banner_logic')->getRedirectUrlIfPageEqualOne('core_cabinet_banner_list_first_page')) {
            return new RedirectResponse($url, 301);
        }

        $banners = $this->get('core_banner_logic')->getDataInCabinetForPage($page);

        return $this->render('CoreBannerBundle:Banner\Cabinet:list.html.twig', ['banners' => $banners]);
    }


    /**
     * Редактирование баннера
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction($id)
    {

        $banner = $this->getDoctrine()->getManager()->getRepository('CoreBannerBundle:CommonBanner')->find($id);

        $isValidFile = true;

        if ($banner instanceof ImageBanner) {
            $form = $this->getImageBannerForm($banner);
            $type = 'image';
            $image = $banner->getImage()[0];  //почему-то перезатирается файл

            if (!$image) {
                if (!$isValidFile = $this->isFileLoaded('image', 'core_file_image')) {
                    $this->setFlash('edit_errors', 'Необходимо выбрать файл');
                }
            }

        } else if ($banner instanceof FlashBanner) {
            $form = $this->getFlashBannerForm($banner);
            $file = $banner->getFile()[0];  //почему-то перезатирается файл
            $type = 'flash';
            if (!$file) {
                if (!$isValidFile = $this->isFileLoaded('file', 'core_file')) {
                    $this->setFlash('edit_errors', 'Необходимо выбрать файл');
                }
            }

        } else if ($banner instanceof CodeBanner) {
            $form = $this->getCodeBannerForm($banner);
            $type = 'code';
        }


        //Сохранения изменения
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if (isset($image)) {
                $banner->setImage($image);
            } else if (isset($file)) {
                $banner->setFile($file);
            }

            if ($this->checkIsExistSite($banner)) {
                $this->setFlash('edit_errors', 'Баннер с указанным названием был добавлен вами ранее. Придумайте другое уникальное название.');
                $isBadName=true;
            }
            else {
                $isBadName=false;
            }

            if (!$isBadName && $isValidFile && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();

                $this->setFlash('edit_success', 'Данные успешно обновлены');
                return new RedirectResponse($this->generateUrl('core_cabinet_banner_edit', ['id' => $id]));
            } else {
                return $this->render('CoreBannerBundle:Banner\Cabinet:edit.html.twig', ['type' => $type, 'banner' => $banner, 'form' => $form->createView()]);
            }
        } else {
            return $this->render('CoreBannerBundle:Banner\Cabinet:edit.html.twig', ['type' => $type, 'banner' => $banner, 'form' => $form->createView()]);
        }
    }


    /**
     * Добавление баннера
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {

        $imageBanner = new ImageBanner();
        $flashBanner = new FlashBanner();
        $codeBanner = new CodeBanner();

        $user = $this->container->get('security.context')->getToken()->getUser();

        $imageBanner->setUser($user);
        $flashBanner->setUser($user);
        $codeBanner->setUser($user);

        $imageBannerForm = $this->getImageBannerForm($imageBanner);
        $flashBannerForm = $this->getFlashBannerForm($flashBanner);
        $codeBannerForm = $this->getCodeBannerForm($codeBanner);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $type = $request->request->get('banner_type');  //берем тип баннера

            switch ($type) {
                case 'image':
                    $form = $imageBannerForm;
                    $banner = $imageBanner;

                    if (!$isValidFile = $this->isFileLoaded('image',  'core_file_image')) {
                        $this->setFlash('edit_errors', 'Необходимо выбрать файл');
                    }

                    break;
                case 'flash':
                    $form = $flashBannerForm;
                    $banner = $flashBanner;

                    if (!$isValidFile = $this->isFileLoaded('file',  'core_file')) {
                        $this->setFlash('edit_errors', 'Необходимо выбрать файл');
                    }

                    break;
                case 'code':
                    $form = $codeBannerForm;
                    $banner = $codeBanner;
                    $isValidFile = true;
                    break;
            }

            $form->handleRequest($request);


            if ($this->checkIsExistSite($banner)) {
                $this->setFlash('edit_errors', 'Баннер с указанным названием был добавлен вами ранее. Придумайте другое уникальное название.');
                $isBadName=true;
            }
            else {
                $isBadName=false;
            }

            if (!$isBadName && $isValidFile && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($banner);
                $em->flush();


                $this->setFlash('edit_success', 'Новый баннер добавлен.');

                return new RedirectResponse($this->generateUrl('core_cabinet_banner_edit', ['id' => $banner->getId()]));
            } else {
                return $this->render('CoreBannerBundle:Banner\Cabinet:edit.html.twig',
                    [
                        'type' => $type,
                        'banner' => $banner,
                        'imageBanner' => $imageBanner, 'imageBannerForm' => $imageBannerForm->createView(),
                        'flashBanner' => $flashBanner, 'flashBannerForm' => $flashBannerForm->createView(),
                        'codeBanner' => $codeBanner, 'codeBannerForm' => $codeBannerForm->createView(),
                    ]
                );

            }
        } else {
            $banner = $imageBanner;
            return $this->render('CoreBannerBundle:Banner\Cabinet:edit.html.twig',
                [
                    'type' => 'image',
                    'banner' => $banner,
                    'imageBanner' => $imageBanner, 'imageBannerForm' => $imageBannerForm->createView(),
                    'flashBanner' => $flashBanner, 'flashBannerForm' => $flashBannerForm->createView(),
                    'codeBanner' => $codeBanner, 'codeBannerForm' => $codeBannerForm->createView(),
                ]
            );
        }
    }


    public function createAjaxAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw $this->createNotFoundException('Page Not Found');
        }

        $imageBanner = new ImageBanner();
        $flashBanner = new FlashBanner();
        $codeBanner = new CodeBanner();

        $imageForm = $this->createForm('image_banner_form', $imageBanner);
        $flashForm = $this->createForm('flash_banner_form', $flashBanner);
        $codeForm = $this->createForm('code_banner_form', $codeBanner);

        if ($request->request->count()) {
            if ($request->get('image_banner_form')) {
                $form = $imageForm;
                $subject = $imageBanner;
            } elseif($request->get('flash_banner_form')) {
                $form = $flashForm;
                $subject = $flashBanner;
            } else {
                $form = $codeForm;
                $subject = $codeBanner;
            }

            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($subject);
                $em->flush();

                $answer = [
                    'result'    => true,
                    'data'      => $subject,
                    'msg'       => 'ok'
                ];
            } else {
                $content = $this->render('CoreBannerBundle:Banner\Cabinet\Forms:form_ajax.html.twig',[
                    'formName' => $form->getName(),
                    'imageForm' => $imageForm->createView(),
                    'codeForm'  => $codeForm->createView(),
                    'flashForm' => $flashForm->createView()
                ])->getContent();

                $answer = [
                    'result'    => false,
                    'data'      => $content,
                    'msg'       => 'error'
                ];
            }
        } else {
            $content = $this->render('CoreBannerBundle:Banner\Cabinet\Forms:form_ajax.html.twig',[
                            'imageForm' => $imageForm->createView(),
                            'codeForm'  => $codeForm->createView(),
                            'flashForm' => $flashForm->createView()
                        ])->getContent();
            $answer = [
                'result'    => true,
                'data'      => $content,
                'msg'       => 'error'
            ];
        }

        $response = new Response(json_encode($answer));

        $response->headers->set('Content-Type', 'application/json');

        return $response;

    }


    public function editAjaxAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw $this->createNotFoundException('Page Not Found');
        }

        $em = $this->getDoctrine()->getManager();
        $id = $request->get('id');
        $subject = $em->getRepository('CoreBannerBundle:CommonBanner')->find((int)$id);
        if ($subject instanceof ImageBanner) {
            $imageForm = $this->createForm('image_banner_form', $subject);
            $form = $imageForm;
        } elseif ($subject instanceof FlashBanner) {
            $flashForm = $this->createForm('flash_banner_form', $subject);
            $form = $flashForm;
        } else {
            $codeForm = $this->createForm('code_banner_form', $subject);
            $form = $codeForm;
        }
        if ($request->request->count() > 1) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->flush();
                $em->refresh($subject);
                $answer = [
                    'result'    => true,
                    'data'      => $subject,
                    'msg'       => 'ok'
                ];
            } else {
                $content = $this->render('CoreBannerBundle:Banner\Cabinet\Forms:form_ajax.html.twig',[
                    'imageForm' => (isset($imageForm)) ? $imageForm->createView() : null,
                    'codeForm'  => (isset($codeForm)) ? $codeForm->createView() : null,
                    'flashForm' => (isset($flashForm)) ?  $flashForm->createView() : null,
                    'subject'   => $subject
                ])->getContent();

                $answer = [
                    'result'    => false,
                    'data'      => $content,
                    'msg'       => 'error'
                ];
            }
        } else {
            $content = $this->render('CoreBannerBundle:Banner\Cabinet\Forms:form_ajax.html.twig',[
                'imageForm' => (isset($imageForm)) ? $imageForm->createView() : null,
                'codeForm'  => (isset($codeForm)) ? $codeForm->createView() : null,
                'flashForm' => (isset($flashForm)) ?  $flashForm->createView() : null,
                'subject'   => $subject
            ])->getContent();
            $answer = [
                'result'    => true,
                'data'      => $content,
                'msg'       => 'create'
            ];
        }

        $response = new Response(json_encode($answer));

        $response->headers->set('Content-Type', 'application/json');

        return $response;

    }

    /**
     * Удаление баннера
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction($id)
    {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $banner = $em->getRepository('CoreBannerBundle:CommonBanner')->findForDeleting(['id' => $id, 'user' => $user]);

        $msg = "Баннер  «{$banner->getName()}» был удален";
        $em->remove($banner);
        try {
            $em->flush();
            $this->setFlash('edit_success', $msg);
        } catch (\Exception $e) {
            $msg = "Невозможно удалить баннер «{$banner->getName()}», т.к. он задействован в системе на данный момент.";
            $this->setFlash('edit_errors', $msg);
        }

        return new RedirectResponse($this->generateUrl('core_cabinet_banner_list'));
    }


    /**
     * Форма баннера
     * @param $banner
     * @return \Symfony\Component\Form\Form
     */
    private function getImageBannerForm($banner)
    {
        $form = $this->createFormBuilder($banner)
            ->add('name', 'text', ['required' => true])
            ->add('url', 'text', ['required' => true])
            ->add('isOpenUrlInNewWindow', null, ['required' => false])
            ->add('image', 'multiupload_file_frontend', array(
                'required' => true,
                "label" => "Прикрепить файл (каждый до 1Mb):",
                'attr' => array(
                    'multiple' => false,
                    'accept' => 'image/*'
                ),
                'type' => 'image',
                'namespace_to_attach' => 'Core\BannerBundle\Entity\ImageBanner',
                'namespace_to_insert' => 'Core\FileBundle\Entity\ImageFile',
                'btnName' => $banner->getId() ? 'Выбрать другой файл' : 'Выбрать файл',
                'btnAttr' => array(
                    'class' => 'btn-u',
                ),
                'showStatusOfUpload' => true,
                'showCounterOfFiles' => false,
                'showAttachedFiles' => true,
            ))
            ->getForm();

        return $form;
    }


    /**
     * Форма Flash - баннера
     * @param $banner
     * @return \Symfony\Component\Form\Form
     */
    private function getFlashBannerForm($banner)
    {
        $form = $this->createFormBuilder($banner)
            ->add('name', 'text', ['required' => true])
            ->add('url', 'text', ['required' => true])
//            ->add('isOpenUrlInNewWindow', null, ['required' => false])
            ->add('file', 'multiupload_file_frontend', array(
                'required' => true,
                "label" => "Прикрепить файлы (каждый до 1Mb):",
                'attr' => array(
                    'multiple' => false,
                    'accept' => 'application/x-shockwave-flash'
                ),
                'type' => 'flash',
                'namespace_to_attach' => 'Core\BannerBundle\Entity\FlashBanner',
                'namespace_to_insert' => 'Core\FileBundle\Entity\FlashFile',
                'btnName' => $banner->getId() ? 'Выбрать другой файл' : 'Выбрать файл',
                'btnAttr' => array(
                    'class' => 'btn-u',
                ),
                'showStatusOfUpload' => true,
                'showCounterOfFiles' => false,
                'showAttachedFiles' => true,
            ))
            ->getForm();

        return $form;
    }


    /**
     * Форма баннера
     * @param $banner
     * @return \Symfony\Component\Form\Form
     */
    private function getCodeBannerForm($banner)
    {
        $form = $this->createFormBuilder($banner)
            ->add('name', 'text', ['required' => true])
            ->add('code', 'textarea', ['required' => true, 'attr' => ['rows' => 10]])
            ->getForm();

        return $form;
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


    /**
     * Проверяет есть ли у пользователя баннер с таким именем
     * @param $domain
     * @return mixed
     */
    private function checkIsExistSite($banner) {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $res=$em->getRepository('CoreBannerBundle:CommonBanner')->findQuantityByOptions(['id'=>$banner->getId(), 'user' => $user, 'name' => $banner->getName()]);

        if ($res['quantity']) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Проверяет был ли загружен файл
     * @param $fieldName
     * @param $session_key
     */
    private function isFileLoaded($fieldName, $session_key)
    {
        $request = $this->get('request');
        if ($request->request->get('CoreFileBundleInput')) {
            $data = $request->request->get('CoreFileBundleInput');

            if (isset($data[$fieldName]['form_id'])) {
                $form_id = $data[$fieldName]['form_id'];
                $session = $this->get('session');

                $session = $session->get($session_key);
                if (isset($session[$form_id])) {
                    return true;
                } else {
                    return false;
                }

            } else {
                return false;
            }
        } else {
            return false;
        }
    }


}
