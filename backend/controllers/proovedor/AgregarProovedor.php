<?php
session_start();
require_once "../../class/conexion.php";
require_once "../../class/proovedor.php"; 
$obj = new Proovedor();

$datos = array(
    $_POST['nom_edo'],
    $_POST['rif_edo'],
    $_POST['cor_edo'],
    $_POST['dir_edo']
);
 
echo $obj->agregarProovedor($datos);

?>