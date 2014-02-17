<?php

namespace Koine\Html\Elements;

class TableRegion extends Base
{
    protected $_tagName  = null;


    public function addRow(Tr $row)
    {
        $this->_children->append($row);
    }

    public function getCells()
    {
        return $this->_children->getElements();
    }

    public function render()
    {
        if ($this->isEmpty()) {
            return '';
        } else {
            return parent::render();
        }
    }

    public function append(Tr $row)
    {
        parent::append($row);
        return $this;
    }

    public function prepend(Tr $row)
    {
        parent::prepend($row);
        return $this;
    }

}
