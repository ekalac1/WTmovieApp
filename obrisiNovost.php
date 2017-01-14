<?php

    $veza = new PDO("mysql:dbname=spirala4;host=localhost;charset=utf8", "spirala4user", "password");
    $veza->exec("set names utf8");
    
    $name =$_POST['naslov'];

    $rezultat = $veza->query("delete from vijesti 
    where naslov='$name' order by id desc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška:  " . $greska[2];
          exit();
     }
   
header('Location: index.php');

?>