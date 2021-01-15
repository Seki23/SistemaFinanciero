

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
                    <h2>Lista de categorias</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <form action="<?php echo SERVERURL; ?>categoriaproducto/">             
                     <button type="submit" class="btn btn-info "><span class='fa fa-plus'></span>Nuevo</button>
                     </form>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="tabla-catproduc" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Categoria producto</th>                      
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
<div class="modal fade" id="ModalCateProd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Categoria Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form   id="form-categoriaprodM" autocomplete="off">

                                    <!--<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ID<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                  <output class="form-control"  id="idCateprod"  ></output>
                                                
                                            </div>
                                        </div>-->  
                                    <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Categoria producto<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                 <input class="form-control" type="hidden" id="idCateprod" name="idCateprod" />
                                                <input class="form-control" id="categoriaprom" name="categoriaprom" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" />
                                            </div>
                                        </div>
                                          

                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button id="modificarCateProd" class="btn btn-primary">Modificar</button>
                                                  
                                                </div>
                                            </div>
                                        </div>
       </form>


      </div>
    
    </div>
  </div>
</div>


        <!-- /page content -->

      