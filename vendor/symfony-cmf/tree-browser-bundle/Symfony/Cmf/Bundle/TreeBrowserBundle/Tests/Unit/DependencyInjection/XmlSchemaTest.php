<?php
/*
* This file is part of the Symfony CMF package.
*
* (c) 2011-2013 Symfony CMF
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Symfony\Cmf\Bundle\TreeBrowserBundle\Tests\Unit\DependencyInjection;

use Symfony\Cmf\Component\Testing\Unit\XmlSchemaTestCase;

class XmlSchemaTest extends XmlSchemaTestCase
{
    public function testSchema()
    {
        $xmlFiles = array_map(function ($file) {
            return __DIR__.'/../../Resources/Fixtures/config/'.$file;
        }, array(
            'config1.xml',
            'config2.xml',
        ));

        $this->assertSchemaAcceptsXml($xmlFiles, __DIR__.'/../../../Resources/config/schema/treebrowser-1.0.xsd');
    }
}
