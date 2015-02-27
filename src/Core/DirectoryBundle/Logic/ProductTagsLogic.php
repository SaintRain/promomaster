<?php

/**
 * Бизнесс логика для редактирование тегов продуктов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Logic;

use Doctrine\Common\Collections\ArrayCollection;

class ProductTagsLogic
{

    private $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function getAutocomplete($data)
    {

        $temp = $this->em->getRepository('CoreDirectoryBundle:ProductTags')->getTagsForAutocomplete($data['term'], 10);
        $res = [];
        foreach ($temp AS $t) {
            $r = ['id' => $t['captionRu'], 'value' => $t['captionRu'], 'label' => $t['captionRu']];
            $res[] = $r;
        }
        return $res;
    }

}
