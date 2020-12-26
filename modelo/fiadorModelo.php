<?php

require '../core/conexion.php';


class fiadorModelo {
    protected function agregar_fiadorModelo($datos){
        $sql=conectar()->prepare("INSERT INTO fiador(nombre, direccion, dui, nit, correo, profesion, salario,telefono_fiador) VALUES (:nombre, :direccion,:dui,:nit,:correo,:profesion,:sueldo,:telefono)");

        $sql->bindParam(":nombre",$datos['nombre']);
        $sql->bindParam(":direccion",$datos['direccion']);
        $sql->bindParam(":dui",$datos['dui']); 
        $sql->bindParam(":nit",$datos['nit']);
        $sql->bindParam(":correo",$datos['correo']);
        $sql->bindParam(":profesion",$datos['profesion']);
        $sql->bindParam(":sueldo",$datos['sueldo']);
        $sql->bindParam(":telefono",$datos['telefono']);
        $sql->execute();
        return $sql;
     }

    protected function mostrar_FiadorModelo(){
         $query=conectar()->prepare("SELECT * FROM fiador");
         $query->execute();
         return $query;
    }

    protected function  eliminar_fiadorModelo($id){
     $query=conectar()->prepare("DELETE FROM fiador WHERE idfiador=$id");
     $query->execute();
   return $query;
    }

  protected function modificar_FiadorModelo($datos){
   $sql=conectar()->prepare("UPDATE fiador SET nombre=:nombre,direccion=:direccion,dui=:dui,nit=:nit,correo=:correo,profesion=:profesion,salario=:sueldo,telefono_fiador=:telefono WHERE idfiador =:Id");
        $sql->bindParam(":nombre",$datos['nombre']);
        $sql->bindParam(":direccion",$datos['direccion']);
        $sql->bindParam(":dui",$datos['dui']); 
        $sql->bindParam(":nit",$datos['nit']);
        $sql->bindParam(":correo",$datos['correo']);
        $sql->bindParam(":profesion",$datos['profesion']);
        $sql->bindParam(":sueldo",$datos['sueldo']);
        $sql->bindParam(":telefono",$datos['telefono']);
        $sql->bindParam(":Id",$datos['Id']);
        $sql->execute();
        return $sql;
   }

 }

