<?php
session_start();
$ver=$_SESSION['idUsuario'];
if(isset($_SESSION['nom_usu'])&& $_SESSION['rol']=='A'||$_SESSION['rol']=='E'||$_SESSION['rol']=='S'){
require_once "view/head/head2.php";
require_once "view/menu/menu.php";

?>

  
    <div class="container p-4">
    <div class="row">
                <div class="col-sm-12">
                  <span class="btn bc-cliente" id="clienteAgregaBtn">Agregar Clientes</span>
                  <span class="btn bc-cliente ml-2" id="clienteverBtn">Ver Clientes</span>
                  <span class="btn bc-cliente ml-2" id="clientePdfBtn">Pdf Clientes Detallados</span>
                  <?php if(isset($_SESSION['nom_usu']) && $_SESSION['rol'] == 'A' && $ver==1): ?>
                    <span class="btn bc-cliente ml-2" id="clienteHistorialBtn">Historial</span>
                  <?php endif;?>  
                  <a href="backend/controllers/clientes/ReporteClientesTodosPdf.php" class="btn bc-cliente ml-2">
                  Pdf Clientes Todos
                  </a>
                </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="clienteAgregar"></div>
                  <div id="clienteVer"></div>
                  <div id="clientePdf"></div>
                  <?php if(isset($_SESSION['nom_usu']) && $_SESSION['rol'] == 'A' && $ver==1): ?>
                  <div id="clienteHistorial"></div>
                  <?php endif;?>
              </div>
          </div>
    </div>

    <?php
        require_once "view/footer/footer.php";
    ?>
     <script src="view/js/Principal/cliente.js"></script>
     <script>
        $(document).ready(function () {
                $('#clienteAgregaBtn').click(function () {
                    esconderSeccionVenta();
                    $('#clienteAgregar').load('view/clientes/clienteAgregar.php');
                    $('#clienteAgregar').show();
                });
                $('#clienteverBtn').click(function () {
                    esconderSeccionVenta();
                    $('#clienteVer').load('view/clientes/clienteVer.php');
                    $('#clienteVer').show();
                });
                $('#clientePdfBtn').click(function(){
                    esconderSeccionVenta();
                    $('#clientePdf').load('view/clientes/clientePdf.php');
                    $('#clientePdf').show();
                });
                $('#clienteHistorialBtn').click(function(){
                    esconderSeccionVenta();
                    $('#clienteHistorial').load('view/clientes/clienteHistorial.php');
                    $('#clienteHistorial').show();
                });
    
                
            });

            function esconderSeccionVenta() {
                $('#clienteAgregar').hide();
                $('#clienteVer').hide();
                $('#clientePdf').hide();
                $('#clienteHistorial').hide();
            }
    </script>
  
 <?php
   }else{
    header("location:index.php");
     }
 ?> 
