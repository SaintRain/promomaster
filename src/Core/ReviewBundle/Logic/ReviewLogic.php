<?php

/**
 * Сервис для работы с рейтингом и отзывами
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ReviewBundle\Logic;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpFoundation\Request;
use Core\ReviewBundle\Form\Type\ReviewType;
use Core\ReviewBundle\Entity\Review;
use Core\ReviewBundle\Entity\ReviewLikesMatchUser as Likes;

class ReviewLogic
{

    private $container;
    private $request;
    private $locale;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Вспомагательная фкнкция для переводов
     *
     * @param type $string
     * @param array $array
     * @return type
     */
    private function trans($string, array $array = array())
    {
        return $this->container->get('translator')->trans($string, $array, 'frontend');
    }

    /**
     * Подписка на событие request для получения текущей локили
     *
     * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if ($event->getRequestType() === HttpKernel::MASTER_REQUEST) {
            $this->request = $event->getRequest();
            $this->locale = $event->getRequest()->getLocale();
        }
    }

    /**
     * Пересчет рейтинга продукта и кол-во отзывов с оценкой
     *
     * @param object $product
     */
    public function recalculateProductRating($product)
    {
        if (null !== $product) {
            $em = $this->container->get('doctrine.orm.entity_manager');
            $sumRating = 0;
            $countRating = 0;
            $product->getReviews()->initialize();
            foreach ($product->getReviews() as $pReview) {
                if ($pReview->getIsEnabled() && $pReview->getLvl() === 0 && $pReview->getRating() > 0) {
                    $sumRating += $pReview->getRating();
                    $countRating++;
                }
            }
            if ($countRating > 0 && $product->getReviewsCount() !== $countRating) {
                $product->setReviewsRating($sumRating / $countRating);
                $product->setReviewsCount($countRating);

                $em->persist($product);
                $em->flush($product);
            }
        }
    }

    /**
     * Добавление нового коментария
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type
     */
    public function send(Request $request)
    {
        $response = array();

        if ($request->getMethod() === 'POST') {
            $em = $this->container->get('doctrine.orm.entity_manager');
            $user = $this->container->get('security.context')->getToken()->getUser();
            $formData = $request->request->get('core_review_form_type');
            if (!isset($formData['product'])) {
                $response['error'][] = $this->trans('Cannot get product!');
            } else {
                $product = $em->getRepository('CoreProductBundle:CommonProduct')->find($formData['product']);

                $form = $this->container->get('form.factory')->create(new ReviewType(), new Review(), array(
                    'product' => $product,
                    'user' => $user,
                    'em' => $em
                ));
                $form->bind($request);
                if ($form->isValid()) {
                    $review = $form->getData();

                    $parent = isset($formData['parent']) ? $em->getRepository('CoreReviewBundle:Review')->find($formData['parent']) : null;
                    $review->setParent($parent);

                    $errors = $this->container->get('validator')->validate($review);
                    if (count($errors) > 0) {
                        foreach ($errors->getIterator() as $error) {
                            $response['error'][] = $error->getMessage() . ': "' . $this->trans($error->getPropertyPath()) . '"';
                        }
                    }

                    // Если ошибок нет записываем отзыв в БД
                    if (!isset($response['error'])) {

                        $em->persist($review);
                        $em->flush($review);

                        $this->recalculateProductRating($product);

                        $response['success'][] = $this->trans('Review added successfully!');
                    }
                } else {
                    foreach ($form->getErrors() as $error) {
                        $response['error'][] = $error->getMessage();
                    }
                }
            }
        }



        $this->container->get('session')->set('flash_review', $response);
    }

    /**
     * Лайк у отзыва +\-
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array
     */
    public function rate(Request $request)
    {
        $response = array();

        if ($request->getMethod() === 'POST') {
            $em = $this->container->get('doctrine.orm.entity_manager');
            $user = $this->container->get('security.context')->getToken()->getUser();
            $id = $request->request->get('id');
            $typeWord = $request->request->get('type');
            $type = $typeWord === 'positive' ? Likes::TYPE_POSITIVE : Likes::TYPE_NEGATIVE;
            $response['data']['action'] = $typeWord === 'positive' ? '+1' : '-1';
            $review = $em->getRepository('CoreReviewBundle:Review')->find($id);

            if (!in_array($typeWord, ['positive', 'negative'])) {
                $response['error'][] = $this->trans('Unknown action!');
            }

            if (null === $user || $user === 'anon.') {
                $response['error'][] = $this->trans('You must be authorized!');
            }

            if (null === $review) {
                $response['error'][] = $this->trans('Cannot get review!');
            }

            if (isset($response['error'])) {
                return $response;
            }

            $review->getLikes()->initialize();

            // Если пользователь оставлял лайк, то удаляем его
            foreach ($review->getLikes() as $like) {
                if ($like->getUser()->getId() === $user->getId()) {
                    if ($like->getType() === $type) {
                        $response['data']['action'] = '0';
                    }
                    $em->remove($like);
                }
            }

            // Добавляем новый, если лайк противоположный или если пользователь еще не оставлял лайк
            if ($response['data']['action'] !== '0') {
                $like = new Likes();
                $like->setUser($user);
                $like->setReview($review);
                $like->setType($type);
                $review->addLike($like);
                $em->persist($like);
            }

            $em->persist($review);
            $em->flush();

            // Считаем количество положительных и отрицательных лайков
            $count = array(
                'positive' => 0,
                'negative' => 0,
            );
            foreach ($review->getLikes() as $like) {
                if ($like->getType() === Likes::TYPE_POSITIVE) {
                    $count['positive'] ++;
                } else {
                    $count['negative'] ++;
                }
            }

            $response['data']['count'] = array(
                'positive' => $count['positive'],
                'negative' => $count['negative'],
            );
            $response['success'][] = $this->trans('Your vote has been counted!');

            return $response;
        }
    }

    /**
     * Получение всех отзывов товара
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array
     */
    public function viewMore(Request $request)
    {
        $response = array();

        if ($request->getMethod() === 'POST') {
            $em = $this->container->get('doctrine.orm.entity_manager');
            $slug = $request->request->get('slug');
            $page = (int) $request->request->get('page');
            $show = (int) $request->request->get('show');
            $sort = $request->request->get('sort');
            $filterRating = (int) $request->request->get('filterRating');

            $user = $this->container->get('security.context')->getToken()->getUser();
            $reviewsAll = $em->getRepository('CoreReviewBundle:Review')->findByProductAndUser($slug, $user, $sort, $filterRating);

            $reviewsTotal = 0;
            $reviews = array();
            foreach ($reviewsAll as $id => $data) {
                if ($data['object']->getLvl() === 0) {
                    $reviewsTotal++;
                    $reviews[$id] = $data;
                }
            }

            if ($reviewsTotal === 0) {
                $response['error'][] = $this->trans('Cannot find more reviews!');
            }

            if (isset($response['error'])) {
                return $response;
            }

            $response['data']['html'] = $this->container->get('templating')->render('CoreReviewBundle:Review:reviews_rows.html.twig', array(
                'reviews' => array_slice($reviews, ($page - 1) * $show, $show, true),
                'reviewsAll' => $reviewsAll,
                'reviewsShow' => $show,
                'reviewsTotal' => $reviewsTotal,
            ));

            $response['data']['page'] = ++$page;
            $response['data']['total'] = $reviewsTotal;

            return $response;
        }
    }

    /**
     * Смена сортировки
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array
     */
    public function changeSortOrFilter(Request $request)
    {
        $response = array();

        if ($request->getMethod() === 'POST') {
            $em = $this->container->get('doctrine.orm.entity_manager');
            $slug = $request->request->get('slug');
            $sort = $request->request->get('sort');
            $filterRating = (int) $request->request->get('filterRating');
            $user = $this->container->get('security.context')->getToken()->getUser();

            $reviewsShow = 3;
            $reviewsMaxCountForShowAll = 9; // если количество отзывов болше то будут грузится постранично
            $reviewsAll = $em->getRepository('CoreReviewBundle:Review')->findByProductAndUser($slug, $user, $sort, $filterRating);

            $reviewsTotal = 0;
            $reviews = array();
            foreach ($reviewsAll as $id => $data) {
                if ($data['object']->getLvl() === 0) {
                    $reviewsTotal++;
                    $reviews[$id] = $data;
                }
            }

            if ($reviewsTotal === 0) {
                $response['error'][] = $this->trans('Cannot find more reviews!');
            }

            if (isset($response['error'])) {
                return $response;
            }

            $response['data']['html'] = $this->container->get('templating')->render('CoreReviewBundle:Review:reviews_with_link_more.html.twig', array(
                'reviews' => array_slice($reviews, 0, $reviewsShow, true),
                'reviewsAll' => $reviewsAll,
                'reviewsFilterRating' => $filterRating,
                'reviewsTotal' => $reviewsTotal,
                'reviewsShow' => $reviewsShow,
                'reviewsMaxCountForShowAll' => $reviewsMaxCountForShowAll,
                'currentProductSlug' => $slug,
            ));

            return $response;
        }
    }

}
