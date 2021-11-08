<?php 
    require_once "../../backend/class/conexion.php";
    $obj= new Conectar();
    $conexion= $obj->conexion();
    $sql="SELECT cod_usu,nom_usu,ema_usu,rol_usu,las_usu FROM usuarios WHERE est_usu='B'";
    $result=mysqli_query($conexion,$sql); 
  ?>   


<div class="container p-4">
<br>
<br>
        <div class="card p-5 sombra table-responsive">
            <div class="card-title mx-auto text-white text-center c-normal sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
                <h3>Papelera Usuarios</h3>
            </div>
            <hr style="width: 90%; height: 90%;" class="mx-auto">
                <table class="table table-hover table-bordered text-center" id="tablaUsuarioD">
                    <thead class="bc-normal">
                        <tr>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Rol</td>
                            <td>Ultimo logeo</td>
                            <td>Eliminar</td>
                            <td>Restaurar</td>
                        </tr>    
                    </thead>
                    <?php while($ver = mysqli_fetch_row($result)): ?>
                        <tr>
                            <td><?php echo $ver[1]; ?></td>
                            <td><?php echo $ver[2]; ?></td>
                            <td><?php echo $ver[3]; ?></td>
                            <td><?php echo $ver[4]; ?></td>
                            <td>
                                <span class="btn btn-danger btn-sm" onclick="eliminarUsuario('<?php echo $ver[0]; ?>')">
                                    <i class="fas fa-trash"></i>
                                </span>
                            </td>
                            <td>
                                <span class="btn btn-warning btn-sm" onclick="restaurar('<?php echo $ver[0]; ?>')">
                                    <i class="fas fa-undo-alt"></i>
                                </span>
                            </td>
                        </tr>
                    <?php endwhile; ?> 
                 </table>

        </div>
   
 <script>

function eliminarUsuario(idusuario) {
            alertify.confirm('¿Desea eliminar esta categoria ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idusuario=" + idusuario ,
                        url:"backend/controllers/usuarios/EliminarUsuario.php",
                        success:function(r){
                             if (r==1){
                                $('#usuario').load('view/usuarios/UsuarioEliminar.php');
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

function restaurar(idusuario) {
            alertify.confirm('¿Desea Restaurar esta categoria ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idusuario=" + idusuario ,
                        url:"backend/controllers/usuarios/Restaurar.php",
                        success:function(r){
                             if (r==1){
                                $('#usuario').load('view/usuarios/UsuarioEliminar.php');
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
        $('#tablaUsuarioD').DataTable({
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