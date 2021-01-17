<?php
require_once  "../core/conexion.php";


 if(isset($_POST['id'])){

	    $id=$_POST['id'];
       $consulta="SELECT k.fecha, k.descripcion, k.movimiento, k.cantidad, k.vunitario,(k.cantidad * k.vunitario)	AS totalt,k.cantidades, k.vtotales FROM kardex AS k WHERE k.idproductos=$id";
            $conexion=conectar();
               $datos=$conexion->query($consulta);
               $datos=$datos->fetchAll();
             
            foreach($datos as $row){
            $json[]=array(
			        'fecha'=>$row['fecha'],
			        'descripcion'=>$row['descripcion'],
			        'movimiento'=>$row['movimiento'],
			        'cantidad'=>$row['cantidad'],
			        'vunitario'=>$row['vunitario'],
			        'totalt'=>$row['totalt'],
			        'cantidades'=>$row['cantidades'],
			        'vtotales'=>$row['vtotales']
            );
             }
			  $jsonstring=json_encode($json);
			  echo $jsonstring;
 }
