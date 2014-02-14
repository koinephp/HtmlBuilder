<?php

namespace Koine\Html\Elements;

use Koine\Html\Element;

class Text extends Element
{
    protected $_content;

    public function __construct($text)
    {
        $this->_content = (string) $text;
        parent::__construct();
    }

    public function render()
    {
        return $this->escape($this->_content);
    }
}
