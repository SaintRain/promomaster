<?php

/**
 * Репозиторий, для работы с сущностью CommonFile
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class CommonFileRepository extends EntityRepository {

    /**
     * Удаление из главной таблицы файлов CommonFiles
     *
     * @param array|integer $ids - ид записей которые надо удалить
     * @return integer - кол-во удаленных файлов
     */
    public function delete($ids) {
        if (!is_array($ids)) {
            $ids = array($ids);
        }
        $count = $this
            ->createQueryBuilder('file')
            ->delete('CoreFileBundle:CommonFile', 'file')
            ->where('file.id IN (:ids)')
            ->setParameter('ids', $ids)
            ->getQuery()
            ->execute();
        return $count;
    }

}
