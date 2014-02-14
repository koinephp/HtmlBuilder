<?php

namespace Koine\Html\Elements;

class RawHtml extends Base
{

    protected $_content;

    protected $_tagName = null;

    public function __construct($text)
    {
        $this->_content = (string) $text;
    }

    public function render()
    {
        return $this->_content;
    }
}
