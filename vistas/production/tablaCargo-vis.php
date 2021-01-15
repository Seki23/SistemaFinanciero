

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de cargos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <form action="<?php echo SERVERURL; ?>cargo/">             
                     <button type="submit" class="btn btn-info "><span class='fa fa-plus'></span>Nuevo</button>
                     </form>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="tabla-cargo" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Cargo</th>
                          <th>Salario</th>                        
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
<div class="modal fade" id="ModalCargo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Fiador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form   id="form-cargorM" autocomplete="off">


                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre cago<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                  <input class="form-control" type="hidden" id="idCargoM"  name="idCargoM" />
                                    <input class="form-control" id="nomcarM" name="nomcarM" data-validate-length-range="6" data-validate-words="1" name="name" placeholder="" required="required" />
                                </div>
                            </div>
                             

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Salario<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="number" id="salariocarM" name="salariocarM" class='sal' name="sueldo" required='required' data-validate-length-range="2,10" placeholder="00.00" /></div>
                            </div>

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button id="modificarCargos" class="btn btn-primary">Modificar</button>
                                      
                                    </div>
                                </div>
                            </div>
       </form>


      </div>
    
    </div>
  </div>
</div>


        <!-- /page content -->

      