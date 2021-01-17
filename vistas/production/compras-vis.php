     

        <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Registro Compras</h3>

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">

                              
                                <div class="x_content">
                                    <form  id="form-compras" autocomplete="off">

                                        <span class="section">Informacion Compra</span>

                                       <div class="col-md-6"> 
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" id="fechaComp" name="fechaComp" data-validate-length-range="6" data-validate-words="1" name="name" placeholder="" required="required" value="<?php echo date("Y-m-d");?>"/>
                                                <input  class='form-control optional' type="hidden"  id="idCompU"name="idCompU"  name="name">
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Producto<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                    <input class='form-control optional' id="Produc" name="Produc"  type="text" disabled  placeholder=""/>
                                                    <input  class='form-control optional' type="hidden"  id="idProduc"name="idProduc"  name="name">
                                                    <input  class='form-control optional' type="hidden"  id="nom"name="nom"  name="name">
                                                </div>
                                             <div class="form-group">
                                                <div class="input-group" style="left:-13px; top: -7px; margin-bottom: -33px;">
                                                  <button id="busProdcts" class="btn btn-" type="button"  data-toggle="modal" data-target="#ModalProducts">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"> Añadir</span>
                                                    
                                                    </div>
                                                  </button>
                                                </div>
                                              </div>
                                         </div>

                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Precio unitario<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" id="precioUni" name="precioUni" class='sal' required='' disabled="" data-validate-length-range="2,10"  /></div>
                                        </div>
                                       
                                     </div>
      									 

      							<div class="col-md-6">


                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Cantidad<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" id="cantidad" name="cantidad" class='sal' required='required' placeholder="" onclick="CalculandoPrecio()" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Precio compra<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" id="precioCp" name="precioCp" class='sal' required='required' data-validate-length-range="2,10"  /></div>
                                        </div>

                                       </div>

         <div class="col-md-12">
            <div class="row no-print">
                <div class="col-12">
                 
                  <button id="addProdDet" type="button" class="btn btn-info " style="margin-left: 9em; margin-bottom: -3em;"><span class='fa fa-plus'></span>Agregar</button>
                  <!--onclick="agregarFila()" -->
                </div>

              </div>
            <label>Detalles de la compra</label><hr>
            <table  class="table table-bordered" id="tablaCompraDet">
                <thead class="">
                  <tr>

                    <th style="text-align: center;">Nombre producto</th>
                    <th style="text-align: center;">Cantidad</th>
                    <th style="text-align: center;">Precio $</th>
                    <th style="text-align: center;">Subtotal $</th>
                    <th style="text-align: center;">Opción</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>

                <div class="form-group">
                  <div class="input-group" style="width: 20%">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i>Total
                        </span>
                      </div>
                      <input id="subtotalDet" name="subtotalDet" type="text" class="form-control" placeholder="0.00" disabled="">
                    </div>
                </div>
                <!-- /.form-group -->
      

              </div>
                                       
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
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

<div class="modal fade" id="ModalProducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table  class="table table-bordered" id="tabla-producs" style="width: 100%;">
                <thead class="">
                  <tr>
                  <th style="text-align: center;">ID</th>
                  <th style="text-align: center;">Codigo</th>
                  <th style="text-align: center;">Producto</th>
                  <th style="text-align: center;">Descripcion</th>
                  <th style="text-align: center;">Precio</th>
                  <th style="text-align: center;">Proveedor</th>
                  <th style="text-align: center;">Imagen</th>
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


<script >

	let preciocompra=document.getElementById('precioUni');
    let comentdos=document.getElementById("cantidad");
    let cantidad=document.getElementById('cantidad');
    let preciototalcompra;
    let calculo=0;
    let timeout1;

    comentdos.addEventListener("keydown",function(){
        clearTimeout(timeout1);
        console.log("lleva "+preciocompra.value);
        timeout1 = setTimeout(() => {
            if(preciocompra.value=='' && cantidad.value==''){
            //no hacer nada
            }else{
                 calculo=preciocompra.value*cantidad.value;
                 preciototalcompra=calculo;
                
                 console.log("el precio compra es "+preciototalcompra);
                 document.getElementById("precioCp").value=preciototalcompra;
                  
                   document.getElementById("precioCp").disabled=true;
            }
               clearTimeout(timeout1);
        }, 250);
    });


    function CalculandoPrecio(){
   let preciocompra=document.getElementById('precioUni');

    let cantidad=document.getElementById('cantidad');
    let preciototalcompra;
    let calculo=0;

    	if(preciocompra.value=='' && cantidad.value==''){
            //no hacer nada
            }else{
                 calculo=preciocompra.value*cantidad.value;
                 preciototalcompra=calculo;
                
                 console.log("el precio compra es "+preciototalcompra);
                 document.getElementById("precioCp").value=preciototalcompra;
                  
                   document.getElementById("precioCp").disabled=true;
            }

    }
</script>


