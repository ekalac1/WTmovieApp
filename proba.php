  <?php

/*$xmlDoc = new DOMDocument();
$xmlDoc->load("vijesti.xml");

$x=$xmlDoc->getElementsByTagName('vijest'); */
$xml=simplexml_load_file("vijesti.xml") or die("Greška!");

//for ($i=0; $i<$x->length; $i=$i+2) {
// provjeriti da li je paran broj elemenata
echo '<div class="red ">
            <div class="kolona dva crna ">
                <h2>'.$xml->vijest[1]->title.'</h2>
                <p class="link">'.$xml->vijest[1]->link.'</p>
            </div>
            <div class="kolona dva crna ">
                <h2>'.$xml->vijest[2]->title.'</h2>
                <p class="link">'.$xml->vijest[2]->link.'</p>
            </div>
        </div>';
//}

?>