<?php

namespace Koine\Html\Elements;

use Koine\Html\ElementSet;

class Table extends Base
{
    protected $_tagName = 'table';

    protected $_head;
    protected $_body;
    protected $_foot;

    public function __construct(array $options = array())
    {
        parent::__construct($options);
        $this->_head = new Thead();
        $this->_body = new Tbody();
        $this->_foot = new Tfoot();
    }

    public function getInnerHtml()
    {
        return implode('', array(
            $this->getHead(),
            $this->getBody(),
            $this->getFoot(),
        ));
    }

    public function getHead()
    {
        return $this->_head;
    }

    public function getBody()
    {
        return $this->_body;
    }

    public function getFoot()
    {
        return $this->_foot;
    }

    public function append(Tr $row)
    {
        $this->getBody()->append($row);
        return $this;
    }

    public function prepend(Tr $row)
    {
        $this->getBody()->prepend($row);
        return $this;
    }

}
