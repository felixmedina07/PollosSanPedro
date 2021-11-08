<?php
require_once "../../backend/class/conexion.php";
$obj = new Conectar();
$conexion = $obj->conexion();
$sql="SELECT cod_tra,nom_tra,ape_tra FROM trabajadores WHERE est_tra='A'";
$result =mysqli_query($conexion,$sql);
$sql2="SELECT cod_bnc,nom_bnc,rcd_bnc FROM bancos_casa WHERE est_bnc='A'";
$result2 =mysqli_query($conexion,$sql2);

$sql3="SELECT b.cod_bnt,b.nom_bnt,t.nom_tra,t.ape_tra  FROM bancos_trabajadores as b
                                                INNER JOIN trabajadores as t
                                                ON b.cod_tra=t.cod_tra
                                                AND b.est_bnt='A'";
$result3=mysqli_query($conexion,$sql3);
?>
<br>
        <div class="mx-auto sombra" style="width: 70%; height: 70%;">
          <div class="card mb-2">
            <div class="card-title mx-auto text-white text-center c-normal sombra mt-4 pt-2" style="width: 70%; height: 70%; border-radius:10px;">
                <h4>Registrar Pago Nomina</h4>
            </div>
            <hr style="width: 80%; height: 80%;" class="mx-auto">
            <form id="frmNomina" method="POST" onsubmit="return agregarNomina()" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row mx-2">
                            <div class="col-12 mt-1 mb-2">
                                <select class="form-control " id="bnTrabajadorSelect" name="bnTrabajadorSelect" >
                                    <option value="A">Seleccione un Trabajador</option> 
                                    <?php while($ver= mysqli_fetch_row($result)): ?>
                                        <option value="<?php echo $ver[0];?>"><?php echo $ver[1]." - ".$ver[2]; ?> </option>
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
                                <select class="form-control " id="bnbTrabajadorSelect" name="bnbTrabajadorSelect" >
                                    <option value="A">Seleccione Banco del Trabajador</option> 
                                    <?php while($ver3= mysqli_fetch_row($result3)): ?>
                                        <option value="<?php echo $ver3[0];?>"><?php echo $ver3[1]. "-".$ver3[2]." ".$ver3[3]; ?> </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                       <div class="row ml-2 mr-2">
                           <div class="col">
                               <input type="text" name="nrf_nom" id="nrf_nom" class="form-control" placeholder="Numero de Referencia">
                               <small id="nrf_error"></small>
                           </div>
                            <div class="col">
                                <input type="text" name="cnp_nom" id="cnp_nom" class="form-control" placeholder="Cantidad De La Transferencia">
                                <small id="cnp_error"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                       <div class="row ml-2 mr-2">
                            <div class="col-12">
                                <input type="text" name="fcu_nom" id="fcu_nom" class="form-control" placeholder="Fecha del Pago" readonly>
                                <small id="fcu_error"></small>
                            </div>
                       </div>
                    </div>
                    <div class="form-group mt-3">
                       <div class="row mt-3 mr-4 ml-4">
                            <div class="col text-center">
                                <input  class="btn bc-normal px-8" type="submit" value="Guardar"></input>
                            </div>
                       </div>
                    </div>
            </form>
          </div>
        </div>
<script>
    $(document).ready(function () {
      $('#bnbTrabajadorSelect').select2();
       $('#bnCasaSelect').select2(); 
       $('#bnTrabajadorSelect').select2();
    });
</script>

<script>
    $(function() {
    var fechaA = new Date();
    var yyyy = fechaA.getFullYear();

    $("#fcu_nom").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '1900:' + yyyy,
        dateFormat: "yy-mm-dd"
    });

});
</script>