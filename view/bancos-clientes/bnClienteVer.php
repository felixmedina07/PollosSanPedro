<?php
session_start();
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion=$obj->conexion();
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
     ON b.cod_cli=c.cod_cli
     AND b.est_bnk ='A'"; 
    $result = mysqli_query($conexion,$sql); 
?>

<div class="container p-4">
<br>
<br>
    <div class="card p-5 sombra" style="width:100%;height:100%">
        <div class="card-title mx-auto text-white text-center c-normal sombra mt-2 pt-2 " style="width: 80%; height: 80%; border-radius:10px;">
                <h3>Lista Bancos Clientes</h3>
        </div>
     <hr style="width: 90%; height: 90%;" class="mx-auto">
        <table class="table table-hover table-bordered text-center" id="tablabnDataTable">
            <thead class="bc-normal">
                <tr class="text-center">
                    <td>Nombre titular</td>
                    <td>Numero de cuenta</td>
                    <td>Tipo de Cuenta</td>
                    <td>Rif o Cedula</td>
                    <td>Banco</td>
                    <td>Correo del Banco</td>
                    <td>Telefono</td>
                    <td>Cliente</td>
                    <?php if($_SESSION['rol']=='A'): ?> 
                    <td>Editar</td>
                    <td>Eliminar</td>
                    <?php endif;?>
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
                    <?php if($_SESSION['rol']=='A'): ?> 
                    <td>
                    <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#abremodalbnClienteUpdate" onclick="agregaDatosbnCliente('<?php echo $ver[8];?>')">
                        <i class="fas fa-pencil-alt"></i>
                        </span>
                    </td>
                    <td>
                        <span class="btn btn-danger btn-sm" onclick="papelera('<?php echo $ver[8];?>')">
                            <i class="fas fa-trash"></i>
                        </span>
                    </td>
                    <?php endif;?>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>

<!-- MODAL PARA OBTENER Y ACTUALIZAR BANCO -->
 <!-- Modal -->
 <div class="modal fade" id="abremodalbnClienteUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header c-normal text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Banco Cliente</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmbnClienteU">
                        <input type="text" name="idbank" hidden="" id="idbank">
                        <div class="form-group">
                            <div class="row">
                               <div class="col-12">
                                 <label for="">Cliente</label>
                                    <select class="form-control" id="bnClienteSelectU" name="bnClienteSelectU">
                                        <option value="A">Selecciona Cliente</option>
                                        <?php
                                        $sql="SELECT cod_cli,nom_cli FROM cliente WHERE est_cli='A'";
                                        $result =mysqli_query($conexion,$sql);
                                        ?>
                                        <?php while($ver= mysqli_fetch_row($result)): ?>
                                            <option value="<?php echo $ver[0]?>"><?php echo $ver[1] ?> </option>
                                        <?php endwhile; ?>
                                    </select>
                               </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="not_bnkU">Nombre Titular Banco</label>
                                    <input type="text" name="not_bnkU" id="not_bnkU" required class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="ncu_bnkU">N° De Cuenta</label>
                                    <input type="text" name="ncu_bnkU" id="ncu_bnkU" class="form-control">            
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="tpc_bnkU">Tipo de Cuenta</label>
                                    <input type="text" name="tpc_bnkU" id="tpc_bnkU" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="rcd_bnkU">Rif o Cedula del Banco</label>
                                    <input type="text" name="rcd_bnkU" id="rcd_bnkU" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="nom_bnkU">Nombre del Banco</label>
                                    <input type="text" name="nom_bnkU" id="nom_bnkU" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="tti_bnkU">Telefono del Titular</label>
                                    <input type="text" name="tti_bnkU" id="tti_bnkU" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="cor_bnkU">Correo del Banco</label>
                                    <input type="email" name="cor_bnkU" id="cor_bnkU" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregarBnClienteU" class="btn px-8 bc-normal mx-auto" data-dismiss="modal">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

<script>
function agregaDatosbnCliente(idbank){
            $.ajax({
                type: "POST",
                data: "idbank=" + idbank,
                url: "backend/controllers/bnClientes/ObtenerBnCliente.php",
                success: function(r) {
                    datos = jQuery.parseJSON(r);
                    $('#idbank').val(datos['cod_bnk']);
                    $('#bnClienteSelectU').val(datos['cod_cli']);
                    $('#not_bnkU').val(datos['not_bnk']);
                    $('#ncu_bnkU').val(datos['ncu_bnk']);
                    $('#tpc_bnkU').val(datos['tpc_bnk']);
                    $('#rcd_bnkU').val(datos['rcd_bnk']);
                    $('#nom_bnkU').val(datos['nom_bnk']);
                    $('#tti_bnkU').val(datos['tti_bnk']);
                    $('#cor_bnkU').val(datos['cor_bnk']);
                }
            });
        }
</script>

<script>
 function papelera(idbank) {
            alertify.confirm('¿Desea eliminar este Banco ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idbank=" + idbank ,
                        url:"backend/controllers/bnClientes/Papelera.php",
                        success:function(r){
                            if (r==1){
                                $('#bnClienteVer').load('view/bancos-clientes/bnClienteVer.php');
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
$(document).ready(function () {
           $('#btnAgregarBnClienteU').click(function () {
               datos=$('#frmbnClienteU').serialize();
               $.ajax({
                   type:"POST",
                   data:datos,
                   url:"backend/controllers/bnClientes/ActualizarBnCliente.php",
                   success:function(r){
                       if (r==1){
                           $('#frmbnClienteU')[0].reset();
                           $('#bnClienteVer').load('view/bancos-clientes/bnClienteVer.php');
                           alertify.success("Banco actualizado con exito");
                       }else{
                           alertify.error("No se pudo actualizar Banco");
                       }
                   }
               });
           });
        });
</script>

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
