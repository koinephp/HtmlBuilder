<?php

namespace Koine\Html\Elements;

class TheadTest extends TableRegionTest
{

    public function testItRendersCorrectlyWhenHaveChildren()
    {
        $html = '<thead><tr></tr></thead>';

        $this->o->append(new Tr);

        $this->assertEquals($html, $this->o->render());
    }

}

