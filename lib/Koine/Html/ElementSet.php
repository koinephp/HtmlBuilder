<?php

namespace Koine\Html;

use Koine\Html\Elements\Base;

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

    public function append(Base $element)
    {
        $this->_collection[] = $element;
        return $this;
    }

    public function prepend(Base $element)
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

    public function remove(Base $element)
    {
        foreach ($this->getElements() as $key => $el) {
            if ($element === $el) {
                unset($this->_collection[$key]);
            }
        }

        return $this;
    }

    public function render()
    {
        return implode('', $this->getElements());
    }

    public function __toString()
    {
        return $this->render();
    }

}
