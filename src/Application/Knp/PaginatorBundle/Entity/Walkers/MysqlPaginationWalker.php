<?php

/**
 * Обходчик для перестройки SQL запроса для выбора кол-ва записей
 * http://habrahabr.ru/post/127270/
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Knp\PaginatorBundle\Entity\Walkers;

use Doctrine\ORM\Query\SqlWalker;

class MysqlPaginationWalker extends SqlWalker
{

    /**
     * Дополняем SELECT в SQL запросе
     *
     * @param $selectClause
     * @return string
     */
    public function walkSelectClause($selectClause)
    {
        $sql = parent::walkSelectClause($selectClause);

        // Для подсчета кол-ва записей добавляем в SELECT параметр SQL_CALC_FOUND_ROWS
        if ($this->getQuery()->getHint('mysqlWalker.sqlCalcFoundRows') === true) {
            if ($selectClause->isDistinct) {
                $sql = str_replace('SELECT DISTINCT', 'SELECT DISTINCT SQL_CALC_FOUND_ROWS', $sql);
            } else {
                $sql = str_replace('SELECT', 'SELECT SQL_CALC_FOUND_ROWS', $sql);
            }
        }

        return $sql;
    }

}
