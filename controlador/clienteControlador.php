<?php  

require_once "../modelo/clienteModelo.php";

class clienteControlador extends clienteModelo{

public function agregar_informacionFinanciera(){

  
  $UltimoID=ejecutar_consulta_simple("SELECT idcliente FROM clientes ORDER BY idcliente DESC LIMIT 1");
  if($UltimoID->rowCount()>=1){
   $UltimoID=$UltimoID->fetch(PDO::FETCH_ASSOC);
   $Ultimo= $UltimoID['idcliente'];
  
      $cliente=$Ultimo;
	    $efectivo=$_POST['efectivo'];
	    $cxc=$_POST['cxc'];
	    $inventario=$_POST['inventario'];
	    $proplanyequi=$_POST['proplanyequi'];
	    $cxp=$_POST['cxp'];
	    $prestamos=$_POST['prestamos'];
	    $dlp=$_POST['dlp'];
	    $capital=$_POST['capital'];
	    $utilidades=$_POST['utilidades']; 
	    $reserva=$_POST['reserva'];
	    $venta=$_POST['venta'];
	    $gastoV=$_POST['gastoV'];
	    $otroIngresos=$_POST['otroIngresos'];
	    $gastosOP=$_POST['gastosOP'];
	    $otroGastos=$_POST['otroGastos'];
	    $reservaLegal=$_POST['reservaLegal'];
	    $renta=$_POST['renta'];
	    $utiliNeta=$_POST['utiliNeta']; 
      
          
        $datosInfo=[
          "cliente"=>$cliente,  
          "efectivo"=>$efectivo,   
          "cxc"=>$cxc,
          "inventario"=>$inventario,
          "proplanyequi"=>$proplanyequi,
          "cxp"=>$cxp,
          "prestamos"=>$prestamos,
          "dlp"=>$dlp,
          "capital"=>$capital,
          "utilidades"=>$utilidades,
          "reserva"=>$reserva,  
          "venta"=>$venta,   
          "gastoV"=>$gastoV,
          "otroIngresos"=>$otroIngresos,
          "gastosOP"=>$gastosOP,
          "otroGastos"=>$otroGastos,
          "reservaLegal"=>$reservaLegal,
          "renta"=>$renta,
          "utiliNeta"=>$utiliNeta
     ];

  
  
      $guardarinformacion=clienteModelo::agregar_informacionFinancieraModelo($datosInfo);
     if($guardarinformacion->rowCount()>=1){
      $alerta=[
              "Titulo"=>"Registrado",
              "Texto"=>"Informacion registrada con exito",
              "Tipo"=>"success"
          ];
      
        }else{
         $alerta=[
              "Titulo"=>"Error",
              "Texto"=>"El Informacion no pudo registrarse",
              "Tipo"=>"error"
          ];
          
        }
      
      }
 
	     $jsonstring=json_encode($alerta);
	     echo $jsonstring;
  }



  public function agregar_cliente(){
    $codigo=$_POST['codigo'];
    $tipo=$_POST['tipo'];
    $nombre=$_POST['nombre'];
    $direccion=$_POST['direccion'];
    $dui=$_POST['dui'];
    $estado=$_POST['estado'];
    $lugartrabajo=$_POST['lugartrabajo'];
    $sueldo=$_POST['sueldo'];
    $gastos=$_POST['gastos'];
    $telefono=$_POST['telefono']; 
    $idcartera=2;
        
    if($tipo=="natural"){
      $datosClientes=[
        "codigo"=>$codigo,  
        "tipo"=>$tipo,   
        "nombre"=>$nombre,
        "direccion"=>$direccion,
        "dui"=>$dui,
        "estado"=>$estado,
        "lugartrabajo"=>$lugartrabajo,
        "sueldo"=>$sueldo,
        "gastos"=>$gastos,
        "telefono"=>$telefono,
        "idcartera"=>$idcartera
   ];


    $guardarCliente=clienteModelo::agregar_clienteModelo($datosClientes);
   if($guardarCliente->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Registrado",
            "Texto"=>"Cliente registrado con exito",
            "Tipo"=>"success"
        ];
    
      }else{
       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El cliente no pudo registrarse",
            "Tipo"=>"error"
        ];
        
      }
    }else{

      $datosClientes=[
        "codigo"=>$codigo,  
        "tipo"=>$tipo,   
        "nombre"=>$nombre,
        "direccion"=>$direccion,
        "dui"=>null,
        "estado"=>null,
        "lugartrabajo"=>null,
        "sueldo"=>null,
        "gastos"=>null,
        "telefono"=>$telefono,
        "idcartera"=>$idcartera
   ];


    $guardarCliente=clienteModelo::agregar_clienteModelo($datosClientes);
   if($guardarCliente->rowCount()>=1){
   $alerta=[
            "Titulo"=>"Registrado",
            "Texto"=>"Cliente registrado con exito",
            "Tipo"=>"success"
        ];
    
      }else{
      $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El cliente no pudo registrarse",
            "Tipo"=>"error"
        ];
        
      }

    }


     $jsonstring=json_encode($alerta);
     echo $jsonstring;
}




