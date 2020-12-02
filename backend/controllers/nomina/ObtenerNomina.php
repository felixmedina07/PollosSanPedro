<?php
require_once "../../class/nomina.php";
$obj = new Nomina();
$idnomina = $_POST['idnomina'];
echo json_encode($obj->obtenerNomina($idnomina));
?>