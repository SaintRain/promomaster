<?php

/**
 * Репозиторий для работы с сущностью Review
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ReviewBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Gedmo\Tree\Entity\Repository\NestedTreeRepository;
use Core\ReviewBundle\Entity\Review;
use Core\ReviewBundle\Entity\ReviewLikesMatchUser as Likes;

class ReviewRepository extends NestedTreeRepository
{

    /**
     * Получаем отзывы для продукта со всеми join'ами
     *
     * @param object $product
     * @param object $user
     * @return array
     */
    public function findByProductAndUser($product, $user, $sort = 'new', $filterRating = null)
    {
        $userId = method_exists($user, 'getId') ? $user->getId() : 0;

        $qb = $this->_em->createQueryBuilder()
            ->from($this->_entityName, 'r', 'r.id')
            ->select('r AS object', 'likes', 'children', 'photos'/*, 'videos'*/)
            ->addSelect('SUM (CASE WHEN (userLikes.id = :userId AND likes.type = :TYPE_POSITIVE) THEN 1 ELSE 0 END) isExistPositive')
            ->addSelect('SUM (CASE WHEN (userLikes.id = :userId AND likes.type = :TYPE_NEGATIVE) THEN 1 ELSE 0 END) isExistNegative')
            ->addSelect('SUM (CASE WHEN (likes.type = :TYPE_POSITIVE) THEN 1 ELSE 0 END) countPositive')
            ->addSelect('SUM (CASE WHEN (likes.type = :TYPE_NEGATIVE) THEN 1 ELSE 0 END) countNegative')
            ->addSelect('SUM (CASE WHEN (likes.type = :TYPE_POSITIVE) THEN 1 WHEN (likes.type = :TYPE_NEGATIVE) THEN -1 ELSE 0 END) countForOrder')
            ->leftJoin('r.product', 'product')
            ->leftJoin('r.user', 'user')
            ->leftJoin('r.likes', 'likes')
            ->leftJoin('r.photos', 'photos')
//            ->leftJoin('r.videos', 'videos')
            ->leftJoin('r.children', 'children')
            ->leftJoin('likes.user', 'userLikes')
            ->where('r.isEnabled = 1')
            ->groupBy('r.id, children.id, photos.id')/*, videos.id */
        ;
        switch ($sort) {
            case 'rating':
                $qb->orderBy('r.rating', 'DESC');
                break;
            case 'positive':
                $qb->orderBy('countForOrder', 'DESC');
                $qb->addOrderBy('countPositive', 'DESC');
                $qb->addOrderBy('r.rating', 'DESC');
                break;
            default:
                $qb->orderBy('r.createdAt', 'DESC');
                break;
        }

        $qb->andWhere('product.slug = :slug');

        if (in_array($filterRating, [1, 2, 3, 4, 5])) {
            $qb
                ->andWhere('r.rating = :rating OR r.parent IS NOT NULL')
                ->setParameter('rating', $filterRating);
        }

        $qb
            ->setParameter('slug', method_exists($product, 'getSlug') ? $product->getSlug() : $product)
            ->setParameter('userId', $userId)
            ->setParameter('TYPE_POSITIVE', Likes::TYPE_POSITIVE)
            ->setParameter('TYPE_NEGATIVE', Likes::TYPE_NEGATIVE);
        $array = $qb
            ->getQuery()
            ->execute();


        if (!empty($array)) {
            $reviewsWithAlreadyBought = $this->_em->createQueryBuilder()
                ->from($this->_entityName, 'r', 'r.id')
                ->select('r.id isBuy')
                ->leftJoin('r.user', 'user')
                ->leftJoin('user.contragents', 'contragents')
                ->leftJoin('contragents.orders', 'orders')
                ->leftJoin('orders.compositions', 'compositions')
                ->leftJoin('compositions.product', 'cProduct')
                ->groupBy('r.id')
                ->where('r.id IN (' . implode(',', array_keys($array)) . ')')
                ->andWhere('cProduct.slug = :slug')
                ->andWhere('orders.isShippedStatus = 1')
                ->setParameter('slug', method_exists($product, 'getSlug') ? $product->getSlug() : $product)
                ->getQuery()
                ->execute()
            ;

            foreach ($array as $id => $item) {
                if (isset($reviewsWithAlreadyBought[$item['object']->getId()])) {
                    $array[$id]['isBuy'] = true;
                } else {
                    $array[$id]['isBuy'] = false;
                }
            }
        }

        return $array;
    }

    /**
     * Получение общего кол-ва отзывов и кол-ва по рейтингу
     *
     * @param object $product
     * @return array
     */
    public function findByProductWithCountedStars($product)
    {
        $array = $this->createQueryBuilder('r')
            ->select('count (r.id) total')
            ->addSelect('SUM (CASE WHEN (r.rating = 5) THEN 1 ELSE 0 END) five')
            ->addSelect('SUM (CASE WHEN (r.rating = 4) THEN 1 ELSE 0 END) four')
            ->addSelect('SUM (CASE WHEN (r.rating = 3) THEN 1 ELSE 0 END) three')
            ->addSelect('SUM (CASE WHEN (r.rating = 2) THEN 1 ELSE 0 END) two')
            ->addSelect('SUM (CASE WHEN (r.rating = 1) THEN 1 ELSE 0 END) one')
            ->addSelect('MAX (r.rating) best')
            ->addSelect('MIN (r.rating) worst')
            ->addSelect('count(DISTINCT r.user) userCount')
            ->leftJoin('r.product', 'product')
            ->where('r.isEnabled = 1')
            ->andWhere('r.lvl = 0')
            ->andWhere('r.rating > 0')
            ->andWhere('product.slug = :slug')
            ->setParameter('slug', method_exists($product, 'getSlug') ? $product->getSlug() : $product)
            ->getQuery()
            ->getOneOrNullResult();

        return $array;
    }

}
