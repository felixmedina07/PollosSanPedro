
<?php
session_start();
 $ide=$_SESSION['idUsuario'];
 require_once "../../backend/class/conexion.php";
 $obj = new Conectar();
 $conexion = $obj->conexion();
 $sql="SELECT cod_bnc,
              nuc_bnc,
              rcd_bnc,
              nom_bnc,
              cor_bnc 
       FROM   bancos_casa 
       WHERE  est_bnc='B'";
   $result = mysqli_query($conexion,$sql);   
?>

<div class="container p-4">
<br>
<br>  
    <div class="card p-5 sombra">
        <div class="card-title mx-auto text-white text-center c-bancop sombra mt-2 pt-2  " style="width: 80%; height: 80%; border-radius:10px;">
                <h3>Papelera Bancos Pollos San Pedro</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
        <table class="table table-hover table-bordered text-center" id="tablaBnCasaD">
            <thead class="bc-bancop">
                <tr>
                    <td>Nombre del Banco</td>
                    <td>Numero De Cuenta</td>
                    <td>Rif del Banco</td>
                    <td>Correo Del Banco</td>
                    <?php if($_SESSION['rol']=='A' && $ide==1): ?> 
                     <td>Eliminar</td>
                     <td>Restaurar</td>
                    <?php endif;?>
                </tr>
            </thead>
        <?php while($ver=mysqli_fetch_row($result)): ?>
            <tr>
                <td><?php echo $ver[3];?> </td>
                <td><?php echo $ver[1];?> </td>
                <td><?php echo $ver[2];?> </td>
                <td><?php echo $ver[4];?> </td>
                <?php if($_SESSION['rol']=='A' && $ide==1):?> 
                    <td>
                        <span class="btn btn-danger btn-sm" onclick="eliminarbnCasa('<?php echo $ver[0];?>')">
                            <i class="fas fa-trash"></i>
                        </span>
                    </td>
                    <td>
                        <span class="btn btn-warning btn-sm" onclick="restaurar('<?php echo $ver[0];?>')">
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
 function eliminarbnCasa(idbanc) {
            alertify.confirm('¿Desea eliminar este Banco ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idbanc=" + idbanc ,
                        url:"backend/controllers/bnCasa/EliminarbnCasa.php",
                        success:function(r){
                            if (r==1){
                                $('#banco').load('view/bancos-casa/bnCasaEliminar.php');
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
 function restaurar(idbanc) {
            alertify.confirm('¿Desea eliminar este Banco ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idbanc=" + idbanc ,
                        url:"backend/controllers/bnCasa/Restaurar.php",
                        success:function(r){
                            if (r==1){
                                $('#banco').load('view/bancos-casa/bnCasaEliminar.php');
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
        $('#tablaBnCasaD').DataTable({
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