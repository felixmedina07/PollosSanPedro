<?php
require_once "../../backend/class/conexion.php";
session_start();
$obj= new Conectar();
$conexion=$obj->conexion();
$idUsuario= $_SESSION['idUsuario'];
$sql="SELECT b.not_bnk,
             b.ncu_bnk,
             b.tpc_bnk,
             b.rcd_bnk,
             b.nom_bnk,
             b.cor_bnk,
             b.tti_bnk,
             c.nom_cli,
             b.cod_bnk
     FROM bancos_cliente as b
     INNER JOIN cliente as c
     ON b.cod_cli=c.cod_cli AND c.cod_cli='$idUsuario'"; 
    $result = mysqli_query($conexion,$sql); 
?>
<br>

    <div class="card p-5 sombra">
        <div class="card-title mx-auto text-white text-center c-banco sombra mt-2 pt-2 " style="width: 90%; height: 90%; border-radius:10px;">
                <h3>Mis Bancos</h3>
        </div>
     <hr style="width: 90%; height: 90%;" class="mx-auto">
     <table class="table table-hover table-bordered text-center" id="tablabnDataTable" style="width:100%">
            <thead class="bc-banco">
                <tr class="text-center">
                    <td>Nombre titular</td>
                    <td>Numero de cuenta</td>
                    <td>Tipo de Cuenta</td>
                    <td>Rif o Cedula</td>
                    <td>Banco</td>
                    <td>Correo del Banco</td>
                    <td>Telefono</td>
                    <td>Cliente</td>
                </tr>
            </thead>
            <?php while ($ver=mysqli_fetch_row($result)): ?>
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

<script>
    $(document).ready(function() {
        $('#tablabnDataTable').DataTable({
            "scrollX": true,
            "scrollCollapse": true,
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
