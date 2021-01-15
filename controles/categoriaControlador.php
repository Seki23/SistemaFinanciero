<?php
 require_once  "../core/conexion.php";

    $opcion=(isset($_POST['opcion'])) ? $_POST['opcion'] : '';
 
if($opcion==1){

 $consulta="SELECT idcategoriaproducto, categoriaproducto FROM categoriaproducto";

    $conexion=conectar();
    $resultado = $conexion->prepare($consulta); 
    $resultado->execute();  

       $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);

    $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
    print $data;
    

   }else{



  $consulta="SELECT idcategoriaproducto, categoriaproducto FROM categoriaproducto";

  $conexion=conectar();
     $datos=$conexion->query($consulta);
     $datos=$datos->fetchAll();
     if($datos>=1){
  foreach($datos as $row){
    $json[]=array(
        'categoria'=>$row['categoriaproducto'],
        'id'=>$row['idcategoriaproducto']
    );
  }
  $jsonstring=json_encode($json);
  echo $jsonstring;
  
  }else{
      echo "<h1>ERROR EN CONTROLADRO</h1>";
  }


  
}