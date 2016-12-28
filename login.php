<?php

$error=false;

if (isset($_POST["myForm"]))
{

$username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
$password = md5($_POST['password']);

if (file_exists('users/test.xml'))
{
    $xml = new SimpleXMLElement('users/test.xml', 0, true);
    
    if ($username==$xml->username)
    if ($password==$xml->password)
    {
        session_start();
        $_SESSION['username']=$username;
        header('Location: index.php');
        die;
    }
}
    else {
        echo 'greska u ucitavanju';
    }

$error=true;
}

?>

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