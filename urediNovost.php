<?php

$xml=simplexml_load_file('vijesti.xml');

$i=-1;

$staraVijestNaslov =$_POST['naslov'];
$novaVijestNaslov =$_POST['naslovnova'];
$novaVijestLink =$_POST['linknova'];

foreach($xml->children() as $vijest)
{
    $temp=$vijest->title;
    
    if ($temp==$staraVijestNaslov)
    {
        if($novaVijestNaslov!="")
            $vijest->title=$novaVijestNaslov;
        if($novaVijestLink!="")
            $vijest->link=$novaVijestLink;
        
    }
}
    
    file_put_contents("vijesti.xml", $xml->saveXML());

header('Location: index.php');


?>