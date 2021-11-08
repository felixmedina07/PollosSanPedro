<?php
session_start();
$ver=$_SESSION['idUsuario'];
if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A'|| $_SESSION['rol'] =='E'||$_SESSION['rol']=='S'){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";    
?>
<div class="container p-4">
    <div class="row">
              <div class="col-sm-12">
                  <span class="btn bc-normal" id="bnclienteAgregaBtn">Agregar Bancos Clientes</span>
                  <span class="btn bc-normal ml-2" id="bnclienteVerBtn">Ver Bancos Clientes</span>
                  <?php if(isset($_SESSION['nom_usu']) && $_SESSION['rol'] == 'A' && $ver==1): ?>
                    <span class="btn bc-normal ml-2" id="bnclienteHistorialBtn">Historial</span>
                  <?php endif; ?>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="bnClienteAgregar"></div>
                  <div id="bnClienteVer"></div>
                  <?php if(isset($_SESSION['nom_usu']) && $_SESSION['rol'] == 'A' && $ver==1): ?>
                  <div id="bnclienteHistorial"></div>
                  <?php endif; ?>
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
<script src="view/js/Principal/bncliente.js"></script>
<script>
 $(document).ready(function () {
           $('#bnclienteAgregaBtn').click(function () {
               esconderSeccionVenta();
               $('#bnClienteAgregar').load('view/bancos-clientes/bnClienteAgregar.php');
               $('#bnClienteAgregar').show();
           });
           $('#bnclienteVerBtn').click(function () {
               esconderSeccionVenta();
               $('#bnClienteVer').load('view/bancos-clientes/bnClienteVer.php');
               $('#bnClienteVer').show();
           });
           $('#bnclienteHistorialBtn').click(function () {
               esconderSeccionVenta();
               $('#bnclienteHistorial').load('view/bancos-clientes/bnClienteHistorial.php');
               $('#bnclienteHistorial').show();
           });

    });

       function esconderSeccionVenta() {
           $('#bnClienteAgregar').hide();
           $('#bnClienteVer').hide();
           $('#bnclienteHistorial').hide();
       }

</script>

