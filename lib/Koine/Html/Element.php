<?php

namespace Koine\Html;

use Koine\Html\AttributeSet;

abstract class Element
{
    protected $_attributes;

    protected $_tagName;

    protected $_selfClosing = false;

    public function __construct()
    {
        $this->_attributes = new AttributeSet;
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

}
