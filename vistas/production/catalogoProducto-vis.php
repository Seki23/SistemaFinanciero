

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
          

              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de productos</h2>
                  
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <p>Debe seleccionar los productos que desea comprar y agregarlos al carrito para luego realizar la venta</p>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" id="tabla-productosV">
                        <thead>
                          <tr class="headings">
                          
                            <th class="column-title">ID </th>
                            <th class="column-title text-center">Código</th>
                            <th class="column-title text-center">Imagen </th>
                            <th class="column-title text-center">Producto</th>
                            <th class="column-title text-center">Stock </th>
                             <th class="column-title text-center">Precio</th>
                            <th class="column-title no-link last"><span class="nobr">Seleccionar</span>
                            </th>
                           
                          </tr>
                        </thead>

                        <tbody class="text-center">
                          
                       
                        </tbody>
                      </table>
                     </div>
					        </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


<div class="modal fade" id="ModalCantidad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Fiador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form   id="form-ProdcutoCa" autocomplete="off">


                             
                       
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Cantidad<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="hidden" name="idproducto" id="idproducto">
                                    <input class="form-control" type="number" id="cantidad" min="0"  name="cantidad" required='required'  /></div>
                            </div>

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button id="addCarrito" class="btn btn-primary">Añadir</button>
                                      
                                    </div>
                                </div>
                            </div>
       </form>


      </div>
    
    </div>
  </div>
</div>