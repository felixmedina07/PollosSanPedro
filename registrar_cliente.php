<?php
require_once "view/head/head2.php";
require_once "backend/class/conexion.php";
$obj= new Conectar();
$conexion= $obj->conexion();
$sql="SELECT * FROM cliente WHERE est_cli='A' AND pas_cli = ''";
$result=mysqli_query($conexion,$sql);
?>

<div class="container p-4">
    <div class="card mx-auto sombra" style="width: 25rem;">
        <div class="card-title text-center pt-4 text-center c-login"><h2>Registrar</h2></div>
        <div class="card-body">
            <form id="register_form" method="POST" onsubmit="return agregarUsuario();" autocomplete="off" >
            <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <label for="tel_cli">Telefono:</label>
                            <input type="text" class="form-control" id="tel_cli" name="tel_cli" placeholder="Ingrese Numero Telefono" required  pattern="^[0-9]+$">
                            <small id="n_error"class="form-text text-muted">El telefono tiene que coincidir con los datos del cliente al que estas registrado</small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <label for="cor_cli">Correo:</label>
                            <input type="email" class="form-control" id="cor_cli" name="cor_cli" placeholder="Ingrese Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            <small id="e_error" class="form-text text-muted">El Correo tiene que coincidir con los datos del cliente al que estas registrado</small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                   <div class="row">
                       <div class="col-12">
                            <label for="pas_cli">Contraseña:</label>
                            <input type="password" class="form-control" id="pas_cli" name="pas_cli" placeholder="Ingrese Contraseña" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
                            <small id="p1-error" class="form-text text-muted">La contraseña tiene que ser mas de 8 caracteres contener al menos una letra y un numero</small>
                       </div>
                   </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-12">
                      <label for="rol_usu">Clientes Registrados</label>
                            <select class="form-control" id="cli_usu" name="cli_usu" required>
                                <option value="">Seleccione Cliente</option>
                                <?php while($ver= mysqli_fetch_row($result)): ?>
                                   <option value="<?php echo $ver[0]?>"><?php echo $ver[1]." "." "." ".$ver[2]?> </option>
                                <?php endwhile; ?>
                            </select>
                        <small id="s-error" class="form-text text-muted"></small>
                      </div>
                  </div>
                </div>

                <button type="submit" class="btn bc-login" name="user_register"><i class="fa fa-user">&nbsp;</i> Register</button>
                <span style="margin-left:2px;"><a href="sistema_cliente.php" class="btn bc-login">Login</a></span>
            </form>
        </div>
        <div class="card-footer text-muted c-login"><a href="recuperar.php" class="r-login">Recuperar Contraseña</a></div>
    </div>
</div>

<?php
 require_once "view/footer/footer.php";
?>



<script>
    function agregarUsuario() {
        datos=$('#register_form').serialize();
            var DOMAIN = "http://localhost/PollosSanPedro";
            $.ajax({
            method: "POST",
            data: datos,
            url: "backend/controllers/clientes/registrar.php",
            success: function(r) {
                console.log(r);
                if (r == 3) {
                    swal("¡Error!", "SISTEMA FALLO");
                }
                if (r == 2) {
                    swal("¡Error!", "Este Usuario ya existe , intente de nuevo", "error");
                }
                if (r == 1) {
                    $('#register_form')[0].reset();
                    window.location.href = encodeURI(DOMAIN+"/sistema_cliente.php?msg=Registrado Con exito"); 
                }
                if(r == 0){
                    swal("¡Error!", "Verifique que los datos coinciden con el cliente seleccionado!");
                }
            }
        });
    return false;
}
</script>