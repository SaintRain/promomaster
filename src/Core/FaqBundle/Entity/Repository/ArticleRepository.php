<?php

namespace Core\FaqBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Cache\ApcCache;

class ArticleRepository extends EntityRepository
{
    /**
     * Получить статью с категорией
     * @param type $slug
     * @param type $isActive
     * @return type
     */
    public function findWithCategory($slug, $isActive = true, $isPredifinedAnswer = false)
    {
        $qb = $this->createQueryBuilder('a');
        $qb->select('partial a.{id, slug, captionRu, bodyRu}, partial c.{id, slug, captionRu}')
           ->join('a.category', 'c')
           ->where('a.slug = :slug')
           ->andWhere('c.isEnabled = :isActive')
           ->andWhere('a.isActive = :isActive')
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
     * Поиск преодпределенных ответов для категории
     * @param integer $catId
     * @param boolean $active
     * @return type
     */
    public function findPredifinedArticles($catId, $active = true, $isPredifinedAnswer = true)
    {
        $qb = $this->createQueryBuilder('a');
        $qb->select('a, c')
            ->join('a.category', 'c')
            ->where('c.id = :catId')
            ->andWhere('a.isActive = :active')
            ->andWhere('a.isPredifinedAnswer = :isPredifinedAnswer')
        ;

        $qb->setParameter('catId', $catId)
            ->setParameter('active', $active)
            ->setParameter('isPredifinedAnswer', $isPredifinedAnswer)
        ;

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    /**
     * Поиск статей по слагам
     * @param array $slugs - масссив слагов статей
     * @param boolean $isActive - активность
     * @return type
     */
    public function findBySlug($slugs, $isActive = true)
    {
        $qb = $this->createQueryBuilder('a');
        if (count($slugs) > 1) {
            $query = $qb->expr()->in('a.slug', ':slugs');
        } else {
            $slugs = reset($slugs);
            $query = 'a.slug = :slugs';
        }
        $qb->select('a, c')
            ->join('a.category', 'c')
            ->where($query)
            ->andWhere('a.isActive = :isActive')
        ;

        $qb->setParameter('slugs', $slugs)
           ->setParameter('isActive', $isActive)
        ;
        $result = $qb->getQuery()->getResult();

        return $result;
    }

    /**
     * Получает данные для построения sitemap
     *
     * @return array
     * @author Sergeev A.M.
     */
    public function findForPopulateSitemap()
    {
        $slugs = $this->createQueryBuilder('a')
            ->select('a.slug articleSlug', 'c.slug categorySlug')
            ->join('a.category', 'c')
            ->where('a.isActive = 1')
            ->andWhere('c.parent > 0')
            ->getQuery()
            ->getResult();
        return $slugs;
    }

    /**
     * Поиск статей для категории
     * @param type $catSlug
     * @return array
     */
    public function findByCategory($catSlug)
    {
        $qb = $this->createQueryBuilder('a');
        $qb->select('a')
            ->leftJoin('a.category', 'c')
            ->where('c.slug = :catSlug')
        ;

        $qb->setParameter('catSlug', $catSlug);

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function findForFragments($slugs, $isActive = true)
    {
        $cacheDriver = new ApcCache();
        if ($cacheDriver->contains('fragments_articles')) {
            return $cacheDriver->fetch('fragments_articles');
        }
        $qb = $this->createQueryBuilder('a');
        $query = $qb->expr()->in('a.slug', ':slugs');
        $qb->select('partial a.{id,slug, captionRu}, partial c.{id, slug}')
            ->join('a.category', 'c')
            ->where($query)
            ->andWhere('a.isActive = :isActive')
        ;

        $qb->setParameter('slugs', $slugs)
           ->setParameter('isActive', $isActive)
        ;
        $result = $qb->getQuery()->getResult();
        $cacheDriver->save('fragments_articles', $result, 6);

        return $result;
    }
}
