<?php
session_start();
$ide=$_SESSION['idUsuario'];
  require_once "../../backend/class/conexion.php";
  $obj = new Conectar();
  $conexion = $obj->conexion();
  $sql ="SELECT b.not_bnt,
                b.ncu_bnt,
                b.tpc_bnt,
                b.rcd_bnt,
                b.nom_bnt,
                b.cor_bnt,
                b.tti_bnt,
                t.nom_tra,
                b.cod_bnt
        FROM bancos_trabajadores as b
        INNER JOIN trabajadores as t
        ON  b.cod_tra = t.cod_tra
        AND b.est_bnt='A'";
    $result=mysqli_query($conexion,$sql);
?>
<br>
<br>
    <div class="card p-5 sombra">
        <div class="card-title mx-auto text-white text-center c-banco sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Lista Banco Trabajadores</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-hover  table-bordered  text-center" id="tablaBancotrabajador" style="width:100%">
                <thead class="bc-banco">
                    <tr>
                        <td>Nombre titular</td>
                        <td>Numero de cuenta</td>
                        <td>Tipo de Cuenta</td>
                        <td>Rif o Cedula</td>
                        <td>Banco</td>
                        <td>Correo del Banco</td>
                        <td>Telefono</td>
                        <td>Trabajador</td>
                        <?php if($_SESSION['rol']=='A'): ?> 
                        <td>Editar</td>
                        <td>Eliminar</td>
                        <?php endif;?>
                    </tr>
                </thead>
                <?php while($ver = mysqli_fetch_row($result)): ?>
                    <tr>
                        <td><?php echo $ver[0];?></td>
                        <td><?php echo $ver[1];?></td>
                        <td><?php echo $ver[2];?></td>
                        <td><?php echo $ver[3];?></td>
                        <td><?php echo $ver[4];?></td>
                        <td><?php echo $ver[5];?></td>
                        <td><?php echo $ver[6];?></td>
                        <td><?php echo $ver[7];?></td>
                        <?php if($_SESSION['rol']=='A'): ?> 
                        <td>
                        <span class="btn btn-warning " data-toggle="modal" data-target="#abremodalbnTrabUpdate" onclick="ObtenerDatosbnTrab('<?php echo $ver[8];?>')">
                         <i class="fas fa-pencil-alt"></i>
                        </span>
                        </td>
                        <td>
                            <span class="btn btn-danger" onclick="papelera('<?php echo $ver[8];?>')">
                             <i class="fas fa-trash"></i>
                            </span>
                        </td>
                        <?php endif;?>
                    </tr>
                <?php endwhile; ?> 
            </table>
    </div>

    <!-- modal de mostrar y actualizar datos -->
    <div class="modal fade" id="abremodalbnTrabUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header c-banco text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Trabajador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmBnTrabU">
                    <input type="text" name="idbnt" hidden="" id="idbnt">
                        <div class="form-group">
                            <div class="row">
                               <div class="col-12">
                                 <label for="">Trabajador</label>
                                    <select class="form-control" id="bnTrabajadorSelectU" name="bnTrabajadorSelectU">
                                        <option value="A">Selecciona Trabajador</option>
                                        <?php
                                        $sql="SELECT cod_tra,nom_tra,ape_tra FROM trabajadores WHERE est_tra='A'";
                                        $result =mysqli_query($conexion,$sql);
                                        ?>
                                        <?php while($ver= mysqli_fetch_row($result)): ?>
                                            <option value="<?php echo $ver[0]?>"><?php echo $ver[1]." ".$ver[2]?> </option>
                                        <?php endwhile; ?>
                                    </select>
                               </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="not_bntU">Nombre Titular Banco</label>
                                    <input type="text" name="not_bntU" id="not_bntU" required class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="ncu_bntU">N° De Cuenta</label>
                                    <input type="text" name="ncu_bntU" id="ncu_bntU" class="form-control">            
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="tpc_bntU">Tipo de Cuenta</label>
                                    <input type="text" name="tpc_bntU" id="tpc_bntU" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="rcd_bntU">Rif o Cedula del Banco</label>
                                    <input type="text" name="rcd_bntU" id="rcd_bntU" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="nom_bntU">Nombre del Banco</label>
                                    <input type="text" name="nom_bntU" id="nom_bntU" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="tti_bntU">Telefono del Titular</label>
                                    <input type="text" name="tti_bntU" id="tti_bntU" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="cor_bntU">Correo del Banco</label>
                                    <input type="email" name="cor_bntU" id="cor_bntU" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregarBnTrabU" class="btn px-8 bc-banco mx-auto" data-dismiss="modal">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

  

<script>
function ObtenerDatosbnTrab(idbnt){
            $.ajax({
                type: "POST",
                data: "idbnt=" + idbnt,
                url: "../../backend/controllers/bnTrabajadores/ObtenerBnTrabajores.php",
                success: function(r){
                    datos = jQuery.parseJSON(r);
                    $('#idbnt').val(datos['cod_bnt']);
                    $('#bnTrabajadorSelectU').val(datos['cod_tra']);
                    $('#not_bntU').val(datos['not_bnt']);
                    $('#ncu_bntU').val(datos['ncu_bnt']);
                    $('#tpc_bntU').val(datos['tpc_bnt']);
                    $('#rcd_bntU').val(datos['rcd_bnt']);
                    $('#nom_bntU').val(datos['nom_bnt']);
                    $('#tti_bntU').val(datos['tti_bnt']);
                    $('#cor_bntU').val(datos['cor_bnt']);
                },
                error: function(r){
                    console.log(r);
                }
            });
        }

$(document).ready(function () {
    $('#btnAgregarBnTrabU').click(function () {
        datos=$('#frmBnTrabU').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../../backend/controllers/bnTrabajadores/ActualizarBnTrabajadores.php",
            success:function(r){
                console.log(r);
                if (r==1){
                    $('#tablaVer').load('tablaVer.php');
                    alertify.success("Banco actualizado con exito");
                }else{
                    alertify.error("No se pudo actualizar Banco");
                }
            }
        });
    });
 });



function papelera(idbnt) {
            alertify.confirm('¿Desea eliminar este Banco ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idbnt=" + idbnt ,
                        url:"../../backend/controllers/bnTrabajadores/Papelera.php",
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
        $('#tablaBancotrabajador').DataTable({
            "scrollX": true,
            "scrollCollapse": false,
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