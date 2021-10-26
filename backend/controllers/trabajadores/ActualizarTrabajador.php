<?php
 session_start();
 require_once "../../class/trabajadores.php";
 $obj = new Trabajador();
 $datos = array(
     $_POST['idtrab'],
     $_POST['nom_traU'],
     $_POST['ape_traU'],
     $_POST['ced_traU'],
     $_POST['ads_traU'],
     $_POST['cor_traU'],
     $_POST['tel_traU'],
 );

 echo $obj->actualizarTrab($datos);


?>