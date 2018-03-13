<?php

$host = $_SERVER['HTTP_HOST'];
$root = $_SERVER['DOCUMENT_ROOT'];

define('HOST', 'http://'.$host.'Blog-mvc/');
define('ROOT', $root.'Blog-mvc/');

define('CONTROLLER', $root.'controller/');
define('MODEL', $root.'model/');
define('VIEW_FRONT', $root.'view/frontend/');
define('VIEW_BACK', $root.'view/backend/');

define('PUBLIC', $host.'public/');
