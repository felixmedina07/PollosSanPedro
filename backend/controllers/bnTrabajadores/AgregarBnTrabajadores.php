<?php
session_start();
require_once "../../class/conexion.php";
require_once "../../class/bnTrabajadores.php";
$obj = new BnTrabajador();
$nomtitular = $_POST['not_bnt'];
$idtrabajadores = $_POST['bnTrabajadorSelect'];

    $datos = array(
      $nomtitular,
      $_POST['ncu_bnt'],
      $_POST['tpc_bnt'],
      $_POST['rcd_bnt'],
      $_POST['nom_bnt'],
      $_POST['cor_bnt'],
      $_POST['tti_bnt'],
      $idtrabajadores
    );

                
echo $obj->agregarBnTrab($datos);

?>
