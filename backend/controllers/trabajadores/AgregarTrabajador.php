<?php
session_start();
require_once "../../class/trabajadores.php";
$obj = new Trabajador();

$datos = array(
    $_POST['nom_tra'],
    $_POST['ape_tra'],
    $_POST['ced_tra'],
    $_POST['ads_tra'],
    $_POST['cor_tra'],
    $_POST['tel_tra']
);

echo $obj->agregarTrab($datos);

?>