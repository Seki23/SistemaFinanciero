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
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                              
                                <div class="x_content">
                                    <form  id="form-Activo" autocomplete="off">
                                        <span class="section">Informacion general</span>
                                    <div class="col-md-6 col-sm-12 border">

                                           <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Correlativo<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
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

                                    
                                        <div class="field item form-group" id="duinatural">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Vida Util<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                            <input class="form-control" type="number" id="vida" name="vida"  required='required' /></div>
                                         </div>

                                         <div class="field item form-group" id="duinatural">
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
                                        <div class="field item form-group" id="lugarTrabajo">
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
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Descripcion<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                            <textarea required="required" id="descripcion" name='descripcion'></textarea>
                                            </div>
                                         </div>

                                        </div>
                              <!-- FIN PARTE 1 -->
<div class="col-md-6 col-sm-12 border">
  <!-- bar chart -->
       <div class="field item form-group" id="grafica">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
               
                  <div class="x_content">

                  <div class="field item form-group" >
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Departamento <span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                            <select name="iddepartamento" id="iddepartamento" class="form-control dpto" required="required" >
                                                <option value="" >-- Seleccione --</option>
                                              
                                            </select>      
                                        </div>
                                        </div>


                                      <div class="field item form-group" >
                                             <label class="col-form-label col-md-3 col-sm-3  label-align">
                                            Tipo<span class="required">*</span></label>
                                      
                                       <div class="col-md-9 col-sm-6" >
                                            <select name="idtipo" id="idtipo" class="form-control tipoActivo" required="required" >
                                         
                                            </select>
                                           </div>
                                       </div> 
                                       <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Encargado<span class="required">*</span></label>
                                        <div class="col-md-9 col-sm-6">
                                        <input type="hidden" class="form-control" id="idE" name="idE" placeholder="" disabled="">
                                        <input type="text" class="form-control"   id="nombreE" name="nombreE" placeholder="Encargado" disabled="">
                                        <button id="busEmpleado2" class="btn btn-" type="button" style="margin-left:-13px;" data-toggle="modal" data-target="#ModalEmpleado2">  
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><span class='fa fa-plus'></span>Añadir</i></span>
                                            
                                                </div>
                                            </button>
                                        </div>  
                                        </div>
                                     <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Proveedor<span class="required">*</span></label>
                                        <div class="col-md-9 col-sm-6">
                                        <input type="hidden" class="form-control" id="idP" name="idP"  placeholder="" disabled="">
                                        <input type="text" class="form-control"   id="nombreP" name="nombreP" placeholder="Proveedor" disabled="">
                                        <button id="busproveedor" class="btn btn-" type="button" style="margin-left:-13px;" data-toggle="modal" data-target="#ModalProveedor">  
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><span class='fa fa-plus'></span>Añadir</i></span>
                                            
                                                </div>
                                            </button>
                                        </div>  
                                        </div>
                                     
                                     
                                     
                  </div>
                </div>
              </div>
            </div>
              <!-- /bar charts -->
 




                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                    <button type='reset' class="btn btn-success">Limpiar</button>
                                                </div>
                                            </div>
                                        </div> 
                                     </div>
                                       
                                    </form>

                                </div>
                            </div>
                        </div>

                  </div>
                </div>
            </div>
      
    <!-- /page content -->


         
               <!-- Modal -->
<div class="modal fade" id="ModalEmpleado2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccione Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table  class="table table-bordered" id="Tabempleados2" style="width: 100%;">
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


         
               <!-- Modal2 -->
               <div class="modal fade" id="ModalProveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccione Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table  class="table table-bordered" id="TabProveedor" style="width: 100%;">
                <thead class="">
                  <tr>
                  <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Proveedor</th>
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