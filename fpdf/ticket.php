<?php
$id = $_POST["id"];

$con=mysqli_connect("localhost","root","Admin","Proyecto_Progra04");

$consulta = "SELECT * FROM apuestas where Id_bet = $id";
$resultado = mysqli_query($con, $consulta);



	# Incluyendo librerias necesarias #
    require "./code128.php";

    $pdf = new PDF_Code128('P','mm',array(80,195));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();
    
    # Encabezado y datos de la empresa #
    $pdf->Ln(5);
    $pdf->SetFont('Arial','B',13);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Sorteo.com")),0,'C',false);
    $pdf->Ln(5);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,utf8_decode("Dirección: San José, Costa Rica"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Email: sorteo@gmail.com"),0,'C',false);

    $pdf->Ln(3);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(8);

    $pdf->MultiCell(0,5,utf8_decode("Fecha: ".date("d/m/Y", strtotime("13-09-2023"))." ".date("h:s A")),0,'C',false);
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Factura # " .$id)),0,'C',false);
    $pdf->SetFont('Arial','',9);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(8);


    $pdf->MultiCell(0,5,utf8_decode("Cliente: Pablo"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Cédula: 50-674-123"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Apuesta: Coco"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Número: 45"),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(4);

    # Tabla de productos #
    $pdf->Cell(10,5,utf8_decode("Cant."),0,0,'C');
    $pdf->Cell(19,5,utf8_decode("Precio"),0,0,'C');
    $pdf->Cell(28,5,utf8_decode("Total"),0,0,'C');

    $pdf->Ln(4);
    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    /*----------  Detalles de la tabla  ----------*/

    $pdf->Cell(10,4,utf8_decode("1"),0,0,'C');
    $pdf->Cell(19,4,utf8_decode(" 3.000"),0,0,'C');
    $pdf->Cell(28,4,utf8_decode(" 3.000"),0,0,'C');
    /*----------  Fin Detalles de la tabla  ----------*/

    $pdf->Ln(20);

    $pdf->MultiCell(0,5,utf8_decode("*** Para poder realizar un reclamo o devolución debe de presentar este ticket ***"),0,'C',false);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,utf8_decode("Gracias por su compra"),'',0,'C');

    $pdf->Ln(18);

    # Codigo de barras #
    $pdf->Code128(5,$pdf->GetY(),"COD000001V0001",70,20);
    $pdf->SetXY(0,$pdf->GetY()+21);
    $pdf->SetFont('Arial','',13);
    $pdf->MultiCell(0,5,utf8_decode("COD000001V0001"),0,'C',false);
    
    # Nombre del archivo PDF #
    $pdf->Output("I","Tickets.pdf",true);
    ?>
  