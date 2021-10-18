<?php 
session_start();
if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A'|| $_SESSION['rol'] =='E'||$_SESSION['rol']=='S'){
require_once "../head/head3.php";
$es = new estilos();
$head = $es->encabezado();
require_once "../menu/menu2.php"; 
?>
<div class="container p-4">
    <div class="row">
     <a href="../../menu_pg_nomina.php" class="btn bc-cuenta"><i class="fas fa-angle-left"></i></a>
    </div>
    <br>
        <div id="tablaFiltrar"></div>
</div>
<?php
   }else{
    header("location:../../sistema_principal.php");
     }
 ?>

<?php 
$head = $es->pie(); 
?>
<script>
    $(document).ready(function(){
        $('#tablaFiltrar').load("tablaFiltrar.php");
    });
</script>