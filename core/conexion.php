<?php
const SERVER="localhost";
  const DB="comercial";
  const USER="root";
  const PASS="";
 
  const SGBD="mysql:host=".SERVER."; dbname=".DB;
 
 const METHOD="AES-256-CBC";
 const SECRET_KEY='$BP@2017';
 const  SECRET_IV='101712';

  function conectar(){
    $enlace=new PDO(SGBD,USER,PASS);
          return $enlace;
  }

function ejecutar_consulta_simple($consulta){
    $respuesta=conectar()->prepare($consulta);
     $respuesta->execute();
     return $respuesta;

}



 
