<?php
session_start();
$ide=$_SESSION['idUsuario'];
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion=$obj->conexion();
$sql="SELECT c.nrf_cue,
             c.cnt_cue,
             c.cnp_cue,
             cl.nom_cli,
             bc.nom_bnc,
             bc.rcd_bnc,
             bk.nom_bnk,
             d.fec_des,
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
      AND c.est_cue='B'";
$result=mysqli_query($conexion,$sql);
?>

<div class="container p-4">
    <br>
    <br>
    <div class="card p-5 sombra">
        <div class="card-title mx-auto text-white text-center c-normal sombra mt-4 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Papelera Cuentas</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-hover table-bordered text-center" id="tablaCuDataTableE">
                <thead class="bc-normal">
                    <tr>
                        <td>Nombre Cliente</td>
                        <td>Cantidad de la Cuenta</td>
                        <td>Cantidad despacho</td>
                        <td>N° Referencia</td>
                        <td>Nombre del Banco</td>
                        <td>Rif o Cedula</td>
                        <td>Nombre del Banco</td>
                        <td>Fecha Despacho</td>
                        <?php if($_SESSION['rol']=='A' && $ide==1): ?>
                        <td>Eliminar</td>
                        <td>Restaurar</td>
                        <?php endif;?>
                    </tr> 
                </thead>
                <?php while($ver=mysqli_fetch_row($result)): ?>
                    <tr>
                        <td><?php echo $ver[3];?></td>
                        <td><?php echo $ver[1]."Bs";?></td>
                        <td><?php echo $ver[2]."Bs";?></td>
                        <td><?php echo $ver[0];?></td>
                        <td><?php echo $ver[4];?></td>
                        <td><?php echo $ver[5];?></td>
                        <td><?php echo $ver[6];?></td>
                        <td><?php echo $ver[7];?></td>
                        <?php if($_SESSION['rol']=='A' && $ide==1): ?>
                        <td>
                            <span class="btn btn-danger btn-sm"  onclick="EliminarCuenta('<?php echo $ver[8];?>')">
                                <i class="fas fa-trash"></i>
                            </span>
                        </td>
                        <td>
                            <span class="btn btn-warning btn-sm"  onclick="restaurar('<?php echo $ver[8];?>')">
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
 function EliminarCuenta(idcuenta) {
            alertify.confirm('¿Desea eliminar este Banco ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idcuenta=" + idcuenta ,
                        url:"backend/controllers/cuentas/EliminarCuenta.php",
                        success:function(r){
                            if (r==1){
                                $('#cuenta').load('view/cuentas/CuentaEliminar.php');
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
 function restaurar(idcuenta) {
            alertify.confirm('¿Desea restaurar esta cuenta ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idcuenta=" + idcuenta ,
                        url:"backend/controllers/cuentas/Restaurar.php",
                        success:function(r){
                            if (r==1){
                                $('#cuenta').load('view/cuentas/CuentaEliminar.php');
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
        $('#tablaCuDataTableE').DataTable({
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