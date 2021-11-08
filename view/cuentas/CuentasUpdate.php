<?php
require_once "../../backend/class/conexion.php";
$obj = new Conectar();
$conexion = $obj->conexion();
$sql="SELECT c.cnp_cue,
             cl.nom_cli,
             d.fec_des,
             c.cod_cue,
             c.ctc_cue
      FROM cuentas AS c
      INNER JOIN bancos_cliente AS bk
      ON c.cod_bnk=bk.cod_bnk
      INNER JOIN bancos_casa AS bc
      ON c.cod_bnc=bc.cod_bnc
      INNER JOIN cliente AS cl
      ON c.cod_cli=cl.cod_cli 
      INNER JOIN despacho AS d
      ON c.cod_des=d.cod_des
      AND c.est_cue='A'";
$result=mysqli_query($conexion,$sql);

$sql4="SELECT cl.nom_cli,
              d.fec_des,
              d.cod_des,
              d.pre_des,
              c.ctc_cue
      FROM cuentas AS c
      INNER JOIN cliente AS cl
      ON c.cod_cli=cl.cod_cli 
      INNER JOIN despacho AS d
      ON c.cod_des=d.cod_des
      AND c.est_cue='A'
      AND d.est_des='A'";
$result4=mysqli_query($conexion,$sql4);
?>


<div class="container p-4">
    <br>
    <br>
        <div class="mx-auto sombra" style="width: 70%; height: 70%;">
          <div class="card mb-2">
            <div class="card-title mx-auto text-white text-center c-normal sombra mt-4 pt-2" style="width: 70%; height: 70%; border-radius:10px;">
                <h4>Actualizar Cuenta</h4>
            </div>
            <hr style="width: 80%; height: 80%;" class="mx-auto">
                <form id="frmCuentasU" method="POST" onsubmit="return actualizarCuentaU()" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row mx-2">
                            <div class="col-6 mt-1 mb-2">
                                <select class="form-control " id="bnCuentaSelectU" name="bnCuentaSelectU" >
                                    <option value="A">Seleccione una Cuenta</option> 
                                    <?php while($ver= mysqli_fetch_row($result)): ?>
                                        <?php if($ver[4] != 0): ?>
                                          <option value="<?php echo $ver[3]?>"><?php echo $ver[1]." "."-"." ".$ver[0]." "."-"." ".$ver[2] ?> </option>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-6 mt-1 mb-2">
                                <select class="form-control " id="bnDespachoSelectU" name="bnDespachoSelectU" >
                                    <option value="A">Seleccione Despacho</option> 
                                    <?php while($ver4= mysqli_fetch_row($result4)): ?>
                                        <?php if($ver4[4] != 0): ?> 
                                         <option value="<?php echo $ver4[2]?>"><?php echo $ver4[0]." "."-"." ".$ver4[1]." "."-"." ".$ver4[3] ?> </option>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                       <div class="row ml-2 mr-2">
                            <div class="col">
                                <input type="text" name="cnp_cueU" id="cnp_cueU" class="form-control" placeholder="Precio De La Transferencia">
                                <small id="cnp_errorU"></small>
                            </div>
                            <div class="col">
                                <input type="text" name="cnt_cueU" id="cnt_cueU" class="form-control" placeholder="Cantidad de la Cuenta" readonly>
                                <small id="cnt_errorU"></small>
                            </div>
                       </div>
                    </div>
                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                            <div class="col-6">
                                <input type="text" name="nrf_cueU" id="nrf_cueU" class="form-control" placeholder="Numero de Referencia">
                                <small id="nrf_errorU"></small>
                            </div>
                            <div class="col-6">
                                <input type="text" name="fcu_cueU" id="fcu_cueU" class="form-control" placeholder="Fecha del Pago" readonly>
                                <small id="fcu_errorU"></small>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="row mt-3 mr-4 ml-4">
                            <div class="col-12 text-center">
                                <input  class="btn bc-normal px-8" type="submit" value="Actualizar"></input>
                            </div>
                        </div>
                    </div>
                </form>
          </div>
        </div>
</div>


<script>
$('#bnDespachoSelectU').change(function () {
            $.ajax({
                type:"POST",
                data:"iddespacho=" + $('#bnDespachoSelectU').val(),
                url:"backend/controllers/cuentas/llenarFormCuenta.php",
                success:function(r){
                  dato=jQuery.parseJSON(r);
                  $('#cnt_cueU').val(dato['pre_des']);
                 }
            });
        });
</script>

<script>
    $(function() {
    var fechaA = new Date();
    var yyyy = fechaA.getFullYear();

    $("#fcu_cueU").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '1900:' + yyyy,
        dateFormat: "yy-mm-dd"
    });

});
</script>

<script>
function actualizarCuentaU(){

    var status= false;
    var status2= false;
    var status3= false;
    var status4 = false;
    var status5 = false;
    var status6 = false;
    var cnp=$('#cnp_cueU');
    var nrf=$('#nrf_cueU');
    var fcu=$('#fcu_cueU');
    var cuen=$('#bnCuentaSelectU');
    var des=$('#bnDespachoSelectU');
        var regex = /^[a-zA-Z ]+$/;
        var regexn = /^[0-9]+$/;
        var regexnu = new RegExp("^([0-9]{20})$")
        var regext = new RegExp("^([0-9]{11})$")
        var e_patt =new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        var regEsRif = new RegExp("^([VEJPG]{1})([0-9]{7,8})$");

        if(cuen.val()=="A") {
            alertify.error("Cuenta no Seleccionada");
            status=false;
        } else{
            status= true;
            status3=true;
        }
        if(des.val()=="A") {
            alertify.error("Facturacion no Seleccionada");
            status=false;
        } else{
            status= true;
            status5=true;
        }

        if(cnp.val()=="" || cnp.val() < 0){
            cnp.addClass("border-danger");
            $("#cnp_errorU").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            cnp.removeClass("border-danger");
            $("#cnp_errorU").html("");
            status= true;
        }

        if(!regexn.test(cnp.val())){
            cnp.addClass("border-danger");
            $("#cnp_errorU").html("<span class='text-danger'>Datos Numericos.</span>")
            status=false;
        }else{
            cnp.removeClass("border-danger");
            $("#cnp_errorU").html("");
            status= true;
        }
        
        if(nrf.val()==""){
            nrf.addClass("border-danger");
            $("#nrf_errorU").html("<span class='text-danger'>Datos Numericos.</span>")
            status=false;
        }else{
            nrf.removeClass("border-danger");
            $("#nrf_errorU").html("");
            status= true;
            status6 = true;
        }

        if(fcu.val()==""){
            fcu.addClass("border-danger");
            $("#fcu_errorU").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            fcu.removeClass("border-danger");
            $("#fcu_errorU").html("");
            status= true;
            status4 = true;
        }
    if(status && status3 && status4 && status5 && status6){
        datos=$('#frmCuentasU').serialize();
                $.ajax({
                    type:"POST",
                    data:datos,
                    url:"backend/controllers/cuentas/ActualizarCuenta.php",
                    success:function(r){
                            r = r.trim();
                        if (r==1){
                            $('#frmCuentasU')[0].reset();
                            $('#cuentaUpdate').load('view/cuentas/CuentasUpdate.php');
                            alertify.success("Cuenta Actualizada con exito");
                        }else{
                            alertify.error("No se pudo Actualizar Cuenta");
                        }
                    }
                });
    }
    return false; 
}

</script>


<script>
    $(document).ready(function () {
     
       $('#bnCuentaSelectU').select2();
       $('#bnDespachoSelectU').select2();
    });
</script>