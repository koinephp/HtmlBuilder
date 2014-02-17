<?php

namespace Koine\Html\Elements;

class Tr extends Base
{
    protected $_tagName = 'tr';

    public function addRow($text)
    {
        $this->append(new Td(array('text' => $text)));
        return $this;
    }

    public function append(Td $cell)
    {
        parent::append($cell);
    }

    public function prepend(Td $cell)
    {
        parent::append($cell);
    }

}


