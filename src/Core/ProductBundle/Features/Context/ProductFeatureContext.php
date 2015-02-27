<?php

namespace Core\ProductBundle\Features\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Testwork\Hook\Scope\AfterSuiteScope;
use Core\ProductBundle\Entity\Product;
use Core\ProductBundle\Entity\DigitalProduct;
use Core\ProductBundle\Entity\CompositeProduct;
use Doctrine\Common\Collections\ArrayCollection;
use Core\UnionBundle\Entity\ProductCompositionsUnion;
use Behat\Behat\Context\Context;
/**
 * Behat context class.
 */
class ProductFeatureContext implements SnippetAcceptingContext {

    private $em;
    private $validator;
    private $product;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context object.
     * You can also pass arbitrary arguments to the context constructor through behat.yml.
     */
    public function __construct($em, $validator) {
        $this->em = $em;
        $this->validator = $validator;
    }

    /**
     * Если нужно что-то просетапить до выполнения 
     * @BeforeSuite
     */
    public static function prepare(BeforeSuiteScope $scope) {
        
    }

    function setDataToProduct($data) {
        $manufactures = new ArrayCollection();
        $categories = new ArrayCollection();

        $unitOfMeasure = $this->em->getReference('CoreDirectoryBundle:UnitOfMeasure', $data['unitOfMeasureId']);

        $manufactureMain = $this->em->getReference('CoreManufacturerBundle:Manufacturer', $data['manufactureMainId']);
        $mans = $this->em->getRepository('CoreManufacturerBundle:Manufacturer')->findById(explode(',', $data['manufactureIds']));

        $categoryMain = $this->em->getReference('CoreCategoryBundle:ProductCategory', $data['categoryMainId']);
        $cats = $this->em->getRepository('CoreCategoryBundle:ProductCategory')->findById(explode(',', $data['categoryIds']));

        foreach ($mans as $m) {
            $manufactures->add($m);
        }
        foreach ($cats as $c) {
            $categories->add($c);
        }
        return [$categories, $categoryMain, $manufactureMain, $manufactures, $unitOfMeasure];
    }

    /**
     * @Given I create a new product object with data:
     */
    public function iCreateANewProductObjectWithData(TableNode $table) {
        $this->product = new Product();
        $data = $table->getHash()[0];

        list($categories, $categoryMain, $manufactureMain, $manufactures, $unitOfMeasure) = $this->setDataToProduct($data);

        $this->product
                ->setCaptionRu($data['captionRu'])
                ->setArticle($data['article'])
                ->setSku($data['sku'])
                ->setPrice($data['price'])
                ->setManufacturerMain($manufactureMain)
                ->setCategoryMain($categoryMain)
                ->setManufacturers($manufactures)
                ->setCategories($categories)
                ->setUnitOfMeasure($unitOfMeasure)
                ->setLengthOfBox($data['lengthOfBox'])
                ->setWidthOfBox($data['widthOfBox'])
                ->setHeightOfBox($data['heightOfBox'])
                ->setGrossWeight($data['grossWeight'])
        ;
    }

    /**
     * @Then Save to BD and check product creation
     */
    public function saveToBdAndCheckProductCreation() {
        $errors = $this->validator->validate($this->product);
        if (!count($errors)) {
            $this->em->persist($this->product);
            $this->em->flush();
        } else {
            throw new \RuntimeException(
            $errors
            );
        }
    }

    /**
     * @Given I create a new DigitalProduct object with data:
     */
    public function iCreateANewDigitalproductObjectWithData(TableNode $table) {
        $this->product = new DigitalProduct();
        $data = $table->getHash()[0];

        list($categories, $categoryMain, $manufactureMain, $manufactures, $unitOfMeasure) = $this->setDataToProduct($data);

        $this->product
                ->setCaptionRu($data['captionRu'])
                ->setArticle($data['article'])
                ->setSku($data['sku'])
                ->setPrice($data['price'])
                ->setManufacturerMain($manufactureMain)
                ->setCategoryMain($categoryMain)
                ->setManufacturers($manufactures)
                ->setCategories($categories)
                ->setUnitOfMeasure($unitOfMeasure)
        ;
    }

    /**
     * @Given I create a new ServiceProduct object with data:
     */
    public function iCreateANewServiceproductObjectWithData(TableNode $table) {
        $this->product = new DigitalProduct();
        $data = $table->getHash()[0];

        list($categories, $categoryMain, $manufactureMain, $manufactures, $unitOfMeasure) = $this->setDataToProduct($data);

        $this->product
                ->setCaptionRu($data['captionRu'])
                ->setArticle($data['article'])
                ->setSku($data['sku'])
                ->setPrice($data['price'])
                ->setManufacturerMain($manufactureMain)
                ->setCategoryMain($categoryMain)
                ->setManufacturers($manufactures)
                ->setCategories($categories)
                ->setUnitOfMeasure($unitOfMeasure)
        ;
    }

    /**
     * @Given I create a new CompositeProduct object with data:
     */
    public function iCreateANewCompositeproductObjectWithData(TableNode $table) {
        $this->product = new CompositeProduct();
        $data = $table->getHash()[0];

        list($categories, $categoryMain, $manufactureMain, $manufactures, $unitOfMeasure) = $this->setDataToProduct($data);

        $attach = $mans = $this->em->getRepository('CoreProductBundle:Product')->findOneById($data['attachProductId']);
        $comp = new ProductCompositionsUnion();
        $comp->setMappedObject($this->product)
                ->setTargetObject($attach);

        $this->product
                ->setCaptionRu($data['captionRu'])
                ->setArticle($data['article'])
                ->setSku($data['sku'])
                ->setPrice($data['price'])
                ->setManufacturerMain($manufactureMain)
                ->setCategoryMain($categoryMain)
                ->setManufacturers($manufactures)
                ->setCategories($categories)
                ->setUnitOfMeasure($unitOfMeasure)
                ->addCompositions($comp)
                ->setLengthOfBox($data['lengthOfBox'])
                ->setWidthOfBox($data['widthOfBox'])
                ->setHeightOfBox($data['heightOfBox'])
                ->setGrossWeight($data['grossWeight'])
        ;
    }

    public function __destruct() {
        if ($this->product) {
            $this->em->remove($this->product);
            $this->em->flush();
            echo "BD is cleaned\n";
        }
    }

}
