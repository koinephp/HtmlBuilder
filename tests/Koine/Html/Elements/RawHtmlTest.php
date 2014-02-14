<?php

namespace Koine\Html\Elements;

class RawHtmlTest extends \PHPUnit_Framework_TestCase
{
    protected $_o;

    public function setUp()
    {
        $this->o = new RawHtml('test');
    }

    public function testItIsAnHtmlElement()
    {
        $this->assertInstanceOf('\Koine\Html\Elements\Base', $this->o);
    }

    public function testItRendersTheEscapedText()
    {
        $text = 'This is a <b>text</b>';

        $this->o = new RawHtml($text);
        $this->assertEquals($text, (string) $this->o);
    }
}
