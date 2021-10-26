<br>  
        <div class="mx-auto sombra" style="width: 50rem;">
         <div class="card mb-2">
            <div class="card-title mx-auto text-white text-center mt-4 pt-2 sombra c-cliente" style="width: 70%; height: 70%; border-radius:10px;">
                <h4>Registrar Pedido</h4>
            </div>
                <hr style="width: 90%; height: 90%;" class="mx-auto" >
                <div class="card-body">
                    <form id="frmPedido" method="POST" onsubmit="return agregarPedido()" autocomplete="off">
                                <div class="form-group">
                                <div class="row ml-2 mr-2">
                                    <div class="col">
                                        <input type="text" name="cpo_ped" id="cpo_ped" class="form-control" placeholder="Cantidad de Pollo">
                                        <small id="cpo_error"></small>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="cpa_ped" id="cpa_ped" class="form-control" placeholder="Cantidad de Patas">
                                        <small id="cpa_error"></small>
                                    </div>
                                </div> 
                                </div>
                                <div class="form-group">
                                   <div class="row ml-2 mr-2">
                                        <div class="col">
                                            <input type="text" name="cal_ped" id="cal_ped" class="form-control" placeholder="Cantidad de Alas">
                                            <small id="cal_error"></small>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="cmo_ped" id="cmo_ped" class="form-control" placeholder="Cantidad de Mollejas">
                                            <small id="cmo_error"></small>
                                        </div>
                                   </div>
                                </div>
                                <div class="form-group">
                                    <div class="row ml-2 mr-2">
                                        <div class="col-12">
                                            <input type="text" name="fec_ped" id="fec_ped" class="form-control" placeholder="Fecha del Pedido" readonly>
                                            <small id="fec_error"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="row mt-3 mr-4 ml-4">
                                        <div class="col text-center">
                                            <input  class="btn bc-cliente px-8 " type="submit" id="btns" value="Guardar"></input>
                                        </div>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>

<script>
    $(function() {
    var fechaA = new Date();
    var yyyy = fechaA.getFullYear();

    $("#fec_ped").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '1900:' + yyyy,
        dateFormat: "yy-mm-dd"
    });

});
</script>        