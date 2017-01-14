<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php 
session_start(); ?>
    <html>

    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>News</title>
        <link rel="stylesheet" href="tmdb.css"> </head>
    <?php

        
        $veza = new PDO("mysql:dbname=spirala4;host=localhost;charset=utf8", "spirala4user", "password");
        
$veza->exec("set names utf8");
    
     $rezultat = $veza->query("select id, naslov, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor from vijesti order by vrijeme desc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
     foreach ($rezultat as $vijest) {
         echo '<div class="red ">
            <div class="kolona dva crna ">
            <h2>'.$vijest['id'].'</h2>
                <h2>'.$vijest['naslov'].'</h2>
                <p class="link">'.$vijest['tekst'].'</p>
            </div>';
         $id=$vijest['id'];
         $komentari=$veza->query("select * from komentar where autor='$id'");
         if (!$komentari)
         {
          $greska = $veza->errorInfo();
          print "SQL greška: komentar " . $greska[2];
          exit();
         }
         foreach($komentari as $comm)
             echo '<div class="red ">
            <div class="kolona dva crna ">
            <p>'.$comm['tekst'].'</p>
            </div>';
     }
    
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
        </div>
        <div class="red login ">
            <ul>
                <ul>
                    <h2>Dodaj komentar</h2>
                </ul>
                <form method="post" action="dodajKomentar.php" name="edit">
                    <input type="text" placeholder="ID komentara" name="id">
                    <input type="text" placeholder="Komentar" name="text" id="naslov">
                    <input type="submit" name="edit" value="Dodaj komentar"> </form>
            </ul>
        </div>
        ';
        
        if (isset($_SESSION['username']) && ($_SESSION['username']=='admin'))
            echo  '<div class="red login ">
            <ul>
                <form method="post" action="prebaci.php" name="prebaci">
                    <input type="submit" name="prebaci" value="Prebaci iz XML u bazu"> </form>
            </ul>
        </div>';
    ?>

            <body>
       </body>

    </html>