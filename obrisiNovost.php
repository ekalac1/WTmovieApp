<?php


    $xml = new DomDocument("1.0", "UTF-8");
    $xml->load("vijesti.xml");

    
    $name =$_POST['naslov'];
   
    $xpath=new DOMXPATH($xml);
    foreach($xpath->query("/vijesti/vijest[title= '$name']") as $node)
    {
        $node->parentNode->removeChild($node);
    }
    
    
    $xml->formatoutput=true;
    $xml->save('vijesti.xml');

header('Location: index.php');

?>