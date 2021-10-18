<?php
require_once "view/head/head2.php";

?>

<div class="container p-4">
    <div class="card mx-auto sombra" style="width: 30rem;">
        <div class="card-title text-center pt-4 text-center c-login"><h2>Recuperar Contraseña</h2></div>
        <div class="card-body">
            <form id="recuperar_form" method="POST" onsubmit="return recuperar();" autocomplete="off" >
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <label for="nom_usuR">Nombre:</label>
                            <input type="text" class="form-control" id="nom_usuR" name="nom_usuR" placeholder="Ingrese Nombre" >
                            <small id="n_error"class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                     <div class="row">
                     <div class="col-12">
                            <label for="ema_usuR">Correo:</label>
                            <input type="email" class="form-control" id="ema_usuR" name="ema_usuR"  placeholder="Ingrese Email">
                            <small id="e_error" class="form-text text-muted">su email tiene que ser unico no usar repetidos</small>
                        </div>
                     </div>
                 </div>   
                <div class="form-group">
                   <div class="row">
                       <div class="col-12">
                            <label for="pas_usuR">Contraseña Nueva</label>
                            <input type="password" class="form-control" id="pas_usuR" name="pas_usuR" placeholder="Ingrese Contraseña">
                            <small id="p1-error" class="form-text text-muted"></small>
                       </div>
                   </div>
                </div>
                <div class="form-group mt-3">
                  <div class="row">
                      <div class="col-4">
                      <input  class="btn bc-login pxx-8 text-center p-2 ml-4" type="submit" value="Guardar"></input>
                      </div>
                      <div class="col-4">
                      <button class="btn bc-login pxx-8 p-2 pl-2 pr-2 ml-4" id="limpiar">limpiar</button>
                      </div>
                      <div class="col-4">
                        <a href="sistema_principal.php" class="btn bc-login pxx-8 p-2 ml-4">Inicio</a>
                      </div>
                  </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

<?php
 require_once "view/footer/footer.php";
?>

<script>

    $(document).ready(function() {
        $('#limpiar').click(function() {
             $('input[type="text"]').val('');
             $('input[type="email"]').val('');
             $('input[type="password"]').val('');
        });
    });

    function recuperar(){
        var status= false;
        var status2= false;
        var status3= false;
        var status4= false;
        var nom=$('#nom_usuR');
        var cor=$('#ema_usuR');
        var cont=$('#pas_usuR');

        //expresiones regulares
        var regexp=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&-.])[A-Za-z\d$@$!%*?&-.]{8,15}$/;
        var regex = /^[a-zA-Z]+$/;
        var regexn = /^[0-9]+$/;
        var regexnu = new RegExp("^([0-9]{20})$")
        var regext = new RegExp("^([0-9]{11})$")
        var e_patt =new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        var regEsRif = new RegExp("^([VEJPG]{1})([0-9]{7,8})$");
        //nombre
        if(nom.val().lenght < 2 || nom.val()==""){
            nom.addClass("border-danger");
            $("#n_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            nom.removeClass("border-danger");
            $("#n_error").html("");
            status=true;
        }

        if(!regex.test(nom.val())){
                nom.addClass("border-danger");
                $("n_error").html("<span class='text-danger'>No se permiten numeros.</span>")
                status=false;
            }else{
                nom.removeClass("border-danger");
                $("n_error").html("");
                status= true;
                status2=true;
        }
        //correo
        if(cor.val()==""){
            cor.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            cor.removeClass("border-danger");
            $("#e_error").html("");
            status= true;
        }
        if(!e_patt.test(cor.val())){
            cor.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>El Email es incorrecto.</span>")
            status=false;
        }else{
            cor.removeClass("border-danger");
            $("#e_error").html("");
            status= true;
            status3= true;
        }
        //contraseña nueva
        if(cont.val()==""){
            cont.addClass("border-danger");
            $("#p1-error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            cont.removeClass("border-danger");
            $("#p1-error").html("");
            status= true;
        }
        if(!regexp.test(cont.val())){
            cont.addClass("border-danger");
            $("#p1-error").html("<span class='text-danger'>La contraseña es incorrecta.</span>")
            status=false;
        }else{
            cont.removeClass("border-danger");
            $("#p1-error").html("");
            status= true;
            status4= true;
        }

        datos=$('#recuperar_form').serialize();
        if(status && status2 && status3 && status4){
            $.ajax({
                type:"POST",
                data:datos,
                url:"backend/controllers/usuarios/Recuperar.php",
                success:function(r){
                        r = r.trim();
                    if (r==1){
                        $('#recuperar_form')[0].reset();
                        swal("¡Exito!", "Recupero Su contraseña con exito", "success");
                    }else if(r==0){
                        swal("¡Error!", "No se pudo Recuperar Contraseña", "error");
                    }else if(r==2){
                        swal("¡Error!", "Usuario No Encontrado", "error");
                    }
                }
            });
        }  
         return false;   
    }
</script>