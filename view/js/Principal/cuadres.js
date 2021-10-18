 function agregarCuadres(){
    var status = false;
    var status2 = false;
    var status3 = false; 
    var status4 = false;
    var status5 = false;
    var status6 = false;
    var status7 = false;
    var cli =$('#ClienteBnSelect');
    var des=$('#DespachoBnSelect');
    var cpo= $('#cpo_cua');
    var cpa=$('#cpa_cua');
    var cal=$('#cal_cua');
    var cmo=$('#cmo_cua');
    var pre=$('#pre_cua'); 
    var regex = /^[a-zA-Z ]+$/;
    var regexn = /^[0-9]+$/;
    var regexd = (/^[0-9]{1,20}$|^[0-9]{1,20}\.[0-9]{1,3}$/);
    if(cli.val()=="A"){
        alertify.error("Cliente no Seleccionado");
        status=false;
    } else{
        status= true;
        status2= true;
    }
    if(des.val()=="A"){
        alertify.error("Despacho no Seleccionado");
        status=false;
    } else{
        status= true;
        status3= true;
    }
    
    if(cpo.val()=="" && cpo.val() < 0){
        cpo.addClass("border-dange");
        $("#cpo_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
        status=false;
    }else{
        cpo.removeClass("border-danger");
        $("#cpo_error").html("");
        status= true;
    }
    if(!regexd.test(cpo.val())){
        cpo.addClass("border-danger");
        $("#cpo_error").html("<span class='text-danger'>Solo Datos Numericos</span>")
        status=false;
    }else{
        cpo.removeClass("border-danger");
        $("#cpo_error").html("");
        status= true;
    }

    if(cpa.val()==""  && cpa.val() < 0){
        cpa.addClass("border-danger");
        $("#cpa_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
        status=false;
    }else{
        cpa.removeClass("border-danger");
        $("#cpa_error").html("");
        status= true;
    }
    if(!regexd.test(cpa.val())){
        cpa.addClass("border-danger");
        $("#cpa_error").html("<span class='text-danger'>Solo Datos Numericos</span>")
        status=false;
    }else{
        cpa.removeClass("border-danger");
        $("#cpa_error").html("");
        status= true;
    }
    
    if(cal.val()==""  && cal.val() < 0){
        cal.addClass("border-danger");
        $("#cal_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
        status=false;
    }else{
        cal.removeClass("border-danger");
        $("#cal_error").html("");
        status= true;
    }
    if(!regexd.test(cal.val())){
        cal.addClass("border-danger");
        $("#cal_error").html("<span class='text-danger'>Solo Datos Numericos</span>")
        status=false;
    }else{
        cal.removeClass("border-danger");
        $("#cal_error").html("");
        status= true;
    }

    if(cmo.val()=="" && cmo.val() < 0){
        cmo.addClass("border-danger");
        $("#cmo_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
        status=false;
    }else{
        cmo.removeClass("border-danger");
        $("#cmo_error").html("");
        status= true;
    }
    if(!regexd.test(cmo.val())){
        cmo.addClass("border-danger");
        $("#cmo_error").html("<span class='text-danger'>Solo Datos Numericos</span>")
        status=false;
    }else{
        cmo.removeClass("border-danger");
        $("#cmo_error").html("");
        status= true;
    }

    if(cal.val()==""  && cal.val() < 0){
        cal.addClass("border-danger");
        $("#cal_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
        status=false;
    }else{
        cal.removeClass("border-danger");
        $("#cal_error").html("");
        status= true;
    }
    if(!regexd.test(cal.val())){
        cal.addClass("border-danger");
        $("#cal_error").html("<span class='text-danger'>Solo Datos Numericos</span>")
        status=false;
    }else{
        cal.removeClass("border-danger");
        $("#cal_error").html("");
        status= true;
    }

    if(pre.val()=="" && pre.val() < 0){
        pre.addClass("border-danger");
        $("#pre_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
        status=false;
    }else{
        pre.removeClass("border-danger");
        $("#pre_error").html("");
        status= true;
    }
    if(!regexd.test(pre.val())){
        pre.addClass("border-danger");
        $("#pre_error").html("<span class='text-danger'>Solo Datos Numericos</span>")
        status=false;
    }else{
        pre.removeClass("border-danger");
        $("#pre_error").html("");
        status= true;
    }
       if(status && status2 && status3){
        datos=$('#frmCuadres').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"backend/controllers/cuadres/AgregarCuadres.php",
            success:function(r){
                r = r.trim();
                if (r==1){
                    $('#frmCuadres')[0].reset();
                    $('#cuadreAgregar').load('view/cuadres/CuadresAgregar.php');
                    swal("¡Exito!", "Cuadre Agregado con exito", "success");
                }
                if(r==0){
                    swal("¡Error!", "Error Al agregar", "error");
                }
            }
            });
       }
        return false;                
    }

