<?php
 require_once  "../core/conexion.php";

 $opcion=(isset($_POST['opcion'])) ? $_POST['opcion'] : '';
 
 if($opcion==1){
 
  $consulta="SELECT e.idempleado,e.nombre FROM empleado AS e WHERE NOT EXISTS (SELECT NULL FROM usuarios AS u WHERE u.idempleado = e.idempleado ) ";
 
     $conexion=conectar();
     $resultado = $conexion->prepare($consulta); 
     $resultado->execute();  
       $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
     
     $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
     print $data;
     
    }else{
        $id=$_POST['id'];
        $consulta="SELECT e.idempleado,e.nombre FROM empleado e  WHERE e.idempleado=$id";
        $conexion=conectar();
           $datos=$conexion->query($consulta);
           $datos=$datos->fetchAll();
           if($datos>=1){
        foreach($datos as $row){
          $json[]=array(
            'empleado'=>$row['nombre'],
            'id'=>$row['idempleado']
          );
        }
        $jsonstring=json_encode($json[0]);
        echo $jsonstring;
    }
  }

