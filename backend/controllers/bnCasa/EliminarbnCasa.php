<?php
require_once "../../class/conexion.php";
require_once "../../class/bnCasa.php";
$objs = new BnCasa();

echo $objs->eliminarbnCasa($_POST['idbanc']);

?>