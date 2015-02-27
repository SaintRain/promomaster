<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью Property
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\PersistentCollection;
use Doctrine\Common\Collections\ArrayCollection;

class PropertyRepository extends EntityRepository {

    /**
     * Получает для характеристик все данные одним запросом
     * @param type $options
     * @return type
     */
    function getAll($options = array()) {
        $execute = true;

        $query = $this
                ->createQueryBuilder('p')
                ->select('sc,du_sc')
                ->addSelect('partial p.{id,editType,name,captionRu,descriptionRu}')
                ->addSelect('partial c.{id,captionRu,slug}')
                ->addSelect('partial dlist.{id,value,name,articleKey,shortDescription,indexPosition}')
                ->addSelect('partial du.{id,code,indexPosition,isEnabled,group,okeiCode}')
                ->leftJoin('p.categories', 'c')
                ->leftJoin('p.dataList', 'dlist')
                ->leftJoin('p.defaultUnit', 'du')
                ->leftJoin('p.settingsCategory', 'sc WITH sc.category = c.id')
                ->leftJoin('sc.defaultUnit', 'du_sc')
                ->orderBy('p.indexPosition', 'ASC');


        //условия выборки по активности
        if (isset($options['isEnabled'])) {
            $query->where('(CASE WHEN sc.id IS NOT NULL THEN sc.isEnabled ELSE p.isEnabled END) = :isEnabled')->setParameter(':isEnabled', $options['isEnabled']);
        }


        //условия выборки по использованию в фильтре
        if (isset($options['isUsedInFilter'])) {   
            $query->andWhere('(CASE WHEN sc.id IS NOT NULL THEN sc.isUsedInFilter ELSE p.isUsedInFilter END) = :isUsedInFilter')->setParameter('isUsedInFilter', $options['isUsedInFilter']);
        }
        
        
        //условия выборки по использованию для вывода в YML
        if (isset($options['isEnabledInYml'])) {   
            $query->andWhere('(CASE WHEN sc.id IS NOT NULL THEN sc.isEnabledInYml ELSE p.isEnabledInYml END) = :isEnabledInYml')->setParameter('isEnabledInYml', $options['isEnabledInYml']);
        }        

        //условия выборки для отображения в форме редактирования
        //выбираем характеристику, Если хоть один флаг выставлен
        if (isset($options['needForEditForm'])) {   
            $query->andWhere(
                     '((CASE WHEN sc.id IS NOT NULL THEN sc.isEnabled ELSE p.isEnabled END) = 1'
                    . ' OR (CASE WHEN sc.id IS NOT NULL THEN sc.isUsedInFilter ELSE p.isUsedInFilter END) = 1'
                    . ' OR (CASE WHEN sc.id IS NOT NULL THEN sc.isEnabledInYml ELSE p.isEnabledInYml END) = 1)'
                    );
        } 
        
        //условия выборки по категориям
        if (isset($options['categories'])) {
            if ($options['categories'] instanceof PersistentCollection || $options['categories'] instanceof ArrayCollection) {
                $categories = [];
                if ($options['categories']->count()) {
                    foreach ($options['categories'] as $cat) {
                        $categories[] = $cat->getId();
                    }
                } else {
                    $execute = false;   //если категория есть, но ничего не выбрано
                }
                $query->andWhere('c.id IN (:categories)')->setParameter(':categories', $categories);
            }
        }
        
        if ($execute) {
            $collectionAll = $query->getQuery()->execute();
            return $collectionAll;
        } else {
            return array();
        }
    }

    /**
     * Получает свайства для построения ститического фильтра
     *
     * @param array $names
     * @return array
     * @author Sergeev A.M.
     */
    public function getPropertyForBuildStaticFilter($names) {

        $query = $this->createQueryBuilder('property')
                ->select('property', 'dataList')
                //->addSelect('category', 'parent')
                ->leftJoin('property.dataList', 'dataList')
                ->where('property.isEnabled = 1')
//                ->leftJoin('property.categories', 'category')
//                ->leftJoin('category.parent', 'parent')
                ->andWhere('property.name IN (:names)')
                ->setParameter('names', $names);

        return $query->getQuery()->execute();
    }



    /*
      public function findStaticByCategoryIds($catIds, $names)
      {
      $qb = $this->createQueryBuilder('property');
      $qb->select('property', 'dataList', 'category')
      ->leftJoin('property.dataList', 'dataList')
      ->leftJoin('property.categories', 'category')
      ->where('property.isEnabled = 1')
      ->andWhere('property.name IN (:names)')
      ->andWhere('category.id IN (:catIds)')
      ->setParameter('names', $names)
      ->setParameter('catIds', $catIds);

      return  $qb->getQuery()->getResult();
      } */
}
