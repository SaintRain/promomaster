<?php

/**
 * Админский трейт категории (Трабл тикеты)
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Features\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Core\CategoryBundle\Entity\TroubleTicketCategory;

trait TroubleTicketAdminWebIntefaceFeatureContext
{
    /**
     * @Given there is no trouble ticket category with name :arg1
     */
    public function thereIsNoTroubleTicketCategoryWithName($arg1)
    {
        $result = $this->em->getRepository('CoreCategoryBundle:TroubleTicketCategory')->findOneBy(['name' => $arg1]);
        if ($result){
            $this->em->remove($result);
            $this->em->flush();
        }
    }

    /**
     * @Given there is a trouble ticket category:
     */
    public function thereIsATroubleTicketCategory(TableNode $table)
    {
        $fields = [];
        foreach ($table as $row) {
            $fields[$row['field']] = $row['value'];
        }

        $category = $this->em
                        ->getRepository('CoreCategoryBundle:TroubleTicketCategory')
                        ->findOneBy(['name' => $fields['name']])
        ;
        if (!$category) {
            $category = new TroubleTicketCategory();
            $category->setCaptionRu($fields['captionRu'])
                ->setName($fields['name'])
                ->setDescriptionRu($fields['descriptionRu'])
            ;
            $this->em->persist($category);
            $this->em->flush();
        }
    }
}