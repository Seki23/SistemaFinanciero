
<?php  

require_once "../modelo/tipoactivoModelo.php";

class tipoactivoControlador extends tipoactivoModelo{

public function correlativoTipoActivo(){
      
       $catalogo=$_POST['catalogo'];

//busca el ultimo correlativo de tipo activo
       $buscarUltimoCorr=ejecutar_consulta_simple("SELECT ac.correlativo FROM tipoactivo as ac  WHERE ac.idcatalogo='$catalogo' ORDER BY ac.idtipoactivo DESC LIMIT 1");
      //busca el catalogo de arriba
       $buscarCat=ejecutar_consulta_simple("SELECT cat.correlativo FROM catalogoactivos AS cat WHERE cat.idcatalogoactivos = '$catalogo'");
       

       if($buscarUltimoCorr->rowCount()>=1){
        $buscarUltimoCorr=$buscarUltimoCorr->fetch(PDO::FETCH_ASSOC);// convierte a array
        $Ultimo= explode("-",$buscarUltimoCorr['correlativo']);
      //  $Ultimo= $buscarUltimoCorr['correlativo'];
        $buscarCat=$buscarCat->fetch(PDO::FETCH_ASSOC);
        $UltimoCat=$buscarCat['correlativo'];

        $suma=$Ultimo[1] + 1;  //realiza la suma 
        $numZeros= strlen ($suma);//cuenta el numero de caracteres
        if($numZeros==1){   //condiciones segun el numero de zero
          $resultado =$UltimoCat."-"."00".$suma;
        }elseif($numZeros==2){
            $resultado=$UltimoCat."-"."0".$suma;
        }else{
           $resultado=$UltimoCat."-".$suma;
        }
       echo $resultado;

       
       }else{
       //en caso que no haya ningun activo registrado

       $buscarCat=$buscarCat->fetch(PDO::FETCH_ASSOC);
        $UltimoCat=$buscarCat['correlativo'];

        $resultado=$UltimoCat."-"."001";
      
       echo $resultado;
       }
    }

public function agregar_tipoactivo(){
      $correlativo=$_POST['correlativo'];
      $nombre=$_POST['nombre'];
	    $catalogo=$_POST['catalogo'];
	  
	        
  $datostipoactivo=[
        "correlativo"=>$correlativo,
        "nombre"=>$nombre,
        "catalogo"=>$catalogo,
        
   ];
   $guardarT=tipoactivoModelo::agregar_tipoactivoModelo($datostipoactivo);
   if($guardarT->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Registrado",
            "Texto"=>"Tipo activo registrado con exito",
            "Tipo"=>"success"
        ];
    
      }else{
       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"No pudo registrarse",
            "Tipo"=>"error"
        ];
        
      }
   
  
  $jsonstring=json_encode($alerta);
  echo $jsonstring;
}


public function mostrar_tipoactivo(){
 $datos=tipoactivoModelo::mostrar_TipoactivoModelo();
         $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
    $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
    print  $data;
}

public function modificar_tipoactivo(){
  
   $correlativo=$_POST['correlativo'];
      $nombre=$_POST['nombre'];
   
      $catalogo=$_POST['catalogo'];
      $Id=$_POST['idMo'];
          
  $datosT=[
    "correlativo"=>$correlativo,
        "nombre"=>$nombre,
        
        "catalogo"=>$catalogo,
       
        "Id"=>$Id
   ];

  
 $modificarTipoactivo=tipoactivoModelo::modificar_TipoactivoModelo($datosT);
 
   if($modificarTipoactivo->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Modificado",
            "Texto"=>"Tipo activo modificado con exito",
            "Tipo"=>"success"
        ];
    
      }else{
       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El Tipo de activo no pudo modifarse",
            "Tipo"=>"error"
        ];
        
      }
    $jsonstring=json_encode($alerta);
    echo $jsonstring;

} 

    public function unico_Tipoactivo($id){
     // $id=$_POST['id'];
      $consulta="SELECT c.idtipoactivo,c.correlativo, c.nombre, cl.idcatalogoactivos, cl.nombrecatalogo FROM tipoactivo AS c INNER JOIN catalogoactivos AS cl ON c.idcatalogo = cl.idcatalogoactivos  WHERE c.idtipoactivo=$id";
      $conexion=conectar();
         $datos=$conexion->query($consulta);
         $datos=$datos->fetchAll();
         if($datos>=1){
      foreach($datos as $row){
        $json[]=array(
          'correlativo'=>$row['correlativo'],
          'nombre'=>$row['nombre'],
          'catalogo'=>$row['nombrecatalogo'],
          'idcatalogoactivo'=>$row['idcatalogoactivos'],
          
          'id'=>$row['idtipoactivo']
      );
      }
      $jsonstring=json_encode($json[0]);
      echo $jsonstring;
     }
    }




}

$t=new tipoactivoControlador();
if(isset($_POST['idMo'])){
  $t->modificar_tipoactivo();
}elseif(isset($_POST['correlativo']) ){
  $t->agregar_tipoactivo();
}elseif(isset($_POST['idTipo'])){
   $id=$_POST['idTipo']; 
   $t->unico_Tipoactivo($id);
}elseif(isset($_POST['id'] )){
  $t->eliminar_tipoactivo();
}elseif(isset($_POST['catalogo'] )){
  $t->correlativoTipoActivo();
}else{
  $t->mostrar_tipoactivo();
}


