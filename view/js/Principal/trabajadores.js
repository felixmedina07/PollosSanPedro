function agregarTrabajador(){
    var DOMAIN = "http://localhost/PolloSanPedro";
    datos=$('#frmTrabA').serialize();
    $.ajax({
        type:"POST",
        data:datos,
        url:"../../backend/controllers/trabajadores/AgregarTrabajador.php",
        success:function(r){
            r = r.trim();
            if(r==3){
             swal("¡Error!", "Trabajador ya existe verifique Cedula", "error");
            }
            if(r==1){  
             window.location.href = encodeURI(DOMAIN+"/view/trabajadores/TrabVer.php");         
            }
            if(r==0){  
                swal("¡Error!", "Error Al agregar", "error");
            }
           
            // if(r==1){
            //     $('#frmBancoCasa')[0].reset();
            //     swal("¡Exito!", "Trabajador agregado con exito", "success");
            // }
            // if(r==3){
            //     swal("¡Error!", "Trabajador ya existe verifique Cedula", "error");
            // }
            // if(r==0){
            //     swal("¡Error!", "Error Al agregar", "error");
            // }
           
        }
    });
    return false;
}


