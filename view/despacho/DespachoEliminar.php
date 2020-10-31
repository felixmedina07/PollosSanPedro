<?php
session_start();
$ide=$_SESSION['idUsuario'];
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion=$obj->conexion();
$sql="SELECT d.cod_des,
             c.nom_cli,
             d.pre_des,
             d.prd_des,
             d.cpo_des,
             d.cpa_des,
             d.cal_des,
             d.cmo_des,
             d.pok_des,
             d.pak_des,
             d.alk_des,
             d.mok_des,
             d.ppo_des,
             d.ppa_des,
             d.pal_des,
             d.pmo_des
      FROM despacho AS d
      INNER JOIN cliente AS c
      ON d.cod_cli=c.cod_cli
      AND d.est_des='B'";
      $result = mysqli_query($conexion,$sql); 
?>

<div class="container p-4">
 <br>
 <br>   
 <div class="card p-5 sombra">
    <div class="card-title mx-auto text-white text-center c-despachop sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
        <h3>Papelera Facturaciones</h3>
    </div>
    <hr style="width: 90%; height: 90%;" class="mx-auto">
<table class="table table-hover  table-bordered text-center" id="tablaDespachotableD">
   <thead class="bc-despachop">
   <tr>
        <td>Nombre del Cliente</td>
        <td>Precio del Despacho Bolivar</td>
        <td>Precio del Despacho Dolar</td>
        <td>Cantidad Pollo</td>
        <td>Cantidad Patas</td>
        <td>Cantidad Alas</td>
        <td>Cantidad Mollejas</td>
        <td>KG Pollo</td>
        <td>KG Patas</td>
        <td>KG Alas</td>
        <td>KG Mollejas</td>
        <td>Precio Pollo</td>
        <td>Precio Patas</td>
        <td>Precio Alas</td>
        <td>Precio Mollejas</td>
        <?php if($_SESSION['rol']=='A' && $ide==1): ?>
        <td>Eliminar</td>
        <td>Restaurar</td>
        <?php endif;?>
    </tr>
   </thead>
   <?php while ($ver=mysqli_fetch_row($result)): ?>
    <tr>
        <td><?php echo $ver[1];?></td>
        <td><?php echo $ver[2]."Bs";?></td>
        <td><?php echo $ver[3]."$";?></td>
        <td><?php echo $ver[4]."cesta";?></td>
        <td><?php echo $ver[5]."cesta";?></td>
        <td><?php echo $ver[6]."cestas";?></td>
        <td><?php echo $ver[7]."cestas";?></td>
        <td><?php echo $ver[8]."Kg";?></td>
        <td><?php echo $ver[9]."Kg";?></td>
        <td><?php echo $ver[10]."Kg";?></td>
        <td><?php echo $ver[11]."Kg";?></td>
        <td><?php echo $ver[12]."Bs";?></td>
        <td><?php echo $ver[13]."Bs";?></td>
        <td><?php echo $ver[14]."Bs";?></td>
        <td><?php echo $ver[15]."Bs";?></td>
        <?php if($_SESSION['rol']=='A' && $ide==1): ?>
        <td>
             <span class="btn btn-danger btn-sm"  onclick="eliminarDespacho('<?php echo $ver[0];?>')">
                <i class="fas fa-trash"></i>
            </span>
        </td>
        <td>
             <span class="btn btn-warning btn-sm"  onclick="restaurar('<?php echo $ver[0];?>')">
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
 function eliminarDespacho(iddespacho) {
            alertify.confirm('¿Desea eliminar este Banco ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"iddespacho=" + iddespacho ,
                        url:"backend/controllers/despachos/EliminarDespacho.php",
                        success:function(r){
                            if (r==1){
                                $('#despacho').load('view/despacho/DespachoEliminar.php');
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
 function restaurar(iddespacho) {
            alertify.confirm('¿Desea restaurar este despacho ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"iddespacho=" + iddespacho ,
                        url:"backend/controllers/despachos/Restaurar.php",
                        success:function(r){
                            if (r==1){
                                $('#despacho').load('view/despacho/DespachoEliminar.php');
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
        $('#tablaDespachotableD').DataTable({
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