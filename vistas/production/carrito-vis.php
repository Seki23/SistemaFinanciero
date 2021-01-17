<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Carrito</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Listado de productos en carrito</h2>

                    <ul class="nav navbar-right panel_toolbox">
                     <form id="selecTipoVenta" class="form-inline">
                      <div class="form-group mb-2">
                        <label for="staticEmail2" class="sr-only">Email</label>
                        <input type="text" readonly class="form-control-plaintext"  value="Seleccione el tipo de venta">
                      </div>
                      <div class="form-group mx-sm-3 mb-2">
                       <select class="form-control" name="tipoVentaSE" id="tipoVentaSE">
                       <option value="">Seleccione</option>
                         <option value="Contado">Contado</option>
                         <option value="Crédito">Crédito</option>
                       </select>
                      </div>
                      <button type="submit"  class="btn btn-success mb-2">Realizar Venta</button>
                    </form>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Imagen</th>
                          <th>Codigo</th>
                           <th>Producto</th>
                          <th>Precio</th>
                           <th>Cantidad</th>
                          <th>sub Total</th>
                          <th>Eliminar</th>
                        </tr>
                      </thead>
                      <tbody id="listaCarrito">
                        
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
