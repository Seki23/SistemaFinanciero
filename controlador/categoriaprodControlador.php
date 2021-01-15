<?php  

require_once "../modelo/categoriaprodModelo.php";

class categoriaProductControlador extends categoriaProductModelo{

public function agregar_categoriaProductControlador(){
	    $categoriaProd=$_POST['nombreCatepro'];
	        
  $datoscategpriap=[
        "categoriaprod"=>$categoriaProd,
   ];

    if($categoriaProd!=""){
        $categorianunico=ejecutar_consulta_simple("SELECT categoriaproducto FROM categoriaproducto WHERE categoriaproducto='$categoriaProd'");
        $re=$categorianunico->rowCount();
          if($re>=1){
               $alerta=[
                "Titulo"=>"Error",
                "Texto"=>"La categoria del producto ingresado ya existe",
                "Tipo"=>"error"
            ];
          }else{

                $guardarCategoriap=categoriaProductModelo::agregar_cartegeoriaProductModelo($datoscategpriap);
                 if($guardarCategoriap->rowCount()>=1){
                  $alerta=[
                          "Titulo"=>"Registrado",
                          "Texto"=>"Categoria producto registrado con exito",
                          "Tipo"=>"success"
                      ];
                  
                    }else{
                     $alerta=[
                          "Titulo"=>"Error",
                          "Texto"=>"La categoria producto no pudo registrarse",
                          "Tipo"=>"error"
                      ];
                      
                    }
          }
    }
    
	     $jsonstring=json_encode($alerta);
	     echo $jsonstring;
  }


public function mostrar_categoriaProductControlador(){
 $datos=categoriaProductModelo::mostrar_cartegeoriaProductModelo();
         $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
    $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
    print  $data;
}


public function eliminar_categoriaProductControlador(){
    $id=$_POST['id'];

    $idselect=ejecutar_consulta_simple("SELECT p.idcategoria FROM producto p WHERE p.idcategoria='$id'");
    $respuesta=$idselect->rowCount();
    if($respuesta>=1){

      $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"La categoria no se puede eliminarse esta siendo ocupado en otro registro",
            "Tipo"=>"error"
        ];
      
    }else{
        $datos=categoriaProductModelo::eliminar_cartegeoriaProductModelo($id);
        if($datos->rowCount()>=1){
        $alerta=[
                "Titulo"=>"Eliminado",
                "Texto"=>"Categoria producto eliminado con exito",
                "Tipo"=>"success"
            ];
        
          }else{
           $alerta=[
                "Titulo"=>"Error",
                "Texto"=>"La categoria producto no pudo eliminarse",
                "Tipo"=>"error"
            ];
            
          }
    }
    
    $jsonstring=json_encode($alerta);
    echo $jsonstring;

   }


      public function setcategoriaProductControlador($id){
     
      $consulta = "SELECT idcategoriaproducto, categoriaproducto FROM categoriaproducto WHERE idcategoriaproducto='$id'";
      $conexion=conectar();
         $datos=$conexion->query($consulta);
         $datos=$datos->fetchAll();
         if($datos>=1){
      foreach($datos as $row){
        $json[]=array(
        "categoriaprom"=>$row['categoriaproducto'],
        "id"=>$row['idcategoriaproducto']
        );
      }
      $jsonstring=json_encode($json[0]);
      echo $jsonstring;
     }
  }


  public function modificar_ProductControlador(){
  

      $categoprodmo=$_POST['categoriaprom'];
      $Id=$_POST['idCateprod'];
          
      $datosCateProd=[
            "Cateprod"=>$categoprodmo,
            "Id"=>$Id
       ];

 if($Id==0){
     $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"Hay un problema al modificar, la categoria no se encuentra",
            "Tipo"=>"error"
            ];
 }else{

      $cargonunicom=ejecutar_consulta_simple("SELECT categoriaproducto FROM categoriaproducto WHERE categoriaproducto='$categoprodmo' AND idcategoriaproducto!='$Id'");
      $re=$cargonunicom->rowCount();
      if($re>=1){
          $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"La categoria no pudo registrarte, ya existe un cargo registrado con este nombre",
            "Tipo"=>"error"
        ];
      }else{
             $modifCategoriaProd=categoriaProductModelo::modificar_cartegeoriaProductModelo($datosCateProd);
 
         if($modifCategoriaProd->rowCount()>=1){
          $alerta=[
                  "Titulo"=>"Modificado",
                  "Texto"=>"Categoria producto modificado con exito",
                  "Tipo"=>"success"
              ];
          
            }else{
             $alerta=[
                  "Titulo"=>"Error",
                  "Texto"=>"La categoria producto no pudo modifarse",
                  "Tipo"=>"error"
              ];
              
            }
      }
 }
  

    $jsonstring=json_encode($alerta);
    echo $jsonstring;

} 

}


$instCategoriaPro=new categoriaProductControlador();
if(isset($_POST['nombreCatepro'])){
  $instCategoriaPro->agregar_categoriaProductControlador();// guardando
}else if(isset($_POST['id'] )){
   $instCategoriaPro->eliminar_categoriaProductControlador();
}else if(isset($_POST['idCp'])){
  $id=$_POST['idCp'];
   $instCategoriaPro->setcategoriaProductControlador($id);
}else if(isset($_POST['idCateprod'])){
   $instCategoriaPro->modificar_ProductControlador();
}else{
  $instCategoriaPro->mostrar_categoriaProductControlador();
}
