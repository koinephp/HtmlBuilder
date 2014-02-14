<?php

namespace Koine\Html\Elements;

class Text extends Base
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
