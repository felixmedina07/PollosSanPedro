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
     
  </div>
   <?php
      require_once "view/footer/footer.php";
   ?>
     <script src="view/js/Principal/principal.js"></script>
               
 
 <?php
}else{
      header("location:sistema_principal.php");
      }
  ?> 
  


  
   
  
     

     

