<?php 
session_start(); ?>
<?php
    $vijestID = $_POST['id'];
    $komentar = $_POST['text'];
 $username=$_SESSION['username'];

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

$rezultat = $veza->query ('INSERT INTO komentar '.
 '(vijest,autor,tekst) '.
 'VALUES ("'.$vijestID.'", "'.$id.'", "'.$komentar.'")');
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
    else header('Location: index.php');

?>