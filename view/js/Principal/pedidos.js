function agregarPedido(){
    var status= false;
    var status2= false;
    var status3= false;
    var cpo=$('#cpo_ped');
    var cpa=$('#cpa_ped');
    var cal=$('#cal_ped');
    var cmo=$('#cmo_ped');
    var fec=$('#fec_ped');
    var regexd = (/^[0-9]{1,20}$|^[0-9]{1,20}\.[0-9]{1,3}$/);
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
            status2=false;
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

        if(fec.val()==""){
            fec.addClass("border-danger");
            $("#fec_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
            status3=false
        }else{
            fec.removeClass("border-danger");
            $("#fec_error").html("");
            status= true;
            status3=true;
        }
      if(status && status2 && status3){
        var DOMAIN = "http://localhost/PollosSanPedro";
        datos=$('#frmPedido').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../../backend/controllers/pedidos/AgregarPedido.php",
            success:function(r){
                console.log(r)
                    r = r.trim();
                if (r==1){
                    window.location.href = encodeURI(DOMAIN+"/view/pedidos/PedVer.php");
                }else if(r==0){
                    swal("¡Error!", "No se pudo agregar El Pedido", "error");
                }
            }
        }); 
      }
    return false; 
}