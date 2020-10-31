
function agregarCuentas(){
    var status= false;
    var status2= false;
    var status3= false;
    var status4= false;
    var status5= false;
    var status6= false;
    var status7= false;
    var status8= false;
    var cnp=$('#cnp_cue');
    var cnt=$('#cnt_cue');
    var nrf=$('#nrf_cue');
    var fcu=$('#fcu_cue');
    var cli=$('#bnClienteSelect'); 
    var des=$('#bnDespachoSelect');
    var casa=$('#bnCasaSelect');
    var bcli=$('#bnbClienteSelect');
        var regex = /^[a-zA-Z ]+$/;
        var regexn = /^[0-9]+$/;
        var regexnu = new RegExp("^([0-9]{20})$")
        var regext = new RegExp("^([0-9]{11})$")
        var regexd = (/^[0-9]{1,20}$|^[0-9]{1,20}\.[0-9]{1,3}$/);
        var e_patt =new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        var regEsRif = new RegExp("^([VEJPG]{1})([0-9]{7,8})$");
        
        if(cli.val()=="A") {
            alertify.error("Cliente no Seleccionado");
            status=false;
        } else{
            status= true;
            status5=true;
        }
        if(des.val()=="A") {
            alertify.error("Facturacion no Seleccionada");
            status=false;
        } else{
            status= true;
            status6=true;
        }
        if(casa.val()=="A") {
            alertify.error("banco de la empresa no Seleccionado");
            status=false;
        } else{
            status= true;
            status7=true;
        }
        if(bcli.val()=="A") {
            alertify.error("Banco del Cliente no Seleccionado");
            status=false;
        } else{
            status= true;
            status8=true;
        }

        if(cnp.val()=="" || cnp.val() < 0){
            cnp.addClass("border-danger");
            $("#cnp_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            cnp.removeClass("border-danger");
            $("#cnp_error").html("");
            status= true;
        }
        if(!regexd.test(cnp.val())){
            cnp.addClass("border-danger");
            $("#cnp_error").html("<span class='text-danger'>Datos Numericos.</span>")
            status=false;
        }else{
            cnp.removeClass("border-danger");
            $("#cnp_error").html("");
            status= true;
            status3=true;
        }

        if(cnt.val()=="" || cnt.val() < 0){
            cnt.addClass("border-danger");
            $("#cnt_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            cnt.removeClass("border-danger");
            $("#cnt_error").html("");
            status= true;
            status4=true;
        }

        if(!regexd.test(cnt.val())){
            cnt.addClass("border-danger");
            $("#cnt_error").html("<span class='text-danger'>Datos Numericos.</span>")
            status=false;
        }else{
            cnt.removeClass("border-danger");
            $("#cnt_error").html("");
            status= true;
            status2= true;
        }

        if(!regexnu.test(nrf.val())){
            nrf.addClass("border-danger");
            $("#nrf_error").html("<span class='text-danger'>Datos Numericos.</span>")
            status=false;
        }else{
            nrf.removeClass("border-danger");
            $("#nrf_error").html("");
            status2= true;
        }

        if(fcu.val()==""){
            fcu.addClass("border-danger");
            $("#fcu_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            fcu.removeClass("border-danger");
            $("#fcu_error").html("");
            status= true;
            status4=true;
        }

    if(status && status2 && status3 && status4 && status5 && status6 && status7 && status8){
        datos=$('#frmCuentas').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"backend/controllers/cuentas/AgregarCuentas.php",
            success:function(r){
                    r = r.trim();
                if (r==1){
                    $('#frmCuentas')[0].reset();
                    swal("¡Exito!", "Cuentas agregado con exito", "success"); 
                }else if(r==0){
                    swal("¡Error!", "No se pudo agregar Cuentas", "error");
                }
            }
        }); 
    }
    return false; 
}

