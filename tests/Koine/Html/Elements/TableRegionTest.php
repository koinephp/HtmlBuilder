<?php

namespace Koine\Html\Elements;

class TableRegionTest extends \HtmlElementTestCase
{

    public function testItCanAddRows()
    {
        $cell = new Tr;
        $this->o->addRow($cell);

        $cells = array($cell);
        $this->assertEquals($cells, $this->o->getCells());
    }

    public function testItRendersNothingIfNoElementThereIsNoChildren()
    {
        $this->assertEquals('', $this->o->render());
    }

}
