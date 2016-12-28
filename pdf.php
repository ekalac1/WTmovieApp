<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

 $xmlDoc = new DOMDocument();
$xmlDoc->load("vijesti.xml");

$x=$xmlDoc->getElementsByTagName('vijest'); 
$xml=simplexml_load_file("vijesti.xml") or die("Greška!");

for ($i=0; $i<$x->length; $i=$i+1)
{
$pdf->Cell(40,10,$xml->vijest[$i]->title);
$pdf->Ln(); 
    $pdf->Cell(40,10,$xml->vijest[$i]->li);
$pdf->Ln(); 
}

$pdf->Output();
?>