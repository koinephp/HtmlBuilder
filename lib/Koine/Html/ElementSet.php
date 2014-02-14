<?php

namespace Koine\Html;

use Koine\Html\Element;

class ElementSet
{
    protected $_collection = array();

    public function __construct(array $elements = array())
    {
        $this->appendElements($elements);
    }

    public function getElements()
    {
        return $this->_collection;
    }

    public function append(Element $element)
    {
        $this->_collection[] = $element;
        return $this;
    }

    public function prepend(Element $element)
    {
        array_unshift($this->_collection, $element);
        return $this;
    }

    public function setElements(array $elements)
    {
        return $this->clear()->appendElements($elements);
    }

    public function clear()
    {
        $this->_collection = array();
        return $this;
    }

    public function appendElements(array $elements)
    {
        foreach ($elements as $element) {
            $this->append($element);
        }

        return $this;
    }

    public function remove(Element $element)
    {
        foreach ($this->getElements() as $key => $el) {
            if ($element === $el) {
                unset($this->_collection[$key]);
            }
        }

        return $this;
    }

}
