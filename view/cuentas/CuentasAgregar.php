<?php
require_once "../../backend/class/conexion.php";
$obj = new Conectar();
$conexion = $obj->conexion();
$sql="SELECT cod_cli,nom_cli FROM cliente WHERE est_cli='A'";
$result =mysqli_query($conexion,$sql);
$sql2="SELECT cod_bnc,nom_bnc,rcd_bnc FROM bancos_casa WHERE est_bnc='A'";
$result2 =mysqli_query($conexion,$sql2);

$sql3="SELECT b.cod_bnk,b.nom_bnk,c.nom_cli  FROM bancos_cliente as b
                                                INNER JOIN cliente as c
                                                ON b.cod_cli=c.cod_cli
                                                AND b.est_bnk='A'";
$result3=mysqli_query($conexion,$sql3);

$sql4="SELECT d.cod_des,d.fec_des,c.cod_cli,c.nom_cli,d.ctc_des FROM despacho AS d
                                                          INNER JOIN cliente AS c
                                                          ON d.cod_cli=c.cod_cli
                                                          AND d.est_des='A'";
$result4=mysqli_query($conexion,$sql4);
?>


<div class="container p-4">
    <br>
    <br>
        <div class="mx-auto sombra" style="width: 70%; height: 70%;">
          <div class="card mb-2">
            <div class="card-title mx-auto text-white text-center c-cuenta sombra mt-4 pt-2" style="width: 70%; height: 70%; border-radius:10px;">
                <h4>Registrar Cuentas</h4>
            </div>
            <hr style="width: 80%; height: 80%;" class="mx-auto">
            <form id="frmCuentas" method="POST" onsubmit="return agregarCuentas()" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row mx-2">
                        <div class="col-6 mt-1 mb-2">
                            <select class="form-control " id="bnClienteSelect" name="bnClienteSelect" >
                                <option value="A">Seleccione un Cliente</option> 
                                <?php while($ver= mysqli_fetch_row($result)): ?>
                                    <option value="<?php echo $ver[0];?>"><?php echo $ver[1]; ?> </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="col-6 mt-1 mb-2">
                            <select class="form-control " id="bnDespachoSelect" name="bnDespachoSelect" >
                                <option value="A">Seleccione Despacho</option> 
                                <?php while($ver4= mysqli_fetch_row($result4)): ?>
                                    <?php if($ver4[4]!=0): ?> 
                                     <option value="<?php echo $ver4[0];?>"><?php echo $ver4[1]."-".$ver4[3]; ?> </option>
                                    <?php endif;?>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row mx-2">
                            <div class="col-6 mt-1 mb-2">
                                <select class="form-control " id="bnCasaSelect" name="bnCasaSelect" >
                                    <option value="A">Seleccione un Banco</option> 
                                    <?php 
                                        while($ver2= mysqli_fetch_row($result2)): ?>
                                        <option value="<?php echo $ver2[0];?>"><?php echo $ver2[1]. "-".$ver2[2]; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-6 mt-1 mb-2">
                                <select class="form-control " id="bnbClienteSelect" name="bnbClienteSelect" >
                                    <option value="A">Seleccione Banco del cliente</option> 
                                    <?php while($ver3= mysqli_fetch_row($result3)): ?>
                                        <option value="<?php echo $ver3[0];?>"><?php echo $ver3[1]. "-".$ver3[2]; ?> </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                       <div class="row ml-2 mr-2">
                            <div class="col">
                                <input type="text" name="cnp_cue" id="cnp_cue" class="form-control" placeholder="Cantidad De La Transferencia">
                                <small id="cnp_error"></small>
                            </div>
                            <div class="col">
                                <input type="text" name="cnt_cue" id="cnt_cue" class="form-control" placeholder="Cantidad de la Cuenta" readonly>
                                <small id="cnt_error"></small>
                            </div>
                       </div>
                    </div>
                    <div class="form-group">
                       <div class="row ml-2 mr-2">
                            <div class="col">
                                <input type="text" name="nrf_cue" id="nrf_cue" class="form-control" placeholder="Numero de Referencia">
                                <small id="nrf_error"></small>
                            </div>
                            <div class="col">
                                <input type="text" name="fcu_cue" id="fcu_cue" class="form-control" placeholder="Fecha del Pago" readonly>
                                <small id="fcu_error"></small>
                            </div>                
                       </div>
                    </div>
                    <div class="form-group mt-3">
                       <div class="row mt-3 mr-4 ml-4">
                            <div class="col text-center">
                                <input  class="btn bc-cuenta px-8" type="submit" value="Guardar"></input>
                            </div>
                       </div>
                    </div>
            </form>
          </div>
        </div>
</div>


<script>
$('#bnDespachoSelect').change(function () {
            $.ajax({
                type:"POST",
                data:"iddespacho=" + $('#bnDespachoSelect').val(),
                url:"backend/controllers/cuentas/llenarFormCuenta.php",
                success:function(r){
                  dato=jQuery.parseJSON(r);
                  $('#cnt_cue').val(dato['pre_des']);
                 }
            });
        });
</script>


<script>
    $(document).ready(function () {
      $('#bnbClienteSelect').select2();
       $('#bnCasaSelect').select2(); 
       $('#bnClienteSelect').select2();
       $('#bnDespachoSelect').select2();
    });
</script>

<script>
    $(function() {
    var fechaA = new Date();
    var yyyy = fechaA.getFullYear();

    $("#fcu_cue").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '1900:' + yyyy,
        dateFormat: "yy-mm-dd"
    });

});
</script>