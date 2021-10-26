<?php
session_start();
$ver=$_SESSION['idUsuario'];
if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A'){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

<div class="container p-4">
          <div class="row">
              <div class="col-sm-6">
                  <span class="btn bc-cuadres mr-2" id="cuadreAgregarBtn">Agregar Cuadre</span>
                  <span class="btn bc-cuadres mr-2" id="cuadreVerBtn">Ver Cuadre</span>
                  <!-- <span class="btn bc-cuadres" id="cuadreDAgregarBtn">Modificar Facturacion</span> -->
                  <?php if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A' && $ver == 1): ?>
                    <span class="btn bc-cuadres" id="cuadreHistorialBtn">Historial</span>
                  <?php endif; ?> 
              </div>
              <div class="col-sm-6 d-flex justify-content-end">
                <a href="despacho.php" class="btn bc-despacho" id="">Facturacion</a>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="cuadreAgregar"></div>
                  <div id="cuadreVer"></div>
                  <!-- <div id="DespachoM"></div> -->
                  <?php if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A' && $ver == 1): ?>
                  <div id="DespachoH"></div>
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
<script src="view/js/Principal/cuadres.js"></script>

<script>
 $(document).ready(function () {
           $('#cuadreAgregarBtn').click(function () {
               esconderSeccionVenta();
               $('#cuadreAgregar').load('view/cuadres/CuadresAgregar.php');
               $('#cuadreAgregar').show();
           });

          
    });

    $(document).ready(function () {
           $('#cuadreVerBtn').click(function () {
               esconderSeccionVenta();
               $('#cuadreVer').load('view/cuadres/CuadresVer.php');
               $('#cuadreVer').show();
           });      
    });

    // $(document).ready(function () {
    //        $('#cuadreDAgregarBtn').click(function () {
    //            esconderSeccionVenta();
    //            $('#DespachoM').load('view/cuadres/CuadresDAgregar.php');
    //            $('#DespachoM').show();
    //        });
    // });

    // $(document).ready(function () {
    //        $('#cuadreDAgregarBtn').click(function () {
    //            esconderSeccionVenta();
    //            $('#DespachoM').load('view/cuadres/CuadresDAgregar.php');
    //            $('#DespachoM').show();
    //        });
    // });
 
    $(document).ready(function () {
           $('#cuadreHistorialBtn').click(function () {
               esconderSeccionVenta();
               $('#DespachoH').load('view/cuadres/CuadresHistorial.php');
               $('#DespachoH').show();
           });
    });
       
    function esconderSeccionVenta() {
           $('#cuadreAgregar').hide();
           $('#cuadreVer').hide();
        //    $('#DespachoM').hide();
           $('#DespachoH').hide();
       }

  

</script>