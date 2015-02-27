<?php
/**
 * Тест спецификаций класса Core\LogisticsBundle\Entity\SupplierPriceAnalysisSettings
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SupplierPriceAnalysisSettingsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\LogisticsBundle\Entity\SupplierPriceAnalysisSettings');
    }

    function it_should_get_id_field() {
        $this->getId()->shouldReturn(null);
    }

    /**
     * @param Core\LogisticsBundle\Entity\Supplier $supplier
     */
    function it_should_get_set_supplier_field($supplier) {
        $this->setSupplier($supplier)->shouldReturn($this);
        $this->getSupplier()->shouldReturn($supplier);
    }

    function it_should_get_set_columnCaption_field() {
        $this->setColumnCaption('test')->shouldReturn($this);
        $this->getColumnCaption()->shouldReturn('test');
    }

    function it_should_get_set_fieldNameFromProductEntity_field() {
        $this->setFieldNameFromProductEntity('test')->shouldReturn($this);
        $this->getFieldNameFromProductEntity()->shouldReturn('test');
    }


    function it_should_get_set_indexPosition_field() {
        $this->setIndexPosition(1)->shouldReturn($this);
        $this->getIndexPosition()->shouldReturn(1);
    }


}
