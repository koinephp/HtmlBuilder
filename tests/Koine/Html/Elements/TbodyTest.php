<?php

namespace Koine\Html\Elements;

class TbodyTest extends TableRegionTest
{

    public function testItRendersCorrectlyWhenHaveChildren()
    {
        $html = '<tbody><tr></tr></tbody>';

        $this->o->append(new Tr);

        $this->assertEquals($html, $this->o->render());
    }

}
