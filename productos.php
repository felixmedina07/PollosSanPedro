<?php
session_start();
$ver=$_SESSION['idUsuario'];
if(isset($_SESSION['nom_usu']) && $_SESSION['rol'] == 'A' && $ver==1){
require_once "view/head/head2.php";
require_once "view/menu/menu.php";
?>

<div class="container p-4">
          <div class="row mt-2">
              <div class="col-sm-12">
                  <span class="btn bc-normal" id="productoAgregaBtn">Agregar Productos</span>
                  <span class="btn bc-normal ml-2" id="productoCantidadBtn">Cantidad Productos</span>
                  <span class="btn bc-normal ml-2" id="productoPrecioBtn">Precios Productos</span>
                  <span class="btn bc-normal ml-2" id="productoverBtn">Estado Productos</span>
                  <span class="btn bc-normal ml-2" id="productoPdfBtn">Pdf Productos</span>
                  <?php if(isset($_SESSION['nom_usu']) && $_SESSION['rol'] == 'A' && $ver==1): ?>
                    <span class="btn bc-normal ml-2" id="productoHistorialBtn">Historial</span>
                  <?php endif; ?> 
             </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="productoAgregar"></div>
                  <div id="productoCantidad"></div>
                  <div id="productoPrecio"></div>
                  <div id="productoVer"></div>
                  <div id="productoPdf"></div>
                  <?php if(isset($_SESSION['nom_usu']) && $_SESSION['rol'] == 'A' && $ver==1): ?>
                    <div id="productoHistorial"></div>
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
<script src="view/js/Principal/producto.js"></script>
<script>
 $(document).ready(function () {
           $('#productoAgregaBtn').click(function () {
               esconderSeccionProducto();
               $('#productoAgregar').load('view/producto/productoAgregar.php');
               $('#productoAgregar').show();
           });
           $('#productoCantidadBtn').click(function(){
            esconderSeccionProducto();
            $('#productoCantidad').load('view/producto/productoCantidad.php');
            $('#productoCantidad').show();
           });
           $('#productoPrecioBtn').click(function(){
            esconderSeccionProducto();
            $('#productoPrecio').load('view/producto/productoPrecio.php');
            $('#productoPrecio').show();
           });
           
           $('#productoverBtn').click(function () {
            esconderSeccionProducto();
            $('#productoVer').load('view/producto/productoVer.php');
            $('#productoVer').show();
           });
        
           $('#productoPdfBtn').click(function(){
            esconderSeccionProducto();
            $('#productoPdf').load('view/producto/productoPdf.php');
            $('#productoPdf').show();
           });

           $('#productoHistorialBtn').click(function(){
            esconderSeccionProducto();
            $('#productoHistorial').load('view/producto/productoHistorial.php');
            $('#productoHistorial').show();
           });

    });

        async function esconderSeccionProducto() {
           $('#productoAgregar').hide();
           $('#productoCantidad').hide();
           $('#productoPrecio').hide();
           $('#productoVer').hide();
           $('#productoPdf').hide();
           $('#productoHistorial').hide();
       }
</script>