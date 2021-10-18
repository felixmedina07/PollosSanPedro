<?php
session_start();
$ver=$_SESSION['idUsuario'];
if(isset($_SESSION['nom_usu']) && $_SESSION['rol'] == 'A' || $_SESSION['rol'] == 'E' || $_SESSION['rol'] == 'S'){
    require_once "../head/head3.php";
    $es = new estilos();
    $head = $es->encabezado();
    // $head();
    require_once "../menu/menu2.php";
?>

<div class="container p-4">
    <div class="col">
    <a href="../../bn-casa.php" class="btn bc-banco"><i class="fas fa-angle-left"></i></a>
    </div>
<br>  
        <div class="mx-auto sombra" style="width: 50rem;">
         <div class="card mb-2">
            <div class="card-title mx-auto text-white text-center mt-4 pt-2 sombra c-banco" style="width: 70%; height: 70%; border-radius:10px;">
                <h4>Registrar Banco Pollos San Pedro</h4>
            </div>
            <hr style="width: 80%; height: 80%;" class="mx-auto" >
             <div class="card-body">
                <form id="frmBancoCasaF" method="POST" action="bnCasaFiltrado.php" autocomplete="off">
                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                        <div class="col ">
                            <input type="text" name="nuc_bnc" id="nuc_bnc" class="form-control" placeholder="Numero de Cuenta">
                            <small id="nu_error"></small>
                        </div>
                        <div class="col ">
                            <input type="text" name="rcd_bnc" id="rcd_bnc" class="form-control" placeholder="Rif o Cedula de la Cuenta">
                            <small id="rcd_error"></small>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                        <div class="col ">
                            <input type="text" name="nom_bnc" id="nom_bnc" class="form-control" placeholder="Nombre del Banco">
                            <small id="n_error"></small>
                        </div>
                        <div class="col">
                            <input type="text" name="cor_bnc" id="cor_bnc" class="form-control" placeholder="Email del Banco">
                            <small id="ema_error"></small>
                        </div>
                        </div>
                    </div>
                    <div class="form-group mt-3 mr-4 ml-4">
                        <div class="col text-center">
                        <input  class="btn px-8 bc-banco" type="submit" value="Guardar"></input>
                        </div>
                    </div>
                </form>
             </div>
         </div>
        </div>
</div> 
 
 <?php
   }else{
    header("location:../../sistema_principal.php");
     }
 ?> 
<?php
 $head2 = $es->pie();
 // $head2();
?>
