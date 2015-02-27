<?php

/**
 * Админский контроллер для FAQ-статей
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FaqBundle\Controller\Admin;


use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Core\FaqBundle\Entity\Article;

class FaqAdminController extends Controller
{
    /**
     * Получить статью по slug
     * @return json
     * @throws NotFoundHttpException
     */
    public function articleAction()
    {
        if (!$this->isXmlHttpRequest()) {
            throw new NotFoundHttpException('Page Not Found');
        }
        $result = ['errors' => true, 'body' => 'BAD'];
        $requestStack = $this->container->get('request_stack');
        $articleSlug = $requestStack->getCurrentRequest()->request->get('articleSlug');
        if ($articleSlug) {
            $em = $this->getDoctrine()->getManager();
            $article = $em->getRepository('CoreFaqBundle:Article')->findBySlug([$articleSlug]);
            if (count($article)) {
                $result = ['errors' => false, 'body' => 'OK'];
            }
        }
        
        return $this->renderJson($result);
    }

    /**
     * Создание статьи
     * @return json
     * @throws NotFoundHttpException
     */
    public function ajaxCreateAction()
    {
        if (!$this->isXmlHttpRequest()) {
            throw new NotFoundHttpException('Page Not Found');
        }
        $result = ['errors' => [], 'result' => false];
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $formData = $request->request->get('simple_article_admin');
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('CoreCategoryBundle:FaqCategory')->findOneBy(['slug' => 'cancel-reason']);
        
        if (!$category) {
            $route = $this->generateUrl('admin_core_category_faqcategory_create');
            $result = ['errors' => ['Необходимо <a href="' . $route . '">создать категорию</a> с ЧПУ cancel-reason'], 'result' => false];
            return $this->renderJson($result);
        }
        if ($formData['id']) {
            $article = $em->getRepository('CoreFaqBundle:Article')->find((int)$formData['id']);
        }
        $article = (isset($article) && $article) ? $article : new Article();
        $article->setCategory($category)
                ->setBodyRu($formData['bodyRu'])
                ->setCaptionRu($formData['captionRu']);
        if ($formData['slug']) {
            $article->setSlug($formData['slug']);
        }
        $validator = $this->get('validator');
        $validationResult = $validator->validate($article);
        $errors = [];
        if ($validationResult->count()) {
            foreach($validationResult->getIterator() as $error) {
                $errors[$error->getPropertyPath()] = $error->getMessage();
            }
            $result = ['errors' => $errors, 'result' => false];
            return $this->renderJson($result);
        }
        $em->persist($article);
        $em->flush();
        $result = ['errors' => [], 'result' => true, 'article' => $article];
        return $this->renderJson($result);
    }
}
