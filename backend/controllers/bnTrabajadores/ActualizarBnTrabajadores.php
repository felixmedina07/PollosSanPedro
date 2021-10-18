<?php
 session_start();
 require_once "../../class/bnTrabajadores.php";
 $obj = new BnTrabajador();
 $datos = array(
     $_POST['idbnt'],
     $_POST['bnTrabajadorSelectU'],
     $_POST['not_bntU'],
     $_POST['ncu_bntU'],
     $_POST['tpc_bntU'],
     $_POST['rcd_bntU'],
     $_POST['nom_bntU'],
     $_POST['cor_bntU'],
     $_POST['tti_bntU']
 );

echo $obj->actualizarBnTrab($datos);

?>