<?php
   require_once "../../class/conexion.php";
    require_once "../../class/clientes.php";
    $cliente = new Cliente();
   $password=sha1($_POST['pas_cliR']);
   $datos=array(
    $_POST['tel_cliR'],
     $_POST['cor_cliR'],
     $password
   );

   echo $cliente->recuperar($datos);
 
?>