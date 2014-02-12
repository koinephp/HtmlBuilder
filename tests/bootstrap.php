<?php

$libPath = realpath(dirname(__FILE__) . '/../lib/');

set_include_path(implode(PATH_SEPARATOR, array(
    $libPath,
    get_include_path()
)));

require_once 'SplClassLoader.php';
$loader = new SplClassLoader('Koine', $libPath);
$loader->register();
