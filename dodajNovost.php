<?php 
session_start(); ?>
<?php

if (isset($_POST['insert']))
{
    $xml = new DomDocument("1.0", "UTF-8");
    $xml->load("vijesti.xml");

    
    $name =$_POST['naslov'];
    $adresa=$_POST['adresa'];
    
    $username=$_SESSION['username'];
    
    $id=0;
    
   $veza = new PDO("mysql:dbname=spirala4;host=localhost;charset=utf8", "spirala4user", "password");
$veza->exec("set names utf8");
    
    $autori =$veza->query("SELECT * from autor where username='$username' order by id");
    if (!$autori)
    {
         $greska = $veza->errorInfo();
          print "SQL greška autora: " . $greska[2];
          exit();
    }
    else 
    {
        foreach($autori as $autor)
        {
         $id=$autor['id']; 
        }
    }
    
    $rezultat = $veza->query ('INSERT INTO vijesti '.
 '(naslov,tekst,autor) '.
 'VALUES ("'.$name.'", "'.$adresa.'", "'.$id.'")');
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
    else header('Location: index.php');
    
  //  header('Location: index.php');
}

?>