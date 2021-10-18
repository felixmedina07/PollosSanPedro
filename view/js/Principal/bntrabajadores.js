$(document).ready(function () {
 });
    function agregarBnTrabajador(){
    // se declara las variables segun el id de los input del formulario para agregar datos al cliente
   var status= false;
   var conf=false;
   var conf2=false;
   var conf3=false;
   var conf4=false;
   var n1= false;
   var nomt=$('#not_bnt');
   var ncu=$('#ncu_bnt');
   var tpc=$('#tpc_bnt');
   var rcd=$('#rcd_bnt');
   var nom=$('#nom_bnt');
   var cor=$('#cor_bnt');
   var tti=$('#tti_bnt');
   var tra=$('#bnTrabajadorSelect');
    var regex = /^[a-zA-Z ]+$/;
    var regexn = /^[0-9]+$/;
    var regexnu = new RegExp("^([0-9]{20})$")
    var regext = new RegExp("^([0-9]{11})$")
    var e_patt =new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
    var regEsRif = new RegExp("^([VEJPG]{1})([0-9]{7,8})$");
    
    if(tra.val()=="A") {
        alertify.error("Trabajador no Seleccionado");
        status=false;
    } else{
        status= true;
        conf3=true;
    }

    if(nomt.val() == ""){
        nomt.addClass("border-danger");
        $("#nomt_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
        status=false;
    }else{
        nomt.removeClass("border-danger");
        $("#nomt_error").html("");
        status= true;
    }

    if(n1){
        if(!regex.test(nomt.val())){
            nomt.addClass("border-danger");
            $("#nomt_error").html("<span class='text-danger'>No se permiten numeros.</span>")
            status=false;
        }else{
            nomt.removeClass("border-danger");
            $("#nomt_error").html("");
            status= true;
            n1=true;
        }
    }

    if(ncu.val()==""){
        ncu.addClass("border-danger");
        $("#ncu_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
        status=false;
    }else{
        ncu.removeClass("border-danger");
        $("#ncu_error").html("");
        status= true;
    }
    if(!regexnu.test(ncu.val())){
        ncu.addClass("border-danger");
        $("#ncu_error").html("<span class='text-danger'>Solo Datos Numericos</span>")
        status=false;
    }else{
        ncu.removeClass("border-danger");
        $("#ncu_error").html("");
        status= true;
        conf4= true;
    }

    if(tpc.val()=="" || tpc.val().lenght < 2){
        tpc.addClass("border-danger");
        $("#tpc_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
        status=false;
    }else{
        tpc.removeClass("border-danger");
        $("#tpc_error").html("");
        status= true;
    }

    if(!regex.test(tpc.val())){
        tpc.addClass("border-danger");
        $("#tpc_error").html("<span class='text-danger'>No se permiten numeros.</span>")
        status=false;
    }else{
        tpc.removeClass("border-danger");
        $("#tpc_error").html("");
        status= true;
    }

    if(rcd.val()==""){
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
        conf=true;
    }

    if(nom.val()=="" || nom.val().lenght < 2){
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
        $("#nom_error").html("<span class='text-danger'>El Nombre no posee Numeros.</span>")
        status=false;
    }else{
        nom.removeClass("border-danger");
        $("#nom_error").html("");
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
        conf2 = true;
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

    if(tti.val()==""){
        tti.addClass("border-danger");
        $("#tti_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
        status=false;
    }else{
        tti.removeClass("border-danger");
        $("#tti_error").html("");
        status= true;
    }
    if(!regext.test(tti.val())){
        tti.addClass("border-danger");
        $("#tti_error").html("<span class='text-danger'>Solo Datos Numericos</span>")
        status=false;
    }else{
        tti.removeClass("border-danger");
        $("#tti_error").html("");
        status= true;
    }

       if(status && conf && conf2 && conf3 && conf4 ){
        var DOMAIN = "http://localhost/PollosSanPedro";
        datos=$('#frmTrabA').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../../backend/controllers/bnTrabajadores/AgregarBnTrabajadores.php",
            success:function(r){
                console.log(r)
                    r = r.trim();
                if(r==1){
                    window.location.href = encodeURI(DOMAIN+"/view/bancos-trabajadores/bnTrabVer.php");
                }
                if(r==3){
                    swal("¡Error!", "Esta Cuenta ya Existe Verifique el Numero de Cuenta", "error");
                }
                if(r==0){
                    swal("¡Error!", "Error Al agregar", "error");
                }
            }
        });
       }
    return false; 
}

