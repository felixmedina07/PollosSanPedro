  // funcion para agregar banco tomando los input del formulario y metiendolo dentro de una sentencia ajax

  function agregarProovedor(){
    // se declara las variables segun el id de los input de los campos 
    var status = false;
    var status2= false;
    var status3= false;
    var status4= false;
    var status5= false;
    var nombre = $("#nom_edo");
    var rif = $("#rif_edo");
    var correo=$("#cor_edo");
    var direccion=$("#dir_edo");
   //expresiones regulares para validar rif email cedula
    var regex = /^[a-zA-Z ]+$/;
    var regexn = /^[0-9]+$/;
    var regexnu = new RegExp("^([0-9]{20})$")
    var regext = new RegExp("^([0-9]{11})$")
    var e_patt =new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
    var regEsRif = new RegExp("^([VEJPG]{1})([0-9]{7,8})$");
  //validamos que todos los campos esten en blanco
     if(nombre.val()=="" && rif.val()=="" && correo.val()=="" && direccion.val()==""){
         nombre.addClass("border-danger");
         $("#nom_error").html("<span class='text-danger'>Campo Vacio.</span>")
         rif.addClass("border-danger");
         $("#rif_error").html("<span class='text-danger'>Campo Vacio.</span>")
         correo.addClass("border-danger");
         $("#cor_error").html("<span class='text-danger'>Campo Vacio.</span>")
         direccion.addClass("border-danger");
         $("#dir_error").html("<span class='text-danger'>Campo Vacio.</span>")
         status = false;
     }else{
         nombre.removeClass("border-danger");
         $("#nom_error").html("");
         rif.removeClass("border-danger");
         $("#rif_error").html(""); 
         correo.removeClass("border-danger");
         $("#cor_error").html("");
         direccion.removeClass("border-danger");
         $("#dir_error").html("");
         status = true;
     }
  // validamos que los numeros de cuenta no esten vacios  
     if (nombre.val()=="" || nombre.val().length <= 2 ) {
         nombre.addClass("border-danger");
         $("#nom_error").html("<span class='text-danger'>Campo Obligatorio.</span>")
         status = false;
     }else{
        nombre.removeClass("border-danger");
        $("#nom_error").html("");
        status = true;
        status2 = true;
    }
     if(!regex.test(nombre.val())){
        nombre.addClass("border-danger");
        $("#nom_error").html("<span class='text-danger'>Solo Letras Intente de nuevo.</span>")
        status = false;
     }else{
         nombre.removeClass("border-danger");
         $("#nom_error").html("");
         status = true;
         status2 = true;
     }
  // validamos que los nombres de cuenta no esten vacios y solo sean letras
     if (rif.val() == "" || rif.val().length < 2 ){
         rif.addClass("border-danger");
         $("#rif_error").html("<span class='text-danger'>Campo Obligatorio.</span>")
         status = false;
     }else{ 
            rif.removeClass("border-danger");
            $("#rif_error").html("");
            status = true;
           }

     if(!regEsRif.test(rif.val())){
        rif.addClass("border-danger");
        $("#rif_error").html("<span class='text-danger'>Ingrese un rif Valido.</span>");
        status = false;
     }else{ 
         rif.removeClass("border-danger");
         $("#rif_error").html("");
         status = true;
         status3 = true;
            }
  // validamos que el rif o cedula de cuenta no esten vacios
     if( direccion.val() == "" || direccion.val().length < 2 ){
         direccion.addClass("border-danger");
         $("#dir_error").html("<span class='text-danger'>Campo Obligatorio.</span>")
         status = false;
     }else{
        direccion.removeClass("border-danger");
        $("#dir_error").html("");
        status = true;
        status5 = true;
        }

      // validamos que los correos no esten vacios
     if(correo.val()==""){
         correo.addClass("border-danger");
         $("#cor_error").html("<span class='text-danger'>Campo Obligatorio.</span>")
         status = false;
     }else{
        correo.removeClass("border-danger");
        $("#cor_error").html("");
        status = true;
    } 
     if((!e_patt.test(correo.val()))){
         correo.addClass("border-danger");
         $("#cor_error").html("<span class='text-danger'>Ingrese un Correo Valido</span>")
         status = false;
     }else{
         correo.removeClass("border-danger");
         $("#cor_error").html("");
         status = true;
         status4 =true;
     } 
     // esta es la sentencia ajax al terminar de validar declaramos la funcion y nuestra base datos
        if(status && status2 && status3 && status4 && status5){
            datos=$('#frmProovedor').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"backend/controllers/proovedor/AgregarProovedor.php",
                success:function(r){
                        r = r.trim();
                        console.log(r);
                    if(r==1){
                        $('#frmProovedor')[0].reset();
                        swal("¡Exito!", "Proovedor agregado con exito", "success");
                    }if(r==0){
                        swal("¡Error!", "No se pudo agregar Proovedor", "error");
                    }else if(r==3){
                        swal("¡Error!", "Proovedor ya existe verifique rif o correo", "error");
                    }
                }
            });
        }
     return false; 
 }