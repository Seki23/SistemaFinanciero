
<?php  

require_once "../modelo/empleadoModelo.php";

class empleadoControlador extends empleadoModelo{

  public function agregar_empleadoControlador(){


      $nombre=$_POST['nombre'];
      $zona=$_POST['zona'];
      $dui=$_POST['dui'];
      $telefono=$_POST['telefono'];
      $nit=$_POST['nit'];
      $estado='Activo';
      $cargo=$_POST['cargo'];
      
    


            $datosEmp=[
                
                "nombre"=>$nombre,
                "zona"=>$zona,
                "dui"=>$dui,
                "telefono"=>$telefono,
                "nit"=>$nit,
                 "estado"=>$estado,
                "cargo"=>$cargo,
              ];
   $guardar_empleado= EmpleadoModelo::agregar_empleadosModelo($datosEmp);
   if($guardar_empleado->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Registrado",
            "Texto"=>"Empleado registrado con exito",
            "Tipo"=>"success"
        ];
    
      }else{
       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El empleado no pudo registrarse",
            "Tipo"=>"error"
        ];
        
      }
   
  
  $jsonstring=json_encode($alerta);
  echo $jsonstring;
}


          
   
    public function mostrar_empleadoControlador(){
 
       $datos=EmpleadoModelo::mostrar_empleadoModelo();
       $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
        $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
        print  $data;
        
      
      }


  public function cambiarEstado(){

    $Id=$_POST['es'];
    
  $obtenerEstado=ejecutar_consulta_simple("SELECT estado FROM empleado WHERE idempleado ='$Id'");
  $obtenerEstado=$obtenerEstado->fetch(PDO::FETCH_ASSOC);
   $estadoActual= $obtenerEstado['estado'];
 $nuevoEstado='Inactivo';

   if($estadoActual=='Inactivo'){
    $nuevoEstado='Activo';
   }else{
    $nuevoEstado='Inactivo';
    }



    $estado=ejecutar_consulta_simple("UPDATE empleado SET estado='$nuevoEstado' WHERE idempleado ='$Id'");
 if($estado->rowCount()>=1){
    $alerta=[
        "Titulo"=>"Exito",
        "Texto"=>"El estado del empleado se ha modificado",
        "Tipo"=>"success"
    ];
  
 }else{
    $alerta=[
        "Titulo"=>"Error",
        "Texto"=>"No se puede modificar el estado a este empleado",
        "Tipo"=>"error"
    ];
 }
 
    $jsonstring=json_encode($alerta);
        echo $jsonstring;
 }


       public function unicoEmpleado($idb){
          $consulta="SELECT e.idempleado,e.nombre,e.zona,e.dui,e.telefonoempleado,e.nit,e.idcargos,c.cargo FROM empleado e
         INNER JOIN cargo c ON e.idcargos = c.idcargo
          WHERE e.idempleado=$idb";
          $conexion=conectar();
             $datos=$conexion->query($consulta);
             $datos=$datos->fetchAll();
             if($datos>=1){
          foreach($datos as $row){
            $json[]=array(
              'nombre'=>$row['nombre'],
              'zona'=>$row['zona'],
               'dui'=>$row['dui'],
              'telefono'=>$row['telefonoempleado'],
              'nit'=>$row['nit'],
              'idcargo'=>$row['idcargos'],
              'cargo'=>$row['cargo'],
              //'estadoem'=>$row['estado'],
              'id'=>$row['idempleado']
          );
          }
          $jsonstring=json_encode($json[0]);
          echo $jsonstring;
         }
        }


          public function modificar_empleadoControlador(){
          $Id=$_POST['idMo'];
          $nombre=$_POST['nombree'];
          $zona=$_POST['zonae'];
          $dui=$_POST['duie'];
          $telefono=$_POST['telefonoe'];
          $nit=$_POST['nite'];
          $cargo=$_POST['cargoe'];
          
          //$EstadoE=$_POST['estadomo'];



          $dataE=[
            "nombre"=>$nombre,
            "zona"=>$zona,
            "dui"=>$dui,
            "telefono"=>$telefono,
            "nit"=>$nit,
            "cargo"=>$cargo,
            
            //"Estado"=>$EstadoE,
            "Id"=>$Id
        ];

        
 $modificar=empleadoModelo::modificar_empleadoModelo($dataE);
 
   if($modificar->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Modificado",
            "Texto"=>"Empleado modificado con exito",
            "Tipo"=>"success"
        ];
    
      }else{
       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El Empleado no pudo modifarse",
            "Tipo"=>"error"
        ];
        
      }
    $jsonstring=json_encode($alerta);
    echo $jsonstring;

} 

     



}

  $insEmple=new empleadoControlador();
  if(isset($_POST['nombre']) ){
    echo $insEmple->agregar_empleadoControlador();
  }else if (isset($_POST['es'])) {
    echo $insEmple->cambiarEstado();
  }else if (isset($_POST['idEmpleado'])) {
    $idb=$_POST['idEmpleado'];
    echo $insEmple->unicoEmpleado($idb);
  }else if (isset($_POST['idMo'])) {
    echo $insEmple->modificar_empleadoControlador();
  }else{
  echo $insEmple->mostrar_empleadoControlador();
  }

 ?>