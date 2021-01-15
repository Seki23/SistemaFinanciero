<?php  

require_once "../modelo/proveedorModelo.php";

class proveedorControlador extends proveedorModelo{

public function agregar_provedorControlador(){
	    $nombrep=$_POST['nombreP'];
	    $direccionp=$_POST['direccionP'];
      $telefonop=$_POST['telefonoP'];
      $representantep=$_POST['representanteP'];
	    $duip=$_POST['duiP'];
	    $nitp=$_POST['nitP'];
	    $correop=$_POST['correoP'];
	    $celularp=$_POST['celularP'];

	        
  $datosProveedor=[
        "nombrep"=>$nombrep,
        "direccionp"=>$direccionp,
        "telefonop"=>$telefonop,
        "representantep"=>$representantep,
        "duip"=>$duip,
        "nitp"=>$nitp,
        "correop"=>$correop,
        "celularp"=>$celularp,
   ];


  if($nombrep!=""){
    $nomnunico=ejecutar_consulta_simple("SELECT nombre FROM proveedor WHERE nombre='$nombrep'");
      $re=$nomnunico->rowCount();
      if($re>=1){
          $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El nombre del proveedor ingresado ya existe",
            "Tipo"=>"error"
        ];
      }else{
      if($telefonop!=""){
        $telnunico=ejecutar_consulta_simple("SELECT telefono FROM proveedor WHERE telefono='$telefonop'");
           $re=$telnunico->rowCount();
            if($re>=1){
                $alerta=[
                  "Titulo"=>"Error",
                  "Texto"=>"El telefono del proveedor ingresado ya existe",
                  "Tipo"=>"error"
              ];
            }else{
                if($representantep!=""){
                   $reprenunico=ejecutar_consulta_simple("SELECT representante FROM proveedor WHERE representante='$representantep'");
                   $re=$reprenunico->rowCount();
                   if($re>=1){
                          $alerta=[
                            "Titulo"=>"Error",
                            "Texto"=>"El representante del proveedor ingresado ya existe",
                            "Tipo"=>"error"
                        ];
                      }else{
                          if($duip!=""){
                            $duinunico=ejecutar_consulta_simple("SELECT dui FROM proveedor WHERE dui='$duip'");
                            $re=$duinunico->rowCount();
                            if($re>=1){
                                  $alerta=[
                                    "Titulo"=>"Error",
                                    "Texto"=>"El dui ingresado ya existe",
                                    "Tipo"=>"error"
                                ];
                              }else{
                                if($nitp!=""){
                                    $nitnunico=ejecutar_consulta_simple("SELECT nit FROM proveedor WHERE nit='$nitp'");
                                    $re=$nitnunico->rowCount();
                                    if($re>=1){
                                          $alerta=[
                                            "Titulo"=>"Error",
                                            "Texto"=>"El nit ingresado ya existe",
                                            "Tipo"=>"error"
                                        ];
                                      }else{
                                        if($correop!=""){
                                           $emailnunico=ejecutar_consulta_simple("SELECT correo FROM proveedor WHERE correo='$correop'");
                                          $re=$emailnunico->rowCount();
                                                if($re>=1){
                                                $alerta=[
                                                  "Titulo"=>"Error",
                                                  "Texto"=>"El correo electronico ingresado ya existe",
                                                  "Tipo"=>"error"
                                              ];
                                            }else{
                                              if($celularp!=""){
                                                 $celununico=ejecutar_consulta_simple("SELECT celular FROM proveedor WHERE celular='$celularp'");
                                                  $re=$celununico->rowCount();
                                                   if($re>=1){
                                                      $alerta=[
                                                        "Titulo"=>"Error",
                                                        "Texto"=>"El numero de celular ingresado ya existe",
                                                        "Tipo"=>"error"
                                                    ];
                                                  }else{
                                                      //hasta aqui empieza a guardando
                                                 $guardarProve=proveedorModelo::agregar_proveedorModelo($datosProveedor);
                                                 if($guardarProve->rowCount()>=1){
                                                  $alerta=[
                                                          "Titulo"=>"Registrado",
                                                          "Texto"=>"Proveedor registrado con exito",
                                                          "Tipo"=>"success"
                                                      ];
                                                  
                                                    }else{
                                                     $alerta=[
                                                          "Titulo"=>"Error",
                                                          "Texto"=>"El proveedor no pudo registrarse",
                                                          "Tipo"=>"error"
                                                      ];
                                                      
                                                    }

                                                  }
                                              }
                                            }
                                        }

                                      }
                                 }

                              }
                          }
                      }
                }
            }
      }
  }
}
    
