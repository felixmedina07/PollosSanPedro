<?php 
 require_once "../../class/conexion.php";
 require_once "../../class/trabajadores.php";
 $obj = new Trabajador;
 $idtrab =$_POST['idtrab'];
 echo json_encode($obj->obtenerTrab($idtrab));
//  echo json_encode($obj->obtenDatosCliente());
?>