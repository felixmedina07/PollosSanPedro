<?php 
session_start();
if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A'|| $_SESSION['rol'] =='E'||$_SESSION['rol']=='S'){
require_once "../head/head3.php";
$es = new estilos();
$head = $es->encabezado();
require_once "../menu/menu2.php"; 
 $nom = $_POST['nom_tra'];
 $ape = $_POST['ape_tra'];
 $ced = $_POST['ced_tra'];
 $ads = $_POST['ads_tra'];
 $cor = $_POST['cor_tra'];
 $tel = $_POST['tel_tra'];
 $datos = array(
    $nom,
    $ape,
    $ced,
    $ads,
    $cor,
    $tel
 );
 require_once "../../backend/class/trabajadores.php";
 $fil = new Trabajador();
 $result = $fil->filtrar($datos);
?>
<div class="container p-4">
<div class="row">
<a href="../../menu_trabajadores.php" class="btn bc-normal"><i class="fas fa-angle-left"></i></a>
</div>
<br>
    <div class="card p-5 sombra">
        <div class="card-title mx-auto text-white text-center c-normal sombra mt-2 pt-2" style="width: 80%; height: 80%; border-radius:10px;">
            <h3>Trabajadores Filtrados</h3>
        </div>
        <hr style="width: 90%; height: 90%;" class="mx-auto">
            <table class="table table-hover table-bordered  text-center" id="tablatrabajadorFiltradp" style="width:100%">
                <thead class="bc-normal">
                    <tr>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Cedula</td>
                        <td>Direccion</td>
                        <td>Correo</td>
                        <td>Telefono</td>
                    </tr>    
                </thead>
                <?php while($ver = mysqli_fetch_row($result)): ?>
                    <tr>
                        <td><?php echo $ver[0];?></td>
                        <td><?php echo $ver[1];?></td>
                        <td><?php echo $ver[2];?></td>
                        <td><?php echo $ver[3];?></td>
                        <td><?php echo $ver[4];?></td>
                        <td><?php echo $ver[5];?></td>
                    </tr>
                <?php endwhile; ?> 
            </table>
    </div>
</div>
<?php
   }else{
    header("location:../../sistema_principal.php");
     }
 ?>

<?php 
$head = $es->pie(); 
?>
<script>
    $(document).ready(function() {
        $('#tablatrabajadorFiltradp').DataTable({
            "scrollX": true,
            "scrollCollapse": true,
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