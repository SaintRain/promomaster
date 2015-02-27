<?php

namespace Ladybug\Tests\Type;

use Ladybug\Type;

class StringTest extends \PHPUnit_Framework_TestCase
{

    /** @var Type\String $type */
    protected $type;

    public function setUp()
    {
        $this->type = new Type\String();
    }

    public function testLoaderForValidValues()
    {
        $var = 'tést';
        $encoding = 'UTF-8';
        $length = 4;

        $this->type->load($var);
        $this->assertEquals($var, $this->type->getValue());
        $this->assertEquals($encoding, $this->type->getEncoding());
        $this->assertEquals($length, $this->type->getLength());
        $this->assertEquals(1, $this->type->getLevel());
    }

    public function testLoaderForOtherType()
    {
        $this->setExpectedException('Ladybug\Type\Exception\InvalidVariableTypeException');

        $var = 1;

        $this->type->load($var);
    }

}
