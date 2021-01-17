<?php  

require_once "../modelo/carritoModelo.php";

class carritoControlador extends carritoModelo{

public function agregar_carritoControlador(){

	    $cantidad=$_POST['cantidad'];
	    $producto=$_POST['idproducto'];
	        
		  $datosProducto=[
		        "producto"=>$producto,
		        "cantidad"=>$cantidad,
		   ];

	  $addCarrito=carritoModelo::agregar_carritoModelo($datosProducto);
             if($addCarrito->rowCount()>=1){
             echo "Añadido";
              
                }else{
               echo "error al añadir";
                  
                }
      


}

public function mostrarProductos(){

  $datos=carritoModelo::mostrar_productoM();
         $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
    $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
    print  $data;

}
public function mostrarCarrito(){

  $datos=carritoModelo::mostrar_carritoModelo();
         $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
    $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
    print  $data;

}

public function eliminar_productoCarrito(){
    $id=$_POST['id'];


        $datos=carritoModelo::eliminar_carritoModelo($id);
           if($datos->rowCount()>=1){
                echo "eliminado";
            
              }else{
                echo "error al eliminar";
              }

  

   }





}

  $insCarrito =new carritoControlador();

  if(isset($_POST['opcion'])){
  	  $opcion =$_POST['opcion'];
  	  if($opcion==1){
  	  	$insCarrito->mostrarProductos();
  	  }else{
  	  	echo "error";
  	  }
  }elseif(isset($_POST['id'])){
     $insCarrito->eliminar_productoCarrito();

  }elseif(isset($_POST['cantidad']) &&  isset($_POST['idproducto'])){
  	$insCarrito->agregar_carritoControlador();

  }else{
     $insCarrito->mostrarCarrito();
  }