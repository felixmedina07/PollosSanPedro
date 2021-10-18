<?php 
 require_once "../../class/conexion.php";
 require_once "../../class/proovedor.php";
 $obj = new Proovedor();
 $idproovedor =$_POST['idproovedor'];
 echo json_encode($obj->ObtenerProovedor($idproovedor));
//  echo json_encode($obj->obtenDatosCliente());
?>