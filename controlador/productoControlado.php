<?php  

require_once "../modelo/productoModelo.php";

class productoControlador extends productoModelo{

	public function agregar_productoControlador(){
	    $nomproducto=$_POST['nombreProd'];
	    $codiproducto=$_POST['codigoPro'];
	    $descriproducto=$_POST['descriProd'];
	    $preciocomp=$_POST['precioCp'];
	    $magengana=$_POST['margenProd'];
	    $preciovent=$_POST['precioVp'];
	    $stockmini=$_POST['stokcMip'];
	    $stockprod=$_POST['stokcProd'];
	    $estadoproducto='Activo';//
	    $idprovedor=$_POST['idprove'];
	    $idcategoria=$_POST['idcategoria'];

	    $imagenprod=uniqid()."-".$_FILES["imagen"]["name"];

	     $datosProductos=[
        "nombreprod"=>$nomproducto,
        "descripprod"=>$descriproducto,
        "preciocom"=>$preciocomp,
        "preciovent"=>$preciovent,
        "margen"=>$magengana,
        "stockmini"=>$stockmini,
        "stockprod"=>$stockprod,
        "coigoprod"=>$codiproducto,
        "estadoprod"=>$estadoproducto,
        "imagenprod"=>$imagenprod,
        "idprovedor"=>$idprovedor,
        "idcategoria"=>$idcategoria,
   			];

	    $ruta = "../vistas/imagenesprod/".$imagenprod;
	     if ($_FILES['imagen']['type'] ==="image/jpg" || $_FILES['imagen']['type']==="image/jpeg" || $_FILES['imagen']['type']==="image/png") {
	     	if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta)){

	         $guardarProducto=productoModelo::agregar_productoModelo($datosProductos);
             if($guardarProducto->rowCount()>=1){
              $alerta=[
                      "Titulo"=>"Registrado",
                      "Texto"=>"Producto registrado con exito",
                      "Tipo"=>"success"
                  ];
              
                }else{
                 $alerta=[
                      "Titulo"=>"Error",
                      "Texto"=>"El producto no pudo registrarse",
                      "Tipo"=>"error"
                  ];
                  //echo "$idprovedor el otro es "." $idcategoria";
                }
	     	}
	     }
	        
    
	     $jsonstring=json_encode($alerta);
	     echo $jsonstring;
  }

   public function mostrar_productoControlador(){
    $datos=productoModelo::mostrar_productoModelo();
    $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
 
   $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
    print  $data;
 }

 
public function estado_productoControlador(){
        $ide=$_POST['idesta'];
        $estadoe=$_POST['estadopro'];

        $dataEst=[
            "EstadoProdMo"=>$estadoe,
            "Id"=>$ide
        ];


        $datos=productoModelo::estado_productoModelo($dataEst);
        $alerta=[
          "Titulo"=>"Exito",
          "Texto"=>"Se a cambiado el estado del producto con exito",
          "Tipo"=>"success"
      ];
      $jsonstring=json_encode($alerta);
      echo $jsonstring;
  }




 public function setproductoControlador($id){
     
      $consulta = "SELECT p.idproducto,p.nombreproducto,p.descripcion,p.preciocompra,p.precioventa,p.margen,p.stockminimo,p.stock,p.codigo,p.imagen,prov.idproveedor,prov.nombre,cat.idcategoriaproducto,cat.categoriaproducto
		  FROM producto p
			INNER JOIN proveedor prov ON p.idproveedor = prov.idproveedor
			INNER JOIN categoriaproducto cat ON p.idcategoria = cat.idcategoriaproducto
			 WHERE idproducto='$id'";
      $conexion=conectar();
         $datos=$conexion->query($consulta);
         $datos=$datos->fetchAll();
         if($datos>=1){
      foreach($datos as $row){
        $json[]=array(
        "nomproducm"=>$row['nombreproducto'],
        "descrim"=>$row['descripcion'],
        "preciprom"=>$row['preciocompra'],
        "precionprom"=>$row['precioventa'],
        "magenm"=>$row['margen'],
        "stockminim"=>$row['stockminimo'],
        "stockm"=>$row['stock'],
        "codprodm"=>$row['codigo'],
        "imagenm"=>$row['imagen'],
        "idprove"=>$row['idproveedor'],
        "nombreprovem"=>$row['nombre'],
        "idcatego"=>$row['idcategoriaproducto'],
        "nombrecategoriam"=>$row['categoriaproducto'],
        "id"=>$row['idproducto']
        );
      }
      $jsonstring=json_encode($json[0]);
      echo $jsonstring;
     }
  }

  public function modificar_productoControlador(){
  
      $Nomprodm=$_POST['nombreProdM'];
      $Descriprodm=$_POST['descriProdM'];
      $Preciocompm=$_POST['precioCpM'];
      $Precioventm=$_POST['precioVpM'];
      $Margenganam=$_POST['margenProdM'];
      $Stockminm=$_POST['stokcMipM'];
      $Stockprodm=$_POST['stokcProdM'];
      $Idprovem=$_POST['commboProvee'];
      $Idcatem=$_POST['commboCategoriaPro'];
      $Id=$_POST['idProducM'];
          
      $datosProductom=[
            "NomProd"=>$Nomprodm,
            "DescripProd"=>$Descriprodm,
            "PrecioComp"=>$Preciocompm,
            "PrecioVent"=>$Precioventm,
            "MargenGana"=>$Margenganam,
            "StockMin"=>$Stockminm,
            "StockProd"=>$Stockprodm,
            "Idprove"=>$Idprovem,
            "Idcatego"=>$Idcatem,
            "Id"=>$Id
       ];


 if($Id==0){
     $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"Hay un problema al modificar, el cargo no se encuentra",
            "Tipo"=>"error"
            ];
 }else{

        $modifProdm=productoModelo::modificar_productoModelo($datosProductom);
         if($modifProdm->rowCount()>=1){
          $alerta=[
                  "Titulo"=>"Modificado",
                  "Texto"=>"Cargo modificado con exito",
                  "Tipo"=>"success"
              ];
          
            }else{
             $alerta=[
                  "Titulo"=>"Error",
                  "Texto"=>"El cargo no pudo modifarse",
                  "Tipo"=>"error"
              ];
              
            }

      
 }
  
 
    $jsonstring=json_encode($alerta);
    echo $jsonstring;   

}
  

}

$insProducto= new productoControlador();
if(isset($_POST['nombreProd'])){
  $insProducto->agregar_productoControlador();// guardando
}else if(isset($_POST['idesta'])){
	$insProducto->estado_productoControlador();
}else if(isset($_POST['idPro'])){
	$id=$_POST['idPro'];
	$insProducto->setproductoControlador($id);
}else if(isset($_POST['idProducM'])){
	$insProducto->modificar_productoControlador();
}else{
	$insProducto->mostrar_productoControlador();
}