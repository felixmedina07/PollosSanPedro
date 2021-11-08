<?php
session_start();
require_once "backend/class/conexion.php";
$obj= new Conectar();
$conexion= $obj->conexion();
$idusuario = $_SESSION['idUsuario'];
$sql="SELECT * FROM cliente WHERE est_cli='A' AND cod_cli='$idusuario'";
$result=mysqli_query($conexion,$sql);
$ver= mysqli_fetch_array($result);
if(isset($_SESSION['nom_cli']) && $result){
  require_once "view/head/head2.php";
  require_once "view/menu/menu3.php";
?>

  <div class="container p-4">
  
  <?php
         if (isset($_GET["msg"]) AND !empty($_GET["msg"])):
      ?>
         <div class="alert alert-info bg-paso text-center" id="alert" role="alert" style="font-size: 40px;">
            <?php echo $_GET["msg"]; ?>
        </div>
      <?php
         endif;
      ?>
      <div class="container p-4">
    <div class="card mx-auto sombra"  style="width: 50rem;">
        <div class="card-header c-usuario text-center">
           <h4 class="text-center">Opciones</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4  d-flex justify-content-around">
                    <a href="view/bancos-clientes/bnClientVer.php" class="btn bc-normal">
                      Mis Bancos  
                    </a>
                </div>
                <div class="col-md-4  d-flex justify-content-around">
                    <a href="view/despacho/despachosVer.php" class="btn bc-normal">
                      Mis Despacho
                    </a>
                </div>
                <div class="col-md-4  d-flex justify-content-around">
                    <a href="view/cuentas/CuentaVer.php" class="btn bc-normal">
                      Mis Cuentas
                    </a>
                </div>
            </div>
            <div class="row mt-4 ml-1">
                <div class="col-md-4 d-flex justify-content-around">
                    <a href="menu_pedidos.php" class="btn bc-normal">
                      Pedidos  
                    </a>
                </div>
            </div>
            <div class="col-md-2 d-flex justify-content-around"></div>
        </div>
    </div>
</div>
     
  </div>
   <?php
      require_once "view/footer/footer.php";
   ?>
 <?php
}else{
  header("location:index.php");
      }
  ?> 
  

