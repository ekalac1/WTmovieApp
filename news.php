<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php 
session_start(); ?>
    <html>

    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>News</title>
        <link rel="stylesheet" href="tmdb.css"> </head>
    <?php

$xmlDoc = new DOMDocument();
$xmlDoc->load("vijesti.xml");

$x=$xmlDoc->getElementsByTagName('vijest'); 
$xml=simplexml_load_file("vijesti.xml") or die("Greška!");

for ($i=0; $i<$x->length; $i=$i+1) {
echo '<div class="red ">
            <div class="kolona dva crna ">
                <h2>'.$xml->vijest[$i]->title.'</h2>
                <p class="link">'.$xml->vijest[$i]->link.'</p>
            </div>';

}

?>
        <?php
    
    if (isset($_SESSION['username']))
    echo ' <div class="red login ">
         <form method="post" action="logout.php" name="logout">
                    <input type="submit" name="logout" value="Logout"> 
                    </form> </div>
                    
                    <div class="red login ">
                    <form method="post" action="csv.php" name="csv">
                    <input type="submit" name="csv" value="Generate CSV file"> </form> </div>
         <div class="red login ">
                    <form method="post" action="fpdf/pdf.php" name="pdf">
                    <input type="submit" name="pdf" value="Generate PDF file"> </form> </div>
    
     <div class="red login ">
            <ul>
                <ul>
                    <h2>Dodaj vijest</h2>
                </ul>
                <form method="post" action="dodajNovost.php" name="insert">
                    <input type="text" placeholder="Naslov vijesti" name="naslov"id="naslov">
                    <input type="text" placeholder="Link vijesti" name="adresa"id="link">
                    <input type="submit" name="insert" value="Dodaj vijest"> </form>
            </ul>
        </div>
     <div class="red login ">
            <ul>
                <ul>
                    <h2>Obrisi vijest</h2>
                </ul>
                <form method="post" action="obrisiNovost.php" name="delete">
                    <input type="text" placeholder="Naslov vijesti" name="naslov"id="naslov">
                    <input type="submit" name="delete" value="Obrisi odabranu vijest"> </form>
            </ul>
        </div>
    
    <div class="red login ">
            <ul>
                <ul>
                    <h2>Uredi vijest</h2>
                </ul>
                <form method="post" action="urediNovost.php" name="edit">
                    <input type="text" placeholder="Naslov vijesti koju zelite promjeniti" name="naslov"id="naslov">
                    <input type="text" placeholder="Novi naslov vijesti(ostavite prazno ukoliko ne zelite mjenjati)" name="naslovnova"id="naslov">
                    <input type="text" placeholder="Novi link vijesti (ostavite prazno ukoliko ne zelite mjenjati)" name="linknova"id="naslov">
                    <input type="submit" name="edit" value="Promjeni odabranu vijest"> </form>
            </ul>
        </div>';
    ?>

            <body>
       </body>

    </html>