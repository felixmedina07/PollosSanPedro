<?php
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion=$obj->conexion();
$sql="SELECT b.not_bnt,
             b.ncu_bnt,
             b.tpc_bnt,
             b.rcd_bnt,
             b.nom_bnt,
             b.cor_bnt,
             b.tti_bnt,
             t.nom_tra,
             b.cod_bnt
     FROM bancos_trabajadores_resp as b
     INNER JOIN trabajadores_resp as t
     ON b.cod_tra=t.cod_tra"; 
    $result = mysqli_query($conexion,$sql);
?>
<br>
    <div class="card p-5 sombra">
        <div class="card-title mx-auto text-white text-center c-normal sombra mt-2 pt-2 " style="width: 80%; height: 80%; border-radius:10px;">
                <h3>Historial Bancos Trabajadores</h3>
        </div>
     <hr style="width: 90%; height: 90%;" class="mx-auto">
        <table class="table table-hover table-bordered text-center" id="tablabnTrabHDataTable">
            <thead class="bc-normal">
                <tr class="text-center">
                    <td>Nombre titular</td>
                    <td>Numero de cuenta</td>
                    <td>Tipo de Cuenta</td>
                    <td>Rif o Cedula</td>
                    <td>Nombre del Banco</td>
                    <td>Correo del Banco</td>
                    <td>Telefono del titular</td>
                    <td>Nombre Trabajador</td>
                </tr>
            </thead>
            <?php while ($ver=mysqli_fetch_row($result)): ?>
                <tr class="">
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

<script>
    $(document).ready(function() {
        $('#tablabnTrabHDataTable').DataTable({
            "scrollX": "90%",
            "scrollCollapse": false,
          "language":idioma_español
        });
    } );

    var idioma_español= {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
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
