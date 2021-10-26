<?php
require_once "../../class/pedidos.php";
$objs = new Pedidos();
echo $objs->papelera($_POST['idped']);
?>