<?php
session_start();
$ver=$_SESSION['idUsuario'];
if(isset($_SESSION['nom_usu']) && $_SESSION['rol'] == 'A' || $_SESSION['rol'] == 'E' || $_SESSION['rol'] == 'S'){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

<div class="container p-4">
    <div class="row">
              <div class="col-sm-12">
                  <span class="btn bc-normal" id="bncasaAgregaBtn">Agregar Bancos</span>
                  <span class="btn bc-normal ml-2" id="bncasaVerBtn">Ver Bancos</span>
                  <a class="btn bc-normal ml-2" href="view/bancos-casa/bnCasaFiltrar.php">Filtrar Bancos</a>
                  <?php if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A' && $ver==1): ?>
                  <span class="btn bc-normal ml-2" id="bncasaHistoralBtn">Historial</span>
                  <?php endif;?> 
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="bnCasaAgregar"></div>
                  <div id="bnCasaVer"></div>
                  <?php if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A' && $ver==1): ?>
                  <div id="bnCasaHistorial"></div>
                  <?php endif;?>
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
<script src="view/js/Principal/bncasa.js"></script>
<script>
 $(document).ready(function () {
           $('#bncasaAgregaBtn').click(function () {
               esconderSeccionVenta();
               $('#bnCasaAgregar').load('view/bancos-casa/bnCasaAgregar.php');
               $('#bnCasaAgregar').show();
           });
           $('#bncasaVerBtn').click(function () {
               esconderSeccionVenta();
               $('#bnCasaVer').load('view/bancos-casa/bnCasaVer.php');
               $('#bnCasaVer').show();
           });
           $('#bncasaHistoralBtn').click(function () {
               esconderSeccionVenta();
               $('#bnCasaHistorial').load('view/bancos-casa/bnCasaHistorial.php');
               $('#bnCasaHistorial').show();
           });

    });

       function esconderSeccionVenta() {
           $('#bnCasaAgregar').hide();
           $('#bnCasaVer').hide();
           $('#bnCasaHistorial').hide();
       }

</script>

