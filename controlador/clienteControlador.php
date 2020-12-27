
<?php  

require_once "../modelo/clienteModelo.php";

class clienteControlador extends clienteModelo{

public function agregar_cliente(){
	    $nombre=$_POST['nombreC'];
	    $direccion=$_POST['direccionC'];
	    $dui=$_POST['duiC'];
	    $nit=$_POST['nitC'];
	    $profesion=$_POST['profesionC'];
	    $telefono=$_POST['telefonoC'];
	    $sueldo=$_POST['sueldoC'];
	    $correo=$_POST['email'];
	    $tipoingreso=$_POST['tipoIngresoC'];
	    $celular=$_POST['celularC'];
	    $observaciones=$_POST['observacionesC']; 
	    $idcartera=1;
	        
  $datosClientes=[
        "nombre"=>$nombre,
        "direccion"=>$direccion,
        "dui"=>$dui,
        "nit"=>$nit,
        "correo"=>$correo,
        "profesion"=>$profesion,
        "sueldo"=>$sueldo,
        "telefono"=>$telefono,
        "tipoingreso"=>$tipoingreso,
        "celular"=>$celular,
        "observaciones"=>$observaciones,
        "idcartera"=>$idcartera,
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
	     $jsonstring=json_encode($alerta);
	     echo $jsonstring;
  }

}

$cliente=new clienteControlador();
if(isset($_POST['nombreC'])){
  $cliente->agregar_cliente();
}