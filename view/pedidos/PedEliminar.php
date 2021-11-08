<?php 
session_start();
if(isset($_SESSION['nom_usu'])){
require_once "../head/head3.php";
$es = new estilos();
$head = $es->encabezado();
require_once "../menu/menu2.php"; 
?>
<div class="container p-4">
    <div class="row">
     <a href="../../menu_pedidos.php" class="btn bc-normal" ><i class="fas fa-angle-left"></i></a>
    </div>
      <div id="tablaEliminar"></div>
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
        $('#tablaEliminar').load("tablaEliminar.php");
    });
</script>