<?php

namespace Koine\Html\Elements;

class RawHtml extends Base
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
