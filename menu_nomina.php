<?php
session_start();
$ver=$_SESSION['idUsuario'];
if(isset($_SESSION['nom_usu'])){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>
<br>
<div class="container p-4">
    <div class="card mx-auto sombra"  style="width: 50rem;">
        <div class="card-header text-center">
           <h4 class="text-center">Opciones</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-2 d-flex justify-content-center">
                    <a href="menu_trabajadores.php" class="btn btn-primary">
                      Trabajadores  
                    </a>
                </div>
                <div class="col-md-12 mb-2 d-flex justify-content-center">
                    <a href="menu_bn_trabajadores.php" class="btn btn-primary ml-5">
                      Bancos Trabajadores
                    </a>
                </div>
                <div class="col-md-12 mb-2 d-flex justify-content-center">
                    <a href="menu_pg_nomina.php" class="btn btn-primary">
                      Pagar Nomina
                    </a>
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