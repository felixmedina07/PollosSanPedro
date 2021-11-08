<?php
session_start();
if(isset($_SESSION['nom_cli']) || isset($_SESSION['nom_usu'])){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

<div class="container p-4">
    <div class="row">
    <?php if(isset($_SESSION['nom_cli'])): ?>    
     <a href="principal_cliente.php" class="btn bc-normal"><i class="fas fa-angle-left"></i></a>
     <?php endif; ?> 
     <?php if(isset($_SESSION['nom_usu'])): ?>
        <a href="menu_nomina.php" class="btn bc-normal"><i class="fas fa-angle-left"></i></a>  
     <?php endif; ?>   
    </div>
    <br>
    <div class="row">
        <div class="card mx-auto sombra"  style="width: 50rem;">
            <div class="card-header text-white text-center c-normal">
            <h4 class="text-center">Pedidos</h4>
            </div>
            <div class="card-body">
            <?php if(isset($_SESSION['nom_cli'])): ?> 
                <div class="row">
                    <div class="col-md-6 mb-3 d-flex justify-content-around">
                        <a href="view/pedidos/PedAgregar.php" class="btn bc-normal">
                        Agregar Pedido
                        </a>
                    </div>    
                    <div class="col-md-6 mb-3 d-flex justify-content-around">
                        <a href="view/pedidos/PedVer.php" class="btn bc-normal">
                        Ver Pedidos
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3 d-flex justify-content-around">
                        <a href="view/pedidos/PedFiltrar.php" class="btn bc-normal">
                        Filtrar Pedidos
                        </a>
                    </div>
                    <div class="col-md-6 mb-3 d-flex justify-content-around">
                        <a href="backend/controllers/pedidos/ReportePedidosTodosPdf.php" class="btn bc-normal">
                        Pdf Pedidos
                        </a>
                    </div>
                </div>
            <?php endif; ?> 
            <?php if(isset($_SESSION['nom_usu'])): ?>
                <div class="row">  
                    <div class="col-md-6 mb-3 d-flex justify-content-around">
                        <a href="view/pedidos/PedVer.php" class="btn bc-normal">
                        Ver Pedidos
                        </a>
                    </div>
                    <div class="col-md-6 mb-3 d-flex justify-content-around">
                        <a href="view/pedidos/PedFiltrar.php" class="btn bc-normal">
                        Filtrar Pedidos
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3 d-flex justify-content-around">
                        <a href="view/pedidos/PedHistorial.php" class="btn bc-normal">
                        Historial Pedidos
                        </a>
                    </div>
                    <div class="col-md-6 mb-3 d-flex justify-content-around">
                        <a href="view/pedidos/PedEliminar.php" class="btn bc-normal">
                        Papelera Pedidos
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <a href="backend/controllers/trabajadores/ReporteTrabajadoresTodosPdf.php" class="btn bc-normal">
                        Pdf Pedidos
                        </a>
                    </div>
                </div>
            <?php endif; ?>    
               
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