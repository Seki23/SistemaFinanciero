

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
                    <h2>Lista de productos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <form action="<?php echo SERVERURL; ?>productos/">             
                     <button type="submit" class="btn btn-info "><span class='fa fa-plus'></span>Nuevo</button>
                     </form>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="tabla-productos" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Producto</th>
                          <th>Categoria</th>
                          <th>Proveedor</th> 
                          <th>Descripcion</th>  
                          <th>Precio compra</th>
                          <th>Precio venta</th>   
                          <th>Stock</th>
                          <th>Codigo</th>
                          <th>Foto</th>  
                          <th>Estado</th>                  
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
<div class="modal fade" id="ModalProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form   id="form-productoM" autocomplete="off">


                     <div class="col-md-6">
                      <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre de producto<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="hidden" id="idProducM"  name="idProducM" />
                                <input class="form-control" id="nombreProdM" name="nombreProdM" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" />
                            </div>
                        </div>
                         
                         <div class="field item form-group">
                           <label class="col-form-label col-md-3 col-sm-3  label-align">Categoria<span class="required">*</span></label>
                           <div class="col-md-6 col-sm-6">
                             <select id="commboCategoriaPro" name="commboCategoriaPro" class="form-control select" disabled="">
 
                            </select>
                           </div>
                           <!--<div class="form-group">
                            <div class="input-group" style="left:-13px; top: -7px; margin-bottom: -33px;">
                              <button id="cambiarCateg" class="btn btn-" type="button">
                                <div class="input-group-prepend">
                                <span class="input-group-text">Cambiar</span>
                                
                                </div>
                              </button>
                            </div>
                          </div>-->
                         </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Codigo<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" id="codigoProM" name="codigoProM"  required='required' disabled="" /></div>
                            </div>

                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Descripcion<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea class='form-control optional' required="required" id="descriProdM" name="descriProdM" name='message'></textarea></div>
                            </div>

                         <div class="field item form-group">
                           <label class="col-form-label col-md-3 col-sm-3  label-align">Proveedor<span class="required">*</span></label>
                           <div class="col-md-6 col-sm-6">
                             <select id="commboProvee" name="commboProvee" class="form-control select">
 
                            </select>
                           </div>
                           <div class="form-group">
                            <div class="input-group" style="left:-13px; top: -7px; margin-bottom: -33px;">
                              <button id="cambiarProve" class="btn btn-" type="button">
                                <div class="input-group-prepend">
                                <span class="input-group-text">Cambiar</span>
                                
                                </div>
                              </button>
                            </div>
                          </div>
                         </div>

                        </div><!--Finaiza division-->  
                            
                           
                      <div class="col-md-6">
                      <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Precio de compra<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="number" id="precioCpM" name="precioCpM" class='sal' required='required' data-validate-length-range="2,10"  /></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Margen de ganancia<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="number" id="margenProdM" name="margenProdM" class='sal' required='required' onclick="calculandoPV()" /></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Precio de venta<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="number" id="precioVpM" name="precioVpM" class='sal' required='required' data-validate-length-range="2,10" disabled="" /></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Stock minimo<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="number" id="stokcMipM" name="stokcMipM" class='sal' required='required' /></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Stock<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="number" id="stokcProdM" name="stokcProdM" class='sal' required='required' /></div>
                            </div>

                            <div class="field item form-group" id="imagenes">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Imagen<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6">
                            <center><img src="" id="imagenP"  width="155" height="155" alt="Sin imagen"/></center>
                              </div>
                            </div>


                          <div class="ln_solid">
                              <div class="form-group">
                                  <div class="col-md-6 offset-md-3">
                                      <button id="modificarProductos" class="btn btn-primary">Modificar</button>
                                    
                                  </div>
                              </div>
                          </div>
                      </div><!--Finaiza division-->  
                                       
                       
       </form>


      </div>
    
    </div>
  </div>
</div>


        <!-- /page content -->

 <script> 
    
    let preciocompra=document.getElementById('precioCpM');
    let comentdos=document.getElementById("margenProdM");
    let margenganancia=document.getElementById('margenProdM');
    let precioventa;
    let calculo;
    let timeout1;

    comentdos.addEventListener("keydown",function(){
        clearTimeout(timeout1);
        console.log("lleva"+preciocompra.value);
        timeout1 = setTimeout(() => {
            if(preciocompra.value=='' && margenganancia.value==''){
            //no hacer nada
            }else{
                let porcentaje=(margenganancia.value/100);
                 calculo=preciocompra.value*porcentaje;
                 precioventa=parseInt(preciocompra.value,10)+parseInt(calculo,10);
                 //console.log("calculo "+calculo);
                 //console.log("el precio venta es "+precioventa);
                 document.getElementById("precioVpM").value=precioventa;
                  
                   document.getElementById("precioVpM").disabled=true;
            }
               clearTimeout(timeout1);
        }, 250);
    });

    function calculandoPV(){
      let preciocompra=document.getElementById('precioCpM');
    let comentdos=document.getElementById("margenProdM");
    let margenganancia=document.getElementById('margenProdM');
    let precioventa;
    let calculo;
    let timeout1;

 
        //clearTimeout(timeout1);
        //console.log("lleva"+preciocompra.value);
        
            if(preciocompra.value=='' && margenganancia.value==''){
            //no hacer nada
            }else{
                let porcentaje=(margenganancia.value/100);
                 calculo=preciocompra.value*porcentaje;
                 precioventa=parseInt(preciocompra.value,10)+parseInt(calculo,10);
                 //console.log("calculo "+calculo);
                 //console.log("el precio venta es "+precioventa);
                 document.getElementById("precioVpM").value=precioventa;
                  
                  // document.getElementById("precioVpM").disabled=true;
            }
      
  
    }
    
</script>
       

      