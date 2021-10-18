<?php
session_start();
$ide=$_SESSION['idUsuario'];
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
      FROM cuadres AS c
      INNER JOIN cliente AS cl
      ON c.cod_cli=cl.cod_cli
      INNER JOIN despacho AS d
      ON c.cod_des=d.cod_des
      INNER JOIN productos AS p
      ON c.cod_pro=p.cod_pro
      INNER JOIN usuarios AS u
      ON c.cod_usu=u.cod_usu
      AND est_cua='B'";
 $result = mysqli_query($conexion,$sql);
?>


<div class="container p-4">
    <br>
    <br>
 <div class="card p-5 sombra" style="width:110%;height:110%;">
        <div class="card-title mx-auto text-white text-center c-cuadresp sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3> Papelera Cuadres</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
        <table class="table table-hover table-bordered text-center" id="tablaCuadresDataTableD">
          <thead class="bc-cuadresp">
          <tr>
                <td>Nombre del cliente</td>
                <td>Nombre del Usuario</td>
                <td>Cantidad del Pollo</td>
                <td>Cantidad de Patas</td>
                <td>Cantidad de Alas</td>
                <td>Cantidad de Mollejas</td>
                <td>Precio del despacho</td>
                <td>Cantidad del Pollo Total</td>
                <?php if($_SESSION['rol']=='A' && $ide == 1): ?> 
                <td>Eliminar</td>
                <td>Restaurar</td>
                <?php endif;?>
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
                    <?php if($_SESSION['rol']=='A' && $ide == 1): ?> 
                    <td>
                        <span class="btn btn-danger btn-sm"  onclick="eliminarCuadre('<?php echo $ver[9];?>')">
                            <i class="fas fa-trash"></i>
                        </span>
                    </td>
                    <td>
                        <span class="btn btn-warning btn-sm"  onclick="restaurar('<?php echo $ver[9];?>')">
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
 function restaurar(idcuadre) {
            alertify.confirm('¿Desea eliminar este Cuadre ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idcuadre=" + idcuadre ,
                        url:"backend/controllers/cuadres/Restaurar.php",
                        success:function(r){
                            if (r==1){
                                $('#cuadre').load('view/cuadres/CuadresEliminar.php');
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
 function eliminarCuadre(idcuadre) {
            alertify.confirm('¿Desea eliminar este Cuadre ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idcuadre=" + idcuadre ,
                        url:"backend/controllers/cuadres/EliminarCuadres.php",
                        success:function(r){
                            if (r==1){
                                $('#cuadre').load('view/cuadres/CuadresEliminar.php');
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
    $(document).ready(function() {
        $('#tablaCuadresDataTableD').DataTable({
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