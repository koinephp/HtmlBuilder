<?php

namespace Koine\Html;

class AttributeSetTest extends \PHPUnit_Framework_TestCase
{
    protected $o;

    public function setUp()
    {
        $this->o = new AttributeSet();
    }

    public function testItCanSetAndGetAnAttribute()
    {
        $this->assertNull($this->o->get('class'));
        $this->assertEquals('abc', $this->o->get('class', 'abc'));
        $this->assertEquals('foo', $this->o->set('class', 'foo')->get('class'));
    }

    public function testItCanRenderAttributes()
    {
        $json = '{"a":"b"}';

        $this->o
            ->set('id', 'foo')
            ->set('data-true', 'true')
            ->set('data-false', 'false')
            ->set('data-json', $json)
            ->set('data-remote');

        $expected = implode(' ', array(
            'id="foo"',
            'data-true="true"',
            'data-false="false"',
            'data-json="' . $this->o->escape($json) . '"',
            'data-remote',
        ));

        $this->assertEquals($expected, (string) $this->o);
    }

    public function valuesToEscape()
    {
        return array(
            array('a"', "a&quot;"),
            array("o'reily", "o'reily")
        );
    }

    /**
     * @dataProvider valuesToEscape
     */
    public function testItcanEscapeValues($raw, $escaped)
    {
        $this->assertEquals($escaped, $this->o->escape($raw));
    }

    public function testItCanAddAttributes()
    {
        $this->o->add('class', 'a')->add('class', 'b');
        $this->assertEquals('a b', $this->o->get('class'));
    }

    public function testItCanCheckIfAttributeIsSet()
    {
        $this->assertFalse($this->o->attributeIsSet('foo'));
        $this->o->set('foo', 'bar');
        $this->assertTrue($this->o->attributeIsSet('foo'));
    }

    public function testItCanAddClass()
    {
        $this->assertFalse($this->o->hasClass('foo'));
        $this->o->addClass('foo');
        $this->assertTrue($this->o->hasClass('foo'));
    }

    public function testItCanTestIfHasClass()
    {
        $this->o->addClass('foo')->addClass('foo')->removeClass('foo');
        $this->assertFalse($this->o->hasClass('foo'));
    }

    public function testItCanRemoveAttribue()
    {
        $this->o->set('foo')->remove('foo');
        $this->assertFalse($this->o->attributeIsSet('foo'));
    }

}
