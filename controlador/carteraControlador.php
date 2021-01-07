<?php  

require_once "../modelo/carteraModelo.php";

class carteraControlador extends carteraModelo{


 
    
    public function agregar_cartera(){
      



       $cartera=$_POST['cartera'];

       $carteraExiste=ejecutar_consulta_simple("SELECT * FROM carteraclientes WHERE carteracliente = '$cartera'");

       if($carteraExiste->rowCount()>=1){
        
        $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"La cartera ya existe",
            "Tipo"=>"error"
        ];

       }else{
        $guardarCartera=carteraModelo::agregar_carteraModelo($cartera);
        if($guardarCartera->rowCount()>=1){
         $alerta=[
                 "Titulo"=>"Registrado",
                 "Texto"=>"Cartera registrada con exito",
                 "Tipo"=>"success"
             ];
         
           }else{
            $alerta=[
                 "Titulo"=>"Error",
                 "Texto"=>"La cartera no pudo registrarse",
                 "Tipo"=>"error"
             ];
             
           }
       }

    
     
    
    $jsonstring=json_encode($alerta);
    echo $jsonstring;
  }
  

  public function mostrar_cartera(){
    $datos=carteraModelo::mostrar_carteraModelo();
            $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
       $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
       print  $data;
   }


  


}

$instCartera = new carteraControlador();



if(isset($_POST['cartera'])){
    $instCartera->agregar_cartera();
}else{
    $instCartera->mostrar_cartera(); 
}

