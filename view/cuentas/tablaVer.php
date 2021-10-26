<?php
require_once "../../backend/class/conexion.php";
session_start();
$obj= new Conectar();
$conexion=$obj->conexion();
$idUsuario= $_SESSION['idUsuario'];
$sql="SELECT c.nrf_cue,
             c.cnt_cue,
             c.cnp_cue,
             c.ctc_cue, 
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
      AND c.est_cue='A' AND cl.cod_cli = '$idUsuario'";
$result=mysqli_query($conexion,$sql);
?>
    <br>
    <div class="card p-5 sombra">
      <div class="card-title mx-auto text-white text-center c-cuenta sombra mt-4 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
              <h3>Mis Cuentas</h3>
      </div>
      <hr style="width: 90%; height: 90%;" class="mx-auto">
        <table class="table table-hover table-bordered text-center" id="tablaCuDataTableVer">
              <thead class="bc-cuenta">
                <tr>
                      <td>Nombre Cliente</td>
                      <td>Cantidad de la Cuenta</td>
                      <td>Cantidad despacho</td>
                      <td>Estado</td>
                      <td>N° Referencia</td>
                      <td>Nombre del Banco</td>
                      <td>Rif o Cedula</td>
                      <td>Nombre del Banco</td>
                      <td>Fecha Despacho</td>
                      <td>PDF</td>
                  </tr> 
              </thead>
              <?php while($ver=mysqli_fetch_row($result)): ?>
                <tr>
                      <td><?php echo $ver[4]; ?></td>  
                      <td><?php echo $ver[1]."Bs";?></td>
                      <td><?php echo $ver[2]."Bs";?></td>
                      <td>
                        <?php if($ver[3]==0){ ?>
                            <span class="btn btn-success disabled text-white">Pago</span>
                        <?php }else if( $ver[3] !=0){ ?>
                            <span class="btn btn-danger disabled btn-sm" data-toggle="modal" data-target="#CuentaTotal" onclick="Cuenta('<?php echo $ver[6]; ?>')">
                              Deuda
                            </span>
                        <?php } ?>
                     </td>
                      <td><?php echo $ver[0];?></td>
                      <td><?php echo $ver[5]; ?></td>
                      <td><?php echo $ver[6]; ?></td>
                      <td><?php echo $ver[7]; ?></td>
                      <td><?php echo $ver[8]; ?></td>
                      <td>
                              <a href="../../backend/controllers/cuentas/ReporteCuentaPdf.php?idcuenta=<?php echo $ver[9]?>" class="btn btn-danger btn-sm">
                              <span><i class="fas fa-clipboard-check"></i></span>
                      </td>
                  </tr>
              <?php endwhile; ?>
        </table>
    </div>

    <script>
    $(document).ready(function() {
        $('#tablaCuDataTableVer').DataTable({
            "scrollX": "90%",
            "scrollCollapse": false,
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