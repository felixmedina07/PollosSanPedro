<?php
require_once "../../class/trabajadores.php";
$objs = new Trabajador();
echo $objs->restaurar($_POST['idtrab']);
?>