<?php
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion=$obj->conexion();
$sql="SELECT b.not_bnk,
             b.ncu_bnk,
             b.tpc_bnk,
             b.rcd_bnk,
             b.nom_bnk,
             b.cor_bnk,
             b.tti_bnk,
             c.nom_cli,
             b.cod_bnk
     FROM bancos_cliente_resp as b
     INNER JOIN cliente_resp as c
     ON b.cod_cli=c.cod_cli"; 
    $result = mysqli_query($conexion,$sql); 
?>

<div class="container p-4">
<br>
<br>
    <div class="card p-5 sombra" style="width:110%;height:110%">
        <div class="card-title mx-auto text-white text-center c-normal sombra mt-2 pt-2 " style="width: 80%; height: 80%; border-radius:10px;">
                <h3>Historial Bancos Clientes</h3>
        </div>
     <hr style="width: 90%; height: 90%;" class="mx-auto">
        <table class="table table-hover table-bordered text-center" id="tablabnHDataTable">
            <thead class="bc-normal">
                <tr class="text-center">
                    <td>Nombre titular</td>
                    <td>Numero de cuenta</td>
                    <td>Tipo de Cuenta</td>
                    <td>Rif o Cedula</td>
                    <td>Nombre del Banco</td>
                    <td>Correo del Banco</td>
                    <td>Telefono del titular</td>
                    <td>Nombre Cliente</td>
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
</div>

<script>
    $(document).ready(function() {
        $('#tablabnHDataTable').DataTable({
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
