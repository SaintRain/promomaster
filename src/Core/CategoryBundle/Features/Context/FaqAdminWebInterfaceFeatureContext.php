<?php

/**
 * Админский трейт категории (FAQ)
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Features\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Core\CategoryBundle\Entity\FaqCategory;

trait FaqAdminWebInterfaceFeatureContext
{   
    /**
     * @Given there is no faq category with name :arg1
     */
    public function thereIsNoFaqCategoryWithName($arg1)
    {
        $result = $this->em->getRepository('CoreCategoryBundle:FaqCategory')->findOneBy(['name' => $arg1]);
        if ($result){
            $this->em->remove($result);
            $this->em->flush();
        }
    }

    /**
     * @Given there is an faq category:
     */
    public function thereIsAnFaqCategory(TableNode $table)
    {
        $fields = [];
        foreach ($table as $row) {
            $fields[$row['field']] = $row['value'];
        }

        $category = $this->em
                        ->getRepository('CoreCategoryBundle:FaqCategory')
                        ->findOneBy(['name' => $fields['name']])
        ;
        if (!$category) {

            $category = new FaqCategory();
            $category->setCaptionRu($fields['captionRu'])
                ->setName($fields['name'])
                ->setSlug($fields['slug'])
                ->setTitleRu($fields['titleRu'])
                ->setMetadescriptionRu($fields['metadescriptionRu'])
                ->setMetakeywordsRu($fields['metakeywordsRu'])
            ;
            
            $this->em->persist($category);
            $this->em->flush();
        }

    }
}