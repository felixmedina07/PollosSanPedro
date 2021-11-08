<?php 
    require_once "../../backend/class/conexion.php";
    $obj= new Conectar();
    $conexion= $obj->conexion();
    $sql="SELECT cod_usu,nom_usu,ema_usu,rol_usu,cre_usu FROM usuarios_resp WHERE est_usu='A'";
    $result=mysqli_query($conexion,$sql); 
  ?>   


<div class="container p-4">
<br>
<br>
        
  <div class="card p-5 sombra table-responsive">
        <div class="card-title mx-auto text-white text-center c-normal sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Historial Usuarios</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
    <table class="table table-hover table-bordered text-center" id="tablaUsuarioH">
            <thead class="bc-normal">
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Rol</td>
                    <td>Fecha de creacion</td>
            </thead>
        <?php while($ver = mysqli_fetch_row($result)): ?>
            <tr>
                <td><?php echo $ver[1]; ?></td>
                <td><?php echo $ver[2]; ?></td>
                <td><?php echo $ver[3]; ?></td>
                <td><?php echo $ver[4]; ?></td>
            </tr>
            <?php endwhile; ?> 
        </table>
  </div>

</div>   

<script>
        $(document).ready(function() {
        $('#tablaUsuarioH').DataTable({
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