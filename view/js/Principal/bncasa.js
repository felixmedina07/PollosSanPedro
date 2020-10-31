  // funcion para agregar banco tomando los input del formulario y metiendolo dentro de una sentencia ajax

function agregarBanco(){
    // se declara las variables segun el id de los input de los campos 
    var status = false;
    var status2= false;
    var status3= false;
    var status4 = false;
    var status5 = false;
     var nombre = $("#nom_bnc");
     var  num = $("#nuc_bnc");
     var  rcd=$("#rcd_bnc");
     var  email=$("#cor_bnc");
   //expresiones regulares para validar rif email cedula
    var regex = /^[a-zA-Z ]+$/;
    var regexn = /^[0-9]+$/;
    var regexnu = new RegExp("^([0-9]{20})$")
    var regext = new RegExp("^([0-9]{11})$")
    var e_patt =new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
    var regEsRif = new RegExp("^([VEJPG]{1})([0-9]{7,8})$");
  //validamos que todos los campos esten en blanco
     if(num.val()=="" && nombre.val()=="" && rcd.val()=="" && email.val()==""){
         num.addClass("border-danger");
         $("#nu_error").html("<span class='text-danger'>Campo Vacio.</span>")
         nombre.addClass("border-danger");
         $("#n_error").html("<span class='text-danger'>Campo Vacio.</span>")
         rcd.addClass("border-danger");
         $("#rcd_error").html("<span class='text-danger'>Campo Vacio.</span>")
         email.addClass("border-danger");
         $("#ema_error").html("<span class='text-danger'>Campo Vacio.</span>")
         status = false;
     }else{
         num.removeClass("border-danger");
         $("#nu_error").html("");
         nombre.removeClass("border-danger");
         $("#n_error").html(""); 
         rcd.removeClass("border-danger");
         $("#rcd_error").html("");
         email.removeClass("border-danger");
         $("#ema_error").html("");
         status = true;
     }
  // validamos que los numeros de cuenta no esten vacios  
     if (num.val()=="") {
         num.addClass("border-danger");
         $("#nu_error").html("<span class='text-danger'>Ingrese un numero de cuenta con mas de 2 numeros.</span>")
       status = false;
     }else{
        num.removeClass("border-danger");
        $("#nu_error").html("");
    }
     if(!regexnu.test(num.val())){
        num.addClass("border-danger");
        $("#nu_error").html("<span class='text-danger'>Numeros de Cuenta poseen 20 digitos.</span>")
       status = false;
     }else{
         num.removeClass("border-danger");
         $("#nu_error").html("");
         status = true;
         status2 = true;
     }
  // validamos que los nombres de cuenta no esten vacios y solo sean letras
     if (nombre.val().length < 2 ){
         nombre.addClass("border-danger");
         $("#n_error").html("<span class='text-danger'>Ingrese un nombre con mas de 2 caracteres.</span>")
        status = false;
     }else{ 
            nombre.removeClass("border-danger");
            $("#n_error").html("");
            status = true;
           }
     if(!regex.test(nombre.val())){
        nombre.addClass("border-danger");
        $("#n_error").html("<span class='text-danger'>Ingrese un nombre sin numeros.</span>");
        status = false;
     }else{ 
         nombre.removeClass("border-danger");
         $("#n_error").html("");
         status = true;
         status4 = true;
            }
  // validamos que el rif o cedula de cuenta no esten vacios
     if((rcd.val().length < 2) ){
         rcd.addClass("border-danger");
         $("#rcd_error").html("<span class='text-danger'>Ingrese un rif con mas de 2 numeros.</span>")
        status = false;
     }else{
        rcd.removeClass("border-danger");
        $("#rcd_error").html("");
        status = true;
        }

      if((!regEsRif.test(rcd.val()))){
        rcd.addClass("border-danger");
        $("#rcd_error").html("<span class='text-danger'>Ingrese un rif valido.</span>")
        status = false;
     }else{
        rcd.removeClass("border-danger");
        $("#rcd_error").html("");
        status = true;
        status3 = true;
     }
      // validamos que los correos no esten vacios
     if(email.val()==""){
         email.addClass("border-danger");
         $("#ema_error").html("<span class='text-danger'>Ingrese un Correo.</span>")
       status = false;
     }else{
        email.removeClass("border-danger");
        $("#ema_error").html("");
        status = true;
    } 
     if((!e_patt.test(email.val()))){
         email.addClass("border-danger");
         $("#ema_error").html("<span class='text-danger'>Ingrese un Correo Valido</span>")
       status = false;
     }else{
         email.removeClass("border-danger");
         $("#ema_error").html("");
         status = true;
         status5= true;
     } 
     // esta es la sentencia ajax al terminar de validar declaramos la funcion y nuestra base datos
        if(status && status2 && status3 && status4 && status5){
            datos=$('#frmBancoCasa').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"backend/controllers/bnCasa/AgregarbnCasa.php",
                success:function(r){
                        r = r.trim();
                    if (r==1){
                        $('#frmBancoCasa')[0].reset();
                        swal("¡Exito!", "Banco agregado con exito", "success");
                    }
                    if(r==3){
                        swal("¡Error!", "Esta Cuenta ya Existe Verifique Numero de Cuenta", "error");
                    }
                    if(r==0){
                        swal("¡Error!", "Error Al agregar", "error");
                    }
                }
            });
        }
     return false; 
 }