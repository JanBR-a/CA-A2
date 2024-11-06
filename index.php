<?php
session_start();
require 'src/app.php';

define('VIEWS' , __DIR__ . '/src/views');
define('CONTROLLERS', __DIR__ . '/src/controllers');

$controller = router($routes);

require CONTROLLERS.$controller.'.php';