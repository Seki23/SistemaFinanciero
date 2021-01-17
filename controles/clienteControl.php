<?php
 require_once  "../core/conexion.php";

 $opcion=(isset($_POST['opcion'])) ? $_POST['opcion'] : '';
 
 if($opcion==1){
 
  $consulta="SELECT c.idcliente,c.nombrecliente FROM clientes as c";
 
     $conexion=conectar();
     $resultado = $conexion->prepare($consulta); 
     $resultado->execute();  
       $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
     
     $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
     print $data;
     
    }else{
        $id=$_POST['id'];
        $consulta="SELECT c.idcliente,c.nombrecliente FROM clientes as c WHERE c.idcliente=$id";
        $conexion=conectar();
           $datos=$conexion->query($consulta);
           $datos=$datos->fetchAll();
           if($datos>=1){
        foreach($datos as $row){
          $json[]=array(
            'cliente'=>$row['nombrecliente'],
            'id'=>$row['idcliente']
          );
        }
        $jsonstring=json_encode($json[0]);
        echo $jsonstring;
    }
  }
