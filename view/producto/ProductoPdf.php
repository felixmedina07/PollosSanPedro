<div class="container p-4">
<?php 
   require_once "../../backend/class/conexion.php";
   $obj=new conectar();
   $conexion=$obj->conexion(); 
   $sql ="SELECT cod_pro,tas_pro,tpo_pro,tpa_pro,tmo_pro,tal_pro,ppo_pro,ppa_pro,pal_pro,pmo_pro,csp_pro,ces_pro,prp_pro,cpo_pro,cpa_pro,cal_pro,cmo_pro FROM productos WHERE est_pro='A'";
   $result = mysqli_query($conexion,$sql);
?>
<br>
<br>
 <div class="card p-5 sombra">
    <div class="card-title mx-auto text-white text-center c-normal sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
          <h3>Productos PDF</h3>
    </div>
    <hr style="width: 90%; height: 90%;" class="mx-auto">
    <table class="table table-responsive table-hover table-bordered text-center" id="tablaProductoPdf">
       <thead class="bc-normal">
        <tr>
                <td>Tasa General</td>
                <td>Tasa Pollo</td>
                <td>Tasa Patas</td>
                <td>Tasa Molleja</td>
                <td>Tasa Alas</td>
                <td>Precio Pollos</td>
                <td>Precio Patas</td>
                <td>Precio Alas</td>
                <td>Precio Mollejas</td>
                <td>Kilos Cestas Vacias</td>
                <td>Pollos por Cestas</td>
                <td>Promedio Pollo</td>
                <td>Cantidad Pollo</td>
                <td>Cantidad Patas</td>
                <td>Cantidad Alas</td>
                <td>Cantidad Molleja</td>
                <td>PDF</td>
            </tr> 
       </thead>
        <?php while ($ver = mysqli_fetch_row($result)): ?>
        <tr>
            <td><?php echo $ver[1]."Bs"; ?></td>
            <td><?php echo $ver[2]."$"; ?></td>
            <td><?php echo $ver[3]."$"; ?></td>
            <td><?php echo $ver[4]."$"; ?></td>
            <td><?php echo $ver[5]."$"; ?></td>
            <td><?php echo $ver[6]."Bs"; ?></td>
            <td><?php echo $ver[7]."Bs"; ?></td>
            <td><?php echo $ver[8]."Bs"; ?></td>
            <td><?php echo $ver[9]."Bs"; ?></td>
            <td><?php echo $ver[10]."Kg"; ?></td>
            <td><?php echo $ver[11]."Und"; ?></td>
            <td><?php echo $ver[12]."Kg"; ?></td>
            <td><?php echo $ver[13]."Und"; ?></td>
            <td><?php echo $ver[14]."Kg"; ?></td>
            <td><?php echo $ver[15]."Kg"; ?></td>
            <td><?php echo $ver[16]."Kg"; ?></td>
            <td>
                <a href="backend/controllers/productos/ReporteProductoPdf.php?idproducto=<?php echo $ver[0]?>" class="btn btn-danger btn-sm">
                <span><i class="fas fa-clipboard-check"></i></span>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
 </div>
</div>

<script>
    $(document).ready(function() {
        $('#tablaProductoPdf').DataTable({
            "scrollX": "90%",
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