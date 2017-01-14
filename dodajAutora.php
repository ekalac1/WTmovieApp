<?php
    $username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
    $password = md5($_POST['password']);
    $email = $_POST['email'];

$veza = new PDO("mysql:dbname=spirala4;host=localhost;charset=utf8", "spirala4user", "password");
$veza->exec("set names utf8");

if ($username=="") echo "Username ne može biti prazan <br>";
else if ($password="") echo "Password ne može biti prazan";
else 
{    
  $rezultat = $veza->query ('INSERT INTO autor '.
 '(username,password,email) '.
 'VALUES ("'.$username.'", "'.$password.'", 1)');
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
    else header('Location: index.php');  
}



?>