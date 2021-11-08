<br>  
        <div class="mx-auto sombra" style="width: 50rem;">
         <div class="card mb-2">
            <div class="card-title mx-auto text-white text-center mt-4 pt-2 sombra c-normal" style="width: 70%; height: 70%; border-radius:10px;">
                <h4>Registrar Trabajadores</h4>
            </div>
            <hr style="width: 90%; height: 90%;" class="mx-auto" >
             <div class="card-body">
                <form id="frmTrabA" method="POST" onsubmit="return agregarTrabajador()" autocomplete="off">
                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                            <div class="col-md-6">
                                <input type="text" name="nom_tra"  id="nom_tra" class="form-control" placeholder="Nombre del Trabajador">
                                <small id="nom_error"></small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="ape_tra" id="ape_tra" class="form-control" placeholder="Apellido del Trabajador">
                                <small id="ape_error"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="row ml-2 mr-2">
                            <div class="col-md-6">   
                                <input type="text" name="ced_tra" id="ced_tra" class="form-control" placeholder="Cedula del Trabajador">
                                <small id="ced_error"></small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="ads_tra" id="ads_tra" class="form-control" placeholder="Direccion del Trabajador">
                                <small id="ads_error"></small>
                            </div>
                        </div>
                   </div>
                   <div class="form-group"> 
                        <div class="row ml-2 mr-2">
                            <div class="col-md-6">   
                                <input type="text" name="cor_tra" id="cor_tra" class="form-control" placeholder="Correo del Trabajador">
                                <small id="cor_error"></small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="tel_tra" id="tel_tra" class="form-control" placeholder="Telefono del Trabajador">
                                <small id="tel_error"></small>
                            </div>
                        </div>
                   </div>
                    <div class="form-group mt-3 mr-4 ml-4">
                        <div class="col text-center">
                        <input  class="btn px-8 bc-normal" type="submit" value="Guardar"></input>
                        </div>
                    </div>
                </form>
             </div>
         </div>
        </div>