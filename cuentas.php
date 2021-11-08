<?php
session_start();
$ver=$_SESSION['idUsuario'];
if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A'||$_SESSION['rol']=='E'||$_SESSION['rol']=='S'){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

  <div class="container p-4">
          <div class="row">
                <div class="col-sm-8">
                  <span class="btn bc-normal" id="cuentaAgregaBtn">Agregar Cuentas </span>
                  <span class="btn bc-normal ml-2" id="cuentaverBtn">Ver Cuentas</span>
                  <span class="btn bc-normal ml-2" id="cuentaestadoBtn">Estado Cuentas</span>
                  <span class="btn bc-normal ml-2" id="cuentaPdfBtn">Pdf Cuentas</span>
                  <?php if($_SESSION['rol']=='A' && $ver == 1): ?>
                    <span class="btn bc-normal ml-2" id="cuentaHistorialBtn">Historial</span>
                  <?php endif;?>  
                </div>
                <?php if($_SESSION['rol']=='A' && $ver == 1): ?> 
                <div class="col-sm-4 d-flex justify-content-end">
                <span class="btn bc-normal" id="cuentaUpdateBtn">Actualizar Cuentas</span>
                </div>
               <?php endif;?> 
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="cuentaAgregar"></div>
                  <div id="cuentaVer"></div>
                  <div id="cuentaEstado"></div>
                  <div id="cuentaPdf"></div>
                  <?php if($_SESSION['rol']=='A' && $ver == 1): ?>
                  <div id="cuentaHistorial"></div>
                  <div id="cuentaUpdate"></div>
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
<script src="view/js/Principal/cuentas.js"></script>
<script>
$(document).ready(function () {
           $('#cuentaAgregaBtn').click(function () {
               esconderSeccionVenta();
               $('#cuentaAgregar').load('view/cuentas/CuentasAgregar.php');
               $('#cuentaAgregar').show();
           });
           $('#cuentaverBtn').click(function () {
               esconderSeccionVenta();
               $('#cuentaVer').load('view/cuentas/CuentasVer.php');
               $('#cuentaVer').show();
           });
           $('#cuentaestadoBtn').click(function () {
               esconderSeccionVenta();
               $('#cuentaEstado').load('view/cuentas/cuentaEstado.php');
               $('#cuentaEstado').show();
           });
           $('#cuentaPdfBtn').click(function(){
              esconderSeccionVenta();
              $('#cuentaPdf').load('view/cuentas/CuentasPdf.php');
              $('#cuentaPdf').show();
           });
           $('#cuentaHistorialBtn').click(function(){
              esconderSeccionVenta();
              $('#cuentaHistorial').load('view/cuentas/CuentaHistorial.php');
              $('#cuentaHistorial').show();
           });
           $('#cuentaUpdateBtn').click(function(){
              esconderSeccionVenta();
              $('#cuentaUpdate').load('view/cuentas/CuentasUpdate.php');
              $('#cuentaUpdate').show();
           });

        
    });

       function esconderSeccionVenta() {
           $('#cuentaAgregar').hide();
           $('#cuentaVer').hide();
           $('#cuentaEstado').hide();
           $('#cuentaPdf').hide();
           $('#cuentaHistorial').hide();
           $('#cuentaUpdate').hide();
       }
</script> 
