<?php 
   session_start();
   $ide=$_SESSION['idUsuario'];
   require_once "../../backend/class/conexion.php";
   $obj=new conectar();
   $conexion=$obj->conexion(); 
   $sql ="SELECT p.cod_pro,p.fcp_pro,p.fdp_pro,pr.nom_edo,p.act_pro,p.tas_pro,p.cpo_pro 
          FROM productos AS p 
          INNER JOIN proovedor AS pr
          ON p.cod_edo=pr.cod_edo
          AND p.est_pro='A'";
  $result = mysqli_query($conexion,$sql);
  $sql2="SELECT cod_edo,nom_edo FROM proovedor WHERE est_edo='A'";
  $result2=mysqli_query($conexion,$sql2);
?>
<div class="container p-4">
<br>
<br>
<div class="card p-5 sombra">
    <div class="card-title mx-auto text-white text-center c-normal sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Estado Productos</h3>
    </div>
    <hr style="width: 90%; height: 90%;" class="mx-auto">
    <table class="table table-responsive table-hover table-bordered text-center" id="tablaProductoEstado">
        <thead class="bc-normal">
        <tr>
            <td>Proovedor</td>
            <td>Fecha Salida</td>
            <td>Fecha LLegada</td>
            <td>Precio General</td>
            <td>Cantidad Pollo</td>
            <td>Estado</td>
            <?php if($_SESSION['rol']=='A' && $ide==1): ?>
            <td>Editar</td>
            <td>Eliminar</td>
            <?php endif; ?>
        </tr>
        </thead>

        <?php while ($ver=mysqli_fetch_row($result)): ?>
        <tr>
            <td><?php echo $ver[3]; ?></td>
            <td><?php echo $ver[1]; ?></td>
            <td><?php echo $ver[2]; ?></td>
            <td><?php echo $ver[5]."Bs"; ?></td>
            <td><?php echo $ver[6]."Und"; ?></td>     
            <td>
                    <?php if($ver[4]=='A'){?>
                        <span class="btn btn-activo  text-white" style="border-radius: 20px;" onclick="activar('<?php echo $ver[0];?>')"><i class="fas fa-check"></i></span>
                    <?php }else if($ver[4]=='B'){?>
                        <span class="btn btn-danger  text-white" style="border-radius: 20px;" onclick="desactivar('<?php echo $ver[0];?>')"><i class="fas fa-times"></i></span>
                    <?php }?>
            </td>  
            <?php if($_SESSION['rol']='A' && $ide==1): ?>     
            <td>
                <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#abremodalProductoUpdate" onclick="agregaDatosProducto('<?php echo $ver[0];?>')">
                 <i class="fas fa-pencil-alt"></i>
                </span>
            </td>
            <td>
                <span class="btn btn-danger btn-sm" onclick="papelera('<?php echo $ver[0];?>')">
                    <i class="fas fa-trash"></i>
                </span>
            </td>
            <?php endif; ?> 
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</div>

<!-- MODAL DE OBTENER Y ACTUALIZAR PRODUCTO -->

<div class="modal fade"  id="abremodalProductoUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable sombra" role="document">
            <div class="modal-content">
                <div class="modal-header c-normal text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmProductoU">
                        <input type="text" name="idproducto" hidden="" id="idproducto">
                        <div class="form-group">
                            <div class="row mt-2 ">
                                <div class="col-12 ">
                                    <label for="bnProovedorSelectU">Proovedor</label>
                                    <select class="form-control " id="bnProovedorSelectU" name="bnProovedorSelectU" required="">
                                        <option value="A">Seleccione un Proovedor</option> 
                                        <?php while($ver2= mysqli_fetch_row($result2)): ?>
                                        <option value="<?php echo $ver2[0]?>"><?php echo $ver2[1] ?> </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group">
                           <div class="row">
                                <div class="col-6">
                                    <label for="fcp_proU">Fecha Salida</label>  
                                    <input type="text" class="form-control" name="fcp_proU" id="fcp_proU" placeholder="Fecha de salida" readonly> 
                                </div>
                                <div class="col-6">
                                    <label for="fdp_proU">Fecha LLegada</label>
                                    <input type="text" class="form-control" name="fdp_proU" id="fdp_proU" placeholder="Fecha de llegada" readonly>
                                </div>
                           </div>
                        </div>
                        <div class="form-group">
                             <div class="row">
                                 <div class="col-12">
                                    <label for="tas_proU">Tasa General</label>
                                    <input type="text" name="tas_proU" id="tas_proU" class="form-control">
                                 </div>
                             </div>
                         </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="tpo_proU">Tasa Pollo</label>
                                    <input type="text" name="tpo_proU" id="tpo_proU" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="tpa_proU">Tasa Pata</label>
                                    <input type="text" name="tpa_proU" id="tpa_proU" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="tmo_proU">Tasa Molleja</label>
                                    <input type="text" name="tmo_proU" id="tmo_proU" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="tal_proU">Tasa Alas</label>
                                    <input type="text" name="tal_proU" id="tal_proU" class="form-control"> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="csp_proU">Kilos Cestas</label>
                                    <input type="text" name="csp_proU" id="csp_proU" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="ces_proU">Cestas</label>
                                    <input type="text" name="ces_proU" id="ces_proU" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="prp_proU">Promedio Pollo</label>
                                    <input type="text" name="prp_proU" id="prp_proU" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="cpo_proU">Cantidad Pollo</label>
                                    <input type="text" name="cpo_proU" id="cpo_proU" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                        <button type="button" id="btnAgregarProductoU" class="btn bc-normal mx-auto px-8" data-dismiss="modal">Actualizar</button> 
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    $(function() {
    var fechaA = new Date();
    var yyyy = fechaA.getFullYear();

    $("#fcp_proU").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '1900:' + yyyy,
        dateFormat: "yy-mm-dd"
    });

});

