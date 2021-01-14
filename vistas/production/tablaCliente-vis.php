
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Clientes</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de clientes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <form action="<?php echo SERVERURL; ?>clientes/">             
                     <button type="submit" class="btn btn-info "><span class='fa fa-plus'></span>Nuevo</button>
                     </form>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="tabla-cliente" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Código</th>
                          <th>Nombre</th>
                          <th>DUI</th>
                          <th>Direccion</th>
                          <th>Teléfono</th>
                          <th>Categoria</th>
                          <th><em class="fa fa-cog"></em></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>


 
        <!-- /page content -->

       <!-- Modal -->
<div class="modal fade" id="ModalCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form   id="form-clienteM" autocomplete="off">
                                   
                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                            <input class="form-control" type="hidden" id="idClienteM"  />
                                                <input class="form-control" id="nombreCliM" name="nombreCliM" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="kevin antonio urquilla gomez" required="required" />
                                            </div>
                                         </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Dirección<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                                <textarea required="required" id="direccionClieM" name='direccionClie'></textarea></div>
                                         </div>
                                        <div class="field item form-group" id="duinatural">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">DUI<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                                <input class="form-control" id="duiClieM" name="duiClie" data-validate-length-range="10" data-validate-words="1" name="name" placeholder="000000000-0"  data-inputmask="'mask' : '999999999-9'"  /></div>
                                         </div>

                                           <div class="field item form-group">
                                    
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Teléfono<span class="required">*</span></label>
                                          <div class="col-md-9 col-sm-6">
                                           <input class="form-control" id="telefonoClieM" name="telefonoClie" type="tel" class='tel' name="phone" required='required' data-validate-length-range="8,20" data-inputmask="'mask' : '9999-9999'" placeholder="0000-0000" /></div>
                                        </div> 
                                        <div class="field item form-group" id="lugarTrabajo">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Lugar de trabajo<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                                    <input class='form-control optional' id="profesionClieM" name="profesionClie" data-validate-length-range="5,50" type="text" />
                                                </div>
                                         </div>
                                     
                                         <div class="field item form-group" id="sueldoNat">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Sueldo<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                                <input class="form-control" type="number" id="sueldoClieM" name="sueldoClie" class='sal' name="sueldo"  data-validate-length-range="2,10" placeholder="00000000000.00" /></div>
                                        </div>
                                          <div class="field item form-group" id="gastoNat">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Gastos<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                                <input class="form-control" type="number" id="gastosClieM" name="gastosClie" class='sal' name="sueldo" data-validate-length-range="2,10" placeholder="00000000000.00" /></div>
                                        </div>
                                  
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Cartera<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                            <select  id="CombocarteraCliente" name="CombocarteraCliente" class="form-control " required="required" >
                                              
                                             </select>
                                              
                                                </div>
                                         </div>


                                     
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button id="modificarCliente" class="btn btn-primary">Modificar</button>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                     
                                     
       </form>


      </div>
    
    </div>
  </div>
</div>
