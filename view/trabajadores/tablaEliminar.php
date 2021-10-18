<?php
  session_start();
  $ide=$_SESSION['idUsuario'];
  require_once "../../backend/class/conexion.php";
  $obj = new Conectar();
  $conexion = $obj->conexion();
  $sql ="SELECT cod_tra,
                nom_tra,
                ape_tra,
                ced_tra,
                ads_tra,
                cor_tra,
                tel_tra
        FROM trabajadores
        WHERE est_tra='B'";
    $result=mysqli_query($conexion,$sql);
?>
   <br>
 <div class="card p-5 sombra">
    <div class="card-title mx-auto text-white text-center c-clientep sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Papelera Trabajadores</h3>
    </div>
    <hr style="width: 90%; height: 90%;" class="mx-auto">
    <table class="table table-hover table-bordered text-center" id="tablaTrabajadoresD">
        <thead class="bc-clientep">
            <tr>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Cedula</td>
                <td>Direccion</td>
                <td>Correo</td>
                <td>Telefono</td>
                <?php if($_SESSION['rol']=='A'): ?>
                <td>Eliminar</td>
                <td>Restaurar</td>
                <?php endif;?>
            </tr>
        </thead>
        <tbody>
        <?php while($ver = mysqli_fetch_row($result)): ?>
            <tr>
                <td><?php echo $ver[1];?></td>
                <td><?php echo $ver[2];?></td>
                <td><?php echo $ver[3];?></td>
                <td><?php echo $ver[4];?></td>
                <td><?php echo $ver[5];?></td>
                <td><?php echo $ver[6];?></td>
                <?php if($_SESSION['rol']=='A'): ?>
                <td>
                    <span class="btn btn-danger btn-sm" onclick="eliminarTrabajador('<?php echo $ver[0];?>')">
                        <i class="fas fa-trash"></i>
                    </span>
                </td>
                <td>
                    <span class="btn btn-warning btn-sm" onclick="restaurar('<?php echo $ver[0];?>')">
                        <i class="fas fa-undo-alt"></i>
                    </span>
                </td>
                <?php endif;?>
            </tr>
            <?php endwhile; ?>
        </tbody> 
    </table>
 </div>

<script>

function eliminarTrabajador(idtrab) {
            alertify.confirm('¿Desea eliminar esta categoria ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idtrab=" + idtrab ,
                        url:"../../backend/controllers/trabajadores/EliminarTrabajador.php",
                        success:function(r){
                             if (r==1){
                                $('#tablaEliminar').load('tablaEliminar.php');
                                alertify.success('Elimando Con Exito');
                            }else{
                                alertify.error('No Se Pudo Eliminar');
                            }
                        }
                    });
                },function(){
                    alertify.error('Cancelo operacion')
                });
        }
</script>

<script>

function restaurar(idtrab) {
            alertify.confirm('¿Desea Restaurar esta categoria ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idtrab=" + idtrab ,
                        url:"../../backend/controllers/trabajadores/Restaurar.php",
                        success:function(r){
                             if (r==1){
                                $('#tablaEliminar').load('tablaEliminar.php');
                                alertify.success('Restaurado Con Exito');
                            }else{
                                alertify.error('No Se Pudo Restaurar');
                            }
                        }
                    });
                },function(){
                    alertify.error('Cancelo operacion')
                });
        }
</script>

<script>
  $(document).ready(function() {
        $('#tablaTrabajadoresD').DataTable({
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