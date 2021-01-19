<?php
require('../fpdf/fpdf.php');
require('../../core/conexion.php');




class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->SetFillColor(42, 63, 84);
    $this->Rect(28,4,117,11,'F');


    $this->Rect(150,6,35,18,'');
    $this->SetFont('Arial','B',12);
    $this->SetXY(153,6);
    $this->Cell(30,10,utf8_decode('Factura'),0,0,'C');
    
    $this->SetFont('Arial','B',12);
    $this->SetXY(152,16);
    $this->SetTextColor(220,39,10);
      $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
 $id=explode('?',$url); 
      $fechaVenta=ejecutar_consulta_simple("SELECT codigo FROM venta  WHERE idventa = $id[1]");
    $fechaVenta=$fechaVenta->fetch(PDO::FETCH_ASSOC);
     $codigo= $fechaVenta['codigo'];
    $this->Cell(10,8,utf8_decode('N°'),0,0,'C');
    $this->Cell(20,8,$codigo,0,0,'C');

    // Logo
   // $this->Image('../../extras/img/logo22.png',7,1,20);
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    $this->SetTextColor(254,254,254);
    // Movernos a la derecha
    $this->Cell(18);
    // Título
    $this->SetXY(28,5);
    $this->Cell(117,10,utf8_decode('COMERCIAL S.A de C.V'),0,1,'C');
   
    $this->Ln(3);
    $this->SetFont('Arial','',9);
    $this->SetTextColor(0,0,0);
    $this->Cell(30);
    $this->Cell(90,7,utf8_decode('  8a. calle poniente, # 29, Barrio San Juan de Dios'),0,1,'C');
    $this->SetFont('Arial','B',9);
    $this->Cell(40);
    $this->Cell(7,7,'Tel:',0,0,'',0);
    $this->Cell(30,7,'2354-6654',0,0,'',0);
    $this->SetFont('Arial','B',10);
    $this->Cell(15,7,'Fecha:',0,0,'C',0);
    $this->SetFont('Arial','',9);

 
      $fechaVenta=ejecutar_consulta_simple("SELECT fecha FROM venta  WHERE idventa = $id[1]");
    $fechaVenta=$fechaVenta->fetch(PDO::FETCH_ASSOC);
     $fecha= $fechaVenta['fecha'];

    $this->Cell(75,7,date("d-m-Y", strtotime($fecha)),0,1,'',0);

}

// Pie de página
function Footer()
{
  
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  //  $this->Cell(7,7,'Tel:',0,0,'',0);
}

}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('Landscape',array(162,198));
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,7,'Datos Cliente',0,1,'',0);


  $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
 $id=explode('?',$url); 
      $fechaVenta=ejecutar_consulta_simple("SELECT c.nombrecliente,c.telefono FROM venta AS v INNER JOIN clientes AS c ON v.idcliente = c.idcliente WHERE v.idventa= $id[1]");
     $fechaVenta=$fechaVenta->fetch(PDO::FETCH_ASSOC);
     $cliente= $fechaVenta['nombrecliente'];
     $telefono= $fechaVenta['telefono'];


$pdf->SetFont('Arial','',10);
$pdf->Cell(18,7,'Cliente:',0,0,'C',0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(90,7,$cliente,0,0,'',0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(12,7,'Tel:',0,0,'',0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(40,7,$telefono,0,1,'',0);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(93,8,'CONCEPTO',1,0,'C');
$pdf->Cell(20,8,'UNIDAD',1,0,'C');
$pdf->Cell(23,8,'P. UNITARIO',1,0,'C');
$pdf->Cell(23,8,'DESCUENTO',1,0,'C');
$pdf->Cell(20,8,'TOTAL',1,1,'C');
$pdf->SetFont('Arial','',9);

$pdf->SetFillColor(0,123,255);


$pdf->Rect(10,54,179,50,'');

 $expediente="SELECT producto.nombreproducto,detalleventa.cantidad,detalleventa.precioventa,( detalleventa.cantidad * detalleventa.precioventa ) AS total  FROM detalleventa INNER JOIN producto ON detalleventa.idproducto = producto.idproducto WHERE detalleventa.idventa = $id[1]";
    $conexion=conectar();
       $datos=$conexion->query($expediente);
       $datos=$datos->fetchAll();
       if($datos>=1){
    foreach($datos as $row){


$pdf->Cell(93,9,$row['nombreproducto'],0,0,'C');
$pdf->Cell(20,9,$row['cantidad'],0,0,'C');
$pdf->Cell(23,9,$row['precioventa'],0,0,'C');
$pdf->Cell(23,9,0,0,0,'C');
$pdf->Cell(20,9,$row['total'],0,1,'C');
}

}

$pdf->Ln(2);
$pdf->SetFillColor(0,123,255);


$pdf->Rect(130,105,60,32,'');

    $pdf->SetXY(10,105);

$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(20,8,'',0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,8,'Descuento:',0,0,'R');
$pdf->SetFont('Arial','',9);
//dato
$pdf->Cell(40,8,'0',0,1,'C');


      $subtotal=ejecutar_consulta_simple("SELECT sum( detalleventa.cantidad * detalleventa.precioventa )as total FROM detalleventa  WHERE detalleventa.idventa = $id[1]");
     $subtotal=$subtotal->fetch(PDO::FETCH_ASSOC);
     $subtotalventa= $subtotal['total'];
  

$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(20,8,'',0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,8,'Sub Total: ',0,0,'R');
$pdf->SetFont('Arial','',9);
//dato
$pdf->Cell(40,8,$subtotalventa,0,1,'C');

$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(20,8,'',0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,8,'IVA(%13): ',0,0,'R');
$pdf->SetFont('Arial','',9);
//dato
$iva=$subtotalventa * 0.13;
$pdf->Cell(40,8,$iva,0,1,'C');
$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(20,8,'',0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,8,'Total $',0,0,'R');
$pdf->SetFont('Arial','',9);
//dato
$totalFinal =$subtotalventa + $iva;
$pdf->Cell(40,8,$totalFinal,0,1,'C');
$pdf->Line(10,152,192,152);

$pdf->Output();
?>