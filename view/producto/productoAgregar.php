<?php 
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion=$obj->conexion();
$sql="SELECT cod_edo,nom_edo FROM proovedor WHERE est_edo='A'";
$result=mysqli_query($conexion,$sql);
?>

<div class="container p-4">
    <br>
     <br>  
        <div class="mx-auto sombra" style="width: 80%; height: 80%;">
         <div class="card mb-2">
            <div class="card-title mx-auto text-center sombra c-producto mt-4 pt-2" style="width: 70%; height: 70%; border-radius:10px;">
                <h4>Registrar Productos</h4>
            </div>
            <hr style="width: 80%; height: 80%;" class="mx-auto">
            <form id="frmProductos" method="POST" onsubmit="return agregarProductos()" autocomplete="off">
                    <div class="form-group">
                        <div class="row mx-2">
                            <div class="col mt-1 mb-2">
                                <select class="form-control " id="bnProovedorSelect" name="bnProovedorSelect" required="">
                                    <option value="A">Seleccione un Proovedor</option> 
                                    <?php while($ver= mysqli_fetch_row($result)): ?>
                                     <option value="<?php echo $ver[0]?>"><?php echo $ver[1] ?> </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                       </div>
                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                            <div class="col-6">
                              <input type="text" class="form-control" name="fcp_pro" id="fcp_pro" placeholder="Fecha de salida" readonly> 
                              <small id="fcp_error"></small>
                            </div>
                            <div class="col-6">
                            <input type="text" class="form-control" name="fdp_pro" id="fdp_pro" placeholder="Fecha de llegada" readonly>
                            <small id="fdp_error"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                            <div class="col">
                                <input type="text" name="tas_pro" id="tas_pro" class="form-control" placeholder="Valor del dolar en bolivares">
                                <small id="tas_error"></small>
                            </div>
                            <div class="col">
                                <input type="text" name="tpo_pro" id="tpo_pro" class="form-control" placeholder="Precio en dolares del pollo">
                                <small id="tpo_error"></small>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                            <div class="col">
                                <input type="text" name="tpa_pro" id="tpa_pro" class="form-control" placeholder="Precio en dolares de Patas">
                                <small id="tpa_error"></small>
                            </div>
                            <div class="col">
                                <input type="text" name="tmo_pro" id="tmo_pro" class="form-control" placeholder="Precio en dolares de mollejas">
                                <small id="tmo_error"></small>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                            <div class="col">
                                <input type="text" name="tal_pro" id="tal_pro"  class="form-control" placeholder="Precio en dolares de Alas">
                                <small id="tal_error"></small>
                            </div>
                            <div class="col">
                                <input type="text" name="ces_pro" id="ces_pro" class="form-control" placeholder="cantidad de pollo por cesta">
                                <small id="ces_error"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                            <div class="col">
                                <input type="text" name="csp_pro" id="csp_pro"  class="form-control" placeholder="Peso de Cestas vacias">
                                <small id="csp_error"></small>
                            </div>
                            <div class="col">
                                <input type="text" name="prp_pro" id="prp_pro"  class="form-control" placeholder="Promedio del Pollo">
                                <small id="prp_error"></small>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                            <div class="col">
                                <input type="text" name="cpo_pro" id="cpo_pro"  class="form-control" placeholder="Cantidad del Pollo Total">
                                <small id="cpo_error"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <div class="row ml-2 mr-2">
                           <div class="d-flex justify-content-between">
                                <div class="col-6">
                                <label class="form-check-label" for="exampleCheck1">Activo</label>
                                    <label class="content-input">
                                        <input type="checkbox" name="act_pro" id="act_pro" value="A">
                                        <i></i>
                                    </label>
                                </div>
                                <div class="col-6">
                                <label class="form-check-label" for="exampleCheck1">Desactivo</label>
                                    <label class="content-input">
                                        <input type="checkbox" name="act_pro" id="act_pro2" value="B">
                                        <i id="che_error"></i>
                                    </label>
                                </div>
                           </div>                          
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="row mt-3 mr-4 ml-4">
                            <div class="col text-center">
                                <input  class="btn bc-producto px-8" type="submit" value="Guardar"></input>
                            </div>
                        </div>
                    </div>
            </form>
         </div>
        </div>
</div>

<script>
    $(document).ready(function () {
    $('#bnProovedorSelect').select2();
 });
</script>

<script>
    $(function() {
    var fechaA = new Date();
    var yyyy = fechaA.getFullYear();

    $("#fcp_pro").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '1900:' + yyyy,
        dateFormat: "yy-mm-dd"
    });

});

$(function() {
    var fechaA = new Date();
    var yyyy = fechaA.getFullYear();

    $("#fdp_pro").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '1900:' + yyyy,
        dateFormat: "yy-mm-dd"
    });

});
</script>