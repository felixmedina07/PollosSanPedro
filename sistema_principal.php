<?php
require_once "view/head/head2.php";
?>

<div class="container p-4">
      <?php
         if (isset($_GET["msg"]) AND !empty($_GET["msg"])):
      ?>
         <div class="alert alert-success alert-dismissible text-center fade show" role="alert">
            <?php echo $_GET["msg"]; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <?php
         endif;
      ?>
      <br>
      <br>
    <div class="card mx-auto sombra" style="width: 25rem;" style="border-radius: 25px;">
        <h2 class="card-title text-center c-login">Iniciar Sesion</h2>
        <img src="logo/pollito.png" class="card-img-top mx-auto pt-2" style="width:40%; height:90%;" alt="...">
        <div class="card-body">
            <form id="login_form" onsubmit="return login()" autocomplete="off">
                <div class="form-group">
                   <div class="row">
                        <div class="col-12">
                            <label for="exampleInputEmail1">Usuario</label>
                            <input type="text" class="form-control" id="nom_usu" name="nom_usu" placeholder="Ingresar Usuario">
                            <small id="n_error" class="form-text text-muted">Recuerda Ingresar tu Usuario</small>
                        </div>
                   </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <label for="pas_usu">Contraseña</label>
                            <input type="password" class="form-control" id="pas_usu" name="pas_usu" placeholder="Ingresar contraseña">
                            <small id="p1_error"class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
                <button type="submit" id="submit" class="btn bc-login"><i class="fa fa-lock">&nbsp;</i> Login</button>
                <span style="margin-left:2px;"><a href="registrar.php" class="btn bc-login">Register</a></span>
            </form>
        </div>
        <div class="card-footer c-login"><a href="recuperar.php" class="r-login">Recuperar Contraseña</a></div>
    </div>
</div>


<?php
 require_once "view/footer/footer.php";
?>

<script src="view/js/Usuarios/login/login.js">
</script>
