<?php
session_start();
$ver=$_SESSION['idUsuario'];
if(isset($_SESSION['nom_usu'])){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

<div class="container p-4">
    <div class="row">
     <a href="menu_nomina.php" class="btn bc-cuenta"><i class="fas fa-angle-left"></i></a>
    </div>
    <br>
    <div class="row">
        <div class="card mx-auto sombra" style="width: 50rem;">
            <div class="card-header c-cuenta text-center text-white">
            <h4 class="text-center">Pago Nomina</h4>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3 d-flex justify-content-around">
                            <a href="view/nomina/nominaAgregar.php" class="btn bc-cuenta">
                            Agregar Pago Nomina
                            </a>
                        </div>
                        <div class="col-md-6 mb-3 d-flex justify-content-around">
                            <a href="view/nomina/nominaVer.php" class="btn bc-cuenta">
                                Ver Pago Nomina
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3 d-flex justify-content-around">
                            <a href="view/nomina/nominaFiltrar.php" class="btn bc-cuenta">
                            Filtrar Pago Nomina
                            </a>
                        </div>
                        <div class="col-md-6  mb-3 d-flex justify-content-around">
                            <a href="view/nomina/nominaHistorial.php" class="btn bc-cuenta">
                                Historial Pago Nomina
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6  mb-3 d-flex justify-content-around">
                            <a href="view/nomina/nominaEliminar.php" class="btn bc-cuenta">
                                Papelera Pago Nomina
                            </a>
                        </div>
                        <div class="col-md-6  mb-3 d-flex justify-content-around">
                            <a href="backend/controllers/nomina/ReporteNomina.php" class="btn bc-cuenta">
                                Pdf Pago Nomina
                            </a>
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