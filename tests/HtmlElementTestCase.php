<?php

class HtmlElementTestCase extends \PHPUnit_Framework_TestCase
{

    protected $o;

    public function setUp()
    {
        $class = $this->getClass();
        $this->o = new $class;
    }

    public function testItIsAnHtmlElement()
    {
        $this->assertInstanceOf('\Koine\Html\Elements\Base', $this->o);
    }

    public function testItHasTheCorrectTagName()
    {
        if ($this->o->getTagName()) {
            $this->assertEquals($this->getExpectedTagName(), $this->o->getTagName());
        }
    }

    public function getExpectedTagName()
    {
        $parts = explode('\\', $this->getClass());
        return strtolower(array_pop($parts));
    }

    public function getClass()
    {
        $class = get_class($this);
        $class = str_replace('Test', '', $class);
        return $class;
    }
}
