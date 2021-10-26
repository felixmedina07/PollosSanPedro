<?php 
 require_once "../../class/conexion.php";
 require_once "../../class/pedidos.php";
 $obj = new Pedidos();
 $idped =$_POST['idped'];
 echo json_encode($obj->ObtenerDatosPed($idped));
//  echo json_encode($obj->obtenDatosCliente());
?>