<?php  

require_once "../modelo/cargoModelo.php";

class cargoControlador extends cargoModelo{

public function agregar_cargoControlador(){
	    $nombrecargo=$_POST['nombreCar'];
	    $salirocargo=$_POST['salarioCar'];
	        
  $datosCargo=[
        "nombrecar"=>$nombrecargo,
        "salariocar"=>$salirocargo,
   ];

    if($nombrecargo!=""){
      $cargonunico=ejecutar_consulta_simple("SELECT cargo FROM cargo WHERE cargo='$nombrecargo'");
      $re=$cargonunico->rowCount();
      if($re>=1){
          $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El cargo ingresado ya existe",
            "Tipo"=>"error"
        ];
      }else{

        $guardarCargo=cargoModelo::agregar_cargoModelo($datosCargo);
             if($guardarCargo->rowCount()>=1){
              $alerta=[
                      "Titulo"=>"Registrado",
                      "Texto"=>"Cargo registrado con exito",
                      "Tipo"=>"success"
                  ];
              
                }else{
                 $alerta=[
                      "Titulo"=>"Error",
                      "Texto"=>"El cargo no pudo registrarse",
                      "Tipo"=>"error"
                  ];
                  
                }
      

      }

    }
    
	     $jsonstring=json_encode($alerta);
	     echo $jsonstring;
  }


public function mostrar_cargoControlador(){
 $datos=cargoModelo::mostrar_cargoModelo();
         $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
    $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
    print  $data;
}

public function eliminar_cargoControlador(){
    $id=$_POST['id'];

    $idselect=ejecutar_consulta_simple("SELECT e.idcargos FROM empleado e WHERE e.idcargos='$id'");
    $respuesta=$idselect->rowCount();
    if($respuesta>=1){

      $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El cargo no se puede eliminarse esta siendo ocupado en otro registro",
            "Tipo"=>"error"
        ];
      
    }else{

        $datos=cargoModelo::eliminar_cargoModelo($id);
           if($datos->rowCount()>=1){
            $alerta=[
                    "Titulo"=>"Eliminado",
                    "Texto"=>"Cargo eliminado con exito",
                    "Tipo"=>"success"
                ];
            
              }else{
               $alerta=[
                    "Titulo"=>"Error",
                    "Texto"=>"El cargo no pudo eliminarse",
                    "Tipo"=>"error"
                ];
                
              }

    }

    
    $jsonstring=json_encode($alerta);
    echo $jsonstring;

   }


    public function setcargoControlador($id){
     
      $consulta = "SELECT idcargo, cargo, salario  FROM cargo WHERE idcargo='$id'";
      $conexion=conectar();
         $datos=$conexion->query($consulta);
         $datos=$datos->fetchAll();
         if($datos>=1){
      foreach($datos as $row){
        $json[]=array(
        "nomcargom"=>$row['cargo'],
        "salriom"=>$row['salario'],
        "id"=>$row['idcargo']
        );
      }
      $jsonstring=json_encode($json[0]);
      echo $jsonstring;
     }
  }


   public function modificar_cargoControlador(){
  

      $Nomcargom=$_POST['nomcarM'];
      $Salariom=$_POST['salariocarM'];
      $Id=$_POST['idCargoM'];
          
      $datosCargom=[
            "NomCargo"=>$Nomcargom,
            "Salario"=>$Salariom,
            "Id"=>$Id
       ];


 if($Id==0){
     $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"Hay un problema al modificar, el cargo no se encuentra",
            "Tipo"=>"error"
            ];
 }else{

       $cargonunicom=ejecutar_consulta_simple("SELECT cargo FROM cargo WHERE cargo='$Nomcargom' AND idcargo!='$Id'");
      $re=$cargonunicom->rowCount();
      if($re>=1){
          $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El cargo no pudo registrarte, ya existe un cargo registrado con este nombre",
            "Tipo"=>"error"
        ];
      }else{
        $modifCargo=cargoModelo::modificar_cargoModelo($datosCargom);
         if($modifCargo->rowCount()>=1){
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
 }
  
 
    $jsonstring=json_encode($alerta);
    echo $jsonstring;

}

}


$instCargo=new cargoControlador();
if(isset($_POST['nombreCar']) && isset($_POST['salarioCar'])){
  $instCargo->agregar_cargoControlador();// guardando
}else if(isset($_POST['id'])){
  $instCargo->eliminar_cargoControlador();
}else if(isset($_POST['idC'])){
  $id=$_POST['idC'];
  $instCargo->setcargoControlador($id);
}else if(isset($_POST['idCargoM'])){
  $instCargo->modificar_cargoControlador();
}else{
     $instCargo->mostrar_cargoControlador();
}