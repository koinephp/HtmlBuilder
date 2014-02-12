<?php

namespace Koine\Html;

class AttributeSet
{

    protected $_attributes = array(
        'class' => array()
    );

    public function set($name, $value = null)
    {
        $this->remove($name)->add($name, $value);
        return $this;
    }

    public function get($name, $default = null)
    {
        if ($this->attributeIsSet($name)) {
            $value =  $this->_attributes[$name];

            if (is_array($value)) {
                return implode(' ', $value);
            } else {
                return $value;
            }
        }

        return $default;
    }

    public function render()
    {
        $parts = array();

        foreach ($this->getAll() as $name => $values) {
            if ($this->attributeIsSet($name)) {
                $attribute = $name;

                $value = $this->getEscaped($name) ;

                if ($value) {
                    $attribute .= '="'. $value . '"';
                }

                $parts[] = $attribute;
            }
        }

        return implode(' ', $parts);
    }

    public function getAll()
    {
        return $this->_attributes;
    }

    public function getEscaped($name)
    {
        return $this->escape($this->get($name, ''));
    }

    public function escape($value)
    {
        return htmlspecialchars($value);
    }

    public function add($name, $value)
    {
        if (!$this->get($name)) {
            $this->_attributes[$name] = array();
        }

        $this->_attributes[$name][] = $value;

        return $this;
    }

    public function remove($name)
    {
        if ($this->attributeIsSet($name)) {
            unset($this->_attributes[$name]);
        }

        return $this;
    }

    public function attributeIsSet($name)
    {
        $set = isset($this->_attributes[$name]);

        if ($set && is_array($this->_attributes[$name])) {
            return !empty($this->_attributes[$name]);
        }

        return $set;
    }

    public function __toString()
    {
        return $this->render();
    }

    public function hasClass($class)
    {
        return in_array($class, $this->getRaw('class', array()));
    }

    public function addClass($class)
    {
        $classes                    = $this->getRaw('class');
        $classes[]                  = $class;
        $this->_attributes['class'] = array_unique($classes);
        return $this;
    }

    public function removeClass($class)
    {
        foreach ($this->getRaw('class') as $key => $value) {
            if ($value === $class) {
                unset($this->_attributes['class'][$key]);
            }
        }

        return $this;
    }

    public function getRaw($name, $default = null)
    {
        if ($this->attributeIsSet($name)) {
            return $this->_attributes[$name];
        }

        return $default;
    }

}
