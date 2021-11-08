<div class="container p-4">
<?php
session_start();
  require_once "../../backend/class/conexion.php";
  $obj = new Conectar();
  $conexion = $obj->conexion();
  $sql ="SELECT cod_cli,
                nom_cli,
                ape_cli,
                ced_cli,
                rif_cli,
                ads_cli,
                cor_cli,
                tel_cli 
        FROM cliente
        WHERE est_cli='A'";
    $result=mysqli_query($conexion,$sql);            
?>
<br>
<br>
 <div class="card p-5 sombra" style="width:100%;height:100%">
    <div class="card-title mx-auto text-white text-center c-normal sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Clientes PDF</h3>
    </div>
    <hr style="width: 90%; height: 90%;" class="mx-auto">
    <table class="table table-hover table-bordered text-center" id="tablaClienteDataTablePDF">
    <thead class="bc-normal">
        <tr>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Cedula</td>
            <td>Rif</td>
            <td>Direccion</td>
            <td>Correo</td>
            <td>Telefono</td>
            <td>PDF</td>
        </tr>    
    </thead>
    <?php while($ver = mysqli_fetch_row($result)): ?>
        <tr>
            <td><?php echo $ver[1]; ?></td>
            <td><?php echo $ver[2]; ?></td>
            <td><?php echo $ver[3]; ?></td>
            <td><?php echo $ver[4]; ?></td>
            <td><?php echo $ver[5]; ?></td>
            <td><?php echo $ver[6]; ?></td>
            <td><?php echo $ver[7]; ?></td>
            <td>
                <a href="backend/controllers/clientes/ReporteClientePdf.php?idcliente=<?php echo $ver[0]?>" class="btn btn-danger btn-sm">
                <span><i class="fas fa-clipboard-check"></i></span>
            </td>
        </tr>
        <?php endwhile; ?> 
    </table>
 </div>
</div>

<script>
        $(document).ready(function() {
        $('#tablaClienteDataTablePDF').DataTable({
            "scrollX": true,
            "scrollCollapse": false,
            "language": idioma_español
        });
    } );

    var idioma_español= {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
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