<?php 
session_start();
if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A'|| $_SESSION['rol'] =='E'||$_SESSION['rol']=='S'){
require_once "../head/head3.php";
$es = new estilos();
$head = $es->encabezado();
require_once "../menu/menu2.php";
$trab = $_POST['bnTrabajadorSelect'];
$banc = ($_POST['bnCasaSelect'] === 'A')?"":$banc;
$bant=($_POST['bnbTrabajadorSelect'] === 'A')?"":$_POST['bnbTrabajadorSelect'];
 $desglose=explode("-",$trab);
 $nomT=($trab === 'A')?"":$desglose[0];
 $nrf = $_POST['nrf_nom'];
 $cnp = $_POST['cnp_nom'];
 $fcu = $_POST['fcu_nom'];
 $apeT=($trab === 'A')?"":$desglose[1];
 $datos = array(
    $nomT,
    $apeT,
    $banc,
    $bant,
    $nrf,
    $cnp,
    $fcu
 );
 require_once "../../backend/class/nomina.php";
 $fil = new Nomina();
 $result = $fil->filtrar($datos);
?>
<div class="container p-4">
<div class="row">
<a href="../../menu_pg_nomina.php" class="btn bc-cuenta"><i class="fas fa-angle-left"></i></a>
</div>
<br>
    <div class="card p-5 sombra">
        <div class="card-title mx-auto text-white text-center c-cuenta sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Pago Nomina Filtrados</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-hover table-bordered  text-center">
                <thead class="bc-cuenta">
                    <tr>
                        <td>Nombre Trabajador</td>
                        <td>Apellido Trabajador</td>
                        <td>Banco Trabajador</td>
                        <td>Banco Empresa</td>
                        <td>Numero Referencia</td>
                        <td>Cantidad Transferencia</td>
                        <td>Fecha Pago</td>
                    </tr>
                </thead>
                <?php if(!(mysqli_num_rows($result) > 0)):?>
                    <tr>
                        <td colspan="8">No hay Datos</td>
                    </tr>
                <?php endif;?>
                <?php while($ver = mysqli_fetch_row($result)): ?>
                    <tr>
                        <td><?php echo $ver[3];?></td>
                        <td><?php echo $ver[4];?></td>
                        <td><?php echo $ver[6];?></td>
                        <td><?php echo $ver[5];?></td>
                        <td><?php echo $ver[0];?></td>
                        <td><?php echo $ver[1];?></td>
                        <td><?php echo $ver[2];?></td>
                    </tr>
                <?php endwhile; ?> 
            </table>
    </div>
</div>
<?php
   }else{
    header("location:../../index.php");
     }
 ?>

<?php 
$head = $es->pie(); 
?>
