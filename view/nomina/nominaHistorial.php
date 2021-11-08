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
     <a href="../../menu_pg_nomina.php" class="btn bc-normal"><i class="fas fa-angle-left"></i></a>
    </div>
      <div id="tablaHistorial"></div>
</div>
<?php
   }else{
    header("location:../../index.php");
     }
 ?>

<?php 
$head = $es->pie(); 
?>

<script>
    $(document).ready(function(){
        $('#tablaHistorial').load("tablaHistorial.php");
    });
</script>