<?php
require_once "../../backend/class/pedidos.php";
$fil = new Pedidos();
$result = $fil->filtrar($datos);
?>
<br>
    <div class="card p-5 sombra">
        <div class="card-title mx-auto text-white text-center c-cliente sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Pedidos Filtrados</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-hover table-bordered  text-center" id="tableFPedido">
                <thead class="bc-cliente">
                     <tr>
                        <td>Cliente</td>
                        <td>Pollos</td>
                        <td>Patas</td>
                        <td>Mollejas</td>
                        <td>Alas</td>
                        <td>Fecha del Pedido</td>
                        <td>Estatus</td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                        <td>Pdf</td>
                    </tr>  
                </thead>
                <?php if(!(mysqli_num_rows($result) > 0)):?>
                    <tr>
                        <td colspan="8">No hay Datos</td>
                    </tr>
                <?php endif;?>
                <?php while($ver = mysqli_fetch_row($result)): ?>
                    <tr>
                        <td><?php echo $ver[1];?></td>
                        <td><?php echo $ver[2];?></td>
                        <td><?php echo $ver[3];?></td>
                        <td><?php echo $ver[4];?></td>
                        <td><?php echo $ver[5];?></td>
                        <td><?php echo $ver[6];?></td>
                        <td><?php echo $ver[7];?></td>
                        <td>
                        <span class="btn btn-warning " id="cod" data-toggle="modal" data-target="#abremodalPedidoUpdate" onclick="ObtenerDatosPed('<?php echo $ver[0];?>')">
                         <i class="fas fa-pencil-alt"></i>
                        </span>
                        </td>
                        <td>
                            <span class="btn btn-danger" onclick="papelera('<?php echo $ver[0];?>')">
                             <i class="fas fa-trash"></i>
                            </span>
                        </td>
                        <td>
                            <a href="../../backend/controllers/pedidos/ReportePedidosPdf.php?idped=<?php echo $ver[0]?>" class="btn btn-danger">
                            <span><i class="fas fa-clipboard-check"></i></span>
                        </td>
                    </tr>
                <?php endwhile; ?> 
            </table>
    </div>

     <!-- modal de mostrar y actualizar datos -->
  <div class="modal fade" id="abremodalPedidoUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header c-cliente text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmPedidoU">
                        <input type="text" name="idped" hidden="" id="idped">
                        <div class="form-group">
                            <div class="row">
                              <div class="col-6">
                                <label for="cpo_pedU">Pollos</label>
                                <input type="text" name="cpo_pedU" id="cpo_pedU" class="form-control">
                                </div>
                              <div class="col-6">
                                    <label for="cpa_pedU">Patas</label>
                                    <input type="text" name="cpa_pedU" id="cpa_pedU" class="form-control">
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                              <div class="col-6">
                                   <label for="cmo_pedU">Mollejas</label>
                                   <input type="text" name="cmo_pedU" id="cmo_pedU" class="form-control">
                                </div>
                              <div class="col-6">
                                <label for="cal_pedU">Alas</label>
                                <input type="text" name="cal_pedU" id="cal_pedU" class="form-control">
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="fec_pedU">Fecha Pedido</label>
                                    <input type="text" name="fec_pedU" id="fec_pedU" class="form-control" placeholder="Fecha del Pedido" readonly>
                                </div>
                                <div class="col-6">
                                <label for="inf_pedU">Estatus del Pedido</label>
                                <select class="form-control" id="inf_pedU" name="inf_pedU" required>
                                    <option value="inf_pedU"></option>
                                    <?php if(isset($_SESSION['nom_cli'])): ?>
                                    <option value="Cancelado">Cancelado</option>  
                                    <?php endif;?> 
                                    <?php if(isset($_SESSION['nom_usu'])): ?>
                                    <option value="Recibido">Recibido</option>  
                                    <option value="Pendiente">Pendiente</option>                                         
                                    <option value="Entregado">Entregado</option>     
                                    <option value="Cancelado">Cancelado</option>  
                                    <?php endif;?>                              
                                </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregarPedidoU" class="btn px-8 bc-cliente mx-auto" data-dismiss="modal">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <script>

function ObtenerDatosPed(idped){
            $.ajax({
                type: "POST",
                data: "idped=" + idped,
                url: "../../backend/controllers/pedidos/ObtenerPedido.php",
                success: function(r){
                    datos = jQuery.parseJSON(r);
                    console.log(datos)
                    $('#idped').val(datos['cod_ped']);
                    $('#cpo_pedU').val(datos['cpo_ped']);
                    $('#cpa_pedU').val(datos['cpa_ped']);
                    $('#cmo_pedU').val(datos['cmo_ped']);
                    $('#cal_pedU').val(datos['cal_ped']);
                    $('#fec_pedU').val(datos['fec_ped']);
                    $('#inf_pedU option:selected').val(datos['inf_ped']);
                    $('#inf_pedU option:selected').text(datos['inf_ped']);
                },
                error: function(r){
                    console.log(r);
                    
                }
            });
        }

$(document).ready(function () {
    $('#btnAgregarPedidoU').click(function () {
        datos=$('#frmPedidoU').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../../backend/controllers/pedidos/ActualizarPedido.php",
            success:function(r){
                console.log(r)
                if (r==1){
                    alertify.success("Pedido actualizado con exito");
                    setTimeout(() => {
                                    location.reload();
                                }, 200);
                }else{
                    alertify.error("No se pudo actualizar El Pedido");
                }
            }
        });
    });
 });    


$(document).ready(function() {
        $('#tableFPedido').DataTable({
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


    function papelera(idped) {
            alertify.confirm('¿Desea eliminar este Pedido ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idped=" + idped ,
                        url:"../../backend/controllers/pedidos/Papelera.php",
                        success:function(r){
                             if (r==1){
                                alertify.success('Elimando Con Exito');
                                setTimeout(() => {
                                    location.reload();
                                }, 400);
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