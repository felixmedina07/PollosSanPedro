<?php 
session_start();
if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A'|| $_SESSION['rol'] =='E'||$_SESSION['rol']=='S'){
require_once "../head/head3.php";
$es = new estilos();
$head = $es->encabezado();
require_once "../menu/menu2.php";
$trab = $_POST['bnTrabajadorSelect'];
 $desglose=explode("-",$trab);
 $nomT=($trab === 'A')?"":$desglose[0];
 $not = $_POST['not_bnt'];
 $ncu = $_POST['ncu_bnt'];
 $tpc = $_POST['tpc_bnt'];
 $rcd = $_POST['rcd_bnt'];
 $nom = $_POST['nom_bnt'];
 $cor = $_POST['cor_bnt'];
 $tti = $_POST['tti_bnt'];
 $apeT=($trab === 'A')?"":$desglose[1];
 $datos = array(
    $nomT,
    $not,
    $ncu,
    $tpc,
    $rcd,
    $nom,
    $cor,
    $tti,
    $apeT
 );
 require_once "../../backend/class/bnTrabajadores.php";
 $fil = new BnTrabajador();
 $result = $fil->filtrar($datos);
?>
<div class="container p-4">
<div class="row">
<a href="../../menu_bn_trabajadores.php" class="btn bc-banco"><i class="fas fa-angle-left"></i></a>
</div>
<br>
    <div class="card p-5 sombra">
        <div class="card-title mx-auto text-white text-center c-banco sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Bancos Trabajadores Filtrados</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-hover table-bordered  text-center">
                <thead class="bc-banco">
                    <tr>
                        <td>Trabajador</td>
                        <td>Nombre titular</td>
                        <td>Numero de cuenta</td>
                        <td>Tipo de Cuenta</td>
                        <td>Rif o Cedula</td>
                        <td>Banco</td>
                        <td>Correo del Banco</td>
                        <td>Telefono</td>
                    </tr>
                </thead>
                <?php if(!(mysqli_num_rows($result) > 0)):?>
                    <tr>
                        <td colspan="8">No hay Datos</td>
                    </tr>
                <?php endif;?>
                <?php while($ver = mysqli_fetch_row($result)): ?>
                    <tr>
                        <td><?php echo $ver[0];?></td>
                        <td><?php echo $ver[1];?></td>
                        <td><?php echo $ver[2];?></td>
                        <td><?php echo $ver[3];?></td>
                        <td><?php echo $ver[4];?></td>
                        <td><?php echo $ver[5];?></td>
                        <td><?php echo $ver[6];?></td>
                        <td><?php echo $ver[7];?></td>
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
