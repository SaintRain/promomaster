<?php
/**
 * Тест спецификаций класса Core\LogisticsBundle\Entity\SupplierPriceAnalysis
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SupplierPriceAnalysisSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\LogisticsBundle\Entity\SupplierPriceAnalysis');
    }

    function it_should_get_id_field()
    {
        $this->getId()
            ->shouldReturn(null);
    }

    /**
     * @param Core\FileBundle\Entity\DocumentFile $documentFile
     */
    function it_should_set_and_get_priceFile_field($documentFile)
    {
        $this->setPriceFile([$documentFile])
            ->shouldReturn($this);
        $this->getPriceFile()->shouldBeArray();
    }

    /**
     * @param Core\FileBundle\Entity\DocumentFile $documentFile
     */
    function it_should_add_and_remove_priceFile($documentFile)
    {
        $this->addPriceFile($documentFile)
            ->shouldReturn($this);
        $this->removePriceFile($documentFile)->shouldReturn($this);
    }

    /**
     * @param \DateTime $dateTime
     */
    function is_should_set_and_get_createdDateTime_field($dateTime)
    {
        $this->setCreatedDateTime($dateTime)->shouldReturn($this);
        $this->getCreatedDateTime()->shouldReturn(null);
    }

    /**
     * @param Core\LogisticsBundle\Entity\Supplier $supplier
     */
    function it_should_set_and_get_supplier($supplier)
    {
        $this->setSupplier($supplier)
            ->shouldReturn($this);
        $this->getSupplier()->shouldReturn($supplier);
    }

}
