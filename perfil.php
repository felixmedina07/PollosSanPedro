<?php
session_start();
require_once "backend/class/conexion.php";
$obj= new Conectar();
$conexion= $obj->conexion();
$idusuario = $_SESSION['idUsuario'];
$sql="SELECT * FROM cliente WHERE est_cli='A' AND cod_cli='$idusuario'";
$result=mysqli_query($conexion,$sql);
$ver = $result->fetch_assoc();
if(isset($_SESSION['nom_cli']) && $result){
  require_once "view/head/head2.php";
  require_once "view/menu/menu3.php";
?>

  <div class="container p-4">
   <div class="row">
     <a href="principal_cliente.php" class="btn bc-normal"><i class="fas fa-angle-left"></i></a>
    </div>
    <br>
    <div class="row mt-4">
        <div class="card sombra p-5 mx-auto" style="width: 58rem;">
        <div class="card-header sombra c-normal">
        <h4 class="card-title text-center text-white" style='font-size:28px;'>PERFIL</h4>
        </div>
            <div class="card-body">
                <p class="card-text">Nombre y Apellido:<?php echo $ver['nom_cli']." ". $ver['ape_cli'];?></p>
                <p class="card-text">Correo Electronico:<?php echo $ver['cor_cli'];?></p>
                <p class="card-text">Cedula:<?php echo $ver['ced_cli'];?></p>
                <p class="card-text">Rif:<?php echo $ver['rif_cli'];?></p>
                <p class="card-text">Direccion:<?php echo $ver['ads_cli']." ". $ver['ape_cli'];?></p>
                <p class="card-text">Telefono:<?php echo $ver['nom_cli']." ". $ver['ape_cli'];?></p>
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
  

