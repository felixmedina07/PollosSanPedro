<?php
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion=$obj->conexion();
$sql="SELECT n.nrf_nom,
             n.cnp_nom,
             n.fcu_nom,
             t.nom_tra,
             t.ape_tra,
             bc.nom_bnc,
             bt.nom_bnt
      FROM nomina_resp AS n
      INNER JOIN bancos_trabajadores_resp AS bt
      ON n.cod_bnt=bt.cod_bnt
      INNER JOIN bancos_casa_resp AS bc
      ON n.cod_bnc=bc.cod_bnc
      INNER JOIN trabajadores_resp AS t
      ON n.cod_tra=t.cod_tra";
$result=mysqli_query($conexion,$sql);
?>
<br>
    <div class="card p-5 sombra table-responsive">
        <div class="card-title mx-auto text-white text-center c-normal sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Historial Pago Nomina</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-hover  table-bordered  text-center" id="tablaNomina" style="width:100%">
                <thead class="bc-normal">
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
                <?php endwhile;?> 
            </table>
    </div>
<script>
    $(document).ready(function() {
        $('#tablaNomina').DataTable({
            "scrollX": true,
            "scrollCollapse": true,
            "language": idioma_español,
        });
    });

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