public function UnicoCliente($id){
     
  $consulta = "SELECT idcliente,tipocliente,nombrecliente,direccion,dui,lugartrabajo,salario,gastos,telefono,idcarteraclientes FROM clientes WHERE idcliente='$id'";
  $conexion=conectar();
     $datos=$conexion->query($consulta);
     $datos=$datos->fetchAll();
     if($datos>=1){
  foreach($datos as $row){
    $json[]=array(
    "tipocliente"=>$row['tipocliente'],
    "nombrecliente"=>$row['nombrecliente'],
    "dui"=>$row['dui'],
    "direccion"=>$row['direccion'],
    "lugartrabajo"=>$row['lugartrabajo'],
    "telefono"=>$row['telefono'],
    "salario"=>$row['salario'],
    "gastos"=>$row['gastos'],
    "idcarteraclientes"=>$row['idcarteraclientes'],
    "id"=>$row['idcliente']
    );
  }
  $jsonstring=json_encode($json[0]);
  echo $jsonstring;
 }
}



public function setearCodigo(){
  $consulta = "SELECT c.codigo FROM clientes AS c ORDER BY c.idcliente DESC LIMIT 1";
     $conexion=conectar();
  $resultado = $conexion->prepare($consulta); 
  $resultado->execute();  
  $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);

 
      if($datos>=1){
       $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
        print $data;
      }else{

      $json[]=array(
        "codigo"=>'00000000',
        );
        $jsonstring=json_encode($json[0]);
      echo $jsonstring;
     }


}

public function mostrar_cliente(){
     $datos=clienteModelo::mostrar_ClienteModelo();
      $datos=$datos->fetchAll();
  if($datos>=1){
   foreach($datos as $row){
     $json[]=array(
       'idcliente'=>$row['idcliente'],
       'codigo'=>$row['codigo'],
       'nombrecliente'=>$row['nombrecliente'],
       'dui'=>$row['dui'],
       'direccion'=>$row['direccion'],
       'telefono'=>$row['telefono'],
       'carteracliente'=>$row['carteracliente']
   );
 }
 $jsonstring=json_encode($json);
 echo $jsonstring;
 
 } 
     
 }


 public function modificar_cliente(){
  

  $nombre=$_POST['nombre'];
  $direccion=$_POST['direccion'];
  $dui=$_POST['dui'];
  $lugartrabajo=$_POST['lugartrabajo'];
  $gastos=$_POST['gastos'];
  $telefono=$_POST['telefono'];
  $sueldo=$_POST['sueldo'];
  $Id=$_POST['Id'];
  $cartera=$_POST['cartera'];
  
  if($gastos==""){

    $datosCliente=[
      "nombre"=>$nombre,
      "direccion"=>$direccion,
      "dui"=>null,
      "lugartrabajo"=>null,
      "gastos"=>null,
      "sueldo"=>null,
      "telefono"=>$telefono,
      "cartera"=>$cartera,
      "Id"=>$Id
  ];
  
  $modificarCliente=clienteModelo::modificar_ClienteModelo($datosCliente);
  
  if($modificarCliente->rowCount()>=1){
  $alerta=[
          "Titulo"=>"Modificado",
          "Texto"=>"Cliente modificado con exito",
          "Tipo"=>"success"
      ];
  
    }else{
     $alerta=[
          "Titulo"=>"Error",
          "Texto"=>"El Cliente no pudo modifarse",
          "Tipo"=>"error"
      ];
      
    }
  }else{

    $datosCliente=[
      "nombre"=>$nombre,
      "direccion"=>$direccion,
      "dui"=>$dui,
      "lugartrabajo"=>$lugartrabajo,
      "gastos"=>$gastos,
      "sueldo"=>$sueldo,
      "telefono"=>$telefono,
      "cartera"=>$cartera,
      "Id"=>$Id
  ];
  
  $modificarCliente=clienteModelo::modificar_ClienteModelo($datosCliente);
  
  if($modificarCliente->rowCount()>=1){
  $alerta=[
          "Titulo"=>"Modificado",
          "Texto"=>"Cliente modificado con exito",
          "Tipo"=>"success"
      ];
  
    }else{
     $alerta=[
          "Titulo"=>"Error",
          "Texto"=>"El Cliente no pudo modifarse",
          "Tipo"=>"error"
      ];
      
    }
  }

$jsonstring=json_encode($alerta);
echo $jsonstring;

} 


}

$cliente=new clienteControlador();

if(isset($_POST['Id'])){
  $cliente->modificar_cliente();
}elseif(isset($_POST['nombre'])){
  $cliente->agregar_cliente();
}elseif (isset($_POST['opcion']) || isset($_POST['opcion1'])) {
   $cliente->setearCodigo();
}elseif(isset($_POST['mostrar'])){
   $cliente->mostrar_cliente();
}elseif(isset($_POST['venta'])){
  $cliente->agregar_informacionFinanciera();
}elseif(isset($_POST['idCliente'])){
  $id=$_POST['idCliente'];
  $cliente->UnicoCliente($id);
}