<?php

/**
 * Репозиторий, содержащий общие запорсы для работы с сущностью FaqCategory
 * @author  Kaluzhny N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Core\CategoryBundle\Entity\Repository\CommonCategoryRepository;

class FaqCategoryRepository extends CommonCategoryRepository
{
    /**
     * Поиск категорий и статей для заданного узла
     * @param type $rootId
     * @param type $isActive
     * @return type
     */
    public function findWithArticles($rootId, $isActive = true, $isPredifinedAnswer = false)
    {
        $qb = $this->createQueryBuilder('c');
        $qb->select('c, a')
            ->leftJoin('c.articles', 'a')
            ->where('a.isActive = :isActive')
            ->andWhere('c.isEnabled = :isActive')
            ->andWhere('c.root = :rootId')
            ->andWhere('a.isOnMain = :isActive')
            ->andWhere('a.isPredifinedAnswer = :isPredifinedAnswer')
            ->orderBy('c.root, c.lft', 'ASC')
        ;

        $qb
            ->setParameter('isActive', $isActive)
            ->setParameter('rootId', $rootId)
            ->setParameter('isPredifinedAnswer', $isPredifinedAnswer)
        ;

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    /**
     * Поиск категорий и статей для заданного узла (один уровень)
     * @param type $rootId
     * @param type $isActive
     * @return type
     */
    public function findOneLevel($rootName, $isActive = true, $isPredifinedAnswer = false)
    {
        $qb = $this->createQueryBuilder('root');
        $qb->select('partial root.{id}, partial c.{id, slug, captionRu}, partial a.{id, slug, captionRu, bodyRu}')
            ->leftJoin('root.childrens', 'c')
            ->leftJoin('c.articles', 'a')
            ->where('a.isActive = :isActive')
            ->andWhere('c.isEnabled = :isActive')
            ->andWhere('root.name = :rootName')
            ->andWhere('a.isOnMain = :isActive')
            ->andWhere('a.isPredifinedAnswer = :isPredifinedAnswer')
            ->orderBy('c.root, c.lft', 'ASC')
        ;

        $qb
            ->setParameter('isActive', $isActive)
            ->setParameter('rootName', $rootName)
            ->setParameter('isPredifinedAnswer', $isPredifinedAnswer)
        ;

        $result = $qb->getQuery()->getOneOrNullResult();

        return $result;
    }

    public function search($rootId, $searchString, $isActive = true, $isPredifinedAnswer = false)
    {
        $qb = $this->createQueryBuilder('c');
        $qb->select('partial c.{id, slug, captionRu}, partial a.{id, slug, captionRu, bodyRu}')
            ->join('c.articles', 'a')
            ->where('a.isActive = :isActive')
            ->andWhere('c.isEnabled = :isActive')
            ->andWhere('c.root = :rootId')
            //->andWhere('a.bodyRu LIKE :searchString' )
            ->andWhere($qb->expr()->orx(
                    $qb->expr()->like('a.bodyRu', ':searchString'),
                    $qb->expr()->like('a.captionRu', ':searchString')
                    ))
            ->andWhere('a.isPredifinedAnswer = :isPredifinedAnswer')
            ->orderBy('c.root, c.lft', 'ASC')
        ;

        $qb->setParameter('isActive', $isActive)
            ->setParameter('rootId', $rootId)
            ->setParameter('searchString', '%' . $searchString . '%')
            ->setParameter('isPredifinedAnswer', $isPredifinedAnswer)
        ;

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    /**
     * Поиск статей для заданной категории
     * @param type $slug
     * @param type $isActive
     * @return type
     */
    public function findOneWithArticles($slug, $isActive = true, $isPredifinedAnswer = false)
    {
        $qb = $this->createQueryBuilder('c');
        $qb->select('partial c.{id, slug, captionRu}, partial a.{id, slug, captionRu}')
            ->leftJoin('c.articles', 'a')
            ->where('c.slug = :slug')
            ->andWhere('a.isActive = :isActive')
            ->andWhere('c.isEnabled = :isActive')
            ->andWhere('a.isPredifinedAnswer = :isPredifinedAnswer')
        ;

        $qb->setParameter('slug', $slug)
            ->setParameter('isActive', $isActive)
            ->setParameter('isPredifinedAnswer', $isPredifinedAnswer)
        ;

        $result = $qb->getQuery()->getOneOrNullResult();

        return $result;
    }

    /**
    * Получение всего дерева категорий
    */
    public function getFullTree($enabled = true) {
            $qb = $this->createQueryBuilder('c');
            $qb->select('c')
                ->andWhere('c.isEnabled = :enabled')
                ->addOrderBy('c.root', 'ASC')
                ->addOrderBy('c.name', 'ASC')
                ->addOrderBy('c.lft', 'ASC')
            ;

            $qb->setParameter('enabled', $enabled);

            // Строим дерево категорий
            $tree = $this->buildTree(
                    $qb->getQuery()->getArrayResult(),
                    array(
                            'decorate' => false
                    )
            );

            return $tree;
    }

    /**
     * Получает данные для построения sitemap
     *
     * @return array
     * @author Sergeev A.M.
     */
    public function findForPopulateSitemap()
    {
        $slugs = $this->createQueryBuilder('c')
            ->select('c.slug slug')
            ->join('c.articles', 'a')
            ->where('a.isActive = 1')
            ->andWhere('c.lvl > 1')
            ->groupBy('c.id')
            ->getQuery()
            ->getResult();
        return $slugs;
    }

    /**
     * Получить частично одну категорию
     * @param string $slug
     * @return type
     */
    public function findOnePartial($slug)
    {
        $qb = $this->createQueryBuilder('c');
        $qb->select('partial c.{id, captionRu, slug}')
            ->where('c.slug = :slug')
            ->setParameter('slug', $slug)
        ;

        $result = $qb->getQuery()->getOneOrNullResult();
        
        return $result;
    }
}
