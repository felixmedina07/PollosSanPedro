<?php
  session_start();
  $ide=$_SESSION['idUsuario'];
  require_once "../../backend/class/conexion.php";
  $obj = new Conectar();
  $conexion = $obj->conexion();
  $sql ="SELECT cod_edo,
                nom_edo,
                rif_edo,
                cor_edo,
                dir_edo
        FROM proovedor
        WHERE est_edo='A'";
    $result=mysqli_query($conexion,$sql);        
?>
<div class="container p-4">
<br>
<br>
    <div class="card p-5 sombra table-responsive" style="width:110%;height:110%">
        <div class="card-title mx-auto text-white text-center c-proovedor sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Lista Proovedores</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-hover table-bordered text-center" id="tablaProovedorDataTable">
                <thead class="bc-proovedor">
                    <tr>
                        <td>Nombre</td>
                        <td>Rif</td>
                        <td>Correo</td>
                        <td>Direccion</td>
                        <td>Editar</td>
                        <?php if($_SESSION['rol']=='A' && $ide==1):?>
                        <td>Eliminar</td>
                        <td>Pdf</td>
                        <?php endif;?>
                    </tr>
                </thead>
                <?php while($ver = mysqli_fetch_row($result)): ?>
                    <tr>
                        <td><?php echo $ver[1]; ?></td>
                        <td><?php echo $ver[2]; ?></td>
                        <td><?php echo $ver[3]; ?></td>
                        <td><?php echo $ver[4]; ?></td>
                        <td>
                        <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#abremodalProovedoresUpdate" onclick="agregaDatosProovedores('<?php echo $ver[0];?>')">
                            <i class="fas fa-pencil-alt"></i>
                            </span>
                        </td>
                        <?php if($_SESSION['rol']=='A' && $ide==1):?>
                        <td>
                            <span class="btn btn-danger btn-sm" onclick="papelera('<?php echo $ver[0];?>')">
                                <i class="fas fa-trash"></i>
                            </span>
                        </td>
                        <td>
                            <a href="backend/controllers/proovedor/ReporteProovedor.php?idproovedor=<?php echo $ver[0]?>" class="btn btn-danger btn-sm">
                            <span><i class="fas fa-clipboard-check"></i></span>
                        </td>
                        <?php
                        endif;
                        ?>
                    </tr>
                <?php endwhile; ?> 
            </table>
    </div>
</div>

<!-- MODAL PARA OBTENER Y ACTUALIZAR CLIENTE -->
 <!-- Modal -->
 <div class="modal fade" id="abremodalProovedoresUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header c-proovedor text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Proovedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmProovedorU">
                        <input type="text" name="idproovedor" hidden="" id="idproovedor">
                        <div class="form-group">
                            <div class="row">
                              <div class="col-6">
                                <label for="nom_edoU">Nombre</label>
                                <input type="text" name="nom_edoU" id="nom_edoU" class="form-control">
                                </div>
                              <div class="col-6">
                                    <label for="rif_edoU">RIF</label>
                                    <input type="text" name="rif_edoU" id="rif_edoU" class="form-control">
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                   <label for="cor_edoU">Correo</label>
                                   <input type="email" name="cor_edoU" id="cor_edoU" class="form-control">
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="dir_edoU">Direccion</label>
                                    <input type="text" name="dir_edoU" id="dir_edoU" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregarProovedorU" class="btn px-8 bc-proovedor mx-auto" data-dismiss="modal">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

  

<script>

function agregaDatosProovedores(idproovedor){
            $.ajax({
                type: "POST",
                data: "idproovedor=" + idproovedor,
                url: "backend/controllers/proovedor/ObtenerProovedor.php",
                success: function(r) {
                    datos = jQuery.parseJSON(r);
                    $('#idproovedor').val(datos['cod_edo']);
                    $('#nom_edoU').val(datos['nom_edo']);
                    $('#rif_edoU').val(datos['rif_edo']);
                    $('#cor_edoU').val(datos['cor_edo']);
                    $('#dir_edoU').val(datos['dir_edo']);
                }
            });
        }

function papelera(idproovedor) {
            alertify.confirm('¿Desea eliminar este Proovedor ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idproovedor=" + idproovedor ,
                        url:"backend/controllers/proovedor/Papelera.php",
                        success:function(r){
                             if (r==1){
                                $('#proovedorVer').load('view/proovedor/proovedorVer.php');
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
           $('#btnAgregarProovedorU').click(function () {
               datos=$('#frmProovedorU').serialize();
               $.ajax({
                   type:"POST",
                   data:datos,
                   url:"backend/controllers/proovedor/ActualizarProovedor.php",
                   success:function(r){
                       if (r==1){
                           $('#frmProovedorU')[0].reset();
                           $('#proovedorVer').load('view/proovedor/proovedorVer.php');
                           alertify.success("Proovedor actualizado con exito");
                       }else{
                           alertify.error("No se pudo actualizar Proovedor");
                       }
                   }
               });
           });
        });


        $(document).ready(function() {
        $('#tablaProovedorDataTable').DataTable({
            
            "language": idioma_español
        });
        $('#tablaClienteDataTable_next').addClass("next-banco");
    });

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