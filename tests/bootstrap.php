<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

$libPath   = realpath(dirname(__FILE__) . '/../lib/');
$testsPath = realpath(dirname(__FILE__) . '/../tests/');

$loader = require $libPath . '/../vendor/autoload.php';

require_once 'HtmlElementTestCase.php';

class DummyElement extends \Koine\Html\Elements\Base {
    protected $_tagName = 'dummyelement';
    protected $_selfClosing = true;
}

