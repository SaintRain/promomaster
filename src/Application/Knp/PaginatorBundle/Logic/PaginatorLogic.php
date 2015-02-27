<?php

/**
 * Сервис для работы с пагинатором
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Knp\PaginatorBundle\Logic;

use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PaginatorLogic
{

    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Метод для создания объекта пагинации (для бандла KnpPaginatorBundle) с подсчетом кол-ва записей
     *
     * @param type $queryBuilder
     * @param type $page
     * @param type $numItemsPerPage
     * @return \Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination
     */
    public function paginate($queryBuilder, $page, $numItemsPerPage, $options = array())
    {
        $em = $this->container->get('doctrine')->getManager();
        if (isset($options['isUseInConsole']) && $options['isUseInConsole'] = true) {
            $params = array();
        } else {
            $params = $this->container->get('request')->attributes->get('_route_params');
        }
        $paginator = new SlidingPagination($params);

        $paginator->setCustomParameters([]);

        // Проставляем данные в пагинатор
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemNumberPerPage($numItemsPerPage);
        $paginator->setPageRange($this->container->getParameter('knp_paginator.page_range'));
        $paginator->setFiltrationTemplate($this->container->getParameter('knp_paginator.template.filtration'));
        $paginator->setSortableTemplate($this->container->getParameter('knp_paginator.template.sortable'));
        $paginator->setTemplate($this->container->getParameter('knp_paginator.template.pagination'));
        $paginator->setPaginatorOptions($this->container->get('knp_paginator')->getPaginatorOptions());

        if (null === $queryBuilder) {
            return $paginator;
        }

        // Дополняем в запрос лимит
        $offset = abs($page - 1) * $numItemsPerPage;
        $queryBuilder->setMaxResults($numItemsPerPage);
        if ($offset > 0) {
            $queryBuilder->setFirstResult($offset);
        }

        $rootAlias = $queryBuilder->getRootAlias();
        $DQL = $queryBuilder->getDQL();
        $DQLforGetIdAndCount = preg_replace('/SELECT.+FROM/', 'SELECT DISTINCT ' . $rootAlias . '.id FROM', $DQL);
        $QUERYforGetIdAndCount = $queryBuilder->getQuery()->setDQL($DQLforGetIdAndCount);

        // Цепляем обходчика для подсчета общего кол-ва записей
        $QUERYforGetIdAndCount->setHint(
            \Doctrine\ORM\Query::HINT_CUSTOM_OUTPUT_WALKER, 'Application\\Knp\\PaginatorBundle\\Entity\\Walkers\\MysqlPaginationWalker'
        );
        $QUERYforGetIdAndCount->setHint('mysqlWalker.sqlCalcFoundRows', true);

        $arrayIds = $QUERYforGetIdAndCount->getArrayResult();
        $ids = array_map(function($val) {
            return $val['id'];
        }, $arrayIds);

        // Выбираем общее кол-во записей
        $sql = 'SELECT FOUND_ROWS() AS foundRows';
        $rsm = new \Doctrine\ORM\Query\ResultSetMapping();
        $rsm->addScalarResult('foundRows', 'foundRows');
        $results = $em->createNativeQuery($sql, $rsm)->getOneOrNullResult();
        $paginator->setTotalItemCount($results['foundRows']);

        $totalPage = ceil($results['foundRows'] / $numItemsPerPage);
        if ($totalPage > 0 && $page > 0 && $totalPage < $page) {
            throw new NotFoundHttpException('Page with number "' . $page . '" doesn\'t exist. Total page number is "' . $totalPage . '".');
        }

        // Изменяем запрос для выбора записей по ранее выбранным id
        $QUERYitems = $queryBuilder
//            ->resetDQLPart('where')
            ->andWhere($rootAlias . '.id IN (:ids)')
            ->setParameter('ids', $ids)
            ->setMaxResults(null)
            ->setFirstResult(null)
            ->getQuery();

        $items = $QUERYitems->getResult();
        $paginator->setItems($items);

        return $paginator;
    }

}
