<?php
require_once "../../class/nomina.php";
$obj = new Nomina();

echo $obj->papelera($_POST['idnomina']);
?>