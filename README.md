# WTmovieApp

##Spirala 4

Kreirana je baza sa 3 tabele, vijest, komentar i autor, i sada je na stranici omogućeno registrovanje te dodavanje članaka , brisanje i uređivanje. Takođe, samo admin može vidjeti button PREBACI IZ XML U SQL. Pokušala sam ne duplirati podatke, tako što sam koristila COUNT za naslove, ali COUNT uvijek vraća nulu, kao da naslova nema u bazi (a ima). 
Takođe, sve što je prije radilo sam XML, sada radi sa bazom. SQL injection nije posvećena neka posebna pažnja, osim što se password ne čuva u izvornom obliku nego kao MD5 hash. 
Pokušala sam deploy na openShift. Kreiram projekat, i sql i wtmovieapp, otvorim phpmyadmin, i onda mi kaze da nemam privilegije da importujem bazu. 
Pokušala sam i servis, ali...
http://wtmovieapp-wtapp.44fs.preview.openshiftapps.com/

Spirala 3

Urađeno je učitavanje iz xml, dodavanje novih vijesti, brisanje i uređivanje postojećih. Takođe , generiše se pdf i csv sa vijestima. Search je pokušan, al nešto neće.
Bugovi: nije urađena validacija preko php(sta imam validirati kad se samo admin može logovati)
pdf fajl se nekako cudno generise, odnosno ne pređe u novu liniju tekst nego nastavlja u istoj liniji. Takođe, pdf se ne spasi, (bar kod mene), nego se samo prikaže (valjda je to to. ) 
CRUD operacije se nalaze na dnu news podstranice, a logovati se može preko about podstranice. Search je odvojen, u search.php fajlu. Malo mi je izgled stranice narušen, al eto. 

OpenShift: 

http://wtmovieapp-wtmovieapp.44fs.preview.openshiftapps.com/

Elza Kalač, 16944

Stranica aplikacije MovieApp, koja omogućava korisniku da pretražuje i otkriva popularne filmove i serije (nešto kao stranica instagram.com za Instagram aplikaciju. )

Šta je urađeno?
Skice za svih pet podstranica(za desktop i mobilne uređaje)
Forme za login i registraciju , i feedback nakon FAQ. 
Implementirane su sve podstranice, korišten je grid view, a za mobilne uređaje korišten je media query. 
Postoji meni na kojem su linkovi na sve podstranice. 

Šta je urađeno, spirala 2?  
DropDown meni, reload stranica, validacija formi, te na Movie podstranici, kada se klikne na sliku, ona se raširi, a na esc pojavi se stari sadržaj. 

-Bug(možda)
Slika se pojavljuje ispod menija, a ne preko cijelog ekrana. 


Lista fajlova  
Slike/... - Slike korištene u izradi  
Skice/... - Skice stranice i podstranica  
MovieApp.html - Home page stranice  
News.html - Novosti iz svijeta filma  
Contact.html - FAQ (forma na dnu)
About.html - O stranici MovieApp  
tmdb.css - css fajl stranice     
registration.html - Registracija(forma)

