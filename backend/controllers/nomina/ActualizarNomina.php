<?php
session_start();
require_once "../../class/nomina.php";
$obj = new Nomina();
$datos = array(
    $_POST['nrf_nomU'],
    $_POST['cnp_nomU'],
    $_POST['fcu_nomU'],
    $_POST['bnCasaSelectU'],
    $_POST['bnbTrabajadorSelectU'],
    $_POST['bnTrabajadorSelectU'],
    $_POST['idnominaU'],
);
echo $obj->actualizarNomina($datos);
?>