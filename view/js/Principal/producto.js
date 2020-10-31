function agregarProductos(){

        var status= false;
        var status2= false;
        var status3= false;
        var status4=false;
        var status5=false;
        var tas=$('#tas_pro');
        var tpo=$('#tpo_pro');
        var tpa=$('#tpa_pro');
        var tmo=$('#tmo_pro');
        var tal=$('#tal_pro');
        var ces=$('#ces_pro');
        var csp=$('#csp_pro');
        var prp=$('#prp_pro');
        var cpo=$('#cpo_pro');
        var pro = $('#bnProovedorSelect');
        var che1 = $('#act_pro');
        var che2 = $('#act_pro2');
        var fcp = $('#fcp_pro');
        var fdp = $('#fdp_pro');
        var de =  /^\d*\.?\d*$/;
        var regex = /^[a-zA-Z ]+$/;
        var regexn = /^[0-9]+$/;
        var regexd = (/^[0-9]{1,20}$|^[0-9]{1,20}\.[0-9]{1,3}$/);
        var regexnu = new RegExp("^([0-9]{20})$")
        var regext = new RegExp("^([0-9]{11})$")
        var e_patt =new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        var regEsRif = new RegExp("^([VEJPG]{1})([0-9]{7,8})$");

        if(pro.val()=="A") {
            alertify.error("Proovedor no Seleccionado");
            status=false;
        } else{
            status= true;
            status5=true;
        }
        
        if(fcp.val()==""){
            fcp.addClass("border-danger");
            $("#fcp_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            fcp.removeClass("border-danger");
            $("#fcp_error").html("");
            status= true;  
        }
        if(fdp.val()==""){
            fdp.addClass("border-danger");
            $("#fdp_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            fdp.removeClass("border-danger");
            $("#fdp_error").html("");
            status= true; 
        }

        if (!che1.is(':checked') && !che2.is(':checked') ) {
            alertify.error("Selecciona una Opcion");
            status = false;
        }else{
            status = true;
        }

        if (che1.is(':checked') && che2.is(':checked') ) {
            alertify.error("Solo puedes Seleccionar una Opcion");
            status = false;
        }else{
            status = true;
        }

        if(tas.val()=="" || tas.val().lenght < 0){
            tas.addClass("border-danger");
            $("#tas_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            tas.removeClass("border-danger");
            $("#tas_error").html("");
            status= true;
            status2 = true;
        }
            if(!regexd.test(tas.val())){
                tas.addClass("border-danger");
                $("#tas_error").html("<span class='text-danger'>Solo Digitos Numericos.</span>")
                status=false;
            }else{
                tas.removeClass("border-danger");
                $("#tas_error").html("");
                status= true;
            
        }

        if(tpo.val()=="" || tpo.val().lenght < 0){
            tpo.addClass("border-danger");
            $("#tpo_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            tpo.removeClass("border-danger");
            $("#tpo_error").html("");
            status= true;
            status3=true;
        }
        if(!regexd.test(tpo.val())){
            tpo.addClass("border-danger");
            $("#tpo_error").html("<span class='text-danger'>Solo Digitos Numericos</span>")
            status=false;
        }else{
            tpo.removeClass("border-danger");
            $("#tpo_error").html("");
            status= true;
        }

        if(tpa.val()=="" || tpa.val().lenght < 0){
            tpa.addClass("border-danger");
            $("#tpa_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            tpa.removeClass("border-danger");
            $("#tpa_error").html("");
            status= true;
        }

        if(!regexd.test(tpa.val())){
            tpa.addClass("border-danger");
            $("#tpa_error").html("<span class='text-danger'>Solo Digitos Numericos</span>")
            status=false;
        }else{
            tpa.removeClass("border-danger");
            $("#tpa_error").html("");
            status= true;
        }

        if(tmo.val()=="" || tmo.val().lenght < 0){
            tmo.addClass("border-danger");
            $("#tmo_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            tmo.removeClass("border-danger");
            $("#tmo_error").html("");
            status= true;
        }

        if(!regexd.test(tmo.val())){
            tmo.addClass("border-danger");
            $("#tmo_error").html("<span class='text-danger'>Solo Digitos Numericos.</span>")
            status=false;
        }else{
            tmo.removeClass("border-danger");
            $("#tmo_error").html("");
            status= true;
        }

        if(tal.val()=="" || tal.val().lenght <= -1){
            tal.addClass("border-danger");
            $("#tal_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            tal.removeClass("border-danger");
            $("#tal_error").html("");
            status= true;
        }

        if(!regexn.test(tal.val())){
            tal.addClass("border-danger");
            $("#tal_error").html("<span class='text-danger'>Solo Digitos Numericos.</span>")
            status=false;
        }else{
            tal.removeClass("border-danger");
            $("#tal_error").html("");
            status= true;
        }

        if(ces.val()=="" || ces.val().lenght <= -1){
            ces.addClass("border-danger");
            $("#ces_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            ces.removeClass("border-danger");
            $("#ces_error").html("");
            status= true;
        }

        if(!regexn.test(ces.val())){
            ces.addClass("border-danger");
            $("#ces_error").html("<span class='text-danger'>Solo Digitos Numericos.</span>")
            status=false;
        }else{
            ces.removeClass("border-danger");
            $("#ces_error").html("");
            status= true;
        }

        if(csp.val()=="" || csp.val().lenght <= -1){
            csp.addClass("border-danger");
            $("#csp_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            csp.removeClass("border-danger");
            $("#csp_error").html("");
            status= true;
        }

        if(!regexd.test(csp.val())){
            csp.addClass("border-danger");
            $("#csp_error").html("<span class='text-danger'>Datos numericos.</span>")
            status=false;
        }else{
            csp.removeClass("border-danger");
            $("#csp_error").html("");
            status= true;
        }

        if(prp.val()=="" || prp.val().lenght <= -1){
            prp.addClass("border-danger");
            $("#prp_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            prp.removeClass("border-danger");
            $("#prp_error").html("");
            status= true;
        }

        if(!regexd.test(prp.val())){
            prp.addClass("border-danger");
            $("#prp_error").html("<span class='text-danger'>Datos numericos.</span>")
            status=false;
            
        }else{
            prp.removeClass("border-danger");
            $("#prp_error").html("");
            status= true;
            status4=true;
        }
        if(cpo.val()=="" || cpo.val().lenght <= -1){
            cpo.addClass("border-danger");
            $("#cpo_error").html("<span class='text-danger'>Este Campo es Obligatorio.</span>")
            status=false;
        }else{
            cpo.removeClass("border-danger");
            $("#cpo_error").html("");
            status= true;
        }

        if(!regexn.test(cpo.val())){
            cpo.addClass("border-danger");
            $("#cpo_error").html("<span class='text-danger'>Datos numericos.</span>")
            status=false;
        }else{
            cpo.removeClass("border-danger");
            $("#cpo_error").html("");
            status= true;
        }

        if(status && status2 && status3 && status4 && status5){
            datos=$('#frmProductos').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"backend/controllers/productos/AgregarProductos.php",
                success:function(r){
                        r = r.trim();
                    if (r==1){
                        $('#frmProductos')[0].reset();
                        swal("¡Exito!", "Banco agregado con exito", "success");
                    }else{
                        swal("¡Error!", "No se pudo agregar Producto", "error");
                    }
                }
            });   
        }     
    return false
 }

 