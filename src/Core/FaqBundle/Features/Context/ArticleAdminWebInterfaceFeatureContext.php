<?php

/**
 * Класс отвечающий за контекст админской части (статьи)
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FaqBundle\Features\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Core\CommonBundle\Features\Context\CommonFeatureContext;
use Doctrine\ORM\EntityManagerInterface;
use Core\FaqBundle\Entity\Article;
use Core\CategoryBundle\Entity\FaqCategory;


class ArticleAdminWebInterfaceFeatureContext extends CommonFeatureContext implements SnippetAcceptingContext
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Given there is no article with name :arg1
     */
    public function thereIsNoArticleWithName($arg1)
    {
        $article = $this->em->getRepository('CoreFaqBundle:Article')->findOneBy(['slug' => $arg1]);        
        if ($article) {
            $this->em->remove($article);
            $this->em->flush();
        }

    }

    /**
     * @Given there is an Article with:
     */
    public function thereIsAnArticleWith(TableNode $table)
    {
        $fields = [];
        foreach ($table as $row) {
            $fields[$row['field']] = $row['value'];
        }
        $article = $this->em->getRepository('CoreFaqBundle:Article')->findOneBy(['slug' => $fields['slug']]);
        if (!$article) {
            $article = new Article();
            $category = $this->em->getRepository('CoreCategoryBundle:FaqCategory')->findOneBy(['name' => $fields['category']]);
            if (!$category) {
                $category = new FaqCategory();
                $category->setCaptionRu(strtoupper($fields['category']))
                        ->setName($fields['category'])
                ;
                $this->em->persist($category);
                $this->em->flush();
            }

            $article->setCaptionRu($fields['captionRu'])
                    ->setCategory($category)
                    ->setIsActive($fields['isActive'])
                    ->setIsOnMain($fields['isOnMain'])
                    ->setIsPredifinedAnswer($fields['isPredifinedAnswer'])
                    ->setBodyRu($fields['bodyRu'])
                    ->setSlug($fields['slug'])
                    ->setTitleRu($fields['titleRu'])
                    ->setMetakeywordsRu($fields['metakeywordsRu'])
                    ->setMetadescriptionRu($fields['metadescriptionRu'])
            ;

            $this->em->persist($article);
            $this->em->flush();
        }
    }

    /**
     * @Given I am on article with slug :arg1 :link page
     */
    public function iAmOnArticleWithSlugEditPage($arg1, $link)
    {
        $article = $this->em->getRepository('CoreFaqBundle:Article')->findOneBy(['slug' => $arg1]);
        if (!$article) {
            throw new \Exeception(sprintf('Article with slug - "" not found', $arg1));
        }
        $this->visit(sprintf($link, $article->getId()));
    }
}