<?php
session_start();
if(isset($_SESSION['nom_usu'])){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

<div class="container p-4">
    <div class="row">
     <a href="menu_nomina.php" class="btn bc-normal"><i class="fas fa-angle-left"></i></a>
    </div>
    <br>
    <div class="row">
        <div class="card mx-auto sombra"  style="width: 50rem;">
            <div class="card-header text-white text-center c-normal">
            <h4 class="text-center">Trabajadores</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3 d-flex justify-content-around">
                        <a href="view/trabajadores/TrabAgregar.php" class="btn bc-normal">
                        Agregar Trabajadores
                        </a>
                    </div>
                    <div class="col-md-6 mb-3 d-flex justify-content-around">
                        <a href="view/trabajadores/TrabVer.php" class="btn bc-normal">
                        Ver Trabajadores
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3 d-flex justify-content-around">
                        <a href="view/trabajadores/TrabFiltrar.php" class="btn bc-normal">
                        Filtrar Trabajadores
                        </a>
                    </div>
                    <div class="col-md-6 mb-3 d-flex justify-content-around">
                        <a href="view/trabajadores/TrabHistorial.php" class="btn bc-normal">
                        Historial Trabajadores
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-around">
                        <a href="view/trabajadores/TrabEliminar.php" class="btn bc-normal">
                        Papelera Trabajadores
                        </a>
                    </div>
                    <div class="col-md-6 d-flex justify-content-around">
                        <a href="backend/controllers/trabajadores/ReporteTrabajadoresTodosPdf.php" class="btn bc-normal">
                        Pdf Trabajadores
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