<?php  

require_once "../modelo/comprasModelo.php";

class compraControlador extends comprasModelo{

 public function agregar_compraControlador(){
 
	$fecha=$_POST['fechaComp'];
	//$idprodu=$_POST['idProduc'];
	//$preciouni=$_POST['precioUni'];
	//$preciouni=$_POST['precioCp'];
	//$canti=$_POST['cantidad'];
	//$subt=$_POST['subtotalDet'];
	        
  $datosCompras=[
        "fecha"=>$fecha,
   ];

 

        $guardarCompra=comprasModelo::agregar_comprasModelo($datosCompras);
             if($guardarCompra->rowCount()>=1){
              $alerta=[
                      "Titulo"=>"Registrado",
                      "Texto"=>"Compra registrado con exito",
                      "Tipo"=>"success"
                  ];
              
                }else{
                 $alerta=[
                      "Titulo"=>"Error",
                      "Texto"=>"La compra no pudo registrarse",
                      "Tipo"=>"error"
                  ];
                  
                }
      

 
	     $jsonstring=json_encode($alerta);
	     echo $jsonstring;
	 }

  public function agregar_detallecompraControlador(){

	$UltimoID=ejecutar_consulta_simple("SELECT idcompra FROM compra ORDER BY idcompra DESC LIMIT 1
		");
		 $UltimoID=$UltimoID->fetch(PDO::FETCH_ASSOC);
     	 $Ultimo=$UltimoID['idcompra'];
     	 echo gettype($Ultimo);
     	
   		//echo $Ultimo;

   		     $data = json_decode($_POST['data'],true);
			    foreach ($data as $v) {
			        $datosdetalleComp=[
			        	"preciocomp"=> $v['total'],//precio compra
			            "cantidad"=> $v['cantidad'],
			            "idproducto"=>$v['nomprodu'],
			            "idcompra"=>$Ultimo
			          ];

			           //obteniendo los valores que viene por el meotodo post
			           $idproducto= $datosdetalleComp['idproducto'];
     	 			   $cantidad=$datosdetalleComp['cantidad'];
     	 			  

     	 			   //obtener el stokc de productos que se selecciona al guardar
			     	$UltimoStock=ejecutar_consulta_simple("SELECT stock FROM producto WHERE idproducto='$idproducto'");
					 $UltimoStock=$UltimoStock->fetch(PDO::FETCH_ASSOC);
			     	 $Ultimos=$UltimoStock['stock'];
			     	 echo gettype($Ultimos);
			     	 //hacer el calculo para el nuevo stock
			     	  $NuevoStock=($cantidad+$Ultimos);

			          $guardardetalleComp=comprasModelo::agregar_detallecomprasModelo($datosdetalleComp);

			          // echo "<h1>Suma del estock</h1>". $NuevoStock."<br>";
			          if($guardardetalleComp->rowCount()>=1){
			          	 echo $Ultimo;
			             echo "registrado detallecompra";

			             $actualizar=ejecutar_consulta_simple("UPDATE producto SET stock='$NuevoStock' WHERE idproducto='$idproducto'");
			             if($actualizar->rowCount()>=1){
			             	echo "se actulizo el stock";
			             }else{
			             	echo "no se puro actulizar el stock";
			             }

			          }else{
			            echo "detallecompra no registrado";
	
			          }
			    }
	}

	public function mostrar_compraControlador(){
	 $datos=comprasModelo::mostrar_comprasModelo();
	         $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
	    $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
	    print  $data;
}





}

$insCompras= new compraControlador();
if(isset($_POST['fechaComp'])){
	$insCompras->agregar_compraControlador();
}else if(isset($_POST['data'])){
	$insCompras->agregar_detallecompraControlador();
}else{
	$insCompras->mostrar_compraControlador();
}
