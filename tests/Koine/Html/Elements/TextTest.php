<?php

namespace Koine\Html\Elements;

class TextTest extends \PHPUnit_Framework_TestCase
{
    protected $_o;

    public function setUp()
    {
        $this->o = new Text('test');
    }

    public function testItIsAnHtmlElement()
    {
        $this->assertInstanceOf('\Koine\Html\Element', $this->o);
    }

    public function testItRendersTheEscapedText()
    {
        $text = 'This is a <b>text</b>';
        $expected = htmlspecialchars($text);

        $this->o = new Text($text);
        $this->assertEquals($expected, $this->o->render());
        $this->assertEquals($expected, (string) $this->o);
    }
}
