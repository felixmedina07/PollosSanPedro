   function agregarClientes(){

    var status= false;
    var status2= false;
    var status3= false;
    var status4= false;
    var nom=$('#nom_cli');
    var ape=$('#ape_cli');
    var ced=$('#ced_cli');
    var rcd=$('#rif_cli');
    var cor=$('#cor_cli');
    var tel=$('#tel_cli');
    var ads=$('#ads_cli');
    
        var regex = /^[a-zA-Z ]+$/;
        var regexn = /^[0-9]+$/;
        var regexnu = new RegExp("^([0-9]{20})$")
        var regext = new RegExp("^([0-9]{11})$")
        var e_patt =new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        var regEsRif = new RegExp("^([VEJPG]{1})([0-9]{7,8})$");

        if(nom.val().lenght < 2 || nom.val()==""){
            nom.addClass("border-danger");
            $("#nom_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            nom.removeClass("border-danger");
            $("#nom_error").html("");
            status= true;
           
        }
            if(!regex.test(nom.val())){
                nom.addClass("border-danger");
                $("#nom_error").html("<span class='text-danger'>No se permiten numeros.</span>")
                status=false;
            }else{
                nom.removeClass("border-danger");
                $("#nom_error").html("");
                status= true;
                status2=true;
        }

        if(ape.val()==""){
            ape.addClass("border-danger");
            $("#ape_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            ape.removeClass("border-danger");
            $("#ape_error").html("");
            status= true;
        }
        if(!regex.test(ape.val())){
            ape.addClass("border-danger");
            $("#ape_error").html("<span class='text-danger'>No se permiten numeros</span>")
            status=false;
        }else{
            ape.removeClass("border-danger");
            $("#ape_error").html("");
            status= true;
        }

        if(ced.val()=="" || ced.val().lenght < 2){
            ced.addClass("border-danger");
            $("#ced_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            ced.removeClass("border-danger");
            $("#ced_error").html("");
            status= true;
        }

        if(!regEsRif.test(ced.val())){
            ced.addClass("border-danger");
            $("#ced_error").html("<span class='text-danger'>Cedula Incorrecta.</span>")
            status=false;
        }else{
            ced.removeClass("border-danger");
            $("#ced_error").html("");
            status= true;
            status3=true;
        }

        if(rcd.val()=="" || rcd.val().lenght < 2){
            rcd.addClass("border-danger");
            $("#rcd_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            rcd.removeClass("border-danger");
            $("#rcd_error").html("");
            status= true;
        }

        if(!regEsRif.test(rcd.val())){
            rcd.addClass("border-danger");
            $("#rcd_error").html("<span class='text-danger'>El Rif es incorrecto.</span>")
            status=false;
        }else{
            rcd.removeClass("border-danger");
            $("#rcd_error").html("");
            status= true;
        }

        if(cor.val()==""){
            cor.addClass("border-danger");
            $("#cor_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            cor.removeClass("border-danger");
            $("#cor_error").html("");
            status= true;
        }
        
        if(!e_patt.test(cor.val())){
            cor.addClass("border-danger");
            $("#cor_error").html("<span class='text-danger'>El Email es incorrecto.</span>")
            status=false;
        }else{
            cor.removeClass("border-danger");
            $("#cor_error").html("");
            status= true;
        }

        if(tel.val()==""){
            tel.addClass("border-danger");
            $("#tel_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            tel.removeClass("border-danger");
            $("#tel_error").html("");
            status= true;
        }
        if(!regext.test(tel.val())){
            tel.addClass("border-danger");
            $("#tel_error").html("<span class='text-danger'>Solo Datos Numericos</span>")
            status=false;
        }else{
            tel.removeClass("border-danger");
            $("#tel_error").html("");
            status= true;
            status4=true;
        }

        if(ads.val()==""){
            ads.addClass("border-danger");
            $("#ads_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            ads.removeClass("border-danger");
            $("#ads_error").html("");
            status= true;
        } 

      if(status && status2 && status3 && status4){
        datos=$('#frmClientes').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"backend/controllers/clientes/AgregarClientes.php",
            success:function(r){
                    r = r.trim();
                if (r==1){
                    $('#frmClientes')[0].reset();
                    swal("¡Exito!", "Cliente agregado con exito", "success");
                }
                if(r==3){
                    swal("¡Error!", "Cliente ya existe verifique Cedula o Correo", "error");
                }
                if(r==0){
                    swal("¡Error!", "Error Al agregar", "error");
                }
            }
        });
      }
        return false; 
     }

     function login(){
        var status = false;
        var status2 = false;
        var cor = $('#cor_cli');
        var pass = $('#pas_cli');
        var e_patt =new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        if(cor.val()==""){
            cor.addClass("border-danger");
            $("#cor_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            cor.removeClass("border-danger");
            $("#cor_error").html("");
            status= true;
        }
    
        if(!e_patt.test(cor.val())){
            cor.addClass("border-danger");
            $("#cor_error").html("<span class='text-danger'>El Email es incorrecto.</span>")
            status=false;
        }else{
            cor.removeClass("border-danger");
            $("#cor_error").html("");
            status= true;
        }
     
        
        if(pass.val() == ""){
            pass.addClass("border-danger");
            $("#p1_error").html("<span class='text-danger'>Ingrese una contraseña con mas de 4 carateres</span>")
           status2 = false;
        }else{
          pass.removeClass("border-danger");
          $("#p1_error").html("");
          status2 = true;
        }
    
            if(status && status2){
                var DOMAIN = "http://localhost/PollosSanPedro";
                $.ajax({
                method: "POST",
                data: $('#login_form').serialize(),
                url: "backend/controllers/clientes/login.php",
                success: function(respuesta) {
                    console.log('hola')
                    console.log(respuesta);
                    if (respuesta == 1) {
                        $('#login_form')[0].reset();
                        window.location.href = encodeURI(DOMAIN+"/principal_cliente.php?msg=Bienvenido"); 
                    }
                    if(respuesta == 0) {
                        alertify.error( "Fallo al Agregar");
                    }
                }
            });
            }
    
        return false;
     }
