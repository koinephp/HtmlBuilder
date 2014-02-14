<?php

namespace Koine\Html\Elements;

class RawHtmlTest extends \HtmlElementTestCase
{

    public function setUp()
    {
        $this->o = new RawHtml('test');
    }

    public function testItRendersTheEscapedText()
    {
        $text = 'This is a <b>text</b>';

        $this->o = new RawHtml($text);
        $this->assertEquals($text, (string) $this->o);
    }

}
