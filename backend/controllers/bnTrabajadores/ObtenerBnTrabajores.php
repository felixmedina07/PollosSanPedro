<?php 
 require_once "../../class/conexion.php";
 require_once "../../class/bnTrabajadores.php";
 $obj = new BnTrabajador();
 $idbnt =$_POST['idbnt'];
 echo json_encode($obj->obtenerBnTrab($idbnt));
?>