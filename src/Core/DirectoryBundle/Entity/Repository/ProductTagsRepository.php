<?php

/**
 * Репозиторий для работы с сущностью ProductTags
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class ProductTagsRepository extends EntityRepository
{

    /**
     * Ищет для автозаполнения подъодящие варианты по введённой фразе
     * @param type $phrase
     * @return type
     */
    public function getTagsForAutocomplete($phrase, $maxResults = 10)
    {        
        $res = $this->_em->createQueryBuilder()
                ->from($this->_entityName, 't')
                ->Select('t.captionRu')
                ->where('t.captionRu LIKE :phrase')
                ->groupBy('t.captionRu')
                ->setMaxResults($maxResults)
                ->setParameters(['phrase' =>  $phrase.'%'])
                ->getQuery()->execute();
     
        return $res;
    }

}
