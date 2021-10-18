<?php
    require_once "../../class/clientes.php";
   
   $datos=array(
    $_POST['tel_cli'],
    $_POST['cor_cli'],
    $_POST['pas_cli'],
     $_POST['cli_usu']
   );
   $cliente = new Cliente();
   echo $cliente->registrar($datos);

?>