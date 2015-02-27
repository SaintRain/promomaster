<?php

/**
 * Контроллер для отображения FAQ-статей
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FaqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Core\FaqBundle\Form\Type\SearchFaqType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FaqController extends Controller {

    /**
     * Главная страница FAQ
     * @return type
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $rootCategory = $em->getRepository('CoreCategoryBundle:FaqCategory')
            ->findOneLevel('help');
        
        $searchForm = $this->createForm(new SearchFaqType());
        
        return $this->render('CoreFaqBundle:Faq:index.html.twig', array(
            'categories' => ($rootCategory) ? $rootCategory->getChildrens() : array(),
            'searchForm' => $searchForm->createView(),
            'rootCategory' => $rootCategory
        ));
    }

    /**
     * Страница заданной категории со статьями
     * @param type $categorySlug
     * @return type
     */
    public function categoryAction($categorySlug)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('CoreCategoryBundle:FaqCategory')
            ->findOneWithArticles($categorySlug);
        if (!$category) {
            throw new NotFoundHttpException('Page Not Found');
        }
        $searchForm = $this->createForm(new SearchFaqType());

        return $this->render('CoreFaqBundle:Faq:category.html.twig', array(
            'category' => $category,
            'articles' => $category->getArticles(),
            'searchForm' => $searchForm->createView()
        ));
    }
    
    /**
     * Страница заданной статьи
     * @param type $categorySlug
     * @param type $articleSlug
     * @return type
     */
    public function articleAction($categorySlug, $articleSlug, $searchString = null)
    {

        $em = $this->getDoctrine()->getManager();

        $article = $em->getRepository('CoreFaqBundle:Article')->findWithCategory($articleSlug);
        if (!$article || $article->getCategory()->getSlug() != $categorySlug) {
            throw new NotFoundHttpException('Page Not Found');
        }
        $searchForm = $this->createForm(new SearchFaqType(), array('searchQuery' => $searchString));
        
        return $this->render('CoreFaqBundle:Faq:article.html.twig', array(
            'article' => $article,
            'searchForm' => $searchForm->createView()
        ));
    }

    /**
     * Поиск
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type
     */
    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $catRepository = $em->getRepository('CoreCategoryBundle:FaqCategory');
        $rootCategory = $catRepository->findOnePartial('faq');
        $queryString = $request->query->all();
        $searchString = (isset($queryString['search_faq_type']['searchQuery']) && $queryString['search_faq_type']['searchQuery']) ? $queryString['search_faq_type']['searchQuery'] : null;

        if (!$searchString) {
            throw new NotFoundHttpException('Page Not Found');
        }
        $searchForm = $this->createForm(new SearchFaqType(), array('searchQuery' => $searchString));
        
        if ($rootCategory) {
            $categories = $catRepository->search($rootCategory->getId(), $searchString);

            // если нашлась всего одна статья то вызываем articleAction
            if(count($categories) == 1 && count($categories[0]->getArticles())) {
                $article = $categories[0]->getArticles()->first();
                
                return $this->forward('CoreFaqBundle:Faq:article', array(
                    'categorySlug' => $categories[0]->getSlug(),
                    'articleSlug' => $article->getSlug(),
                    'searchString' => $searchString
                ));

                /*
                return $this->redirect($this->generateUrl( 'core_faq_article', array(
                                    'categorySlug' => $categories[0]->getSlug(),
                                    'articleSlug' => $article->getSlug()
                        )));
                 *
                 */
            }
        } else {
            $categories = array();
        }
        
        return $this->render('CoreFaqBundle:Faq:search.html.twig', array(
            'categories' => $categories,
            'searchForm' => $searchForm->createView(),
            'searchString' => $searchString
        ));
    }
}
