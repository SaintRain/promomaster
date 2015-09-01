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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Core\SiteBundle\Entity\WebSite;
use Core\SiteBundle\Form\Type\SiteFormType;

class SiteCabinetController extends Controller
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

        $user = $this->container->get('security.context')->getToken()->getUser();

        $site = $this->getDoctrine()->getManager()->getRepository('CoreSiteBundle:CommonSite')->find($id);
        $form = $this->createForm(new SiteFormType(), $site);

        $categories = $this->getDoctrine()->getManager()->getRepository('CoreCategoryBundle:SiteCategory')
            ->getBuildTree()[0]['__children'];

//ldd($_POST);
        //Сохранения изменения
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($this->container->get('core_site_logic')->checkIsExistWebSite($site, $user)) {
                $this->setFlash('edit_errors', 'Сайт с указанным адресом был добавлен вами ранее.');
                $isBadName = true;
            } else {
                $isBadName = false;
            }

            if (!$isBadName && $form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $this->makeSnapShot($site);
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
        $site = new WebSite();  //пока только веб-сайты
        $user = $this->container->get('security.context')->getToken()->getUser();
        $site->setUser($user);
        $form = $this->createForm(new SiteFormType(), $site);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);
            if ($this->container->get('core_site_logic')->checkIsExistWebSite($site, $user)) {
                $this->setFlash('edit_errors', 'Сайт с указанным адресом был добавлен вами ранее.');
                $isBadName = true;
            } else {
                $isBadName = false;
            }
            if (!$isBadName && $form->isValid()) {

                //генерируем проверочный код
                $verifiedCode = $this->get('core_site_logic')->generateVerifiedCode($site);
                $site->setVerifiedCode($verifiedCode);

                $em = $this->getDoctrine()->getManager();
                $em->persist($site);
                $em->flush();
                $this->makeSnapShot($site);
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

    public function createAjaxAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw $this->createNotFoundException('Page Not Found');
        }
        $site = new WebSite();  //пока только веб-сайты
        $user = $this->container->get('security.context')->getToken()->getUser();
        $site->setUser($user);
        $form = $this->createForm(new SiteFormType(), $site);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);
            if ($this->container->get('core_site_logic')->checkIsExistWebSite($site, $user)) {
                $this->setFlash('edit_errors', 'Сайт с указанным адресом был добавлен вами ранее.');
                $isBadName = true;
            } else {
                $isBadName = false;
            }
            if (!$isBadName && $form->isValid()) {

                //генерируем проверочный код
                $verifiedCode = $this->get('core_site_logic')->generateVerifiedCode($site);
                $site->setVerifiedCode($verifiedCode);

                $em = $this->getDoctrine()->getManager();
                $em->persist($site);
                $em->flush();
                $this->makeSnapShot($site);
                $em->flush();
                $answer = [
                    'data' => ['id' => $site->getId(), 'name' => $site->getName()],
                    'result' => true
                ];

            } else {
                $html = $this->render('CoreSiteBundle:Site\Form:form_modal.html.twig', [
                    'site' => $site,
                    'form' => $form->createView()
                ])->getContent();
                $answer = [
                    'data'      => $html,
                    'result'    => false
                ];

            }
        } else {
            $html = $this->render('CoreSiteBundle:Site\Form:form_modal.html.twig', [
                'site' => $site,
                'form' => $form->createView()
            ])->getContent();
            $answer = [
                'data'      => $html,
                'result'    => true
                ];
        }

        $response = new Response(json_encode($answer));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Форма сайта
     * @param $site
     * @return \Symfony\Component\Form\Form
     */
    private function getForm($site)
    {
        $form = $this->createFormBuilder($site)
            ->add('domain', 'text', ['required' => true, 'trim'=>true])
            ->add('mirrors', 'textarea', ['required' => false])
            ->add('keywords', 'textarea', ['required' => false, 'attr' => ['rows' => 5]])
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
        $site = $em->getRepository('CoreSiteBundle:CommonSite')->findOneByIdAndUser(['id' => $id, 'user' => $user]);

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
     * Форма подтверждения площадки
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function verifiedFormAction($id)
    {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('CoreSiteBundle:CommonSite')->findOneByIdAndUser(['id' => $id, 'user' => $user]);

        return $this->render('CoreSiteBundle:Site\Cabinet:verifiedForm.html.twig', ['site' => $site]);
    }


    /**
     * Проверка прав пользователя на площадку
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function verifySiteAction($id)
    {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('CoreSiteBundle:CommonSite')->findOneByIdAndUser(['id' => $id, 'user' => $user]);

        $pageUrl = $site->getDomain() . '/promomaster_' . $site->getVerifiedCode() . '.html';


        $Headers = @get_headers($pageUrl);
        if (strpos('200', $Headers[0])) {
            $isVerified = true;
        } else {
            try {
                $content = file_get_contents($site->getDomain());
                if (strpos($content, $site->getVerifiedCode()) !== false) {
                    $isVerified = true;
                } else {
                    $isVerified = false;
                }
            } catch (\Exception $e) {
                $isVerified = false;
            }
        }
        $site->setIsVerified($isVerified);
        $em->flush($site);


        $response = new JsonResponse();
        $response->setData(
            ['isVerified' => $isVerified]
        );
        return  $response;
    }

    /**
     * Генерирует файл для проверки прав на площадку
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getFileForVerifyAction($id)
    {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('CoreSiteBundle:CommonSite')->findOneByIdAndUser(['id' => $id, 'user' => $user]);

        $fileName = 'promomaster_' . $site->getVerifiedCode() . '.html';


        //отдаем пустой файл
        $response = new Response();
        $response->headers->set('Cache-Control', 'private');
        $response->headers->set('Content-type', 'text/html; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . basename($fileName) . '";');
        $response->headers->set('Content-length', 0);
        $response->sendHeaders();
        $response->setContent('');

        return $response;
    }

    public function createSiteImageAction(Request $request)
    {

        if (!$request->isXmlHttpRequest() || !$request->request->get('site')) {
            throw $this->createNotFoundException('Page Not Found');
        }

        $filePath = sprintf('%s/%s.jpg',  sys_get_temp_dir(), md5(time()));
        $this->get('knp_snappy.image')->generate($request->get('site'), $filePath);

        $answer = ['data' => base64_encode(file_get_contents($filePath)), 'result' => 'ok'];
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

    private function makeSnapShot(WebSite $site)
    {
        $file = sprintf('site-%d.jpg', $site->getId());
        $path = sprintf('%s/%d/%s', $site->getUploadRootDir(), $site->getUser()->getId(), $file);
        if (file_exists($path)) {
            unlink($path);
        }
        if ($this->get('knp_snappy.image')->generate($site->getDomain(), $path)) {
            $site->setSnapShot($file);
        }
    }
}
