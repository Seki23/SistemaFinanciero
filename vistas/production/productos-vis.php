        <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Registro Productos</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                              
                                <div class="x_content">
                                    <form  id="form-producto" autocomplete="off">

                                        <span class="section">Informacion Productos</span>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre de producto<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" id="nombreProd" name="nombreProd" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" />
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Categoria<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                    <input class='form-control optional' id="categoriaPro" name="categoriaPro"  type="text" disabled  placeholder="Agregar"/>
                                                    <input  class='form-control optional' type="hidden"  id="idcategoria"name="idcategoria"  name="name">
                                                </div>
                                             <div class="form-group">
                                                <div class="input-group" style="left:-13px; top: -7px; margin-bottom: -33px;">
                                                  <button id="busCatego" class="btn btn-" type="button"  data-toggle="modal" data-target="#ModalCategorias">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"> Añadir</span>
                                                    
                                                    </div>
                                                  </button>
                                                </div>
                                              </div>
                                         </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Codigo<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" id="codigoPro" name="codigoPro" required='required' placeholder="00000000"  maxlength="12" onclick="generarcod()"/></div>

                                                <!--<div class="form-group">
                                                <div class="input-group" style="left:-13px; top: -7px; margin-bottom: -33px;">
                                                  <button id="gene" class="btn btn-" type="button" onclick="generarcod()">
                                                    <div  class="input-group-prepend">
                                                    <span class="input-group-text">Generar</span>
                                                    
                                                    </div>
                                                  </button>
                                                </div>
                                              </div>-->
                                        </div>

                                          <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Descripcion<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <textarea class='form-control optional' required="required" id="descriProd" name="descriProd" name='message'></textarea></div>
                                        </div>

                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Provedor<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                    <input class='form-control optional' id="nomprovePro" name="nomprovePro"  type="text" disabled  placeholder="Agregar"/>
                                                    <input type="hidden" class='form-control optional' id="idprove"name="idprove" name="name">
                                                </div>
                                             <div class="form-group">
                                                <div class="input-group" style="left:-13px; top: -7px; margin-bottom: -33px;">
                                                  <button id="busProve" class="btn btn-" type="button"  data-toggle="modal" data-target="#ModalProvedor">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"> Añadir</span>
                                                    
                                                    </div>
                                                  </button>
                                                </div>
                                              </div>
                                         </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Precio de compra<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" id="precioCp" name="precioCp" class='sal' required='required' data-validate-length-range="2,10"  /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Margen de ganancia<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class='form-control optional' type="number" id="margenProd" name="margenProd" class='sal' required='required' placeholder="" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Precio de venta<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="text" id="precioVp" name="precioVp"  required='required' type="text"  placeholder=""  /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Stock minimo<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" id="stokcMip" name="stokcMip" class='sal' required='required' placeholder="" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Stock<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" id="stokcProd" name="stokcProd" class='sal' required='required' placeholder="" /></div>
                                        </div>

                                        <div class="field item form-group" id="imagenes">
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Imagen del producto<span class="required">*</span></label>
                                          <div class="col-md-6 col-sm-6">
                                              <input  id="imagen" name="imagen" type="file" class="form-control">
                                            </div>
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                              </div>
                                              <p id="ImageProd" style="color: white;" class=" ml-5">Debe seleccionar una imagen al producto</p>
                                            </div>
                                          </div>
                                        <!-- /.form-group -->


                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                    <button type='reset' class="btn btn-success" onclick="habilitar()" >Limpiar</button>
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

      <!-- Modal categoria-->
        
<div class="modal fade" id="ModalProvedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table  class="table table-bordered" id="tabla-PVE" style="width: 100%;">
                <thead class="">
                  <tr>
                  <th style="text-align: center;">ID</th>
                  <th style="text-align: center;">Proveedor</th>
                  <th style="text-align: center;">Telefono</th>
                  <th style="text-align: center;">Representante</th>
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


<!-- Modal categoria-->
        
<div class="modal fade" id="ModalCategorias" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table  class="table table-bordered" id="tabla-CA" style="width: 100%;">
                <thead class="">
                  <tr>
                  <th style="text-align: center;">ID</th>
                  <th style="text-align: center;">Categoria</th>
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

    function generarcod(){
     let cadena=$('#nombreProd').val()
     let cadenados=$('#categoriaPro').val()
     let codigo=$('#codigoPro').val()
     let desa=document.getElementById('codigoPro');
    //let coddisable=document.getElementById("gene");
     
      if(cadena==''){
        //no hace nada cadena emblanco
         
  }else{
    
    if(codigo!=""){
        //no hace nada
    }else{

      //coddisable.disabled=true;  
      desa.disabled=true; 
      separador = " ", // un espacio en blanco
      arregloDeSubCadenas = cadena.split(separador); // SEPARA EL NOMBRE EN CADENAS INDIVIDUALES
      arregloDeSubCadenasdos=cadenados.split(separador);
   let subCadena = '';  
   let subCadenados = '';  
   for (x=0;x<arregloDeSubCadenas.length;x++){
          subCadena += arregloDeSubCadenas[x].substring(0, 1);
      }

     for (y=0;y<arregloDeSubCadenasdos.length;y++){
          subCadenados+= arregloDeSubCadenasdos[y].substring(0, 3);
      }
      let correlativo=Math.floor((Math.random() * (999 - 0 + 1)) + 0);
      let num=Math.floor((Math.random() * (99 - 0 + 9)) + 0);
    let numRel=correlativo.toString();
    let codigo;
    let cortar;
    if(numRel.length==2){
      codigo=subCadenados+num+subCadena+`-0`+correlativo;
      document.getElementById("codigoPro").value=codigo;
    }else if(numRel.length==1){
       codigo=subCadenados+num+subCadena+`-00`+correlativo;
       document.getElementById("codigoPro").value=codigo;
    }else{
      //cortar=  
      codigo=subCadenados+num+subCadena+``+correlativo;
      document.getElementById("codigoPro").value=codigo.toUpperCase();
    }

    }
      
  }

 }
    

   function habilitar(){
     let coddisable=document.getElementById("codigoPro");
     coddisable.disabled=false; 
     document.getElementById("precioVp").disabled=false;
   } 


 
</script>

<script> 
    
    let preciocompra=document.getElementById('precioCp');
    let comentdos=document.getElementById("margenProd");
    let margenganancia=document.getElementById('margenProd');
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
                 document.getElementById("precioVp").value=precioventa;
                  
                   document.getElementById("precioVp").disabled=true;
            }
               clearTimeout(timeout1);
        }, 250);
    });
    
</script>
