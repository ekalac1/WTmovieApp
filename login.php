<?php

$error=false;

if (isset($_POST["myForm"]))
{

$username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
$password = md5($_POST['password']);
      
$veza = new PDO("mysql:dbname=spirala4;host=localhost;charset=utf8", "spirala4user", "password");
$veza->exec("set names utf8");
    
    $rezultat = $veza->query("select * from autor where username='$username' order by id");
      if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
    else {
        foreach($rezultat as $autor)
        {
            if ($autor['password']==$password)
            {
                 session_start();
                $_SESSION['username']=$username;
                header('Location: index.php'); 
            }
        }
        echo "Neispravan username ili password";
    } 
}
?>
    <html>
    <body>
        <div class="red login ">
            <ul>
                <form method="post" action="login.php" name="myForm">
                    <input type="text" placeholder="Username" name="username" id="username">
                    <input type="text" placeholder="Password" name="password" id="password">
                    <?php
                if ($error){
                    echo '<p>Invalid username or password</p>';
                }
                ?>
                        <input type="submit" value="Login" name="myForm"> </form>
            </ul>
        </div>
    </body>

    </html>