<?php 
session_start();
if(isset($_SESSION['nom_cli']) || isset($_SESSION['nom_usu'])){
require_once "../head/head3.php";
$es = new estilos();
$head = $es->encabezado();
require_once "../menu/menu2.php"; 
?>
<div class="container p-4">
<?php 
     if(isset($_SESSION['error']) && $_SESSION['error'] === 1){
      echo "<div class='row'>
                <div class='col-12 mx-auto text-center'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <p>Pedido Agregado</p>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                </div>
            </div>";
     }else{
         echo "";
     }
   ?>
   <?php $_SESSION['error']=0; ?>
    <div class="row">
     <a href="../../menu_pedidos.php" class="btn bc-cliente" ><i class="fas fa-angle-left"></i></a>
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

<script src="../js/principal/pedidos.js"></script>