$(function() {
    var fechaA = new Date();
    var yyyy = fechaA.getFullYear();

    $("#fdp_proU").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '1900:' + yyyy,
        dateFormat: "yy-mm-dd"
    });

});
</script>

<script>
 function agregaDatosProducto(idproducto){
            $.ajax({
                type: "POST",
                data: "idproducto=" + idproducto,
                url: "backend/controllers/productos/ObtenerProductos",
                success: function(r) {
                    datos = jQuery.parseJSON(r);
                    $('#idproducto').val(datos['cod_pro']);
                    $('#bnProovedorSelectU').val(datos['cod_edo']);
                    $('#fcp_proU').val(datos['fcp_pro']);
                    $('#fdp_proU').val(datos['fdp_pro']);
                    $('#tas_proU').val(datos['tas_pro']);
                    $('#tpo_proU').val(datos['tpo_pro']);
                    $('#tpa_proU').val(datos['tpa_pro']);
                    $('#tmo_proU').val(datos['tmo_pro']);
                    $('#tal_proU').val(datos['tal_pro']);
                    $('#csp_proU').val(datos['csp_pro']);
                    $('#ces_proU').val(datos['ces_pro']);
                    $('#prp_proU').val(datos['prp_pro']);
                    $('#cpo_proU').val(datos['cpo_pro']);
                }
            });
        }

        function papelera(idproducto) {
            alertify.confirm('¿Desea eliminar esta Producto ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idproducto=" + idproducto ,
                        url:"backend/controllers/productos/Papelera.php",
                        success:function(r){
                            r = r.trim();
                            if (r==1){
                                $('#productoVer').load('view/producto/productoVer.php');
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
        
        function activar(idproducto) {
            alertify.confirm('¿Desea activar este Producto ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idproducto=" + idproducto ,
                        url:"backend/controllers/productos/Activar.php",
                        success:function(r){
                            r = r.trim();
                            if (r==1){
                                $('#productoVer').load('view/producto/productoVer.php');
                                alertify.success('Desactivado Con Exito');
                            }else{
                                alertify.error('No Se Pudo Desactivado');
                            }
                        }
                    });
                },function(){
                    alertify.error('Cancelo operacion')
                });
        }  
        
        function desactivar(idproducto) {
            alertify.confirm('¿Desea desactivar este Producto ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idproducto=" + idproducto ,
                        url:"backend/controllers/productos/Desactivar.php",
                        success:function(r){
                            r = r.trim();
                            if (r==1){
                                $('#productoVer').load('view/producto/productoVer.php');
                                alertify.success('Activado Con Exito');
                            }else{
                                alertify.error('No Se Pudo Activar');
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
           $('#btnAgregarProductoU').click(function () {
               datos=$('#frmProductoU').serialize();
               $.ajax({
                   type:"POST",
                   data:datos,
                   url:"backend/controllers/productos/ActualizarProductos.php",
                   success:function(r){
                        r = r.trim();
                       if (r==1){
                        $('#productoVer').load('view/producto/productoVer.php');
                        swal("¡Exito!", "Actualizado con exito", "success");
                       }else{
                        swal("¡Error!", "No se pudo Actualizar", "error");
                       }
                   }
               });
           });
        });
    </script>

<script>
    $(document).ready(function() {
        $('#tablaProductoEstado').DataTable({
        "scrollX": "100%",
        "scrollCollapse": false,
            "language":idioma_español
        });
    } );

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