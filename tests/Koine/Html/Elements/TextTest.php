<?php

namespace Koine\Html\Elements;

class TextTest extends \HtmlElementTestCase
{

    public function setUp()
    {
        $this->o = new Text('test');
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
