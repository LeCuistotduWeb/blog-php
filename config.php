<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

$root = $_SERVER['DOCUMENT_ROOT'];
$host = $_SERVER['HTTP_HOST'];

define('ROOT', $root.'/Blog-mvc/');
define('HOST', 'http://'.$host.'/Blog-mvc/');


define('CONTROLLER', ROOT.'controller/');
define('MODEL', ROOT.'model/');
define('VIEW', ROOT.'view/');
define('PUBLICS', HOST.'public/');
