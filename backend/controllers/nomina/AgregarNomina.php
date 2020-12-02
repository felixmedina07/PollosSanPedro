<?php
session_start();
require_once("../../class/nomina.php");
$obj = new Nomina();
$datos = array(
    $_POST['nrf_nom'],
    $_POST['cnp_nom'],
    $_POST['fcu_nom'],
    $_POST['bnCasaSelect'],
    $_POST['bnbTrabajadorSelect'],
    $_POST['bnTrabajadorSelect']
);

echo $obj->agregarNomina($datos);

?>