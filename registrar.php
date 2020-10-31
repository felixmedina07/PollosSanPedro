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
                            <input type="text" class="form-control" id="nom_usu" name="nom_usu" placeholder="Ingrese Nombre" required  pattern="[A-Za-z]{3,}">
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
                <!-- <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <label for="pass2_usu">Re-Contraseña</label>
                            <input type="password" class="form-control" id="pass2_usu" name="pass2_usu" placeholder="Repita Contraseña" required>
                            <small id="p2-error" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div> -->
                <div class="form-group">
                  <div class="row">
                      <div class="col-12">
                      <label for="rol_usu">Rol Usuario</label>
                            <select class="form-control" id="rol_usu" name="rol_usu" required>
                                <option value="I">Seleccione Usuario</option>
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
            success: function(respuesta) {
                 respuesta = respuesta.trim();
                console.log(respuesta);
                if (respuesta == 2) {
                    alertify.success("Este Usuario ya exite!! ");
                }
                if (respuesta == 1) {
                    $('#register_form')[0].reset();
                    window.location.href = encodeURI(DOMAIN+"/index.php?msg=Registrado Con exito"); 
                }
                if(respuesta == 0){
                    alertify.error( "Fallo al Agregar");
                }
            }
        });
    return false;

    // var nom = $("#nom_usu");
    // var cor = $("#ema_usu");
    // var cont = $("#pas_usu");
    // var cont2 = $("#pass2_usu");
    // var rol= $("#rol_usu");
    // //expresiones regulares
    // var regexp=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&-.])[A-Za-z\d$@$!%*?&-.]{8,15}$/;
    // var regex = /^[a-zA-Z]+$/;
    // var regexn = /^[0-9]+$/;
    // var regexnu = new RegExp("^([0-9]{20})$")
    // var regext = new RegExp("^([0-9]{11})$")
    // var e_patt =new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
    // var regEsRif = new RegExp("^([VEJPG]{1})([0-9]{7,8})$");

    // //nombre
    // if(nom.val().lenght <= 2 || nom.val()==""){
    //         nom.addClass("border-danger");
    //         $("#n_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
    //         status=false;
    //     }else{
    //         nom.removeClass("border-danger");
    //         $("#n_error").html("");
    //         status=true;
    //     }

    //     if(!regex.test(nom.val())){
    //             nom.addClass("border-danger");
    //             $("n_error").html("<span class='text-danger'>No se permiten numeros.</span>")
    //             status=false;
    //         }else{
    //             nom.removeClass("border-danger");
    //             $("n_error").html("");
    //             status= true;
    //             status2=true;
    //     }
    //     //correo
    //     if(cor.val()==""){
    //         cor.addClass("border-danger");
    //         $("#e_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
    //         status=false;
    //     }else{
    //         cor.removeClass("border-danger");
    //         $("#e_error").html("");
    //         status= true;
    //     }
    //     if(!e_patt.test(cor.val())){
    //         cor.addClass("border-danger");
    //         $("#e_error").html("<span class='text-danger'>El Email es incorrecto.</span>")
    //         status=false;
    //     }else{
    //         cor.removeClass("border-danger");
    //         $("#e_error").html("");
    //         status= true;
    //     }
    //     //contraseña
    //     if(cont.val()==""){
    //         cont.addClass("border-danger");
    //         $("#p1-error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
    //         status=false;
    //     }else{
    //         cont.removeClass("border-danger");
    //         $("#p1-error").html("");
    //         status= true;
    //     }
    //     if(!regexp.test(cont.val())){
    //         cont.addClass("border-danger");
    //         $("#p1-error").html("<span class='text-danger'>La contraseña es incorrecta.</span>")
    //         status=false;
    //     }else{
    //         cont.removeClass("border-danger");
    //         $("#p1-error").html("");
    //         status= true;
    //     }
    //     //re-contraseña
    //     if(cont2.val().lenght < 2 || cont2.val()==""){
    //         cont2.addClass("border-danger");
    //         $("#p2-error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
    //         status=false;
    //     }else{
    //         cont2.removeClass("border-danger");
    //         $("#p2-error").html("");
    //         status=true;
    //     }
}
</script>