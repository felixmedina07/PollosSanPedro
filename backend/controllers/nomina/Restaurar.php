<?php
require_once "../../class/nomina.php";
$obj = new Nomina();

echo $obj->restaurar($_POST['idnomina']);
?>