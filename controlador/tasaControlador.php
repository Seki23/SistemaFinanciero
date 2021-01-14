
<?php  

require_once "../modelo/tasaModelo.php";

class tasaControlador extends tasaModelo{


public function agregar_tasa(){
     
       $Nombre=$_POST['Nombre'];
        $Tasa=$_POST['Tasa'];
  $Cuotas=$_POST['Cuotas'];
  $Cartera=$_POST['Cartera'];

      
      
          
  $datosDep=[
     
          "Nombre"=>$Nombre,
           "Tasa"=>$Tasa,
            "Cuotas"=>$Cuotas,
             "Cartera"=>$Cartera,
        
   ];

   $consulta=ejecutar_consulta_simple("SELECT * FROM tasadeinteres WHERE nombretasa like  '%$Nombre%' ");
   if($consulta->rowCount()>=1){
     $alerta=[
       "Titulo"=>"Error",
       "Texto"=>"No se puede guardar porque ya existe una tasa de interes registrada con este nombre",
       "Tipo"=>"error"
   ];
   }else{
   $guardarTasa=tasaModelo::agregar_tasaModelo($datosDep);
   if($guardarTasa->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Registrado",
            "Texto"=>"Tasa de interes registrada con exito",
            "Tipo"=>"success"
        ];
    
      }else{

       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"La tasa de interes no pudo registrarse",
            "Tipo"=>"error"
        ];
        
      }
   
  }
  $jsonstring=json_encode($alerta);
  echo $jsonstring;
}

public function mostrar_tasa(){
 $datos=tasaModelo::mostrar_TasaModelo();
         $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
    $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
    print  $data;
}

   public function modificar_tasa(){
  $nombre=$_POST['nombre'];
   $tasa=$_POST['tasa'];
       $cuotas=$_POST['cuotas'];
 $cartera=$_POST['cartera'];
      $Id=$_POST['idMod'];
          
  $datosT=[
        "nombre"=>$nombre,
        "tasa"=>$tasa,
        "cuotas"=>$cuotas,
        "cartera"=>$cartera,
         "Id"=>$Id
   ];

  
 $modificarTasa=tasaModelo::modificar_TasaModelo($datosT);
 
   if($modificarTasa->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Modificado",
            "Texto"=>"Tasa de interes modificada con exito",
            "Tipo"=>"success"
        ];
    
      }else{
       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"La tasa de interes no pudo modificarse",
            "Tipo"=>"error"
        ];
        
      }
    $jsonstring=json_encode($alerta);
    echo $jsonstring;

} 

    public function unica_Tasa($id){
     // $id=$_POST['id'];
      $consulta="SELECT c.idtasainteres,c.nombretasa, c.tasa, c.cuotas, cl.idcarteracliente,cl.carteracliente FROM tasadeinteres AS c INNER JOIN carteraclientes AS cl ON c.idcartera = cl.idcarteracliente  WHERE c.idtasainteres=$id";
      $conexion=conectar();
         $datos=$conexion->query($consulta);
         $datos=$datos->fetchAll();
         if($datos>=1){
      foreach($datos as $row){
        $json[]=array(
          'nombre'=>$row['nombretasa'],
           'tasa'=>$row['tasa'],
          'cuotas'=>$row['cuotas'],
         'cartera'=>$row['carteracliente'],
          'idcartera'=>$row['idcarteracliente'],
          'id'=>$row['idtasainteres']
      );
      }
      $jsonstring=json_encode($json[0]);
      echo $jsonstring;
     }
    }


}


$inst=new tasaControlador();
if(isset($_POST['idMod'])){
  $inst->modificar_tasa();
}elseif(isset($_POST['Nombre']) ){
  $inst->agregar_tasa();
}elseif(isset($_POST['idT'])){
   $id=$_POST['idT']; 
   $inst->unica_Tasa($id);
}elseif(isset($_POST['id'] )){
  $inst->eliminar_departamento();
}else{
  $inst->mostrar_tasa();
}
