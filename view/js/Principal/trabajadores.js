function agregarTrabajador(){
    var nom=$('#nom_tra');
    var ape=$('#ape_tra');
    var ced=$('#ced_tra');
    var ads=$('#ads_tra');
    var cor=$('#cor_tra');
    var tel=$('#tel_tra');
    var status = false;
    var status2 = false;
    var status3= false;
    var status4=false;

    let regex = /^[a-zA-Z ]+$/;
    let regext = new RegExp("^([0-9]{11})$")
    let e_patt =new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
    let regEsRif = new RegExp("^([VEJPG]{1})([0-9]{7,8})$");

    if(nom.val().lenght < 2 || nom.val()==""){
        nom.addClass("border-danger is-invalid");
        $("#nom_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
        status=false;
    }else{
        nom.removeClass("border-danger is-invalid");
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

    if(ads.val()===""){
        ads.addClass("border-danger");
        $("#ads_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
        status=false;
    }else{
        ads.removeClass("border-danger");
        $("#ads_error").html("");
        status= true;
    }
console.log(status && status2 && status3 && status4);
    if(status && status2 && status3 && status4){
        var DOMAIN = "http://localhost/PollosSanPedro";
        datos=$('#frmTrabA').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../../backend/controllers/trabajadores/AgregarTrabajador.php",
            success:function(r){
                r = r.trim()
                console.log(r)
                if(r==3){
                 swal("¡Error!", "Trabajador ya existe verifique Cedula", "error");
                }
                if(r==1){
                 window.location.href = encodeURI(DOMAIN+"/view/trabajadores/TrabVer.php");
                }
                if(r==0){
                    swal("¡Error!", "Error Al agregar", "error");
                }
            }
        });
    }
    return false;
}


