<?php 
session_start();
if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A'|| $_SESSION['rol'] =='E'||$_SESSION['rol']=='S'){
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
                        <p>Pago Nomina Agregado</p>
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
     <a href="../../menu_pg_nomina.php" class="btn bc-normal"><i class="fas fa-angle-left"></i></a>
    </div>
      <div id="tablaVer"></div>
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
        $('#tablaVer').load("tablaVer.php");
    });
</script>