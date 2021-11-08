<div class="container p-4">
    
<?php 
   require_once "../../backend/class/conexion.php";
   $obj=new conectar();
   $conexion=$obj->conexion(); 
   $sql ="SELECT p.tas_pro,p.tpo_pro,p.tpa_pro,p.tmo_pro,p.tal_pro,p.ppo_pro,p.ppa_pro,p.pal_pro,p.pmo_pro,p.fdp_pro,pr.nom_edo,p.act_pro 
          FROM productos AS p 
          INNER JOIN proovedor AS pr
          ON p.cod_edo=pr.cod_edo
          AND p.est_pro='A'";
   $result = mysqli_query($conexion,$sql);
?>
    <br>
    <br>
    <div class="card p-5 sombra">
        <div class="card-title mx-auto text-white text-center c-normal sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
                <h3>Precio Productos</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
        <table class="table table-hover table-bordered text-center" id="tablaProductoPrecio">
            <thead class="bc-normal">
            <tr>
                <td>Proovedor</td>
                <td>Fecha llegada</td>
                <td>Tasa General</td>
                <td>Tasa Pollo</td>
                <td>Tasa Patas</td>
                <td>Tasa Molleja</td>
                <td>Tasa Alas</td>
                <td>Precio Pollos</td>
                <td>Precio Patas</td>
                <td>Precio Alas</td>
                <td>Precio Molleja</td>
                <td>Estado</td>
            </tr>
            </thead>

            <?php while ($ver = mysqli_fetch_row($result)): ?>
            <tr>
                <td><?php echo $ver[10];?></td>
                <td><?php echo $ver[9]; ?></td>
                <td><?php echo $ver[0]."Bs"; ?></td>
                <td><?php echo $ver[1]."$"; ?></td>
                <td><?php echo $ver[2]."$"; ?></td>
                <td><?php echo $ver[3]."$"; ?></td>
                <td><?php echo $ver[4]."$"; ?></td>
                <td><?php echo $ver[5]."Bs"; ?></td>
                <td><?php echo $ver[6]."Bs"; ?></td>
                <td><?php echo $ver[7]."Bs"; ?></td>
                <td><?php echo $ver[8]."Bs"; ?></td>
                <td>
                    <?php if($ver[11]=='A'){?>
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
        $('#tablaProductoPrecio').DataTable({
            "scrollX": "90%",
            "scrollCollapse": false,
            "language":idioma_español
        });
    } );

    var idioma_español= {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla ",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    };
</script>

