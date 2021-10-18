<?php
require_once "../../backend/class/conexion.php";
$obj = new Conectar();
$conexion = $obj->conexion();
$sql="SELECT cod_cli,nom_cli FROM cliente WHERE est_cli='A'";
$result =mysqli_query($conexion,$sql);
?>

<div class="container p-4">
    <br>
    <br>
                <div class="mx-auto" style="width: 70%; height: 70%;">
                     <div class="card mb-2 sombra">
                        <div class="card-title mx-auto text-white c-despacho text-center sombra mt-4 pt-2" style="width: 70%; height: 70%; border-radius:10px;">
                            <h4>Registrar Facturacion</h4>
                        </div>
                        <hr style="width: 80%; height: 80%;" class="mx-auto" >
                            <form id="frmDespacho" method="POST" onsubmit="return agregarDespacho()" autocomplete="off">
                                <div class="form-group">
                                        <div class="row mx-2">
                                        <div class="col-12  mt-1 mb-2">
                                            <select class="form-control " id="bnDespachoCSelect" name="bnDespachoCSelect" >
                                                <option value="A">Seleccione un Cliente</option> 
                                                <?php while($ver= mysqli_fetch_row($result)): ?>
                                                    <option value="<?php echo $ver[0]?>"><?php echo $ver[1] ?> </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        </div>
                                </div>
                                <div class="form-group">
                                <div class="row ml-2 mr-2">
                                    <div class="col">
                                        <input type="text" name="cpo_des" id="cpo_des" class="form-control" placeholder="Cantidad de Pollo">
                                        <small id="cpo_error"></small>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="cpa_des" id="cpa_des" class="form-control" placeholder="Cantidad de Patas">
                                        <small id="cpa_error"></small>
                                    </div>
                                </div> 
                                </div>
                                <div class="form-group">
                                   <div class="row ml-2 mr-2">
                                        <div class="col">
                                            <input type="text" name="cal_des" id="cal_des" class="form-control" placeholder="Cantidad de Alas">
                                            <small id="cal_error"></small>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="cmo_des" id="cmo_des" class="form-control" placeholder="Cantidad de Mollejas">
                                            <small id="cmo_error"></small>
                                        </div>
                                   </div>
                                </div>
                                <div class="form-group">
                                   <div class="row ml-2 mr-2">
                                        <div class="col">
                                            <input type="text" name="pok_des" id="pok_des" class="form-control" placeholder="Kilos de Pollo">
                                            <small id="pok_error"></small>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="pak_des" id="pak_des" class="form-control" placeholder="Kilos de Pata">
                                            <small id="pak_error"></small>
                                        </div>
                                   </div>
                                </div>
                                <div class="form-group">
                                    <div class="row ml-2 mr-2">
                                        <div class="col">
                                            <input type="text" name="alk_des" id="alk_des" class="form-control" placeholder="Kilos de Ala">
                                            <small id="alk_error"></small>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="mok_des" id="mok_des" class="form-control" placeholder="Kilos de Mollejas">
                                            <small id="mok_error"></small>
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group mt-3">
                                    <div class="row mt-3 mr-4 ml-4">
                                        <div class="col text-center">
                                            <input  class="btn bc-despacho px-8 " type="submit" id="btns" value="Guardar"></input>
                                        </div>
                                    </div>
                                </div>
                           </form> 
                     </div>
                </div>
</div>


<script>
    $(document).ready(function () {
       $('#bnDespachoCSelect').select2();
    });
</script>

