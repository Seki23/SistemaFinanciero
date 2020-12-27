<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Comercial! | </title>
   <?php include "build/styles.php"; ?>

</head>


<?php

require_once "./controlador/vistasControlador.php";
$vt=new vistasControlador();
$vistasR=$vt->obtener_vistas_controlador();

if($vistasR=="login" || $vistasR=="404"):
  if($vistasR=="login"){
    require_once "production/login.php";
  }else{
        require_once "production/404.php";
  }
  
else:
 ?>



<body class="nav-md">
  <div class="container body">
    <div class="main_container">
   
      <?php require_once "modulos/navbarLateral.php"; ?>
      <?php require_once "modulos/navbar.php"; ?>


       <!-- CONTENIDO DE LA PLANTILLA-->

      <?php
         require_once $vistasR;
      ?>

      <?php require_once "modulos/footer.php"; ?>

       <!-- CONTENIDO DE LA PLANTILLA-->
     <?php endif; ?>
   </div>
  </div>

   <?php include "build/scripts.php"; ?>
   <?php include "build/ajaxScript.php"; ?>


</body>

</html>
