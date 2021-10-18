<?php
   require_once "../../class/conexion.php";
    require_once "../../class/usuarios.php";
    $usuario = new Usuario();
   $password=sha1($_POST['pas_usuR']);
   $datos=array(
    $_POST['nom_usuR'],
     $_POST['ema_usuR'],
     $password
   );

   echo $usuario->recuperar($datos);
 
?>