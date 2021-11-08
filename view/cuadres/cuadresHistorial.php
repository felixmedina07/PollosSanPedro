<?php
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion = $obj->conexion();
$sql="SELECT cl.nom_cli,
             cl.ape_cli,
             u.nom_usu,
             c.cpo_cua,
             c.cpa_cua,
             c.cal_cua,
             c.cmo_cua,
             c.pre_cua,
             p.cpo_pro,
             c.cod_cua,
             cl.cod_cli,
             d.cod_des,
             p.cod_pro,
             u.cod_usu,
             p.ces_pro
      FROM cuadres_resp AS c
      INNER JOIN cliente_resp AS cl
      ON c.cod_cli=cl.cod_cli
      INNER JOIN despacho_resp AS d
      ON c.cod_des=d.cod_des
      INNER JOIN productos_resp AS p
      ON c.cod_pro=p.cod_pro
      INNER JOIN usuarios_resp AS u
      ON c.cod_usu=u.cod_usu";
 $result = mysqli_query($conexion,$sql);
?>

<div class="container p-4">
    <br><br>
    <div class="card p-5 sombra">
        <div class="card-title mx-auto text-white text-center c-normal sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3> Historial Cuadres</h3>
        </div>
    <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-hover table-bordered text-center" id="tablaCuadresHDataTable">
                <thead class="bc-normal">
                     <tr>
                        <td>Nombre del cliente</td>
                        <td>Nombre del Usuario</td>
                        <td>Cantidad del Pollo</td>
                        <td>Cantidad de Patas</td>
                        <td>Cantidad de Alas</td>
                        <td>Cantidad de Mollejas</td>
                        <td>Precio despacho</td>
                        <td>Cantidad Pollo Total</td>
                     </tr> 
                </thead>
                <?php while($ver=mysqli_fetch_row($result)): ?>
                    <?php $can = $ver[3] * $ver[14]; ?>
                    <tr>
                        <td><?php echo $ver[0]." ".$ver[1];?></td>
                        <td><?php echo $ver[2];?></td> 
                        <td><?php echo $can."Und";?></td>
                        <td><?php echo $ver[4]."cesta";?></td>
                        <td><?php echo $ver[5]."cesta";?></td>
                        <td><?php echo $ver[6]."cesta";?></td>
                        <td><?php echo $ver[7]."Bs";?></td>
                        <td><?php echo $ver[8]."Und";?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
    </div>
   
</div>

<script>
    $(document).ready(function() {
        $('#tablaCuadresHDataTable').DataTable({
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