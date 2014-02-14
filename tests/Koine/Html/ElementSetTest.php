<?php

namespace Koine\Html;

class ElementSetTest extends \PHPUnit_Framework_TestCase
{
    protected $o;

    public function setUp()
    {
        $this->o = new ElementSet;
    }

    public function testItCanBeInitializedWithACollection()
    {
        $elements = array(new \DummyElement);
        $object = new ElementSet($elements);
        $this->assertEquals($elements, $object->getElements());
    }

    public function testCollectionBeginsEmpty() 
    {
        $elements = $this->o->getElements();
        $this->assertEquals(array(), $this->o->getElements());
    }

    public function testItCanAppendAnElement()
    {
        $e1 = new \DummyElement;
        $e2 = new \DummyElement;
        $this->o->append($e1)->append($e2);
        $this->assertEquals(array($e1, $e2), $this->o->getElements());
    }

    public function testItcanPrependAnElement()
    {
        $this->assertEquals(array(), $this->o->getElements());
        $e1 = new \DummyElement;
        $e2 = new \DummyElement;
        $this->o->append($e1)->prepend($e2);
        $this->assertEquals(array($e2, $e1), $this->o->getElements());
    }

    public function testItCanClearElements()
    {
        $elements = array(new \DummyElement);
        $object = new ElementSet($elements);
        $this->assertEmpty($object->clear()->getElements());
    }

    public function testItCanRemoveElement()
    {
        $e1 = new \DummyElement;
        $e2 = new \DummyElement;
        $elements = array($e1, $e2);
        $object = new ElementSet($elements);
        $this->assertEquals(array($e1), $object->remove($e2)->getElements());
    }

    public function testItCanAppendElements()
    {
        $e1 = new \DummyElement;
        $e2 = new \DummyElement;
        $object = new ElementSet(array($e1));
        $object->appendElements(array($e2));
        $this->assertEquals(array($e1, $e2), $object->getElements());
    }

    public function testItCanSetElements()
    {
        $e1 = new \DummyElement;
        $e2 = new \DummyElement;
        $object = new ElementSet(array($e1));
        $elements = $object->setElements(array($e2))->getElements();
        $this->assertEquals(array($e2), $elements);
        $this->assertSame($e2, $elements[0]);
    }

}
