<?php

namespace Koine\Html;

use Koine\Html\Elements\Div;

class ElementTest extends \PHPUnit_Framework_TestCase
{

    protected $o;

    public function setUp()
    {
        $this->o = new \DummyElement;
    }

    public function testItHasAnAttributeSet()
    {
        $this->assertInstanceOf(
            '\Koine\Html\AttributeSet', $this->o->getAttributes()
        );
    }

    public function testItCanAddAndGetClasses()
    {
        $object = $this->o->addClass('a')
            ->addClass('b')
            ->removeClass('b')
            ->addClass('c');

        $this->assertEquals('a c', $object->getAttributes()->get('class'));
    }

    public function testItCanRenderSelfClosingElement()
    {
        $element = $this->o->addClass('a')->addClass('b')->set('data-remote', 'true');
        $string = '<dummy class="a b" data-remote="true" />';
        $this->assertEquals($string, (string) $element);
    }

    public function testItCanRender()
    {
        $this->o = new Div;

        $this->o->addClass('test');
        $this->assertEquals(
            '<div class="test"></div>',
            (string) $this->o->render()
        );
    }

}
