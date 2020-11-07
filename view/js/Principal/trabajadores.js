function agregarTrabajador(){
    var DOMAIN = "http://localhost/PollosSanPedro";
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
        }
    });
    return false;
}


