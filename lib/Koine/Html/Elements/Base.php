<?php

namespace Koine\Html\Elements;

use Koine\Html\AttributeSet;
use Koine\Html\ElementSet;

abstract class Base
{

    protected $_attributes;

    protected $_tagName;

    protected $_selfClosing = false;

    protected $_children;

    public function __construct(array $options = array())
    {
        $this->_attributes = new AttributeSet;
        $this->_children   = new ElementSet;
        $this->_setOptions($options);
    }

    public function getAttributes()
    {
        return $this->_attributes;
    }

    public function getTagName()
    {
        return $this->_tagName;
    }

    public function getSelfClosing()
    {
        return $this->_selfClosing;
    }

    public function __call($method, $arguments = null)
    {
        $attributes = $this->getAttributes();

        if (method_exists($attributes, $method)) {

            $return = call_user_func_array(array($attributes, $method), $arguments);

            if ($return === $attributes) {
                return $this;
            }

            return $return;
        }

        throw new \InvalidArgumentException("Undefined method '$method'");
    }

    public function __toString()
    {
        return $this->render();
    }

    public function render()
    {
        $parts = array();

        if ($this->getSelfClosing()) {
            $parts[] = '<';
            $parts[] = $this->getTagName();
            $parts[] = ' ';
            $parts[] = $this->getAttributes();
            $parts[] = ' />';
        } else {
            $parts[] = '<';
            $parts[] = $this->getTagName();

            $attributes = (string) $this->getAttributes();

            if ($attributes) {
                $parts[] = " $attributes";
            }

            $parts[] = '>';
            $parts[] = $this->getInnerHtml();
            $parts[] = '</';
            $parts[] = $this->getTagName();
            $parts[] = '>';
        }

        return implode('', $parts);
    }

    public function escape($string)
    {
        return $this->getAttributes()->escape($string);
    }

    public function setText($text)
    {
        return $this->append(new Text($text));
    }

    public function setHtml($html)
    {
        return $this->append(new RawHtml($html));
    }

    public function append($elements)
    {
        if (is_array($elements)) {
            $this->_children->appendElements($elements);
        } else {
            $this->_children->append($elements);
        }

        return $this;
    }

    public function prepend(Base $element)
    {
        $this->_children->prepend($element);
        return $this;
    }

    public function getInnerHtml()
    {
        return (string) $this->_children;
    }

    public function getElements()
    {
        return $this->_children->getElements();
    }

    public function setElements($elements)
    {
        $this->_children->setElements($elements);
        return $this;
    }

    public function _setOptions(array $options)
    {
        foreach ($options as $key => $options) {
            $method = 'set' . ucfirst($key);
            call_user_func_array(array($this, $method), array($options));
        }
    }

    public function isEmpty()
    {
        return count($this->_children->getElements()) === 0;
    }

}
