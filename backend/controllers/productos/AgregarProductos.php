<?php 
 session_start();
   require_once "../../class/conexion.php";
  require_once "../../class/productos.php";
  $tasa= $_POST['tas_pro'];
  $tasa_po = $_POST['tpo_pro'];
  $tasa_pa = $_POST['tpa_pro'];
  $tasa_mo =$_POST['tmo_pro'];
  $tasa_al = $_POST['tal_pro'];
  $pre_po = $tasa_po * $tasa;
  $pre_pa = $tasa_pa * $tasa;
  $pre_al = $tasa_al * $tasa;
  $pre_mo = $tasa_mo * $tasa;
  $cestas_p = $_POST['csp_pro'];
  $cestas = $_POST['ces_pro'];
  $prom_po = $_POST['prp_pro'];
  $cant_po = $_POST['cpo_pro'];
  $porcentaje = $prom_po * 0.05;
  $cant_pa = ($cant_po * 2) * 0.05;
  $cant_al= ($cant_po * 2) * 0.05;
  $cant_mo	= ($cant_po * 1) * 0.05;
  $fcp_pro= $_POST['fcp_pro'];
  $fdp_pro=$_POST['fdp_pro'];
  $idproovedor=$_POST['bnProovedorSelect'];
  $act_des=$_POST['act_pro'];
  $datos=array(
    $tasa,
    $tasa_po,
    $tasa_pa,
    $tasa_mo,
    $tasa_al,
    $pre_po,
    $pre_pa,
    $pre_al,
    $pre_mo,
    $cestas,
    $prom_po,
    $cant_po,
    $cant_pa,
    $cant_al,
    $cant_mo,
    $cestas_p,
    $fcp_pro,
    $fdp_pro,
    $idproovedor,
    $act_des
  );

  $obj = new Producto();

  echo $obj->agregarProducto($datos);




