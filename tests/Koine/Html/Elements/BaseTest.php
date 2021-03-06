<?php

namespace Koine\Html\Elements;

class BaseTest extends \HtmlElementTestCase
{

    public function getClass()
    {
        return 'DummyElement';
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
        $string = '<dummyelement class="a b" data-remote="true" />';
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

    public function testItCanRenderNestedElements()
    {
        $parent = new Div;
        $parent->addClass('parent');

        $text = new Div;
        $text->addClass('text')->setText('<b>foo</b>');

        $raw = new Div;
        $raw->setHtml('<b>bar</b>');

        $emptyDiv = new Div;

        $parent->append(array($text, $raw, $emptyDiv));

        $html = implode('', array(
            '<div class="parent">',
            '<div class="text">', htmlspecialchars('<b>foo</b>'), '</div>',
            '<div><b>bar</b></div>',
            '<div></div>',
            '</div>',
        ));

        $this->assertEquals($html, (string) $parent);

    }

    public function testItCanSetAttributes()
    {
        $this->o->setAttributes(array(
            'class'       => 'foo',
            'data-remote' => true
        ));

        $attributes = $this->o->getAttributes();

        $expected = array(
            'class'       => array('foo'),
            'data-remote' => array(true),
        );

        $this->assertEquals($expected, $attributes->getAll());
    }

    public function testOptionsCanBeSetViaConstructor()
    {
        $element = new Div;
        $element->setText('ha');
        $elements   = array($element);
        $attributes = array('class' => 'foo');

        $object = new Div(array(
            'elements'   => $elements,
            'attributes' => $attributes
        ));

        $this->assertEquals($elements, $object->getElements());

        $this->assertEquals(
            array('class' => array('foo')),
            $object->getAttributes()->getAll()
        );
    }
}
