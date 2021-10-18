<?php
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion = $obj->conexion();
$sql ="SELECT   cod_cli,
                nom_cli,
                ape_cli,
                ced_cli 
        FROM cliente
        WHERE est_cli='A'";
    $result=mysqli_query($conexion,$sql);

$sql2="SELECT d.cod_des,fec_des,c.cod_cli,c.nom_cli FROM despacho AS d
       INNER JOIN cliente AS c
       ON d.cod_cli=c.cod_cli
       AND d.est_des='A'";
$result2=mysqli_query($conexion,$sql2);      
?>

<div class="container p-4">
    <br>
    <br>
        <div class="mx-auto sombra" style="width: 70%; height: 70%;">
          <div class="card mb-2">
            <div class="card-title mx-auto text-white text-center sombra c-cuadres mt-4 pt-2 " style="width: 70%; height: 70%; border-radius:10px;">
                <h4>Registrar Cuadres</h4>
            </div>
            <hr style="width: 80%; height: 80%;" class="mx-auto">
            <form id="frmCuadres" method="POST" onsubmit="return agregarCuadres()" autocomplete="off">
                    <div class="form-group">
                        <div class="row mx-2">
                            <div class="col-6 mt-4 mt-1 mb-2">
                                <select class="form-control " id="ClienteBnSelect" name="ClienteBnSelect" >
                                            <option value="A">Seleccione Cliente</option> 
                                            <?php while($ver= mysqli_fetch_row($result)): ?>
                                                <option value="<?php echo $ver[0]?>"><?php echo $ver[1]."-".$ver[2]."-".$ver[3]; ?></option>
                                            <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-6 mt-4 mt-1 mb-2">
                                <select class="form-control " id="DespachoBnSelect" name="DespachoBnSelect" >
                                            <option value="A">Seleccione Despacho</option> 
                                            <?php while($ver2= mysqli_fetch_row($result2)): ?>
                                                <option value="<?php echo $ver2[0]?>"><?php echo $ver2[1]."-".$ver2[3] ?> </option>
                                            <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                            <div class="col">
                                <input type="text" name="cpo_cua" id="cpo_cua" class="form-control" placeholder="Cantidad Pollos">
                            <small id="cpo_error"></small>
                            </div>
                            <div class="col">
                                <input type="text" name="cpa_cua" id="cpa_cua" class="form-control" placeholder="Cantidad Patas">
                            <small id="cpa_error"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                        <div class="col">
                            <input type="text" name="cal_cua" id="cal_cua" class="form-control" placeholder="Cantidad Alas">
                         <small id="cal_error"></small>
                        </div>
                        <div class="col">
                            <input type="text" name="cmo_cua" id="cmo_cua" class="form-control" placeholder="Cantidad Mollejas">
                        <small id="cmo_error"></small>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                            <div class="col">
                                <input type="text" name="pre_cua" id="pre_cua" class="form-control" placeholder="Precio">
                               <small id="pre_error"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="row mt-3 mr-4 ml-4">
                            <div class="col text-center">
                                <input  class="btn bc-cuadres px-8" type="submit" value="Guardar"></input>
                            </div>
                        </div>
                    </div>
            </form>
          </div>
        </div>
</div>

<script>
$('#DespachoBnSelect').change(function () {
            $.ajax({
                type:"POST",
                data:"iddespacho=" + $('#DespachoBnSelect').val(),
                url:"backend/controllers/cuadres/llenarFormCuadres.php",
                success:function(r){
                  dato=jQuery.parseJSON(r);
                  $('#cpo_cua').val(dato['cpo_des']);
                  $('#cpa_cua').val(dato['pak_des']);
                  $('#cal_cua').val(dato['alk_des']);
                  $('#cmo_cua').val(dato['mok_des']);
                  $('#pre_cua').val(dato['pre_des']);
                }
            });
        });
</script>
<script>
    $(document).ready(function () {
      $('#DespachoBnSelect').select2();
      $('#ClienteBnSelect').select2();
    });
</script>