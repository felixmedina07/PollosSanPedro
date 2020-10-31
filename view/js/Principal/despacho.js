function agregarDespacho(){
    var status= false;
    var status2= false;
    var status3= false;
    var cpo=$('#cpo_des');
    var cpa=$('#cpa_des');
    var cal=$('#cal_des');
    var cmo=$('#cmo_des');
    var pok=$('#pok_des');
    var pak=$('#pak_des');
    var alk=$('#alk_des');
    var mok=$('#mok_des');
    var cli =$('#bnDespachoCSelect');
    var regex = /^[a-zA-Z ]+$/;
    var regexn = /^[0-9]+$/;
    var regexd = (/^[0-9]{1,20}$|^[0-9]{1,20}\.[0-9]{1,3}$/);
        if(cli.val()=="A"){
            alertify.error("Cliente no Seleccionado");
            status=false;
        } else{
            status= true;
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
            status2=true;
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

        if(pok.val()=="" && pok.val() < 0){
            pok.addClass("border-danger");
            $("#pok_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            pok.removeClass("border-danger");
            $("#pok_error").html("");
            status= true;
        }
        if(!regexd.test(pok.val())){
            pok.addClass("border-danger");
            $("#pok_error").html("<span class='text-danger'>Solo Datos Numericos</span>")
            status=false;
        }else{
            pok.removeClass("border-danger");
            $("#pok_error").html("");
            status= true;
            status3=true;
        }

        if(pak.val()=="" && pak.val() < 0){
            pak.addClass("border-danger");
            $("#pak_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            pak.removeClass("border-danger");
            $("#pak_error").html("");
            status= true;
        }
        if(!regexd.test(pak.val())){
            pak.addClass("border-danger");
            $("#pak_error").html("<span class='text-danger'>Solo Datos Numericos</span>")
            status=false;
        }else{
            pak.removeClass("border-danger");
            $("#pak_error").html("");
            status= true;
        }

        if(alk.val()=="" && alk.val() < 0){
            alk.addClass("border-danger");
            $("#alk_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            alk.removeClass("border-danger");
            $("#alk_error").html("");
            status= true;
        }
        if(!regexd.test(alk.val())){
            alk.addClass("border-danger");
            $("#alk_error").html("<span class='text-danger'>Solo Datos Numericos</span>")
            status=false;
        }else{
            alk.removeClass("border-danger");
            $("#alk_error").html("");
            status= true;
        }

        if(mok.val()=="" && mok.val() < 0){
            mok.addClass("border-danger");
            $("#mok_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            mok.removeClass("border-danger");
            $("#mok_error").html("");
            status= true;
        }
        if(!regexd.test(mok.val())){
            mok.addClass("border-danger");
            $("#mok_error").html("<span class='text-danger'>Solo Datos Numericos</span>")
            status=false;
        }else{
            mok.removeClass("border-danger");
            $("#mok_error").html("");
            status= true;
        }
      if(status && status2 && status3){
        datos=$('#frmDespacho').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"backend/controllers/despachos/AgregarDespacho.php",
            success:function(r){
                r = r.trim();
                if (r==1){
                    $('#frmDespacho')[0].reset();
                    swal("¡Exito!", "Despacho Agregado con exito", "success");
                }else{
                    swal("¡Error!", "No se encontro ningun producto verifique", "error");
                }
                if(r==0){
                    swal("¡Error!", "Error Al agregar", "error");
                }
            }
        });
      }
   
    return false; 
}