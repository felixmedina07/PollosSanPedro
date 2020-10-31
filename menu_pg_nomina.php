<?php
session_start();
$ver=$_SESSION['idUsuario'];
if(isset($_SESSION['nom_usu'])){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

<div class="container p-4">
    <div class="row">
     <a href="menu_nomina.php" class="btn btn-dark" style="border-radius: 20px;"><i class="fas fa-angle-left"></i></a>
    </div>
    <br>
    <div class="row">
        <div class="card mx-auto sombra"  style="width: 50rem;">
            <div class="card-header text-center">
            <h4 class="text-center">Pago Nomina</h4>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3 d-flex justify-content-around">
                            <button class="btn btn-primary ml-2">
                            Agregar Pago Nomina  
                            </button>
                        </div>
                        <div class="col-md-6 mb-3 d-flex justify-content-around">
                            <button class="btn btn-primary ml-3">
                            Ver Pago Nomina
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-around">
                            <button class="btn btn-primary">
                            Filtrar Pago Nomina
                            </button>
                        </div>
                        <div class="col-md-6 d-flex justify-content-around">
                            <button class="btn btn-primary ml-5">
                            Historial Trabajadores
                            </button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

 <?php
   }else{
    header("location:index.php");
     }
 ?> 
<?php
 require_once "view/footer/footer.php";
?>