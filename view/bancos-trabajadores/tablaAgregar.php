<?php
require_once "../../backend/class/conexion.php";
$obj = new Conectar();
$conexion = $obj->conexion();
$sql="SELECT cod_tra,nom_tra,ape_tra FROM trabajadores WHERE est_tra='A'";
$result =mysqli_query($conexion,$sql);
?>
<br>
        <div class="mx-auto sombra" style="width: 50rem;">
         <div class="card mb-2">
            <div class="card-title mx-auto text-white text-center mt-4 pt-2 sombra c-normal" style="width: 70%; height: 70%; border-radius:10px;">
                <h4>Registrar Bancos Trabajadores</h4>
            </div>
            <hr style="width: 90%; height: 90%;" class="mx-auto" >
             <div class="card-body">
            <form id="frmTrabA" method="POST" onsubmit="return agregarBnTrabajador()" autocomplete="off">
                <div class="form-group">
                        <div class="row mx-2">
                                <div class="col mt-1 mb-2">
                                    <select class="form-control " id="bnTrabajadorSelect" name="bnTrabajadorSelect" required="">
                                        <option value="A">Seleccione un Trabajadores</option> 
                                            <?php while($ver= mysqli_fetch_row($result)): ?>
                                        <option value="<?php echo $ver[0]?>"><?php echo $ver[1]." ".$ver[2]?> </option>
                                            <?php endwhile; ?>
                                        <small id="tra_error"></small>
                                    </select>
                                </div>
                         </div>
                       </div>
                        <div class="form-group">
                            <div class="row  ml-2 mr-2">
                                <div class="col-6">
                                    <input type="text" name="not_bnt" id="not_bnt" class="form-control" placeholder="Nombre del Titular de la Cuenta">
                                    <small id="nomt_error"></small>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="ncu_bnt" id="ncu_bnt" class="form-control" placeholder="Numero de cuenta ">
                                    <small id="ncu_error"> </small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row  ml-2 mr-2">
                                <div class="col-6">
                                    <input type="text" name="tpc_bnt" id="tpc_bnt" class="form-control" placeholder="Tipo de Cuenta">
                                    <small id="tpc_error"></small>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="rcd_bnt" id="rcd_bnt" class="form-control" placeholder="Rif o cedula del titular">
                                    <small id="rcd_error"></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row  ml-2 mr-2">
                                <div class="col-6">
                                    <input type="text" name="nom_bnt" id="nom_bnt" class="form-control" placeholder="Nombre del Banco">
                                    <small id="nom_error"></small>
                                </div>
                                <div class="col-6">
                                    <input type="email" name="cor_bnt" id="cor_bnt" class="form-control" placeholder="Correo del banco ">
                                    <small id="cor_error"></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row  ml-2 mr-2">
                                <div class="col">
                                    <input type="text" name="tti_bnt" id="tti_bnt" class="form-control" placeholder="Telefono del titular de la cuenta">
                                    <small id="tti_error"></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mt-3 mr-4 ml-4">
                                <div class="col text-center">
                                    <input  class="btn bc-normal px-8" type="submit" value="Guardar"></input>
                                </div>
                            </div>
                        </div>
                </form>
             </div>
         </div>
        </div>
<script>
    $('#bnTrabajadorSelect').select2();
</script>