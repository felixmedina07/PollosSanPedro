<?php 
   require_once "../../backend/class/conexion.php";
   $obj=new conectar();
   $conexion=$obj->conexion(); 
   $sql ="SELECT p.csp_pro,p.ces_pro,p.prp_pro,p.cpo_pro,p.cpa_pro,p.cal_pro,p.cmo_pro,p.fdp_pro,pr.nom_edo,p.act_pro 
          FROM productos AS p 
          INNER JOIN proovedor AS pr
          ON p.cod_edo=pr.cod_edo
          AND p.est_pro='A'";
   $result = mysqli_query($conexion,$sql);
?>
<div class="container p-4">
    <br>
    <br>
    <div class="card p-5 sombra">
        <div class="card-title mx-auto text-white text-center c-producto sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
                <h3>Cantidad Productos</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
        <table class="table table-hover table-bordered text-center" id="tablaProductoCantidad">
            <thead class="bc-producto">
            <tr>
                <td>Proovedor</td>
                <td>Fecha Llegada</td>
                <td>Peso Cestas Vacias</td>
                <td>Pollo por Cesta</td>
                <td>Promedio Pollo</td>
                <td>Cantidad Pollo</td>
                <td>Cantidad Patas</td>
                <td>Cantidad Alas</td>
                <td>Cantidad Molleja</td>
                <td>Estado</td>
            </tr>
            </thead>

            <?php while ($ver = mysqli_fetch_row($result)): ?>
            <tr>
                <td><?php echo $ver[8];?></td>
                <td><?php echo $ver[7]; ?></td>
                <td><?php echo $ver[0]."Kg"; ?></td>
                <td><?php echo $ver[1]."Und"; ?></td>
                <td><?php echo $ver[2]."Kg"; ?></td>
                <td><?php echo $ver[3]."Und"; ?></td>
                <td><?php echo $ver[4]."Kg"; ?></td>
                <td><?php echo $ver[5]."Kg"; ?></td>
                <td><?php echo $ver[6]."Kg"; ?></td>
                <td>
                    <?php if($ver[9]=='A'){?>
                        <span class="btn btn-activo disabled text-white" style="border-radius: 20px;"><i class="fas fa-check"></i></span>
                    <?php }else{?>
                        <span class="btn btn-danger disabled text-white" style="border-radius: 20px;"><i class="fas fa-times"></i></span>
                    <?php }?>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</div>

<script>
    $(document).ready(function() {
    $('#tablaProductoCantidad').DataTable( {
        "scrollX": "90%",
        "scrollCollapse": false,
        language:idioma_español,
    } );
} );
</script>