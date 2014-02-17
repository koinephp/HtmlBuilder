<?php

namespace Koine\Html\Elements;

class TfootTest extends TableRegionTest
{

    public function testItRendersCorrectlyWhenHaveChildren()
    {
        $html = '<tfoot><tr></tr></tfoot>';

        $this->o->append(new Tr);

        $this->assertEquals($html, $this->o->render());
    }

}

