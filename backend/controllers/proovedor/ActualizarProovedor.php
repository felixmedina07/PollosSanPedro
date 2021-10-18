<?php
session_start();
require_once "../../class/conexion.php";
require_once "../../class/proovedor.php"; 
$obj = new Proovedor();

$datos = array(
    $_POST['idproovedor'],
    $_POST['nom_edoU'],
    $_POST['rif_edoU'],
    $_POST['cor_edoU'],
    $_POST['dir_edoU']
);
 
echo $obj->ActualizarProovedor($datos);

?>