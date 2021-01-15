<?php

require '../core/conexion.php';


class proveedorModelo {

   protected function agregar_proveedorModelo($datos){
        $sql=conectar()->prepare("INSERT INTO proveedor(nombre,direccion,telefono,representante,dui,nit, celular,correo) VALUES(:nombrep,:direccionp,:telefonop,:representantep,:duip,:nitp, :celularp,:correop)");

        $sql->bindParam(":nombrep",$datos['nombrep']);
        $sql->bindParam(":direccionp",$datos['direccionp']);
        $sql->bindParam(":telefonop",$datos['telefonop']);
        $sql->bindParam(":representantep",$datos['representantep']);
        $sql->bindParam(":duip",$datos['duip']); 
        $sql->bindParam(":nitp",$datos['nitp']);
        $sql->bindParam(":celularp",$datos['celularp']);
        $sql->bindParam(":correop",$datos['correop']);
        $sql->execute();
        return $sql;
     }

    protected function mostrar_proveedorModelo(){
         $query=conectar()->prepare("SELECT * FROM proveedor");
         $query->execute();
         return $query;
    }

     protected function  eliminar_proveedorModelo($id){
     $query=conectar()->prepare("DELETE FROM proveedor WHERE idproveedor=$id");
     $query->execute();
   return $query;
    }

      protected function modificar_proveedorModelo($datos){
   $sql=conectar()->prepare("UPDATE proveedor SET nombre=:Nombrepm, direccion=:Direpm, telefono=:Telefonopm,representante=:Reprepm,dui=:Duipm,nit=:Nitpm,celular=:Celupm,correo=:Correopm WHERE idproveedor =:Id");
        $sql->bindParam(":Nombrepm",$datos['Nombrepm']);
        $sql->bindParam(":Direpm",$datos['Direpm']);
        $sql->bindParam(":Telefonopm",$datos['Telefonopm']);
        $sql->bindParam(":Reprepm",$datos['Reprepm']);
        $sql->bindParam(":Duipm",$datos['Duipm']);
        $sql->bindParam(":Nitpm",$datos['Nitpm']);
        $sql->bindParam(":Celupm",$datos['Celupm']);
        $sql->bindParam(":Correopm",$datos['Correopm']);
        $sql->bindParam(":Id",$datos['Id']);
        $sql->execute();
        return $sql;
   }


}