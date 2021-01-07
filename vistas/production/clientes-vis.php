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
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                              
                                <div class="x_content">
                                    <form  id="form-cliente" autocomplete="off">
                                        <span class="section">Informacion Personal</span>
                                    <div class="col-md-6 col-sm-12 border">

                                           <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Código<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                                <input class="form-control" id="codigoClie" name="codigoClie" data-validate-length-range="6" data-validate-words="2" name="name"  required="required" disabled="" />
                                            </div>
                                         </div>

                                       <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">
                                            Tipo de cliente<span class="required">*</span></label>
                                      
                                        <div class="col-md-9 col-sm-6">
                                             <select  id="tipoClie" name="tipoClie" class="form-control tipo" required="required" >
                                                <option value="" >-- Seleccione --</option>
                                                <option value="natural">Persona natural</option>
                                                <option value="juridica">Persona jurídica</option>
                                             </select>
                                              
                                         </div>
     
                                         </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                                <input class="form-control" id="nombreCli" name="nombreCli" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="kevin antonio urquilla gomez" required="required" />
                                            </div>
                                         </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Dirección<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                                <textarea required="required" id="direccionClie" name='direccionClie'></textarea></div>
                                         </div>
                                        <div class="field item form-group" id="duinatural">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">DUI<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                                <input class="form-control" id="duiClie" name="duiClie" data-validate-length-range="10" data-validate-words="1" name="name" placeholder="000000000-0"  data-inputmask="'mask' : '999999999-9'"  /></div>
                                         </div>

                                           <div class="field item form-group">
                                    
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Teléfono<span class="required">*</span></label>
                                          <div class="col-md-9 col-sm-6">
                                           <input class="form-control" id="telefonoClie" name="telefonoClie" type="tel" class='tel' name="phone" required='required' data-validate-length-range="8,20" data-inputmask="'mask' : '9999-9999'" placeholder="0000-0000" /></div>
                                        </div> 
                                        <div class="field item form-group" id="lugarTrabajo">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Lugar de trabajo<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                                    <input class='form-control optional' id="profesionClie" name="profesionClie" data-validate-length-range="5,50" type="text" />
                                                </div>
                                         </div>
                                     
                                         <div class="field item form-group" id="sueldoNat">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Sueldo<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                                <input class="form-control" type="number" id="sueldoClie" name="sueldoClie" class='sal' name="sueldo"  data-validate-length-range="2,10" placeholder="00000000000.00" /></div>
                                        </div>
                                          <div class="field item form-group" id="gastoNat">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Gastos<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6">
                                                <input class="form-control" type="number" id="gastosClie" name="gastosClie" class='sal' name="sueldo" data-validate-length-range="2,10" placeholder="00000000000.00" /></div>
                                        </div>
                                      <div class="field item form-group" id="estadoCivilnat">
                                             <label class="col-form-label col-md-3 col-sm-3  label-align">
                                            Estado civil<span class="required">*</span></label>
                                      
                                       <div class="col-md-9 col-sm-6" >
                                            <select name="estadoCivilCli" id="estadoCivilCli" class="form-control"  >
                                                <option value="" >-- Seleccione --</option>
                                                <option value="soltero">Soltero</option>
                                                <option value="casado">Casado</option>
                                                <option value="viudo">Viudo</option>
                                            </select>
                                           </div>
                                       </div> 
                                     
                                     
                                        
                                     
                                     <!-- estado-->
              <div class="col-md-12 col-sm-12 " id="estadoResultado">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Estado de resultados</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  

                                      <div class="field item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Ventas <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="ventas" name="ventas" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Costo de venta<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="costoventa" name="costoventa"  class="form-control">
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Otros ingresos</label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="otrosingresos" name="otrosingresos" class="form-control" type="text" name="middle-name">
                                            </div>
                                        </div>
                                          <div class="field item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Gastos de operacion<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="gastodeoperacion" name="gastodeoperacion"  class="form-control ">
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Otros gastos</label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="otrosgastos" name="otrosgastos"  class="form-control">
                                            </div>
                                        </div>
                                             <div class="field item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Reserva legal <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="reserva" name="reserva"  class="form-control ">
                                            </div>
                                        </div>
                                          <div class="field item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Renta<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="renta" name="renta"  class="form-control ">
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Utilidad<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="utilidad" name="utilidad" class="form-control">
                                            </div>
                                        </div>
                                        
                                      

                  </div>
                </div>
              </div>
              <!-- /estados -->


                                    </div>
                              <!-- FIN PARTE 1 -->

                               <div class="col-md-6 col-sm-12 border">


 

                                

    <!-- bar chart -->
       <div class="field item form-group" id="grafica">
              <div class="col-md-12 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabla comparativa <small>Ingresos y Egresos</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="graph" style="width:100%; height:280px;"></div>
                  </div>
                </div>
              </div>
            </div>
              <!-- /bar charts -->
 

<!-- balance-->
       <div class="col-md-12 col-sm-12 "  id="balanceGeneral">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Balance general</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  

                                <div class="field item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Efectivo  <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="efectivo" name="efectivo"  class="form-control ">
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Cuentas por cobrar<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="cxc" name="cxc"  class="form-control">
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Inventarios</label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="inventario" name="inventario" class="form-control" type="text" name="middle-name">
                                            </div>
                                        </div>
                                          <div class="field item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Prop. planta y equipo<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="ppye" name="ppye"  class="form-control ">
                                            </div>
                                        </div>
                                            <div class="field item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Cuentas por pagar<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="cxp" name="cxp"  class="form-control ">
                                            </div>
                                        </div>
                                       <div class="field item form-group">
                                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Prestamos</label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="prestamos"  name="prestamos" class="form-control" type="text" >
                                            </div>
                                        </div>
                                             <div class="field item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Deuda a largo plazo <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="dlp" name="dlp" class="form-control ">
                                            </div>
                                        </div>
                                          <div class="field item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Capital<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="capital" name="capital"  class="form-control ">
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Reserva legal<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="rl" name="rl" class="form-control">
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Utilidades<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="utilidades" name="utilidades"  class="form-control ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
        </div>
                              <!-- /balance -->


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