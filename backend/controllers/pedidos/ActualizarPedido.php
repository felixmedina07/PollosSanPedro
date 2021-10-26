<?php
 session_start();
 require_once "../../class/pedidos.php";
 $obj = new Pedidos();

 if(isset($_SESSION['nom_cli'])){
    $datos = array(
        $_POST['idped'],
        $_POST['cpo_pedU'],
        $_POST['cpa_pedU'],
        $_POST['cmo_pedU'],
        $_POST['cal_pedU'],
        $_POST['fec_pedU'],
        $_POST['inf_pedU'],
     );
 }

 if(isset($_SESSION['nom_usu'])){
    $datos = array(
        $_POST['idped'],
        $_POST['cpo_pedU'],
        $_POST['cpa_pedU'],
        $_POST['cmo_pedU'],
        $_POST['cal_pedU'],
        $_POST['fec_pedU'],
        $_POST['inf_pedU'],
        $_SESSION['idUsuario']
     );
 }

 echo $obj->actualizarPed($datos);


?>