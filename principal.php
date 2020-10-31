<?php
session_start();
require_once "backend/class/conexion.php";
$obj= new Conectar();
$conexion= $obj->conexion();
$idusuario = $_SESSION['idUsuario'];
$sql="SELECT nom_usu FROM usuarios WHERE est_usu='A' AND cod_usu='$idusuario'";
$result=mysqli_query($conexion,$sql);
$ver= mysqli_fetch_array($result);
if(isset($_SESSION['nom_usu'])){
  require_once "view/head/head2.php";
  require_once "view/menu/menu.php";
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
      <br>
      <br>
       <div class="col 12">
         <div class="card mx-auto sombra" style="width: 40rem;">
            <div class="card-header">
             <h4 class="text-center">Otras Opciones</h4>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-6">
                  <div class="card">
                     <div class="card-header text-center ">
                        <h4>Nomina</h4>
                     </div>
                     <div class="card-body mx-auto">
                        <a href="menu_nomina.php" class="btn btn-primary">Entrar</a>
                     </div>
                  </div>
                  </div>
                  <div class="col-6">
                  <div class="card">
                     <div class="card-header text-center">
                       <h4>Precios</h4>
                     </div>
                     <div class="card-body mx-auto">
                        <a href="precios.php" class="btn btn-primary">Entrar</a>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
  
  </div>
   <?php
      require_once "view/footer/footer.php";
   ?>
     <script src="view/js/Principal/principal.js"></script>
               
 
 <?php
}else{
      header("location:index.php");
      }
  ?> 
  


  
   
  
     

     

