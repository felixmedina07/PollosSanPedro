<div class="container p-4">
<?php 
   require_once "../../backend/class/conexion.php";
   $obj=new conectar();
   $conexion=$obj->conexion(); 
   $sql="SELECT p.cod_pro,
                p.tas_pro,
                p.tpo_pro,
                p.tpa_pro,
                p.tmo_pro,
                p.tal_pro,
                p.ppo_pro,
                p.ppa_pro,
                p.pal_pro,
                p.pmo_pro,
                p.csp_pro,
                p.ces_pro,
                p.prp_pro,
                p.cpo_pro,
                p.cpa_pro,
                p.cal_pro,
                p.cmo_pro,
                p.fcp_pro,
                p.fdp_pro,
                p.act_pro,
                pr.nom_edo
         FROM productos_resp AS p 
         INNER JOIN proovedor_resp AS pr
         ON p.cod_edo=pr.cod_edo";
   $result = mysqli_query($conexion,$sql);
?>
<br>
<br>
 <div class="card p-5 sombra">
    <div class="card-title mx-auto text-white text-center c-normal sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
          <h3>Historial Productos</h3>
    </div>
    <hr style="width: 90%; height: 90%;" class="mx-auto">
    <table class="table table-responsive table-hover table-bordered text-center" id="tablaProductoH">
        <thead class="bc-normal">
        <tr>
            <td>Proovedor</td>
            <td>Fecha Salida</td>
            <td>Fecha LLegada</td>
            <td>Estado</td>
            <td>Tasa General</td>
            <td>Tasa Pollo</td>
            <td>Tasa Patas</td>
            <td>Tasa Molleja</td>
            <td>Tasa Alas</td>
            <td>Precio Pollos</td>
            <td>Precio Patas</td>
            <td>Precio Alas</td>
            <td>Precio Molleja</td>
            <td>Kilos Cestas Vacias</td>
            <td>Pollos por Cestas</td>
            <td>Promedio Pollo</td>
            <td>Cantidad Pollo</td>
            <td>Cantidad Patas</td>
            <td>Cantidad Alas</td>
            <td>Cantidad Molleja</td>
        </tr>
        </thead>

        <?php while ($ver = mysqli_fetch_row($result)): ?>
        <tr>
            <td><?php echo $ver[20]; ?></td>
            <td><?php echo $ver[17]; ?></td>
            <td><?php echo $ver[18]; ?></td>
            <td>
                    <?php if($ver[19]=='A'){?>
                        <span class="btn btn-activo disabled text-white"><i class="fas fa-check"></i></span>

                    <?php }else if($ver[19]=='B'){?>
                        <span class="btn btn-danger disabled text-white" ><i class="fas fa-times"></i></span>
                    <?php }?>
            </td>
            <td><?php echo $ver[1]."Bs"; ?></td>
            <td><?php echo $ver[2]."$"; ?></td>
            <td><?php echo $ver[3]."$"; ?></td>
            <td><?php echo $ver[4]."$"; ?></td>
            <td><?php echo $ver[5]."$"; ?></td>
            <td><?php echo $ver[6]."Bs"; ?></td>
            <td><?php echo $ver[7]."Bs"; ?></td>
            <td><?php echo $ver[8]."Bs"; ?></td>
            <td><?php echo $ver[9]."Kg"; ?></td>
            <td><?php echo $ver[10]."Und"; ?></td>
            <td><?php echo $ver[11]."Kg"; ?></td>
            <td><?php echo $ver[12]; ?></td>
            <td><?php echo $ver[13]; ?></td>
            <td><?php echo $ver[14]; ?></td>
            <td><?php echo $ver[15]; ?></td>
            <td><?php echo $ver[16]; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
 </div>
</div>

<script>
    $(document).ready(function() {
        $('#tablaProductoH').DataTable({
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
