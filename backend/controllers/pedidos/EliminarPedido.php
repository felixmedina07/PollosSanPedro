<?php
require_once "../../class/conexion.php";
require_once "../../class/pedidos.php";
$objs = new Pedidos();

echo $objs->eliminarPed($_POST['idped']);

?>