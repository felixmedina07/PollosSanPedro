<?php 
session_start();
 require_once "../../class/conexion.php";
 require_once "../../class/cuentas.php";
 $obj = new Cuenta();
 
 $idbank=$_POST['bnbClienteSelect'];
 $idbanc=$_POST['bnCasaSelect'];
 $iddespacho=$_POST['bnDespachoSelect'];
 $idclient=$_POST['bnClienteSelect'];
 $cant= $_POST['cnp_cue'];
 $cant_d = $_POST['cnt_cue'];
 $nro_ref = $_POST['nrf_cue'];
 $fcu_cue= $_POST['fcu_cue'];
 // variable de validacion de precios
 $ctc_cue=$cant_d - $cant;
 $va_d=$cant_d;
        $datos = array(
            $nro_ref,
            $cant_d,
            $cant,
            $fcu_cue,
            $ctc_cue,
            $idbank,
            $idbanc,
            $idclient,
            $iddespacho
        );
    echo $obj->agregarCuenta($datos);

 
?>

