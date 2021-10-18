<?php
session_start();
if(isset($_SESSION['nom_usu'])){
    require_once "../head/head3.php";
    $es = new estilos();
    $head = $es->encabezado();
    // $head();
    require_once "../menu/menu2.php"; 
    $nu=$_POST['nuc_bnc'];
    $rcd=$_POST['rcd_bnc'];
    $nom=$_POST['nom_bnc'];
    $cor=$_POST['cor_bnc'];
    $datos = array(
        $nu,
        $rcd,
        $nom,
        $cor
    );
    require_once "../../backend/class/bnCasa.php";
    $cuen = new BnCasa();
    $listar=$cuen->filtrarBanco($datos);
//  require_once "../../backend/class/conexion.php";
//  $obj = new Conectar();
//  $conexion = $obj->conexion();

?>
<div class="container p-4">
<div class="col">
    <a href="../../bn-casa.php" class="btn bc-banco"><i class="fas fa-angle-left"></i></a>
    </div>
<br>
<div class="card p-5 sombra">
    <div class="card-title mx-auto text-white text-center c-banco sombra mt-2 pt-2 " style="width: 80%; height: 80%; border-radius:10px;">
        <h2> Lista Bancos Pollos San Pedro</h2>
    </div>
    <hr style="width: 90%; height: 90%;" class="mx-auto">
        <table class="table table-hover table-bordered text-center" id="tablaBncDataTable">
            <thead class="bc-banco">
                <tr>
                    <td>Nombre del Banco</td>
                    <td>Numero De Cuenta</td>
                    <td>Rif del Banco</td>
                    <td>Correo Del Banco</td>
                </tr>
            </thead>
            <?php while($ver=mysqli_fetch_row($listar)): ?>
                <tr>
                    <td><?php echo $ver[2];?> </td>
                    <td><?php echo $ver[0];?> </td>
                    <td><?php echo $ver[1];?> </td>
                    <td><?php echo $ver[3];?> </td>
                </tr>
                <?php endwhile; ?>
           
    </table>
</div>
</div>

<?php
   }else{
    header("location:../../index.php");
     }
 ?>

<?php $head = $es->pie(); ?>

<!-- MODAL MOSTRAR Y EDITAR
<!-- Modal -->
<!-- <div class="modal fade" id="BancoUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header c-banco ">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Actualizar Bancos</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmbnCasaU">
                        <input type="text" name="idbanc" hidden="" id="idbanc">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="nom_bncU">Nombre del Banco</label>
                                    <input type="text" name="nom_bncU" id="nom_bncU" class="form-control" >
                                <small id="nU_error"></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="nuc_bncU">Numero De Cuenta</label>
                                    <input type="text" name="nuc_bncU" id="nuc_bncU" class="form-control"  required>  
                                    <small id="nuU_error"></small>
                                </div>  
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="rcd_bncU">Rif del Banco</label>
                                    <input type="text" name="rcd_bncU" id="rcd_bncU" class="form-control">
                                    <small id="rcdU_error"></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                               <div class="col-12">
                                    <label for="cor_bncU">Correo Del Banco</label>
                                    <input type="text" name="cor_bncU" id="cor_bncU" class="form-control"> 
                                    <small id="emaU_error"></small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregarbnCasaU" class="btn px-8 bc-banco mx-auto" data-dismiss="modal">Actualizar</button>
                </div>
            </div>
        </div>
    </div>  -->

<script>
        
       // PLUGIN DATATABLE viene con idioma personalizado  
        $(document).ready(function() {
        $('#tablaBncDataTable').DataTable({
            "language": idioma_español
        });
        $('#tablaClienteDataTable_next').addClass("next-banco");
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