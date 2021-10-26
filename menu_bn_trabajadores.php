<?php
session_start();
$ver=$_SESSION['idUsuario'];
if(isset($_SESSION['nom_usu'])){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

<div class="container p-4">
<div class="row">
     <a href="menu_nomina.php" class="btn bc-banco"><i class="fas fa-angle-left"></i></a>
    </div>
    <br>
    <div class="row">
        <div class="card mx-auto sombra"  style="width: 50rem;">
            <div class="card-header text-white text-center c-banco">
            <h4 class="text-center">Banco Trabajadores</h4>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3 d-flex justify-content-around">
                            <a href="view/bancos-trabajadores/bnTrabAgregar.php" class="btn bc-banco ml-2">
                                Agregar Banco Trabajadores  
                            </a>
                        </div>
                        <div class="col-md-6 mb-3 d-flex justify-content-around">
                            <a href="view/bancos-trabajadores/bnTrabVer.php" class="btn bc-banco ml-3">
                                Ver Banco Trabajadores
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3 d-flex justify-content-around">
                        <a href="view/bancos-trabajadores/bnTrabFiltrar.php" class="btn bc-banco ml-3">
                                Filtrar Banco Trabajadores
                            </a>
                        </div>
                        <div class="col-md-6 mb-3 d-flex justify-content-around">
                        <a href="view/bancos-trabajadores/bnTrabHistorial.php" class="btn bc-banco ml-3">
                                Historial Banco Trabajadores
                            </a>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6 d-flex justify-content-around">
                        <a href="view/bancos-trabajadores/bnTrabEliminar.php" class="btn bc-banco ml-3">
                                Papelera Banco Trabajadores
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