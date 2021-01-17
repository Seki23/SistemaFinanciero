<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Venta</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel" >
                  <div class="x_title">
                    <h2>Realizar venta al contado</h2>
                   </div>
                  <div class="x_content">


              <div class="row"  >
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                   
                  <form  id="form-ventaContado" autocomplete="off" style="overflow:hidden; "


                  >
                                    <div class="col-md-12 col-sm-12 ">

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Código <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" id="numFactuc" name="numFactuc" data-validate-length-range="6" data-validate-words="2" name="name"  required="required" disabled="" />
                                            </div>
                                         </div>

                    
                                       <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">
                                            Fecha de venta<span class="required">*</span></label>
                                      
                                        <div class="col-md-6 col-sm-6">
                                        <input class='form-control date' type="text" name="fechaVenta" id="fechaVenta" required='required' disabled="" value="<?php echo date('Y-n-j'); ?>">
                                              
                                         </div>
                                       </div>
     
                                   <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Cliente<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                        <input type="hidden" class="form-control" id="idCl" name="idCl"  placeholder="" disabled="">
                                        <input type="text" class="form-control"   id="nombreCli" name="nombreCli" placeholder="Cliente" disabled="">
                                        <button id="busproveedor" class="btn btn-" type="button" style="margin-left:-13px;" data-toggle="modal" data-target="#ModalClienteV">  
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><span class='fa fa-plus'></span>Añadir</i></span>
                                            
                                                </div>
                                            </button>
                                       </div>  
                                    </div>
                                   
                       <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Empleado <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                              
                                      
                                         <?php 
                                        $empleadoLogueado=$_SESSION['nombre'];
                                         $idLogueado=$_SESSION['id'];
                                         ?>
                                             <input type="hidden" class="form-control" id="idEmple" name="idEmple"  placeholder="" disabled="" value="<?php echo $idLogueado; ?>">
                                             <input class="form-control" id="empleado" name="empleado" data-validate-length-range="6" data-validate-words="2" name="name"  required="required" disabled="" value="<?php echo $empleadoLogueado;  ?> " />
                                            </div>
                                         </div>
                                      

                                    
                                     
                                    
                                      

                                        </div>
                              <!-- FIN PARTE 1 -->
     

                                    <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                          <thead>
                                            <tr>
                                              <th>Imagen</th>
                                              <th>Codigo</th>
                                               <th>Producto</th>
                                              <th>Precio</th>
                                               <th>Cantidad</th>
                                              <th>sub Total</th>
                                            
                                            </tr>
                                          </thead>
                                          <tbody id="listaCarrito2">
                                            
                                          </tbody>
                                        </table>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                    <button type='reset' class="btn btn-success">Limpiar</button>
                                                </div>
                                            </div>
                                       
                                    </form>
 

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
<div class="modal fade" id="ModalClienteV" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccione Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table  class="table table-bordered" id="clienteMostrar" style="width: 100%;">
                <thead class="">
                  <tr>
                  <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Empleado</th>
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
