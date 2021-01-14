<?php 
    require '../core/conexion.php';

    
    class empleadoModelo{
        
     protected function agregar_empleadosModelo($datos){
            $sql=conectar()->prepare("INSERT INTO empleado(nombre, zona, dui, telefonoempleado, nit, estado, idcargos) VALUES (:nombre,:zona,:dui,:telefono,:nit,:estado,:cargo)");

            $sql->bindParam(":nombre",$datos['nombre']);
            $sql->bindParam(":zona",$datos['zona']);
            $sql->bindParam(":dui",$datos['dui']);
            $sql->bindParam(":telefono",$datos['telefono']);
            $sql->bindParam(":nit",$datos['nit']);
            $sql->bindParam(":estado",$datos['estado']);
            $sql->bindParam(":cargo",$datos['cargo']);
           
            $sql->execute();
            return $sql;
         }


         protected function mostrar_empleadoModelo(){
        $opcion;
        $query=conectar()->prepare("SELECT e.idempleado,e.nombre,e.zona, e.dui, e.telefonoempleado, e.nit, e.estado, ca.cargo FROM empleado e INNER JOIN cargo ca ON e.idcargos = ca.idcargo
            ");
         $query->execute();
         return $query;
        }


        protected function  estado_empleadoModelo($datos){
         $query=conectar()->prepare("UPDATE empleado SET estado=:Estado WHERE idempleado=:Id");
         $query->bindParam(":Estado",$datos['Estado']);
         $query->bindParam(":Id",$datos['Id']);
         $query->execute();
         return $query;
        }


       protected function modificar_empleadoModelo($datos){
   $sql=conectar()->prepare("UPDATE empleado SET nombre=:nombre,zona=:zona,dui=:dui,telefonoempleado=:telefono,nit=:nit,idcargos=:cargo WHERE idempleado = :Id");
    $sql->bindParam(":nombre",$datos['nombre']);
    $sql->bindParam(":zona",$datos['zona']);
    $sql->bindParam(":dui",$datos['dui']);
    $sql->bindParam(":telefono",$datos['telefono']);
     $sql->bindParam(":nit",$datos['nit']);
    $sql->bindParam(":cargo",$datos['cargo']);
   $sql->bindParam(":Id",$datos['Id']);
   $sql->execute();
   return $sql;
 }

        
    }


