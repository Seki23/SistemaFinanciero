<?php 
class vistasModelo{
	protected function obtener_vistas_modelo($vistas){
        $listaVistas=["inicio","fiador","tablaFiador","clientes"];

         
       if(in_array($vistas,$listaVistas)){
            if(is_file("./vistas/production/".$vistas."-vis.php")){
              $contenido="./vistas/production/".$vistas."-vis.php";
            }

        }elseif($vistas=="login"){
           $contenido="login";
        }elseif ($vistas=="index") {
            $contenido="login";
        }else{
            $contenido="404";
        }
        return $contenido;
    }
}