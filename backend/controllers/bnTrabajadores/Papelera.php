<?php
require_once "../../class/conexion.php";
require_once "../../class/bnTrabajadores.php";
$objs = new BnTrabajador();

echo $objs->papelera($_POST['idbnt']);

?>