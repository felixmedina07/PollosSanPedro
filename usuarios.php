<?php
session_start();
$ver=$_SESSION['idUsuario'];

if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A' && $ver == 1){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

<div class="container p-4">
          <div class="row">
              <div class="col-sm-12">
                  <span class="btn bc-usuario" id="usuarioVerbtn">Ver Usuario</span>
                <?php if( isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A' && $ver==1): ?>
                    <span class="btn bc-usuario ml-2" id="usuarioHistorialbtn">Historial</span> 
                  <a href="backend/despacho/respaldo.php" class="btn bc-usuario ml-2">Respaldo</a>
                <?php endif; ?>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="usuarioVer"></div>
                  <div id="usuarioHistorial"></div>
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

<script>
 $(document).ready(function () {
           $('#usuarioVerbtn').click(function () {
               esconderSeccionVenta();
               $('#usuarioVer').load('view/usuarios/UsuarioVer.php');
               $('#usuarioVer').show();
           });
           $('#usuarioHistorialbtn').click(function () {
               esconderSeccionVenta();
               $('#usuarioHistorial').load('view/usuarios/UsuarioHistorial.php');
               $('#usuarioHistorial').show();
           });

          
    });


       
    function esconderSeccionVenta() {
           $('#usuarioVer').hide();
           $('#usuarioHistorial').hide();
       }

 $(document).ready(function(){
     $('#usuarioVerbtn').on('dblclick', function(){
        $('#usuarioVer').hide();
        $('#usuarioHistorial').hide();
     })
 })
      

</script>

