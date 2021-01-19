<?php
  if($_SESSION['cargo']!="Administrador"){
   echo	$lc->cierre_sesion();
  }
 
?>



 <!-- page content -->
 <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Usuarios</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                              
                                <div class="x_content">
                                    <form  id="registrar-Usuario" autocomplete="off">
                                        <span class="section">Informacion </span>
                                        

                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Empleado<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                        <input type="hidden" class="form-control" id="idE"  placeholder="" disabled="">
                                        <input type="text" class="form-control"   id="nombreE" placeholder="Agregar Empleado" disabled="">
                                        <button id="busEmpleado" class="btn btn-" type="button" style="margin-left:-13px;" data-toggle="modal" data-target="#ModalEmpleado">  
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><span class='fa fa-plus'></span>Añadir</i></span>
                                            
                                                </div>
                                            </button>
                                        </div>  
                                        </div>
                                        
                                      
                                      
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Usuario<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" id="usuarioE" data-validate-length-range="6"  name="name" required="required" />
                                            </div>
                                        </div>
                                         <div class="field item form-group">
					                      	<label class="col-form-label col-md-3 col-sm-3  label-align">Contraseña<span class="required">*</span></label>
                                         <div class="col-md-6 col-sm-6">
                                         <input class="form-control" type="password" name="password" id="password" data-validate-length-range="8" required='required'>
                                            </div>
                                        </div>
                                            
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">
                                                Repite contraseña <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="password" name="password2" id="password2" data-validate-linked='password' required='required'>
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
                </div>
            </div>
      
    <!-- /page content -->

      
               <!-- Modal -->
<div class="modal fade" id="ModalEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccione Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table  class="table table-bordered" id="Tabempleados" style="width: 100%;">
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