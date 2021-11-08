<?php
session_start();
$ver=$_SESSION['idUsuario'];
if(isset($_SESSION['nom_usu']) && $_SESSION['rol'] == 'A' || $_SESSION['rol'] == 'E'){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

<div class="container p-4">
          <div class="row">
                <div class="col-sm-8">
                  <span class="btn bc-normal" id="despachoAgregaBtn">Agregar Facturacion</span>
                  <span class="btn bc-normal ml-2" id="despachoverBtn">Ver Facturacion</span>
                  <span class="btn bc-normal ml-2" id="despachoPdfBtn">Pdf Facturacion</span>
                  <?php if($_SESSION['rol']=='A' && $ver == 1): ?>  
                    <span class="btn bc-normal ml-2" id="despachoHistorialBtn">Historial</span>
                  <?php endif; ?>
                </div>
               <?php if($_SESSION['rol']=='A' && $ver == 1): ?> 
                <div class="col-sm-4 d-flex justify-content-end">
                 <a href="cuadres.php" class="btn bc-normal" id="">Cuadres</a>
                </div>
               <?php endif; ?> 
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="despachoAgregar"></div>
                  <div id="despachoVer"></div>
                  <div id="despachoPdf"></div>
                  <?php if($_SESSION['rol']=='A' && $ver == 1): ?>
                  <div id="despachoHistorial"></div>
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
<script src="view/js/Principal/despacho.js"></script>
<script>
$(document).ready(function () {
           $('#despachoAgregaBtn').click(function () {
               esconderSeccionVenta();
               $('#despachoAgregar').load('view/despacho/DespachoAgregar.php');
               $('#despachoAgregar').show();
           });
           $('#despachoverBtn').click(function () {
               esconderSeccionVenta();
               $('#despachoVer').load('view/despacho/DespachoVer.php');
               $('#despachoVer').show();
           });
           $('#despachoPdfBtn').click(function(){
              esconderSeccionVenta();
              $('#despachoPdf').load('view/despacho/DespachoPdf.php');
              $('#despachoPdf').show();
           });
           $('#despachoHistorialBtn').click(function(){
              esconderSeccionVenta();
              $('#despachoHistorial').load('view/despacho/DespachoHistorial.php');
              $('#despachoHistorial').show();
           });
        
    });

       function esconderSeccionVenta() {
           $('#despachoAgregar').hide();
           $('#despachoVer').hide();
           $('#despachoPdf').hide();
           $('#despachoHistorial').hide();
       }
</script>