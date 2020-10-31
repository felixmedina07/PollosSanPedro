<?php
session_start();
$ver=$_SESSION['idUsuario'];
if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A' && $ver == 1){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

<h1>hola Precio</h1>

 <?php
   }else{
    header("location:index.php");
     }
 ?> 
<?php
 require_once "view/footer/footer.php";
?>