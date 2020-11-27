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
        WHERE est_tra='A' ORDER BY cod_tra DESC";
    $result=mysqli_query($conexion,$sql);
?>
<br>
<br>
    <div class="card p-5 sombra table-responsive">
        <div class="card-title mx-auto text-white text-center c-cliente sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Lista Trabajadores</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-hover  table-bordered  text-center" id="tablatrabajador">
                <thead class="bc-cliente">
                    <tr>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Cedula</td>
                        <td>Direccion</td>
                        <td>Correo</td>
                        <td>Telefono</td>
                        <td>Editar</td>
                        <?php if($_SESSION['rol']=='A' && $ide==1): ?> 
                        <td>Eliminar</td>
                        <?php endif;?>
                        <td>Pdf</td>
                    </tr>
                </thead>
                <?php while($ver = mysqli_fetch_row($result)): ?>
                    <tr>
                        <td><?php echo $ver[1];?></td>
                        <td><?php echo $ver[2];?></td>
                        <td><?php echo $ver[3];?></td>
                        <td><?php echo $ver[4];?></td>
                        <td><?php echo $ver[5];?></td>
                        <td><?php echo $ver[6];?></td>
                        <td>
                        <span class="btn btn-warning " id="cod" data-toggle="modal" data-target="#abremodalTrabUpdate" onclick="ObtenerDatosTrab('<?php echo $ver[0];?>')">
                         <i class="fas fa-pencil-alt"></i>
                        </span>
                        </td>
                        <?php if($_SESSION['rol']=='A' && $ide==1): ?> 
                        <td>
                            <span class="btn btn-danger" onclick="papelera('<?php echo $ver[0];?>')">
                             <i class="fas fa-trash"></i>
                            </span>
                        </td>
                        <?php endif;?>
                        <td>
                            <a href="../../backend/controllers/trabajadores/ReporteTrabajadoresPdf.php?idtrab=<?php echo $ver[0]?>" class="btn btn-danger">
                            <span><i class="fas fa-clipboard-check"></i></span>
                        </td>
                    </tr>
                <?php endwhile; ?> 
            </table>
    </div>

    <!-- modal de mostrar y actualizar datos -->
    <div class="modal fade" id="abremodalTrabUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header c-cliente text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Trabajador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmTrabU">
                        <input type="text" name="idtrab" hidden="" id="idtrab">
                        <div class="form-group">
                            <div class="row">
                              <div class="col-6">
                                <label for="nom_traU">Nombre</label>
                                <input type="text" name="nom_traU" id="nom_traU" class="form-control">
                                </div>
                              <div class="col-6">
                                    <label for="ape_traU">Apellido</label>
                                    <input type="text" name="ape_traU" id="ape_traU" class="form-control">
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                              <div class="col-12">
                                 <label for="ads_traU">Direccion</label>
                                 <input type="text" name="ads_traU" id="ads_traU" class="form-control">
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                              <div class="col-6">
                                   <label for="ced_traU">Cedula</label>
                                   <input type="text" name="ced_traU" id="ced_traU" class="form-control">
                                </div>
                              <div class="col-6">
                                <label for="tel_traU">Telefono</label>
                                <input type="text" name="tel_traU" id="tel_traU" class="form-control">
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                              <div class="col-12">
                                <label for="cor_traU">Correo</label>
                                <input type="email" name="cor_traU" id="cor_traU" class="form-control">
                              </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregarTrabU" class="btn px-8 bc-cliente mx-auto" data-dismiss="modal">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

  

<script>
function ObtenerDatosTrab(idtrab){
            $.ajax({
                type: "POST",
                data: "idtrab=" + idtrab,
                url: "../../backend/controllers/trabajadores/ObtenerTrabajador.php",
                success: function(r){
                    datos = jQuery.parseJSON(r);
                    $('#idtrab').val(datos['cod_tra']);
                    $('#nom_traU').val(datos['nom_tra']);
                    $('#ape_traU').val(datos['ape_tra']);
                    $('#ced_traU').val(datos['ced_tra']);
                    $('#ads_traU').val(datos['ads_tra']);
                    $('#tel_traU').val(datos['tel_tra']);
                    $('#cor_traU').val(datos['cor_tra']);
                },
                error: function(r){
                    console.log(r);
                    
                }
            });
        }

$(document).ready(function () {
    $('#btnAgregarTrabU').click(function () {
        datos=$('#frmTrabU').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../../backend/controllers/trabajadores/ActualizarTrabajador.php",
            success:function(r){
                if (r==1){
                    $('#tablaVer').load('tablaVer.php');
                    alertify.success("Trabajador actualizado con exito");
                }else{
                    alertify.error("No se pudo actualizar Trabajador");
                }
            }
        });
    });
 });



function papelera(idtrab) {
            alertify.confirm('¿Desea eliminar este Trabajador ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idtrab=" + idtrab ,
                        url:"../../backend/controllers/trabajadores/Papelera.php",
                        success:function(r){
                             if (r==1){
                                $('#tablaVer').load('tablaVer.php');
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
    $(document).ready(function() {
        $('#tablatrabajador').DataTable({
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