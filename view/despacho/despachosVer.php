<?php 
session_start();
if(isset($_SESSION['nom_cli']) && isset($_SESSION['idUsuario'])){
require_once "../head/head3.php";
$es = new estilos();
$head = $es->encabezado();
require_once "../menu/menu2.php"; 
?>
<div class="container p-4">
    <div class="row">
     <a href="../../principal_cliente.php" class="btn bc-despacho"><i class="fas fa-angle-left"></i></a>
    </div>
    <div id="tablaVer"></div>
</div>
<?php
   }else{
    header("location:../../sistema_cliente.php");
     }
 ?>

<?php 
$head = $es->pie();
?>
<script>
    $(document).ready(function(){
        $('#tablaVer').load("tablaVer.php");
    });
</script>