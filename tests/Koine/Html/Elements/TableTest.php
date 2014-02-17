<?php

namespace Koine\Html\Elements;

class TableTest extends \HtmlElementTestCase
{
    public function testItRendersCorrectly()
    {
        $html = implode('', array(
            '<table>',
                '<thead>',
                    '<tr>',
                        '<th>', 'Column 1', '</th>',
                        '<th>', 'Column 2', '</th>',
                    '</tr>',
                '</thead>',
                '<tbody>',
                    '<tr>',
                        '<td>', '1.1', '</td>',
                        '<td>', '1.2', '</td>',
                    '</tr>',
                    '<tr>',
                        '<td>', '2.1', '</td>',
                        '<td>', '2.2', '</td>',
                    '</tr>',
                '</tbody>',
                '<tfoot>',
                    '<tr>',
                        '<td colspan="2">', 'footer', '</td>',
                    '</tr>',
                '</tfoot>',
            '</table>',
        ));


        $this->o->getHead()->append(new Tr(array(
            'elements' => array(
                new Th(array('text' => 'Column 1')),
                new Th(array('text' => 'Column 2')),
            )
        )));

        $this->o->getBody()->append(new Tr(array(
            'elements' => array(
                new Td(array('text' => '1.1')),
                new Td(array('text' => '1.2')),
            )
        )));

        $this->o->append(new Tr(array(
            'elements' => array(
                new Td(array('text' => '2.1')),
                new Td(array('text' => '2.2')),
            )
        )));

        $this->o->getFoot()->append(new Tr(array(
            'elements' => array(
                new Td(array(
                    'attributes' => array(
                        'colspan' => 2,
                    ),
                    'text' => 'footer'
                ))
            ))
        ));

        $this->assertEquals($html, $this->o->render());
    }
}
