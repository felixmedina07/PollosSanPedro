<div class="container p-4 ">
    <br>  
    <br>  
        <div class="mx-auto sombra" style="width: 70%; height: 70%;">
         <div class="card mb-2">
            <div class="card-title mx-auto text-white text-center mt-4 pt-2 sombra c-normal" style="width: 70%; height: 70%; border-radius:10px;">
                <h4>Registrar Proovedores</h4>
            </div>
            <hr style="width: 80%; height: 80%;" class="mx-auto" >
             <div class="card-body">
                <form id="frmProovedor" method="POST" onsubmit="return agregarProovedor()" autocomplete="off">
                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                        <div class="col-6">
                            <input type="text" name="nom_edo" id="nom_edo" class="form-control" placeholder="Nombre del Proovedor">
                            <small id="nom_error"></small>
                        </div>
                        <div class="col-6">
                            <input type="text" name="rif_edo" id="rif_edo" class="form-control" placeholder="Rif o Cedula del Proovedor">
                            <small id="rif_error"></small>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                            <div class="col ">
                                <input type="email" name="cor_edo" id="cor_edo" class="form-control" placeholder="Correo del Proovedor">
                                <small id="cor_error"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row ml-2 mr-2">
                            <div class="col-12">
                                <input type="text" name="dir_edo" id="dir_edo" class="form-control" placeholder="Direccion del Proovedor">
                                <small id="dir_error"></small>     
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
</div>