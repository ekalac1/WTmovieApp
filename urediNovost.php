<?php


$staraVijestNaslov =$_POST['naslov'];
$novaVijestNaslov =$_POST['naslovnova'];
$novaVijestLink =$_POST['linknova'];

$veza = new PDO("mysql:dbname=spirala4;host=localhost;charset=utf8", "spirala4user", "password");
$veza->exec("set names utf8");

if ($novaVijestNaslov!="")
{
$rezultat = $veza->query("update vijesti 
set naslov='$novaVijestNaslov'
where naslov='$staraVijestNaslov' order by id desc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška:  " . $greska[2];
          exit();
     }
}
else if ($novaVijestLink!="")
{
    $rezultat = $veza->query("update vijesti 
set tekst='$novaVijestLink'
where naslov='$staraVijestNaslov' order by tekst desc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: 2 " . $greska[2];
          exit();
     }
}

header('Location: index.php');


?>