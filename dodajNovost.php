<?php

if (isset($_POST['insert']))
{
    $xml = new DomDocument("1.0", "UTF-8");
    $xml->load("vijesti.xml");

    
    $name =$_POST['naslov'];
    $adresa=$_POST['adresa'];
    
    $rootTag = $xml->getElementsByTagName("vijesti")->item(0);
    
    $infoTag = $xml->createElement("vijest");
    $naslovTag = $xml->createElement("title" ,$name);
    $linkTag = $xml->createElement("link" ,$adresa);
    
    $infoTag->appendChild($naslovTag);
    $infoTag->appendChild($linkTag);
    
    $rootTag->appendChild($infoTag);
    $xml->save('vijesti.xml');
    
    header('Location: index.php');
}

?>