<?php
require_once "../../class/conexion.php";
require_once "../../class/cuentas.php";
$objs = new Cuenta();
$idcuenta=$_POST['idcuenta'];
echo json_encode($objs->obtenerEcuenta($idcuenta)); 

?>