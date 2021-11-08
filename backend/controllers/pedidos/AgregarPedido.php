<?php
session_start();
require_once("../../class/pedidos.php");
$obj = new Pedidos();
$idUsuario = $_SESSION['idUsuario'];
$datos = array(
    $_POST['cpo_ped'],
    $_POST['cpa_ped'],
    $_POST['cmo_ped'],
    $_POST['cal_ped'],
    $idUsuario,
    $_POST['fec_ped'],
    $_POST['com_ped']
);

echo $obj->agregarPedido($datos);

?>