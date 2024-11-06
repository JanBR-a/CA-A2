<?php
include '../../app.php';
require VIEWS . 'alumns.view.php';
session_start();

$array_professors = validate();
$_SESSION['professors'] = $array_professors;
dd($array_professors);
