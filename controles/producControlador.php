<?php
 require_once  "../core/conexion.php";

    $opcion=(isset($_POST['opcion'])) ? $_POST['opcion'] : '';
 
if($opcion==1){

 $consulta="SELECT p.idproducto,p.nombreproducto,p.descripcion,p.preciocompra,p.margen,p.stockminimo,p.codigo,p.estado,p.imagen,prov.nombre,cat.categoriaproducto
            FROM producto p
            INNER JOIN proveedor prov ON p.idproveedor = prov.idproveedor
            INNER JOIN categoriaproducto cat ON p.idcategoria = cat.idcategoriaproducto
            WHERE p.estado='Activo'";

    $conexion=conectar();
    $resultado = $conexion->prepare($consulta); 
    $resultado->execute();  

       $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);

    $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
    print $data;
    

   }else{



  /*$consulta="SELECT idproveedor, nombre FROM proveedor";

  $conexion=conectar();
     $datos=$conexion->query($consulta);
     $datos=$datos->fetchAll();
     if($datos>=1){
  foreach($datos as $row){
    $json[]=array(
        'proveedor'=>$row['nombre'],
        'id'=>$row['idproveedor']
    );
  }
  $jsonstring=json_encode($json);
  echo $jsonstring;
  
  }else{
      echo "<h1>ERROR EN CONTROLADRO</h1>";
  }*/


  
}