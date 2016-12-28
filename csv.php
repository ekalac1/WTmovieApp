<?php
    header("Content-type: application/csv");
    header("Content-Disposition: attachment; Filename=file.csv");

    $xmlDoc = new DOMDocument();
$xmlDoc->load("vijesti.xml");

$x=$xmlDoc->getElementsByTagName('vijest'); 
$xml=simplexml_load_file("vijesti.xml") or die("Greška!");

for ($i=0; $i<$x->length; $i=$i+1) {
echo $xml->vijest[$i]->title;
 echo $xml->vijest[$i]->link;}


?>