	     $jsonstring=json_encode($alerta);
	     echo $jsonstring;
  }


public function mostrar_provedorControlador(){
 $datos=proveedorModelo::mostrar_proveedorModelo();
         $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
    $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
    print  $data;
}


public function eliminar_provedorControlador(){
    $id=$_POST['id'];

    //se hacen tres ya que esta relacionado con tres tablas
     $idselect1=ejecutar_consulta_simple("SELECT pro.idproveedor FROM producto pro WHERE pro.idproveedor='$id'");
    $respuesta1=$idselect1->rowCount();
    $idselect2=ejecutar_consulta_simple("SELECT act.idproveedor FROM activos act WHERE act.idproveedor='$id'");
    $respuesta2=$idselect2->rowCount();
    $idselect3=ejecutar_consulta_simple("SELECT cp.idproveedor FROM compra cp WHERE cp.idproveedor='$id'");
    $respuesta3=$idselect3->rowCount();

    if($respuesta1>=1){
      $alerta=[
                  "Titulo"=>"Error",
                  "Texto"=>"El proveedor no pudo eliminarse, esta siendo ocupado en otro registro",
                  "Tipo"=>"error"
              ];
    }else if($respuesta2>=1){
          $alerta=[
                  "Titulo"=>"Error",
                  "Texto"=>"El proveedor no pudo eliminarse,  esta siendo ocupado en otro registro",
                  "Tipo"=>"error"
              ];
    }else if($respuesta3>=1){
            $alerta=[
                  "Titulo"=>"Error",
                  "Texto"=>"El proveedor no pudo eliminarse,  esta siendo ocupado en otro registro",
                  "Tipo"=>"error"
              ];
    }else{
        $datos=proveedorModelo::eliminar_proveedorModelo($id);
          if($datos->rowCount()>=1){
          $alerta=[
                  "Titulo"=>"Eliminado",
                  "Texto"=>"Proveedor eliminado con exito",
                  "Tipo"=>"success"
              ];
          
            }else{
             $alerta=[
                  "Titulo"=>"Error",
                  "Texto"=>"El proveedor no pudo eliminarse",
                  "Tipo"=>"error"
              ];
              
            }
    }
  
    
    $jsonstring=json_encode($alerta);
    echo $jsonstring;

   }

   public function setprovedorControlador($id){
     
      $consulta = "SELECT idproveedor, nombre, direccion, telefono, representante, dui, nit, celular, correo FROM proveedor WHERE idproveedor='$id'";
      $conexion=conectar();
         $datos=$conexion->query($consulta);
         $datos=$datos->fetchAll();
         if($datos>=1){
      foreach($datos as $row){
        $json[]=array(
        "nomprove"=>$row['nombre'],
        "direprove"=>$row['direccion'],
        "telprove"=>$row['telefono'],
        "repreprove"=>$row['representante'],
        "duiprove"=>$row['dui'],
        "nitprove"=>$row['nit'],
        "celuprove"=>$row['celular'],
        "correoprove"=>$row['correo'],
        "id"=>$row['idproveedor']
        );
      }
      $jsonstring=json_encode($json[0]);
      echo $jsonstring;
     }
  }


    public function modificar_provedorControlado(){
  

      $proveedorm=$_POST['nombreProveM'];
      $direm=$_POST['direccionProveM'];
      $telm=$_POST['telefonoProveM'];
      $representantem=$_POST['repreProveM'];
      $duiprom=$_POST['duiProveM'];
      $nitprom=$_POST['nitProveM'];
      $celularm=$_POST['celuProveM'];
      $correom=$_POST['correoProveM'];
      $Id=$_POST['idProveM'];
          
      $datosProveedorm=[
            "Nombrepm"=>$proveedorm,
            "Direpm"=>$direm,
            "Telefonopm"=>$telm,
            "Reprepm"=>$representantem,
            "Duipm"=>$duiprom,
            "Nitpm"=>$nitprom,
            "Celupm"=>$celularm,
            "Correopm"=>$correom,
            "Id"=>$Id
       ];

 if($proveedorm!=""){
    $nomnunicom=ejecutar_consulta_simple("SELECT nombre FROM proveedor WHERE nombre='$proveedorm' AND idproveedor!='$Id'");
      $re=$nomnunicom->rowCount();
      if($re>=1){
          $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El nombre del proveedor ingresado ya existe",
            "Tipo"=>"error"
        ];
      }else{
      if($telm!=""){
        $telnunicom=ejecutar_consulta_simple("SELECT telefono FROM proveedor WHERE telefono='$telm' AND idproveedor!='$Id'");
           $re=$telnunicom->rowCount();
            if($re>=1){
                $alerta=[
                  "Titulo"=>"Error",
                  "Texto"=>"El telefono del proveedor ingresado ya existe",
                  "Tipo"=>"error"
              ];
            }else{
                if($representantem!=""){
                   $reprenunicom=ejecutar_consulta_simple("SELECT representante FROM proveedor WHERE representante='$representantem' AND idproveedor!='$Id'");
                   $re=$reprenunicom->rowCount();
                   if($re>=1){
                          $alerta=[
                            "Titulo"=>"Error",
                            "Texto"=>"El representante del proveedor ingresado ya existe",
                            "Tipo"=>"error"
                        ];
                      }else{
                          if($duiprom!=""){
                            $duinunicom=ejecutar_consulta_simple("SELECT dui FROM proveedor WHERE dui='$duiprom' AND idproveedor!='$Id'");
                            $re=$duinunicom->rowCount();
                            if($re>=1){
                                  $alerta=[
                                    "Titulo"=>"Error",
                                    "Texto"=>"El dui ingresado ya existe",
                                    "Tipo"=>"error"
                                ];
                              }else{
                                if($nitprom!=""){
                                    $nitnunicom=ejecutar_consulta_simple("SELECT nit FROM proveedor WHERE nit='$nitprom' AND idproveedor!='$Id'");
                                    $re=$nitnunicom->rowCount();
                                    if($re>=1){
                                          $alerta=[
                                            "Titulo"=>"Error",
                                            "Texto"=>"El nit ingresado ya existe",
                                            "Tipo"=>"error"
                                        ];
                                      }else{
                                        if($correom!=""){
                                           $emailnunicom=ejecutar_consulta_simple("SELECT correo FROM proveedor WHERE correo='$correom' AND idproveedor!='$Id'");
                                          $re=$emailnunicom->rowCount();
                                                if($re>=1){
                                                $alerta=[
                                                  "Titulo"=>"Error",
                                                  "Texto"=>"El correo electronico ingresado ya existe",
                                                  "Tipo"=>"error"
                                              ];
                                            }else{
                                              if($celularm!=""){
                                                 $celununicom=ejecutar_consulta_simple("SELECT celular FROM proveedor WHERE celular='$celularm' AND idproveedor!='$Id'");
                                                  $re=$celununicom->rowCount();
                                                   if($re>=1){
                                                      $alerta=[
                                                        "Titulo"=>"Error",
                                                        "Texto"=>"El numero de celular ingresado ya existe",
                                                        "Tipo"=>"error"
                                                    ];
                                                  }else{
                                                      //hasta aqui empieza a modificar
                                                 
                                                     $modifProveedor=proveedorModelo::modificar_proveedorModelo($datosProveedorm);
 
                                                   if($modifProveedor->rowCount()>=1){
                                                    $alerta=[
                                                            "Titulo"=>"Modificado",
                                                            "Texto"=>"Proveedor modificado con exito",
                                                            "Tipo"=>"success"
                                                        ];
                                                    
                                                      }else{
                                                       $alerta=[
                                                            "Titulo"=>"Error",
                                                            "Texto"=>"El Proveedor no pudo modifarse",
                                                            "Tipo"=>"error"
                                                        ];
                                                        
                                                      }
                                                  }
                                              }
                                            }
                                        }

                                      }
                                 }

                              }
                          }
                      }
                }
            }
      }
   } 
  } 

    $jsonstring=json_encode($alerta);
    echo $jsonstring;

} 

}

$instProve=new proveedorControlador();
if(isset($_POST['nombreP']) && isset($_POST['direccionP']) && isset($_POST['telefonoP']) && isset($_POST['representanteP']) && isset($_POST['duiP']) && isset($_POST['nitP']) && isset($_POST['correoP']) && isset($_POST['celularP'])){
  $instProve->agregar_provedorControlador();// guardando
}else if(isset($_POST['id'])){
  $instProve->eliminar_provedorControlador();
}else if(isset($_POST['idP'])){
  $id=$_POST['idP'];
  $instProve->setprovedorControlador($id);
}else if(isset($_POST['idProveM'])){
  $instProve->modificar_provedorControlado();
}else{
   $instProve->mostrar_provedorControlador();
}