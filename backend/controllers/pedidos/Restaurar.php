<?php
require_once "../../class/pedidos.php";
$objs = new Pedidos();
echo $objs->restaurar($_POST['idped']);
?>