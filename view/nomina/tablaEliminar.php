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
      AND n.est_nom='B'";
$result=mysqli_query($conexion,$sql);
?>
<br>
    <div class="card p-5 sombra table-responsive">
        <div class="card-title mx-auto text-white text-center c-cuenta sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Historial Pago Nomina</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-hover  table-bordered  text-center" id="tablaEliminarNomina">
                <thead class="bc-cuenta">
                    <tr>
                        <td>Nombre Trabajador</td>
                        <td>Apellido Trabajador</td>
                        <td>Banco Trabajador</td>
                        <td>Banco Empresa</td>
                        <td>Numero Referencia</td>
                        <td>Cantidad Transferencia</td>
                        <td>Fecha Pago</td>
                        <td>Eliminar</td>
                        <td>Restaurar</td>
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
                            <span class="btn btn-danger btn-sm" onclick="eliminarNomina('<?php echo $ver[7];?>')">
                                <i class="fas fa-trash"></i>
                            </span>
                        </td>
                        <td>
                            <span class="btn btn-warning btn-sm" onclick="restaurar('<?php echo $ver[7];?>')">
                                <i class="fas fa-undo-alt"></i>
                            </span>
                        </td>
                <?php endif;?>
                    </tr>
                <?php endwhile;?> 
            </table>
    </div>
    <script>
 function eliminarNomina(idnomina) {
            alertify.confirm('¿Desea eliminar este Banco ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idnomina=" + idnomina ,
                        url:"../../backend/controllers/nomina/EliminarNomina.php",
                        success:function(r){
                            if (r==1){
                                $('#tablaEliminar').load('tablaEliminar.php');
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
 function restaurar(idnomina) {
            alertify.confirm('¿Desea Restaurar este Pago ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idnomina=" + idnomina ,
                        url:"../../backend/controllers/nomina/Restaurar.php",
                        success:function(r){
                            if (r==1){
                                $('#tablaEliminar').load('tablaEliminar.php');
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
        $('#tablaEliminarNomina').DataTable({
            "scrollX": "90%",
            "scrollCollapse": false,
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