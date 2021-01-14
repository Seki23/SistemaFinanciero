        <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Empleados</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                              
                                <div class="x_content">
                                    <form  id="registrar-Empleado" autocomplete="off">
                                        <span class="section">Informacion Personal</span>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" id="nombreE" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Kevin Antonio Urquilla Gomez" required="required" />
                                            </div>
                                        </div>
                                          <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Dirección<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" required="required" id="zonaE" name='message' placeholder="Av. Jose Maria Cornejo #10, Barrio El Centro, San Vicente "></></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">DUI<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" id="duiE" data-validate-length-range="10" data-validate-words="1" name="name" placeholder="000000000-0"  data-inputmask="'mask' : '999999999-9'" required="required" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">NIT<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                               <input class="form-control" id="nitE"  data-validate-length-range="17" data-validate-words="1" name="name" placeholder="0000-000000-000-0"  data-inputmask="'mask' : '9999-999999-999-9'" required="required" /></div>
                                        </div>
                                        
                                       
                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Teléfono<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" id="telefonoE" type="tel" class='tel' name="phone" required='required' data-validate-length-range="8,20" data-inputmask="'mask' : '9999-9999'" placeholder="0000-0000" /></div>
                                        </div>

                                             <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Cargo<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                    <input class='form-control optional' id="cargo" name="cargo"  type="text" disabled  placeholder="Agregar"/>
                                                    <input type="hidden" class="form-control" id="idcargo"name="cargo">
                                                </div>
                           <div class="form-group">
                    <div class="input-group">
                      <button id="busCargo" class="btn btn-" type="button" style="margin-left:-13px;" data-toggle="modal" data-target="#ModalCargo">
                        <div class="input-group-prepend">
                        <span class="input-group-text"> Añadir</span>
                        
                        </div>
                      </button>
                    </div>
                  </div>
             </div>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                    <button type='reset' class="btn btn-success">Limpiar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                                               <!--MODAL CARGO -->                           
 <div class="modal fade" id="ModalCargo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccione un cargo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <table  class="table table-bordered" id="tableCargoss" style="width: 100%;">
                <thead class="">
                  <tr>
                  <th style="text-align: center;" class="hide_me" >ID</th>
                    <th style="text-align: center;">Cargo</th>
                                      <th style="text-align: center;">Accion</th>
                  </tr>
                </thead>
                <tbody >
                         
                </tbody>
              </table>
      </div>
    
    </div>
  </div>
</div>
                </div>
            </div>
      
    <!-- /page content -->

      