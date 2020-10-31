<?php
require_once "../../class/trabajadores.php";
$objs = new Trabajador();
echo $objs->papelera($_POST['idtrab']);
?>