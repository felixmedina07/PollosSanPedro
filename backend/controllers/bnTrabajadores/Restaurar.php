<?php
require_once "../../class/conexion.php";
require_once "../../class/bnTrabajadores.php";
$objs = new BnTrabajador();

echo $objs->restaurar($_POST['idbnt']);

?>