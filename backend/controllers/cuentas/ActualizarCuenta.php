<?php 
session_start();
require_once "../../class/conexion.php";
require_once "../../class/cuentas.php";
$obj = new Cuenta();
$c = new Conectar();
$conexion=$c->conexion();
$idcuentaU=$_POST['bnCuentaSelectU'];
$sql="SELECT cl.cod_cli,
             bc.cod_bnc,
             bk.cod_bnk,
             d.cod_des,
             c.cod_cue,
             c.cnp_cue
      FROM cuentas AS c
      INNER JOIN bancos_cliente AS bk
      ON c.cod_bnk=bk.cod_bnk
      INNER JOIN bancos_casa AS bc
      ON c.cod_bnc=bc.cod_bnc
      INNER JOIN cliente AS cl
      ON c.cod_cli=cl.cod_cli 
      INNER JOIN despacho AS d
      ON c.cod_des=d.cod_des
      AND c.cod_cue='$idcuentaU'
      AND c.est_cue='A'";
$result=mysqli_query($conexion,$sql);
$d=mysqli_fetch_array($result);

 $idclientU=$d[0];
 $idbancU=$d[1];
 $idbankU=$d[2];
 $iddespachoU=$d[3];
 $cantU= $_POST['cnp_cueU'] + $d[5];
 $cant_dU= $_POST['cnt_cueU'] ;
 $nro_refU= $_POST['nrf_cueU'];
 $fcu_cueU= $_POST['fcu_cueU'];

 // variable de validacion de precios
 $ctc_cueU=$cant_dU - $cantU;
 
        $datos = array(
            $nro_refU,
            $cant_dU,
            $cantU,
            $fcu_cueU,
            $ctc_cueU,
            $idbankU,
            $idbancU,
            $idclientU,
            $iddespachoU,
            $idcuentaU
           
        );
    
    echo $obj->actualizarCuenta($datos);

?>