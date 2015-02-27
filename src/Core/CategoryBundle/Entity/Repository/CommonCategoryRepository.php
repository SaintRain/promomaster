<?php

/**
 * Репозиторий, содержащий общие запросы для категорий
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Gedmo\Tree\Entity\Repository\NestedTreeRepository;

class CommonCategoryRepository extends NestedTreeRepository
{

    /**
     * Берёт все категории по INDEXBY id
     * @return type
     */
    function geAllByIndexId()
    {
        $res = $this->_em->createQueryBuilder()
                        ->select('c')
                        ->from($this->getClassName(), 'c', 'c.id')
                        ->getQuery()->execute();
        return $res;
    }



    /**
     * Формирование дерева категорий
     * @param type $options
     * @return type
     */
    function geTreeQuery($options = array())
    {
        $query = $this
                ->createQueryBuilder('node')
                ->orderBy('node.root, node.lft', 'ASC');

        //условия выборки
        if (isset($options['where']['isEnabled'])) {
            $query->where('node.isEnabled = :isEnabled');
            $query->setParameter(':isEnabled', $options['where']['isEnabled']);
        }

        return $query;
    }

    /**
     * Формирование дерева категорий
     * @param type $options
     * @return type
     */
    function getBuildTree($options = array())
    {

        $query = $this->geTreeQuery($options);
        //параметры формирования дерева
        if (isset($options['tree'])) {
            $treeOptions = $options['tree'];
        } else {
            $treeOptions = array();
        }

        $tree = $this->buildTree($query->getQuery()->getArrayResult(), $treeOptions);

        return $tree;
    }

}
