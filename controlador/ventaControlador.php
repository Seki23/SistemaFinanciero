<?php  

require_once "../modelo/ventaModelo.php";

class ventaControlador extends ventaModelo{

	public function numFactura(){


       $buscarUltimo=ejecutar_consulta_simple("SELECT v.codigo FROM venta AS v ORDER BY v.idventa DESC LIMIT 1");
   
       if($buscarUltimo->rowCount()>=1){
        $buscarUltimo=$buscarUltimo->fetch(PDO::FETCH_ASSOC);
        $Ultima= $buscarUltimo['codigo'];
      

        $suma=$Ultima + 1;  //realiza la suma 
        $numZeros= strlen ($suma);//cuenta el numero de caracteres
        $resultado;            //lleva el valor del correlativo

        if($numZeros==1){   //condiciones segun el numero de zero
          $resultado ="000".$suma;
        }elseif($numZeros==2){
            $resultado="00".$suma;
        }elseif($numZeros==3){
            $resultado="0".$suma;
        }else{
           $resultado=$suma;
        }
       echo $resultado;

       }else{//en caso que no haya ningun activo registrado

        $resultado="0001";
      
       echo $resultado;
       }
    }

   public function guardarVenta(){

        $codigo=$_POST['codigo'];
	    $fecha=$_POST['fecha'];
	    $cliente=$_POST['cliente'];
	    $empleado=$_POST['empleado'];


	        
		  $datosVenta=[
		        "codigo"=>$codigo,
		        "fecha"=>$fecha,
		        "cliente"=>$cliente,
		        "empleado"=>$empleado,
		   ];


	  $addVenta=ventaModelo::agregar_ventaContadoModelo($datosVenta);
             if($addVenta->rowCount()>=1){
             echo "exito";
              
                }else{
               echo "error al registrar venta";
                  
                }

   }

   public function guardarDetalleVenta(){
 
        $buscarUltimo=ejecutar_consulta_simple("SELECT v.idventa FROM venta AS v ORDER BY v.idventa DESC LIMIT 1");
   
       if($buscarUltimo->rowCount()>=1){
        $buscarUltimo=$buscarUltimo->fetch(PDO::FETCH_ASSOC);
        $Ultima= $buscarUltimo['idventa'];

        $carrito=ejecutar_consulta_simple("SELECT c.idproducto,c.cantidad,p.precioventa FROM carrito AS c INNER JOIN producto AS p ON c.idproducto = p.idproducto");

			 if($carrito->rowCount()>=1){ 
               
                    $carrito=$carrito->fetchAll();
   
			 foreach($carrito as $row){
				    $datosDetalleVenta=[
				        'producto'=>$row['idproducto'],
				        'cantidad'=>$row['cantidad'],
                        'precio'=>$row['precioventa'],
				         'venta'=>$Ultima
                          ];

         $addDetalleVenta=ventaModelo::agregar_DetalleventaModelo($datosDetalleVenta);
             if($addDetalleVenta->rowCount()>=1){
               $idPro=$row['idproducto'];
               $cantidad=$row['cantidad'];
              
             $stockExistente=ejecutar_consulta_simple("SELECT stock FROM producto WHERE idproducto=$idPro");
             $stockExistente=$stockExistente->fetch(PDO::FETCH_ASSOC);
             $stockActual= $stockExistente['stock'];

             $nuevoStock=$stockActual- $cantidad;

             $StockNuevo = ejecutar_consulta_simple("UPDATE producto SET stock=$nuevoStock WHERE idproducto =$idPro ");

            $limpiarCarrito=ejecutar_consulta_simple("DELETE FROM carrito");        

//AGREGAR KARDEX
            $fecha= date('Y-n-j');
             $movimiento=2;
             $descripcion="Venta de producto";
            
$registroKardex=ejecutar_consulta_simple("SELECT k.fecha,k.vunitario, k.cantidades , k.vtotales FROM kardex AS k WHERE k.idproductos=$idPro AND k.movimiento=1 ORDER BY k.fecha ASC LIMIT 1 ");
     $registroKardex=$registroKardex->fetch(PDO::FETCH_ASSOC);
        $CantidadesKardex= $registroKardex['cantidades'];
        $totalesKardex= $registroKardex['vtotales'];

        $totalV= $registroKardex['vunitario'] * $row['cantidad'];

         $cantidadesN=$CantidadesKardex  - $row['cantidad'];
         $totalesN=$totalesKardex - $totalV ;

               
              $kardex=[
                  'fecha'=>$fecha,
                  'producto'=>$row['idproducto'],
                  'descripcion'=>$descripcion,
                  'movimiento'=>$movimiento,
                  'cantidad'=>$row['cantidad'],
                  'precio'=>$registroKardex['vunitario'],
                  'cantidades'=>$cantidadesN,
                  'total'=>$totalesN,
              ];

                $addKardex=ventaModelo::agregar_KardexVentaModelo($kardex);

                  if($addKardex->rowCount()>=1){
                    echo "kardex agregada";
                  }else{
                    echo "falla al agregar kardex";
                  }

 
                }else{
             //  echo "error al registrar detalle venta";
                  
                }

			}

		 


			 }else{

               echo "No hay productos para realizar la venta";
			 }
			         

  
        }else{
        	echo "NO HAY VENTA REGISTRADA";
        }
   }

   public function mostrarVenta(){

    $datos=ventaModelo::mostrar_ventaModelo();
            $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
       $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
       print  $data;
   
   }

}
  $insVenta = new ventaControlador();

  if(isset($_POST['factura'])){
  	 $insVenta->numFactura();
  }elseif(isset($_POST['codigo']) && isset($_POST['fecha'])){
      $insVenta->guardarVenta();
  }elseif(isset($_POST['producto'])){
     $insVenta->guardarDetalleVenta();
  }else{
      $insVenta->mostrarVenta();
  }