        <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Departamento</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                              
                                <div class="x_content">
                                    <form  id="registrar-Departamento" autocomplete="off">
                                        <span class="section">Informacion</span>
                                        
                                          
                                          <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Correlativo<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                    <input class='form-control optional' id="correlativoDep" name="correlativoDep" placeholder="0001" data-validate-length-range="3,15" type="text" />
                                                </div>
                                        </div>
                                      <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" id="nombreD" name="nombreD" placeholder="" required="required" />
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

                           <!--MODAL INSTITUCION -->                           
 <div class="modal fade" id="ModalInstitucion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccione una Institucion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <table  class="table table-bordered" id="tableInstitucionesS" style="width: 100%;">
                <thead class="">
                  <tr>
                  <th style="text-align: center;" class="hide_me" >ID</th>
                    <th style="text-align: center;">Correlativo</th>
                    <th style="text-align: center;">Nombre</th>
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

      