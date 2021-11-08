<div class="container p-4">
<?php
session_start();
$ide=$_SESSION['idUsuario'];
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
            <h3>Lista Clientes</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-hover table-bordered  text-center" id="tablaClienteDataTable">
                <thead class="bc-normal">
                    <tr>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Cedula</td>
                        <td>Rif</td>
                        <td>Direccion</td>
                        <td>Correo</td>
                        <td>Telefono</td>
                        <td>Editar</td>
                        <?php if($_SESSION['rol']=='A' && $ide==1): ?> 
                        <td>Eliminar</td>
                        <?php endif;?>
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
                        <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#abremodalClientesUpdate" onclick="agregaDatosCliente('<?php echo $ver[0]; ?>')">
                            <i class="fas fa-pencil-alt"></i>
                            </span>
                        </td>
                        <?php if($_SESSION['rol']=='A' && $ide==1): ?> 
                        <td>
                            <span class="btn btn-danger btn-sm" onclick="papelera('<?php echo $ver[0]; ?>')">
                                <i class="fas fa-trash"></i>
                            </span>
                        </td>
                        <?php endif;?>
                    </tr>
                <?php endwhile; ?> 
            </table>
    </div>
</div>

<!-- MODAL PARA OBTENER Y ACTUALIZAR CLIENTE -->
 <!-- Modal -->
 <div class="modal fade" id="abremodalClientesUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header c-normal text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmClientesU">
                        <input type="text" name="idcliente" hidden="" id="idcliente">
                        <div class="form-group">
                            <div class="row">
                              <div class="col-6">
                                <label for="nom_cliU">Nombre</label>
                                <input type="text" name="nom_cliU" id="nom_cliU" class="form-control">
                                </div>
                              <div class="col-6">
                                    <label for="ape_cliU">Apellido</label>
                                    <input type="text" name="ape_cliU" id="ape_cliU" class="form-control">
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                   <label for="ced_cliU">Cedula</label>
                                   <input type="text" name="ced_cliU" id="ced_cliU" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="rif_cliU">Rif</label>
                                    <input type="text" name="rif_cliU" id="rif_cliU" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                              <div class="col-6">
                                 <label for="ads_cliU">Direccion</label>
                                 <input type="text" name="ads_cliU" id="ads_cliU" class="form-control">
                              </div>
                              <div class="col-6">
                                <label for="tel_cliU">Telefono</label>
                                <input type="text" name="tel_cliU" id="tel_cliU" class="form-control">
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                              <div class="col-12">
                                <label for="cor_cliU">Correo</label>
                                <input type="email" name="cor_cliU" id="cor_cliU" class="form-control">
                              </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregarClienteU" class="btn px-8 bc-normal mx-auto" data-dismiss="modal">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

  

<script>

function agregaDatosCliente(idcliente){
            $.ajax({
                type: "POST",
                data: "idcliente=" + idcliente,
                url: "backend/controllers/clientes/ObtenerClientes.php",
                success: function(r) {
                    datos = jQuery.parseJSON(r);
                    $('#idcliente').val(datos['cod_cli']);
                    $('#nom_cliU').val(datos['nom_cli']);
                    $('#ape_cliU').val(datos['ape_cli']);
                    $('#ced_cliU').val(datos['ced_cli']);
                    $('#rif_cliU').val(datos['rif_cli']);
                    $('#ads_cliU').val(datos['ads_cli']);
                    $('#tel_cliU').val(datos['tel_cli']);
                    $('#cor_cliU').val(datos['cor_cli']);
                }
            });
        }

function papelera(idcliente) {
            alertify.confirm('¿Desea eliminar esta categoria ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idcliente=" + idcliente ,
                        url:"backend/controllers/clientes/Papelera.php",
                        success:function(r){
                             if (r==1){
                                $('#clienteVer').load('view/clientes/clienteVer.php');
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
           $('#btnAgregarClienteU').click(function () {
               datos=$('#frmClientesU').serialize();
               $.ajax({
                   type:"POST",
                   data:datos,
                   url:"backend/controllers/clientes/ActualizarClientes.php",
                   success:function(r){
                       if (r==1){
                        //    $('#frmClientesU')[0].reset();
                           $('#clienteVer').load('view/clientes/clienteVer.php');
                           alertify.success("Cliente actualizado con exito");
                       }else{
                           alertify.error("No se pudo actualizar cliente");
                       }
                   }
               });
           });
        });


        $(document).ready(function() {
        $('#tablaClienteDataTable').DataTable({
            "language": idioma_español,
            "scrollX": true,
            "scrollCollapse": false,
        });
        $('#tablaClienteDataTable_next').addClass("next-banco");
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

