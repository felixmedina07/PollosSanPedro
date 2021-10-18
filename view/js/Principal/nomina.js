
function agregarNomina(){
    console.log('hola')
    var status= false;
    var status2= false;
    var status3= false;
    var status4= false;
    var status5= false;
    var status7= false;
    var status8= false;
    var cnp=$('#cnp_nom');
    var nrf=$('#nrf_nom');
    var fcu=$('#fcu_nom');
    var tra=$('#bnTrabajadorSelect');
    var casa=$('#bnCasaSelect');
    var btra=$('#bnbTrabajadorSelect');
        var regex = /^[a-zA-Z ]+$/;
        var regexn = /^[0-9]+$/;
        var regexnu = new RegExp("^([0-9]{20})$")
        var regext = new RegExp("^([0-9]{11})$")
        var regexd = (/^[0-9]{1,20}$|^[0-9]{1,20}\.[0-9]{1,3}$/);
        var e_patt =new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        var regEsRif = new RegExp("^([VEJPG]{1})([0-9]{7,8})$");
        
        if(tra.val()=="A") {
            alertify.error("Trabajador no Seleccionado");
            status=false;
        } else{
            status= true;
            status5=true;
        }
        if(casa.val()=="A") {
            alertify.error("banco de la empresa no Seleccionado");
            status=false;
        } else{
            status= true;
            status7=true;
        }
        if(btra.val()=="A") {
            alertify.error("Banco del Trabajador no Seleccionado");
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

        if(nrf.val()=="" || nrf.val() < 0){
            nrf.addClass("border-danger");
            $("#nrf_error").html("<span class='text-danger'>Datos Numericos.</span>")
            status=false;
        }else{
            nrf.removeClass("border-danger");
            $("#nrf_error").html("");
            status= true;
        }


        if(!regexn.test(nrf.val())){
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
    if(status && status3 && status4 && status5 && status7 && status8){
        var DOMAIN = "http://localhost/PollosSanPedro";
        datos=$('#frmNomina').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../../backend/controllers/nomina/AgregarNomina.php",
            success:function(r){
                console.log(r)
                    r = r.trim();
                if (r==1){
                    window.location.href = encodeURI(DOMAIN+"/view/nomina/nominaVer.php");
                }else if(r==0){
                    swal("¡Error!", "No se pudo agregar El Pago", "error");
                }
            }
        }); 
    }
    return false;
}

