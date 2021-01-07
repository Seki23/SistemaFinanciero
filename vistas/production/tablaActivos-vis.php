
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Activos</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Activos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <form action="<?php echo SERVERURL; ?>activo/">             
                     <button type="submit" class="btn btn-info "><span class='fa fa-plus'></span>Nuevo</button>
                     </form>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="tabla-activos" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Correlativo</th>
                          <th>Compra</th>
                          <th>Descripcion</th>
                          <th>Estado</th>
                          <th>Precio</th>
                          <th>Depresiacion</th>
                          <th>Adquisicion</th>
                          <th>Catalogo</th>
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
<div class="modal fade" id="ModalActivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Activo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form   id="form-activoM" autocomplete="off">

       <span class="section">Informacion general</span>
                                    <div class="col-md-12 col-sm-12 border">

                                           <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Correlativo<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                            <input class="form-control" id="idActivo" name="idActivo" type="hidden" />
                                                <input class="form-control" id="correlativo" name="correlativo" data-validate-length-range="6" data-validate-words="2" name="name"  required="required" disabled="" />
                                            </div>
                                         </div>

                    
                                       <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">
                                            Fecha de adquisicion <span class="required">*</span></label>
                                      
                                        <div class="col-md-9 col-sm-6">
                                        <input class='form-control date' type="date" name="fecha" id="fecha" required='required'>
                                              
                                         </div>
     
                                         </div>

                                    
                                        <div class="field item form-group" >
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Vida Util<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                            <input class="form-control" type="number" id="vida" name="vida"  required='required' /></div>
                                         </div>

                                         <div class="field item form-group" >
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Precio<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                            <input class="form-control" type="number" id="precio" name="precio" data-validate-length-range="2,10" placeholder="00000000000.00" /></div>
                                         </div>

                                        <div class="field item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Marca<span class="required">*</span></label>
                                          <div class="col-md-9 col-sm-6">
                                          <input class="form-control" id="marca" name="marca" data-validate-length-range="6" data-validate-words="1" name="name"  required="required"  /> 
                                        </div>
                                        </div> 
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Tipo de adquisicion<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                            <select  id="tipoadquisicion" name="tipoadquisicion" class="form-control " required="required" >
                                                <option value="" >-- Seleccione --</option>
                                                <option value="Nuevo">Nuevo</option>
                                                <option value="Usado">Usado</option>
                                                <option value="Donado">Donado</option>
                                             </select>
                                              
                                                </div>
                                         </div>

                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Estado<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                            <select  id="estado" name="estado" class="form-control " required="required" >
                                                <option value="" >-- Seleccione --</option>
                                                <option value="Activo">Activo</option>
                                                <option value="Donado">Donado</option>
                                                <option value="Vendido">Vendido</option>
                                                <option value="Devuelto">Devuelto</option>
                                                <option value="Votado">Votado</option>
                                             </select>
                                              
                                                </div>
                                         </div>

                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Descripcion<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                            <textarea required="required" id="descripcion" name='descripcion'></textarea>
                                            </div>
                                         </div>

                                        </div>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type="submit" id="modificarActivo" class="btn btn-primary">Guardar</button>
                                                    
                                                </div>
                                            </div>
                                        </div> 
                                     </div>
                               
       </form>


      </div>
    
    </div>
  </div>
</div>


        <!-- /page content -->

      