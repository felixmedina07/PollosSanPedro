<div class="container p-4">
    <br>
    <br>
        <div class="mx-auto sombra" style="width: 70%; height: 70%;">
          <div class="card mb-2">
             <div class="card-title mx-auto text-white text-center mt-4 pt-2 sombra c-cliente" style="width: 70%; height: 70%; border-radius:10px;">
                 <h4>Registrar Clientes</h4>
            </div>
            <hr style="width: 80%; height: 80%;" class="mx-auto">
             <form id="frmClientes" method="POST" onsubmit="return agregarClientes()" autocomplete="off">
                <div class="form-group">
                    <div class="row ml-2 mr-2">
                        <div class="col">
                            <input type="text" name="nom_cli" id="nom_cli" class="form-control" placeholder="Nombre del Cliente">
                            <small id="nom_error"></small>
                        </div>
                        <div class="col">
                            <input type="text" name="ape_cli" id="ape_cli" class="form-control" placeholder="Apellido del Cliente">
                            <small id="ape_error"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ml-2 mr-2">
                        <div class="col">
                            <input type="text" name="ced_cli" id="ced_cli" class="form-control" placeholder="Cedula del Cliente">
                            <small id="ced_error"></small>
                        </div>
                        <div class="col">
                            <input type="text" name="rif_cli" id="rif_cli" class="form-control" placeholder="Rif del Cliente">
                            <small id="rif_error"></small>
                        </div>     
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ml-2 mr-2">
                        <div class="col">
                            <input type="email" name="cor_cli" id="cor_cli" class="form-control" placeholder="Correo del Cliente">
                            <small id="cor_error"></small>
                        </div>
                        <div class="col">
                            <input type="text" name="tel_cli" id="tel_cli" class="form-control" placeholder="Telefono del Cliente">
                            <small id="tel_error"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ml-2 mr-2">
                        <div class="col">
                            <input type="text" name="ads_cli" id="ads_cli" class="form-control" placeholder="Direccion del Cliente">
                            <small id="ads_error"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3 mr-4 ml-4">
                    <div class="col text-center">
                        <input  class="btn px-8 bc-cliente" type="submit" value="Guardar"></input>
                    </div>
                </div>
            </form>
          </div>
        </div>
</div>

