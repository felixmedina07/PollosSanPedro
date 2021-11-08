<?php
require_once "../../backend/class/conexion.php";
$obj = new Conectar();
$conexion = $obj->conexion();
$sql="SELECT d.cod_des,d.fec_des,c.cod_cli,c.nom_cli,d.pre_des FROM despacho AS d
       INNER JOIN cliente AS c
       ON d.cod_cli=c.cod_cli
       AND d.est_des='A'";
$result=mysqli_query($conexion,$sql);  
?>
    <div class="container p-4">
        <br>
        <br>
        <div id="errorD" class="mb-3 pb-2 text-center"></div>
                <div class="mx-auto" style="width: 70%; height: 70%;">
                    <div class="card mb-2  sombra">
                        <div class="card-title mx-auto text-white text-center c-normal sombra mt-4 pt-2" style="width: 70%; height: 70%; border-radius:10px;">
                            <h4>Actualizar Facturacion</h4>
                        </div>
                     <hr style="width: 80%; height: 80%;" class="mx-auto" >
                        <form id="frmDespachoU" method="POST" onsubmit="return false" autocomplete="off">
                            <div class="form-group">
                                <div class="row mx-2">
                                    <div class="col-12 mt-4 mt-1 mb-2">
                                        <select class="form-control " id="DespachoBnSelectU" name="DespachoBnSelectU" >
                                                <option value="A">Seleccione Despacho</option> 
                                                <?php while($ver= mysqli_fetch_row($result)): ?>
                                                    <option value="<?php echo $ver[0]?>"><?php echo $ver[1]."-".$ver[3]."-".$ver[4]  ?> </option>
                                                <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ml-2 mr-2">
                                    <div class="col">
                                        <input type="text" name="cal_desU" id="cal_desU" class="form-control" placeholder="Cantidad de Alas">
                                        <small id="cal_errorU"></small>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="cmo_desU" id="cmo_desU" class="form-control" placeholder="Cantidad de Mollejas">
                                        <small id="cmo_errorU"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ml-2 mr-2">
                                    <div class="col">
                                        <input type="text" name="cpo_desU" id="cpo_desU" class="form-control" placeholder="Cantidad de Pollo">
                                        <small id="cpo_errorU"></small>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="cpa_desU" id="cpa_desU" class="form-control" placeholder="Cantidad de Patas">
                                        <small id="cpa_errorU"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ml-2 mr-2">
                                    <div class="col">
                                        <input type="text" name="alk_desU" id="alk_desU" class="form-control" placeholder="Kilos de Ala">
                                        <small id="alk_errorU"></small>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="mok_desU" id="mok_desU" class="form-control" placeholder="Kilos de Mollejas">
                                        <small id="mok_errorU"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ml-2 mr-2">
                                    <div class="col">
                                        <input type="text" name="pok_desU" id="pok_desU" class="form-control" placeholder="Kilos de Pollo">
                                        <small id="pok_errorU"></small>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="pak_desU" id="pak_desU" class="form-control" placeholder="Kilos de Pata">
                                        <small id="pak_errorU"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <div class="row mt-3 mr-4 ml-4">
                                <div class="col-6 text-center">
                                    <input  class="btn bc-normal px-8 " type="submit" id="btnsDespachoU" name="btnsDespacho" value="+"></input>
                                </div>
                                
                                </div>
                            </div>
                        </form>  
                    </div>
              </div>
    </div>


<script>
    $(document).ready(function () {
       $('#DespachoBnSelectU').select2();
    });
</script>

<script>
    $(document).ready(function () {
            $('#btnsDespachoU').click(function () {
                    datos=$('#frmDespachoU').serialize();
                    $.ajax({
                        type:"POST",
                        data:datos,
                        url:"backend/controllers/despachos/SActualizarDespacho.php",
                        success:function(r){
                            alert(r);
                            console.log(r);
                            if (r==1){
                                $('#frmDespachoU')[0].reset();
                                swal("¡Exito!", "Despacho actualizado con exito", "success");
                            }
                            if(r==0){
                                swal("¡Error!", "Error Al actualizar", "error");
                            }
                        }
                    });
            });
         });
</script>

