<?php  

require_once "../modelo/activoModelo.php";

class activoControlador extends activoModelo{


    public function correlativoActivo(){
       $tipo=$_POST['tipo'];
       $departamento=$_POST['departamento'];


       $buscarUltimoCorr=ejecutar_consulta_simple("SELECT ac.correlativo FROM activos as ac  ORDER BY ac.idactivos DESC LIMIT 1");
       $buscarTipo=ejecutar_consulta_simple("SELECT ta.correlativo FROM tipoactivo as ta WHERE ta.idtipoactivo='$tipo'");
       $buscarDpto=ejecutar_consulta_simple("SELECT dp.correlativo FROM departamento AS dp WHERE dp.iddepartamento = '$departamento'");
       

       if($buscarUltimoCorr->rowCount()>=1){
        $buscarUltimoCorr=$buscarUltimoCorr->fetch(PDO::FETCH_ASSOC);
        $Ultimo= explode("-",$buscarUltimoCorr['correlativo']);
        $buscarTipo=$buscarTipo->fetch(PDO::FETCH_ASSOC);
        $UltimoTipo=$buscarTipo['correlativo'];
        $buscarDpto=$buscarDpto->fetch(PDO::FETCH_ASSOC);
        $UltimoDpto=$buscarDpto['correlativo'];

        $numZeros= substr_count($Ultimo[3], '0');  //cuenta el numero de cero 
        $suma=$Ultimo[3] + 1;  //realiza la suma 
        $resultado;            //lleva el valor del correlativo
        if($numZeros==1){   //condiciones segun el numero de zero
          $resultado =$UltimoDpto."-".$UltimoTipo."-". "0".$suma;
        }elseif($numZeros==2){
            $resultado=$UltimoDpto."-".$UltimoTipo."-". "00".$suma;
        }else{
           $resultado=$UltimoDpto."-".$UltimoTipo."-". $suma;
        }
       echo $resultado;

       }else{//en caso que no haya ningun activo registrado

        $buscarTipo=$buscarTipo->fetch(PDO::FETCH_ASSOC);
        $UltimoTipo=$buscarTipo['correlativo'];
        $buscarDpto=$buscarDpto->fetch(PDO::FETCH_ASSOC);
        $UltimoDpto=$buscarDpto['correlativo'];

        $resultado=$UltimoDpto."-".$UltimoTipo."-". "001";
      
       echo $resultado;
       }
    }

    
    public function agregar_Activo(){
          $correlativo=$_POST['correlativo'];
          $fecha=$_POST['fecha'];
          $descripcion=$_POST['descripcion'];
          $precio=$_POST['precio'];
          $marca=$_POST['marca'];
          $tipoadquisicion=$_POST['tipoadquisicion'];
          $idtipo=$_POST['idtipo'];
          $iddepartamento=$_POST['iddepartamento'];
          $idencargado=$_POST['idencargado'];
          $idproveedor=$_POST['idproveedor'];
          $vida=$_POST['vida'];
          $estado="Activo";
              
    $datosActivo=[
          "correlativo"=>$correlativo,
          "fecha"=>$fecha,
          "descripcion"=>$descripcion,
          "precio"=>$precio,
          "marca"=>$marca,
          "tipoadquisicion"=>$tipoadquisicion,
          "idtipo"=>$idtipo,
          "iddepartamento"=>$iddepartamento,
          "idencargado"=>$idencargado,
          "idproveedor"=>$idproveedor,
          "vida"=>$vida,
          "estado"=>$estado,
         
     ];
     $guardarActivo=activoModelo::agregar_activoModelo($datosActivo);
     if($guardarActivo->rowCount()>=1){
      $alerta=[
              "Titulo"=>"Registrado",
              "Texto"=>"Activo registrado con exito",
              "Tipo"=>"success"
          ];
      
        }else{
         $alerta=[
              "Titulo"=>"Error",
              "Texto"=>"El Activo no pudo registrarse",
              "Tipo"=>"error"
          ];
          
        }
     
    
    $jsonstring=json_encode($alerta);
    echo $jsonstring;
  }
  

  public function mostrar_activos(){
    $datos=activoModelo::mostrar_ActivoModelo();
            $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
       $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
       print  $data;
   }


   public function unicoActivo($id){
     
    $consulta = "SELECT a.idactivos,a.correlativo, a.fecha_adquisicion, a.descripcion, a.estado, a.precio, a.marca, a.tipoadquisicion,a.vida FROM activos AS a WHERE a.idactivos ='$id'";
    $conexion=conectar();
       $datos=$conexion->query($consulta);
       $datos=$datos->fetchAll();
       if($datos>=1){
    foreach($datos as $row){
      $json[]=array(
      "idactivos"=>$row['idactivos'],
      "correlativo"=>$row['correlativo'],
      "fechaAdquisicion"=>$row['fecha_adquisicion'],
      "descripcion"=>$row['descripcion'],
      "estado"=>$row['estado'],
      "precio"=>$row['precio'],
      "marca"=>$row['marca'],
      "tipoadquisicion"=>$row['tipoadquisicion'],
      "vida"=>$row['vida']
      );
    }
    $jsonstring=json_encode($json[0]);
    echo $jsonstring;
   }
}

public function modificar_Activo(){
  

  $fecha=$_POST['fecha'];
  $descripcion=$_POST['descripcion'];
  $estado=$_POST['estado'];
  $precio=$_POST['precio'];
  $marca=$_POST['marca'];
  $tipo=$_POST['tipo'];
  $vida=$_POST['vida'];
  $Id=$_POST['Id'];
      
$datosActivo=[
    "fecha"=>$fecha,
    "descripcion"=>$descripcion,
    "estado"=>$estado,
    "precio"=>$precio,
    "marca"=>$marca,
    "tipo"=>$tipo,
    "vida"=>$vida,
    "Id"=>$Id
];



$modificarActivo=activoModelo::modificar_ActivoModelo($datosActivo);

if($modificarActivo->rowCount()>=1){
$alerta=[
        "Titulo"=>"Modificado",
        "Texto"=>"Activo modificado con exito",
        "Tipo"=>"success"
    ];

  }else{
   $alerta=[
        "Titulo"=>"Error",
        "Texto"=>"El Activo no pudo modifarse",
        "Tipo"=>"error"
    ];
    
  }
$jsonstring=json_encode($alerta);
echo $jsonstring;

} 



}

$instActivo = new activoControlador();
if(isset($_POST['correlativo'])){
    $instActivo->agregar_Activo();
}elseif(isset($_POST['Id'])){
   $instActivo->modificar_Activo();
}elseif(isset($_POST['idActivo'])){
     $id=$_POST['idActivo'];
     $instActivo->unicoActivo($id);
}elseif(isset($_POST['tipo']) && isset($_POST['departamento'])){
   // echo "ENTRA AQUI";
    $instActivo->correlativoActivo();
}else{
    $instActivo->mostrar_activos(); 
}

