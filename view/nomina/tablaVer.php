<?php
session_start();
$ide=$_SESSION['idUsuario'];
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion=$obj->conexion();
$sql="SELECT n.nrf_nom,
             n.cnp_nom,
             n.fcu_nom,
             t.nom_tra,
             t.ape_tra,
             bc.nom_bnc,
             bt.nom_bnt,
             n.cod_nom
      FROM nomina AS n
      INNER JOIN bancos_trabajadores AS bt
      ON n.cod_bnt=bt.cod_bnt
      INNER JOIN bancos_casa AS bc
      ON n.cod_bnc=bc.cod_bnc
      INNER JOIN trabajadores AS t
      ON n.cod_tra=t.cod_tra 
      AND n.est_nom='A'";
$result=mysqli_query($conexion,$sql);

$sql2="SELECT cod_bnc,nom_bnc,rcd_bnc FROM bancos_casa WHERE est_bnc='A'";
$result2 =mysqli_query($conexion,$sql2);

$sql3="SELECT b.cod_bnt,b.nom_bnt,t.nom_tra,t.ape_tra  FROM bancos_trabajadores as b
                                                INNER JOIN trabajadores as t
                                                ON b.cod_tra=t.cod_tra
                                                AND b.est_bnt='A'";
$result3=mysqli_query($conexion,$sql3);
?>
<br>
    <div class="card p-5 sombra table-responsive">
        <div class="card-title mx-auto text-white text-center c-cuenta sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Lista Pago Nomina</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-hover  table-bordered  text-center" id="tablaNomina" style="width:100%">
                <thead class="bc-cuenta">
                    <tr>
                        <td>Nombre Trabajador</td>
                        <td>Apellido Trabajador</td>
                        <td>Banco Trabajador</td>
                        <td>Banco Empresa</td>
                        <td>Numero Referencia</td>
                        <td>Cantidad Transferencia</td>
                        <td>Fecha Pago</td>
                        <?php if($_SESSION['rol']=='A'): ?> 
                        <td>Editar</td>
                        <td>Eliminar</td>
                        <?php endif;?>
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
                        <?php if($_SESSION['rol']=='A'): ?> 
                        <td>
                        <span class="btn btn-warning " data-toggle="modal" data-target="#abremodalNominaUpdate" onclick="obtenerNomina('<?php echo $ver[7];?>')">
                         <i class="fas fa-pencil-alt"></i>
                        </span>
                        </td>
                        <td>
                            <span class="btn btn-danger" onclick="papelera('<?php echo $ver[7];?>')">
                             <i class="fas fa-trash"></i>
                            </span>
                        </td>
                        <?php endif;?>
                    </tr>
                <?php endwhile; ?> 
            </table>
    </div>

    <!-- modal de mostrar y actualizar datos -->
    <div class="modal fade" id="abremodalNominaUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header c-cuenta text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Trabajador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmNominaU">
                    <input type="text" name="idnominaU" hidden="" id="idnominaU">
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
                                <div class="col-6">
                                 <label for="">Banco Empresa</label>
                                  <select class="form-control " id="bnCasaSelectU" name="bnCasaSelectU" >
                                    <option value="A">Seleccione un Banco</option> 
                                    <?php 
                                        while($ver2= mysqli_fetch_row($result2)): ?>
                                        <option value="<?php echo $ver2[0];?>"><?php echo $ver2[1]. "-".$ver2[2]; ?></option>
                                    <?php endwhile; ?>
                                 </select>
                               </div>
                               <div class="col-6">
                                 <label for="">Banco Trabajador</label>
                                  <select class="form-control " id="bnbTrabajadorSelectU" name="bnbTrabajadorSelectU" >
                                    <option value="A">Seleccione Banco del Trabajador</option> 
                                    <?php while($ver3= mysqli_fetch_row($result3)): ?>
                                        <option value="<?php echo $ver3[0];?>"><?php echo $ver3[1]. "-".$ver3[2]." ".$ver3[3]; ?> </option>
                                    <?php endwhile; ?>
                                  </select>
                               </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="nrf_nomU">Numero de Referencia</label>
                                    <input type="text" name="nrf_nomU" id="nrf_nomU" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="cnp_nomU">Cantidad De La Transferencia</label>
                                    <input type="text" name="cnp_nomU" id="cnp_nomU" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="fcu_nomU">Fecha del Pago</label>
                                    <input type="text" name="fcu_nomU" id="fcu_nomU" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregarNominaU" class="btn px-8 bc-cuenta mx-auto" data-dismiss="modal">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

  

<script>
function obtenerNomina(idnomina){
            $.ajax({
                type: "POST",
                data: "idnomina=" + idnomina,
                url: "../../backend/controllers/nomina/ObtenerNomina.php",
                success: function(r){
                    datos = jQuery.parseJSON(r);
                    $('#idnominaU').val(datos['cod_nom']);
                    $('#bnTrabajadorSelectU').val(datos['cod_tra']);
                    $('#bnCasaSelectU').val(datos['cod_bnc']);
                    $('#bnbTrabajadorSelectU').val(datos['cod_bnt']);
                    $('#nrf_nomU').val(datos['nrf_nom']);
                    $('#cnp_nomU').val(datos['cnp_nom']);
                    $('#fcu_nomU').val(datos['fcu_nom']);
                },
                error: function(r){
                    console.log(r);
                }
            });
        }

$(document).ready(function () {
    $('#btnAgregarNominaU').click(function () {
        datos=$('#frmNominaU').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../../backend/controllers/nomina/ActualizarNomina.php",
            success:function(r){
                console.log(r);
                if (r==1){
                    $('#tablaVer').load('tablaVer.php');
                    alertify.success("Pago actualizado con exito");
                }else{
                    alertify.error("No se pudo actualizar Pago");
                }
            }
        });
    });
 });



function papelera(idnomina) {
            alertify.confirm('¿Desea eliminar este Banco ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idnomina=" + idnomina ,
                        url:"../../backend/controllers/nomina/Papelera.php",
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