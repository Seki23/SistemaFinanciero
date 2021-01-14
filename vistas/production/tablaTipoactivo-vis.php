

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tipo Activo</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Tipos de Activos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <form action="<?php echo SERVERURL; ?>tipoactivo/">             
                     <button type="submit" class="btn btn-info "><span class='fa fa-plus'></span>Nuevo</button>
                     </form>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="tabla-tipoactivo" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Correlativo</th>
                          <th>Nombre</th>
                         <th>Catalogo activo</th>
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


        <!-- Modal -->
<div class="modal fade" id="ModalTipoactivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Tipo Activo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form   id="form-tipoactivoM" autocomplete="off">

                                    <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Correlativo<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                               <input class="form-control" type="hidden" id="idT"  />
                                                    <input class='form-control optional' id="correlativoE" name="correlativoDep" placeholder="0001" data-validate-length-range="3,15" type="text" disabled />
                                                </div>
                                        </div>
                                      <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" id="nombreE" data-validate-length-range="6" data-validate-words="2" name="nombreD" placeholder="Sucursal San Vicente" required="required" />
                                            </div>
                                        </div>

                                           <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Catalogo Activo<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                    <select class="form-control cata"  name="marcas" id="catalogosCombo" disabled="">
                  
                  </select>
                                                </div>
                                               
                </div>
                                     

                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <button id="modificarTipoactivo" class="btn btn-primary">Modificar</button>
                                                  
                                                </div>
                                          
                                    
                                      </div>
                                        </div>
       </form>


      </div>
    
    </div>
  </div>
</div>
</div>

        <!-- /page content -->

      