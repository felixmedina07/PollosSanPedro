<?php 
session_start();
if(isset($_SESSION['nom_usu'])){
require_once "../head/head3.php";
require_once '../../backend/class/trabajadores.php';
$mes = new Trabajador();
$es = new estilos();
$head = $es->encabezado();
require_once "../menu/menu2.php"; 
?>
<div class="container p-4">
   <?php 
     if(isset($_SESSION['error']) && $_SESSION['error'] = 1){
      echo "<div class='row'>
                <div class='col-12 mx-auto text-center'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <p>Trabajador Agregado</p>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                </div>
            </div>";
      $_SESSION['error']=null;
     }
    //  if(isset($_SESSION['error']) && $_SESSION['error'] = 0){
    //      var_dump($_SESSION['error']);
    //     echo "<div class='row'>
    //               <div class='col-12 mx-auto text-center'>
    //                   <div class='alert alert-dark alert-dismissible fade show' role='alert'>
    //                       <p>Trabajador No Guardado</p>
    //                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    //                           <span aria-hidden='true'>&times;</span>
    //                       </button>
    //                   </div>
    //               </div>
    //           </div>";
    //     $_SESSION['error']=null;
    //    }
   ?>
    <div class="row">
     <a href="../../menu_trabajadores.php" class="btn btn-dark" style="border-radius: 20px;"><i class="fas fa-angle-left"></i></a>
    </div>
    <div id="tablaVer"></div>
</div>
<?php
   }else{
    header("location:index.php");
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

<script src="../js/principal/trabajadores.js"></script>