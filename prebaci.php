  <?php

//kako to da ne bude kopija??

$veza = new PDO("mysql:dbname=spirala4;host=localhost;charset=utf8", "spirala4user", "password");
$veza->exec("set names utf8");
$veza->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

$xmlDoc = new DOMDocument();
$xmlDoc->load("vijesti.xml");

$x=$xmlDoc->getElementsByTagName('vijest'); 
$xml=simplexml_load_file("vijesti.xml") or die("Greška!");

for ($i=0; $i<$x->length; $i=$i+1)
{
    $naslov=$xml->vijest[$i]->title;
    $vijesti=$veza->prepare("select count(*) from vijesti");
    $temp= $vijesti->fetchColumn();
    echo $xml->vijest[$i]->title, " " ;
    echo $temp, "<br>";  
    if ($temp==0)
    {
         $rezultat = $veza->query ('INSERT INTO vijesti '.'(naslov,tekst,autor) 
         '.'VALUES ("'.$xml->vijest[$i]->title.'", "'.$xml->vijest[$i]->link.'", 1)');
         if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
    else header('Location: index.php');
    }


}
?>

