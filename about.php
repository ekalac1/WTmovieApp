<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php

$error=false;

if (isset($_POST['myForm']))
    {
        $username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
$password = md5($_POST['password']);

if (file_exists('users/'.$username.'xml'))
{
    $xml = new SimpleXMLElement('users/'.$username.'xml', 0, true);
    if ($password==$xml->password)
    {
        session_start();
        $_SESSION['username']=$username;
        header('Location: index.php');
        die;
    }
}

$error=true;}



?>
    <html>

    <body>
        <div class="red login ">
            <ul>
                <form method="post" name="myForm">
                        <input type="submit" onclick="login.php"><a href="login.php">Login</a> </form>
                <a>
                    <input type="submit" value="Registracija" onclick='reloadPage("registration.html")'> </a>
            </ul>
            <ul>
                <p id="valtext"></p>
            </ul>
        </div>
        <div class="red">
            <div class="kolona cetri">
                <p> The Movie Database (TMDb) was started as a side project in 2008 to help the media center community serve high resolution posters and fan art. What started as a simple image sharing community has turned into one of the most actively user edited movie database on the Internet.
                    <br>With an initital data contribution from a project called omdb (thank you!), the goal was to create our own product and service. We launched the first version of the database in early 2009. Along with the website we also launched one of first and only free movie data API's.
                    <br> Today, our service is used by tens of millions of people every week and is often regarded as the single best place to get movie data and images. Whether you're interested in personal movie and TV recommendations, what movies have won the Oscar for best picture, maintaining a personal watchlist, or like to develop applications of your own, we hope you'll love everything our service has to offer.
                    <br> So explore a little. Search for your favorite movie. Build a list of movies you want to watch. We're really proud of the service we've built and hope you find it as useful as we do. </p>
            </div>
        </div>
    </body>

    </html>