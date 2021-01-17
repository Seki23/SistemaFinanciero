 <?php $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
                          $id=explode("?",$url)  ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
          

              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kardex</h2>
                  
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <p>Lista de transacciónes realizadas</p>
                   
                    <input type="hidden" id="verKardex" value="<?php echo $id[1];  ?>">

                    <div class="table-responsive">
                    <table class="table table-hover table-striped table-condensed">
                                <thead>
                                    <tr>
                                    
                                    <th class="active">Fecha</th>
                                    <th class="active">Descripción</th>
                                    <th colspan="3" class="warning">Entradas</th>
                                    <th colspan="3" class="danger">Salidas</th>
                                    <th colspan="3" class="info">Saldo</th>
                                    
                                    </tr>
                                </thead>
                                <tbody id="tabla-kardex">
                                  

                                    
                                   
                            
                                </tbody>
                            </table>
                     </div>
					        </div>
                </div>
              </div>
            </div>
          </div>
        </div>