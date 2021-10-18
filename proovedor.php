<?php
    session_start(); 
    $ver=$_SESSION['idUsuario'];
    if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A' && $ver==1){ 
        require_once "view/head/head2.php"; 
        require_once "view/menu/menu.php";
     ?>
 
      <div class="container p-4">
      <div class="row">
          <div class="col-md-12">
          <span class="btn bc-proovedor" id="proovedorAgregaBtn">Agregar Proovedor</span>
          <span class="btn bc-proovedor ml-2" id="proovedorverBtn">Ver Proovedor</span>
          <?php if(isset($_SESSION['nom_usu']) && $_SESSION['rol'] == 'A' && $ver==1): ?>
          <span class="btn bc-proovedor ml-2" id="proovedorHistorialBtn">Historial Proovedor</span>
          <?php endif; ?>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
            <div id="proovedorAgregar"></div>
            <div id="proovedorVer"></div>
            <?php if(isset($_SESSION['nom_usu']) && $_SESSION['rol'] == 'A' && $ver==1): ?>
            <div id="proovedorHistorial"></div>
            <?php endif; ?>
          </div>
      </div>
      </div>
      
    <?php require_once "view/footer/footer.php"; ?>

    <?php } else{
        header("location:index.php");
     } ?>

<script src="view/js/Principal/proovedor.js"></script>
<script>
        $(document).ready(function () {
                $('#proovedorAgregaBtn').click(function () {
                    esconderSeccionVenta();
                    $('#proovedorAgregar').load('view/proovedor/proovedorAgregar.php');
                    $('#proovedorAgregar').show();
                });
                $('#proovedorverBtn').click(function () {
                    esconderSeccionVenta();
                    $('#proovedorVer').load('view/proovedor/proovedorVer.php');
                    $('#proovedorVer').show();
                });
                $('#proovedorHistorialBtn').click(function () {
                    esconderSeccionVenta();
                    $('#proovedorHistorial').load('view/proovedor/proovedorHistorial.php');
                    $('#proovedorHistorial').show();
                });    

                
            });

            function esconderSeccionVenta() {
                $('#proovedorAgregar').hide();
                $('#proovedorVer').hide();
                $('#proovedorHistorial').hide();
            }
    </script>



