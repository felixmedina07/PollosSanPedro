<?php
require_once "view/head/head2.php";
require_once "backend/class/conexion.php";
$obj= new Conectar();
$conexion= $obj->conexion();
$sql="SELECT * FROM usuarios WHERE rol_usu='A' AND est_usu='A'";
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
                            <label for="nom_usu">Nombre:</label>
                            <input type="text" class="form-control" id="nom_usu" name="nom_usu" placeholder="Ingrese Nombre" required  pattern="[A-Za-z0-9]{3,}">
                            <small id="n_error"class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <label for="email_usu">Correo:</label>
                            <input type="email" class="form-control" id="ema_usu" name="ema_usu"  placeholder="Ingrese Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            <small id="e_error" class="form-text text-muted">su email tiene que ser unico no usar repetidos</small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                   <div class="row">
                       <div class="col-12">
                            <label for="pas_usu">Contraseña:</label>
                            <input type="password" class="form-control" id="pas_usu" name="pas_usu" placeholder="Ingrese Contraseña" required>
                            <small id="p1-error" class="form-text text-muted"></small>
                       </div>
                   </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-12">
                      <label for="rol_usu">Rol Usuario</label>
                            <select class="form-control" id="rol_usu" name="rol_usu" required>
                                <option value="">Seleccione Usuario</option>
                                <option value="V">Visitante</option>
                                <?php if (mysqli_num_rows($result) == 0): ?> 
                                <option value="A">Administrador</option>
                                <?php endif; ?>
                            </select>
                        <small id="s-error" class="form-text text-muted"></small>
                      </div>
                  </div>
                </div>

                <button type="submit" class="btn bc-login" name="user_register"><i class="fa fa-user">&nbsp;</i> Register</button>
                <span style="margin-left:2px;"><a href="index.php" class="btn bc-login">Login</a></span>
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
            url: "backend/controllers/login/agregaUsuario.php",
            success: function(r) {
               r = r.trim();
                console.log(r);
                if (r == 2) {
                    swal("¡Error!", "Esta Usuario ya existe , intente de nuevo", "error");
                }
                if (r == 1) {
                    $('#register_form')[0].reset();
                    window.location.href = encodeURI(DOMAIN+"/sistema_principal.php?msg=Registrado Con exito"); 
                }
                if(r == 0){
                    alertify.error( "Fallo al Agregar");
                }
            }
        });
    return false;
}
</script>