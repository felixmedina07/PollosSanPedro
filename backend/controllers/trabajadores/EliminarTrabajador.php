<?php
require_once "../../class/conexion.php";
require_once "../../class/trabajadores.php";
$obj = new Trabajador();

echo $obj->eliminarTrab($_POST['idtrab']);

?>