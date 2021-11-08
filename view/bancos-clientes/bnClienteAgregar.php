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
        <div class="card mb-2 sombra" style="width: 110%; height: 110%;">
            <div class="card-title mx-auto text-white text-center sombra c-normal mt-4 pt-2" style="width: 70%; height: 70%; border-radius:10px;">
                    <h4>Registrar Banco Cliente</h4>
            </div>
            <hr style="width: 80%; height: 80%;" class="mx-auto" >
                <div class="card-body">
                    <form id="formBancoCliente" method="POST" onsubmit="return agregarBancoC()" autocomplete="off">
                       <div class="form-group">
                        <div class="row mx-2">
                                <div class="col mt-1 mb-2">
                                    <select class="form-control " id="bnClienteSelect" name="bnClienteSelect" required="">
                                        <option value="A">Seleccione un Cliente</option> 
                                            <?php while($ver= mysqli_fetch_row($result)): ?>
                                        <option value="<?php echo $ver[0]?>"><?php echo $ver[1] ?> </option>
                                            <?php endwhile; ?>
                                        <small id="cli_error"></small>
                                    </select>
                                </div>
                         </div>
                       </div>
                        <div class="form-group">
                            <div class="row  ml-2 mr-2">
                                <div class="col-6">
                                    <input type="text" name="not_bnk" id="not_bnk" class="form-control" placeholder="Nombre del Titular de la Cuenta">
                                    <small id="nomt_error"></small>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="ncu_bnk" id="ncu_bnk" class="form-control" placeholder="Numero de cuenta ">
                                    <small id="ncu_error"> </small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row  ml-2 mr-2">
                                <div class="col-6">
                                    <input type="text" name="tpc_bnk" id="tpc_bnk" class="form-control" placeholder="Tipo de Cuenta">
                                    <small id="tpc_error"></small>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="rcd_bnk" id="rcd_bnk" class="form-control" placeholder="Rif o cedula del titular">
                                    <small id="rcd_error"></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row  ml-2 mr-2">
                                <div class="col-6">
                                    <input type="text" name="nom_bnk" id="nom_bnk" class="form-control" placeholder="Nombre del Banco">
                                    <small id="nom_error"></small>
                                </div>
                                <div class="col-6">
                                    <input type="email" name="cor_bnk" id="cor_bnk" class="form-control" placeholder="Correo del banco ">
                                    <small id="cor_error"></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row  ml-2 mr-2">
                                <div class="col">
                                    <input type="text" name="tti_bnk" id="tti_bnk" class="form-control" placeholder="Telefono del titular de la cuenta">
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
</div>

<script>
    $(document).ready(function () {
    $('#bnClienteSelect').select2();
 });
</script>