<?php
require VIEWS.'subjects.view.php';
session_start();
$array_alumns=validate();
// Almacenar el nombre en la sesión
$_SESSION['alumnes'] = $array_alumnes;
$array_professors = isset($_SESSION['professors']) ? $_SESSION['professors'] : [];
dd($array_alumns, $array_professors);
