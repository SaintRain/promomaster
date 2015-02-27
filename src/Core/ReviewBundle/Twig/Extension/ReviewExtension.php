<?php

/**
 * Twig расширения для отзывов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ReviewBundle\Twig\Extension;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;

class ReviewExtension extends \Twig_Extension
{

    private $locale;
    private $request;
    private $container;

    public function getFilters()
    {
        return array(
//            new \Twig_SimpleFilter('menuTitleFormater', array($this, 'menuTitleFormaterFilter')),
        );
    }

    public function getFunctions()
    {
        return array(
            'drawStarsByRating' => new \Twig_Function_Method($this, 'drawStarsByRatingFunction'),
        );
    }

    public function __construct($container)
    {
        $this->container = $container;
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
     * Прорисовка звезд (оценка товара)
     *
     * @param integer $string
     * @return string
     */
    public function drawStarsByRatingFunction($rating, $size = '')
    {
        return $this->container->get('templating')->render(
                'CoreReviewBundle:Review:stars.html.twig', array(
                'rating' => (int) $rating,
                'half' => $rating - floor($rating),
                'size' => $size,
                )
        );
    }

    public function getName()
    {
        return 'review_extension';
    }

}
