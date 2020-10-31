<?php
 require_once "../../class/conexion.php";
 require_once "../../class/productos.php";
 $obj = new Producto();

 echo json_encode($obj->activar($_POST['idproducto']));
?>