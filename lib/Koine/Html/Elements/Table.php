<?php

namespace Koine\Html\Elements;

use Koine\Html\ElementSet;

class Table extends Base
{
    protected $_tagName = 'table';

    protected $_tableHead;

    public function __construct(array $options = array())
    {
        parent::__construct($options);
        $this->_tableHead = new ElementSet;
    }

    public function getInnerHtml()
    {
        return implode('', array(
            '<thead>', '<tr>', $this->getHead(), '</tr>', '</thead>',
        ));
    }

    public function addTitle($title)
    {
        if (gettype('string')) {
           $title = new Text($title);
        }

        $this->getHead()->append($title);
        return $this;
    }

    public function getHead()
    {
        return $this->_tableHead;
    }
}
