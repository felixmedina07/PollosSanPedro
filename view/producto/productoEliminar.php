<?php
   session_start();
   $ide=$_SESSION['idUsuario'];
   require_once "../../backend/class/conexion.php";
   $obj=new conectar();
   $conexion=$obj->conexion(); 
   $sql ="SELECT cod_pro,tas_pro,tpo_pro,tpa_pro,tmo_pro,tal_pro,ppo_pro,ppa_pro,pal_pro,pmo_pro,ces_pro,prp_pro,cpo_pro,cpa_pro,cal_pro,cmo_pro FROM productos WHERE est_pro='B'";
   $result = mysqli_query($conexion,$sql);
?>
<div class="container p-4">
    <br>
    <br>
    <div class="card p-5 sombra">
        <div class="card-title mx-auto text-white text-center  c-productop sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Papelera Productos</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-responsive table-hover table-bordered text-center" id="tablaProductoD">
                <thead class="bc-productop">
                    <tr>
                        <td>Tasa General</td>
                        <td>Tasa Pollo</td>
                        <td>Tasa Patas</td>
                        <td>Tasa Molleja</td>
                        <td>Tasa Alas</td>
                        <td>Precio Pollos</td>
                        <td>Precio Patas</td>
                        <td>Precio Alas</td>
                        <td>Precio Molleja</td>
                        <td>Pollo Por Cestas</td>
                        <td>Promedio Pollo</td>
                        <td>Cantidad Pollo</td>
                        <td>Cantidad Patas</td>
                        <td>Cantidad Alas</td>
                        <td>Cantidad Molleja</td>
                        <?php if($_SESSION['rol']=='A'): ?>
                        <td>Eliminar</td>
                        <td>Restaurar</td>
                        <?php endif;?>
                    </tr>
                </thead>

                <?php while ($ver = mysqli_fetch_row($result)): ?>
                <tr>
                    <td><?php echo $ver[1]; ?></td>
                    <td><?php echo $ver[2]; ?></td>
                    <td><?php echo $ver[3]; ?></td>
                    <td><?php echo $ver[4]; ?></td>
                    <td><?php echo $ver[5]; ?></td>
                    <td><?php echo $ver[6]; ?></td>
                    <td><?php echo $ver[7]; ?></td>
                    <td><?php echo $ver[8]; ?></td>
                    <td><?php echo $ver[9]; ?></td>
                    <td><?php echo $ver[10]; ?></td>
                    <td><?php echo $ver[11]; ?></td>
                    <td><?php echo $ver[12]; ?></td>
                    <td><?php echo $ver[13]; ?></td>
                    <td><?php echo $ver[14]; ?></td>
                    <td><?php echo $ver[15]; ?></td>
                    <?php if($_SESSION['rol']=='A'): ?>
                    <td>
                        <span class="btn btn-danger btn-sm" onclick="eliminarProducto(<?php echo $ver[0]; ?>)">
                            <i class="fas fa-trash"></i>
                        </span>
                    </td>
                    <td>
                        <span class="btn btn-warning btn-sm" onclick="restaurar(<?php echo $ver[0];?>)">
                            <i class="fas fa-undo-alt"></i>
                        </span>
                    </td>
                    <?php endif;?>
                </tr>
                <?php endwhile; ?>
             </table>
    </div>
</div>


<script>
        function eliminarProducto(idproducto) {
            alertify.confirm('¿Desea eliminar esta Producto ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idproducto=" + idproducto ,
                        url:"backend/controllers/productos/EliminarProductos.php",
                        success:function(r){
                            if (r==1){
                                $('#producto').load('view/producto/productoEliminar.php');
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
        function restaurar(idproducto) {
            alertify.confirm('¿Desea Restaurar esta Producto ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idproducto=" + idproducto ,
                        url:"backend/controllers/productos/Restaurar.php",
                        success:function(r){
                            if (r==1){
                                $('#producto').load('view/producto/productoEliminar.php');
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
        $('#tablaProductoD').DataTable({
            "scrollX": "80%",
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

