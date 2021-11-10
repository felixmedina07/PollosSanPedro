<?php
  session_start();
  require_once "../../backend/class/conexion.php";
  $obj = new Conectar();
  $conexion = $obj->conexion();
  $sql ="SELECT p.cod_ped,
        p.cpo_ped,
        p.cpa_ped,
        p.cmo_ped,
        p.cal_ped,
        p.fec_ped,
        p.inf_ped,
        c.nom_cli
        FROM pedidos_resp as p
        INNER JOIN cliente_resp as c
     ON p.cod_cli=c.cod_cli";
    $result=mysqli_query($conexion,$sql);            
?>
<br>
    <div class="card p-5 sombra">
        <div class="card-title mx-auto text-white text-center c-normal sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Historial Pedidos</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-hover table-bordered  text-center norwap" id="tablaPedHDataTable" style="width:100%;">
                <thead class="bc-normal">
                    <tr>
                        <td>Cliente</td>
                        <td>Pollos</td>
                        <td>Patas</td>
                        <td>Mollejas</td>
                        <td>Alas</td>
                        <td>Fecha del Pedido</td>
                        <td>Estatus</td>
                    </tr>  
                </thead>
                <?php while($ver = mysqli_fetch_row($result)): ?>
                    <tr>
                        <td><?php echo $ver[7];?></td>
                        <td><?php echo $ver[1];?></td>
                        <td><?php echo $ver[2];?></td>
                        <td><?php echo $ver[3];?></td>
                        <td><?php echo $ver[4];?></td>
                        <td><?php echo $ver[5];?></td>
                        <td><?php echo $ver[6];?></td>
                    </tr>
                <?php endwhile; ?> 
            </table>
    </div>

    <script>
    $(document).ready(function() {
        $('#tablaPedHDataTable').DataTable({
            "scrollX": "100%",
            "scrollCollapse": false,
            "language": idioma_español
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