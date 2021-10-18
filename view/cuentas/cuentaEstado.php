<?php
session_start();
$ide=$_SESSION['idUsuario'];
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion=$obj->conexion();
$sql="SELECT cl.nom_cli,
             c.cnp_cue,
             c.nrf_cue,
             d.fec_des, 
             c.fcu_cue,
             c.ctc_cue,
             c.cod_cue
      FROM cuentas AS c
      INNER JOIN bancos_cliente AS bk
      ON c.cod_bnk=bk.cod_bnk
      INNER JOIN bancos_casa AS bc
      ON c.cod_bnc=bc.cod_bnc
      INNER JOIN cliente AS cl
      ON c.cod_cli=cl.cod_cli 
      INNER JOIN despacho AS d
      ON c.cod_des=d.cod_des
      AND c.est_cue='A'";
$result=mysqli_query($conexion,$sql);
?>
<div class="container p-4">
    <br>
    <br>
        <div class="card p-5 sombra" style="width: 110%; height:110%;">
          <div class="card-title mx-auto text-white text-center c-cuenta sombra mt-4 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Estado Cuentas</h3>
          </div>
          <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-hover table-bordered text-center" id="tablaEsDataTable">
              <thead class="bc-cuenta">
                   <tr>
                      <td>Cliente</td>
                      <td>Cantidad Pagada</td>
                      <td>N° Referencia</td>
                      <td>Fecha despacho</td>
                      <td>Fecha Cuenta</td>
                      <td>Estado</td>
                      <?php if($_SESSION['rol']=='A' && $ide == 1): ?>
                      <td>Eliminar</td>
                      <?php endif;?>
                   </tr> 
              </thead>
              <?php while($ver=mysqli_fetch_row($result)): ?>
                <tr>
                    <td><?php echo $ver[0];?></td>
                    <td><?php echo $ver[1]."Bs";?></td>
                    <td><?php echo $ver[2];?></td>
                    <td><?php echo $ver[3];?></td>
                    <td><?php echo $ver[4];?></td>
                    <td>
                    <?php if($ver[5]==0){ ?>
                        <span class="btn btn-success text-white">Pago</span>
                    <?php }else if( $ver[5] !=0){ ?>
                        <span class="btn btn-danger btn-sm" data-toggle="modal" data-target="#CuentaTotal" onclick="Cuenta('<?php echo $ver[6]; ?>')">
                           Deuda
                        </span>
                    <?php } ?>
                    </td>
                    <?php if($_SESSION['rol']=='A' && $ide == 1): ?> 
                    <td>
                        <span class="btn btn-danger btn-sm" onclick="papelera('<?php echo $ver[6];?>')">
                            <i class="fas fa-trash"></i>
                        </span>
                    </td>
                    <?php endif;?>
                </tr>
              <?php endwhile; ?>
            </table>
        </div>
</div>

<!-- Modal -->
<div class="modal fade" id="CuentaTotal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header c-cuenta">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Deuda</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmEcuentaU">
                        <input type="text" name="idcuenta" hidden="" id="idcuenta">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="nom_bncU">Debe un Monto de:</label>
                                    <input type="text" name="ctc_cueU" id="ctc_cueU" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<script>
  function Cuenta(idcuenta){
    $.ajax({
                type: "POST",
                data: "idcuenta=" + idcuenta,
                url: "backend/controllers/cuentas/ObtenerEcuenta.php",
                success: function(r) {
                    datos = jQuery.parseJSON(r);
                    $('#idcuenta').val(datos['cod_cue']);
                    $('#ctc_cueU').val(datos['ctc_cue']);
                }
            });
  }
</script>

<script>
 function papelera(idcuenta) {
            alertify.confirm('¿Desea eliminar este Banco ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idcuenta=" + idcuenta ,
                        url:"backend/controllers/cuentas/Papelera.php",
                        success:function(r){
                            if (r==1){
                                $('#cuentaEstado').load('view/cuentas/cuentaEstado.php');
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
        $('#tablaEsDataTable').DataTable({
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