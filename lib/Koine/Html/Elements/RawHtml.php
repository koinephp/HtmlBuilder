<?php

namespace Koine\Html\Elements;

use Koine\Html\Element;

class RawHtml extends Element
{

    protected $_content;

    public function __construct($text)
    {
        $this->_content = (string) $text;
    }

    public function render()
    {
        return $this->_content;
    }
}
