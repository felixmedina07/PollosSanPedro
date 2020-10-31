<?php
   require_once "../../class/conexion.php";
    require_once "../../class/usuarios.php";
    $usuario = new Usuario();
   $password=sha1($_POST['pas_usuR']);
   $password2=sha1($_POST['pass2_usuR']); 
   $datos=array(
    $_POST['nom_usuR'],
     $_POST['ema_usuR'],
     $password,
     $password2
   );

   echo $usuario->recuperar($datos);
 
?>