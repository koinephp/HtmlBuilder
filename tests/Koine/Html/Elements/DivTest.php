<?php

namespace Koine\Html\Elements;

class DivTest extends \PHPUnit_Framework_TestCase
{
    protected $o;

    public function setUp()
    {
        $this->o = new Div;
    }

    public function testItIsAnHtmlElement()
    {
        $this->assertInstanceOf('\Koine\Html\Element', $this->o);
    }
}
