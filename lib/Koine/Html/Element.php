<?php

namespace Koine\Html;

use Koine\Html\AttributeSet;

abstract class Element
{
    protected $_attributes;

    protected $_tagName;

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
        return '<' . $this->getTagName() . ' ' . $this->getAttributes() . ' />';
    }

}
