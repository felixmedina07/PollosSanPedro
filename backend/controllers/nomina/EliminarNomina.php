<?php
require_once "../../class/nomina.php";
$obj = new Nomina();

echo $obj->eliminarNomina($_POST['idnomina']);
?>