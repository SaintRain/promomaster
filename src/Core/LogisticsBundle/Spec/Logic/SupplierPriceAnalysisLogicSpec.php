<?php

namespace Core\LogisticsBundle\Spec\Logic;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Doctrine\ORM\EntityManager;
use Liuggio\ExcelBundle\Factory;
use Core\FileBundle\Logic\FileLogic;
use Core\ManufacturerBundle\Entity\PriceAnalysis;

class SupplierPriceAnalysisLogicSpec extends ObjectBehavior
{

    function let(
    EntityManager $manager, Factory $phpexcel, FileLogic $fileLogic
    )
    {
        $this->beConstructedWith($manager, $phpexcel, $fileLogic);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Core\LogisticsBundle\Logic\SupplierPriceAnalysisLogic');
        $this->em->shouldHaveType('Doctrine\ORM\EntityManager');
        $this->phpexcel->shouldHaveType('Liuggio\ExcelBundle\Factory');
        $this->fileLogic->shouldHaveType('Core\FileBundle\Logic\FileLogic');
    }

    /**
     * @param Core\LogisticsBundle\Entity\SupplierPriceAnalysis $priceAnalysis
     */
    function it_should_set_price($priceAnalysis)
    {
        $this->setPriceAnalysis($priceAnalysis)->shouldReturn($this);
    }

    /**
     * @param Core\LogisticsBundle\Entity\SupplierPriceAnalysis$priceAnalysis
     */
    function it_should_read_price($priceAnalysis)
    {
        $this->setPriceAnalysis($priceAnalysis)->readPrice()->shouldReturn(false);
    }

    /**
     * @param Core\LogisticsBundle\Entity\SupplierPriceAnalysis $priceAnalysis
     */
    function it_should_have_priceHike_method($priceAnalysis)
    {
        $this->setPriceAnalysis($priceAnalysis)->analysisPriceHike()->shouldBeArray();
    }

    /**
     * @param Core\LogisticsBundle\Entity\SupplierPriceAnalysis $priceAnalysis
     */
    function it_should_have_analysisOutOfStock_method($priceAnalysis)
    {
        $this->setPriceAnalysis($priceAnalysis)->analysisOutOfStock()->shouldBeArray();
    }

    /**
     * @param Core\LogisticsBundle\Entity\SupplierPriceAnalysis $priceAnalysis
     */
    function it_should_have_analysisMRC_method($priceAnalysis)
    {
        $this->setPriceAnalysis($priceAnalysis)->analysisMRC()->shouldBeArray();
    }


    function it_checkComputeByFormula()
    {
        $row=[0=>10,1=>12, 2=>10];
        $formula='A+B+C-A';
        $this->computeByFormula($formula, $row)->shouldReturn(22);
    }

    /**
     *  @param Core\LogisticsBundle\Entity\SupplierPriceAnalysis $priceAnalysis
     */
    function it_should_have_getSummaryInfo_method($priceAnalysis)
    {
        $this->setPriceAnalysis($priceAnalysis);
        $this->getSummaryInfo([],[],[])->shouldBeArray();
    }

    /**
     * @param Core\LogisticsBundle\Entity\SupplierPriceAnalysis $priceAnalysis
     */
    function it_should_have_analysisBadRecords_method($priceAnalysis)
    {
        $this->setPriceAnalysis($priceAnalysis)->analysisBadRecords()->shouldBeBool();
    }

}