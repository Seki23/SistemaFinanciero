<?php

require '../core/conexion.php';


class cargoModelo {

   protected function agregar_cargoModelo($datos){
        $sql=conectar()->prepare("INSERT INTO cargo(cargo,salario) VALUES(:nombrecar,:salariocar)");

        $sql->bindParam(":nombrecar",$datos['nombrecar']);
        $sql->bindParam(":salariocar",$datos['salariocar']);
        $sql->execute();
        return $sql;
     }

    protected function mostrar_cargoModelo(){
         $query=conectar()->prepare("SELECT * FROM cargo");
         $query->execute();
         return $query;
    }

    protected function  eliminar_cargoModelo($id){
     $query=conectar()->prepare("DELETE FROM cargo WHERE idcargo=$id");
     $query->execute();
     return $query;
    }

     protected function modificar_cargoModelo($datos){
   $sql=conectar()->prepare("UPDATE cargo SET cargo=:NomCargo, salario=:Salario WHERE idcargo =:Id");
        $sql->bindParam(":NomCargo",$datos['NomCargo']);
        $sql->bindParam(":Salario",$datos['Salario']);
        $sql->bindParam(":Id",$datos['Id']);
        $sql->execute();
        return $sql;
   }

}