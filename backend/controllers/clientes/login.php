<?php
session_start();
  require_once "../../class/clientes.php";

  $cor_cli=$_POST['cor_cli'];
  $password=sha1($_POST['pas_cli']);
 
  $clienteObj= new Cliente();
  echo $clienteObj->login($cor_cli,$password);
?>