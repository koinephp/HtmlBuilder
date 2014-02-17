<?php

namespace Koine\Html\Elements;

class TrTest extends \HtmlElementTestCase
{
    public function testItCanAddTextRow()
    {
        $this->o->addRow('test');

        $this->assertEquals('<td>test</td>', $this->o->getInnerHtml());
    }

}
