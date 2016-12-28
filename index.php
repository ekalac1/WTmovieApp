<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>TheMovieApp</title>
    <link rel="stylesheet" href="tmdb.css">
    <script src="script.js"></script>
</head>

<body onload='reloadPage("movieApp.php")'>
    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Dropdown</button>
        <div id="myDropdown" class="dropdown-content">
            <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()"> <a href="#about">Movie</a> <a href="#base">News</a> <a href="#blog">Main</a> <a href="#contact">Contact</a> <a href="#custom">FAQ</a> </div>
    </div>
    <div class="red meni">
        <ul>
            <li onclick='reloadPage("tmdb.php")'><a>Movie</a></li>
            <li onclick='reloadPage("news.php")'><a>News</a></li>
            <li onclick='reloadPage("movieApp.php")'>
                <a><img class="movie" src="Slike/movie.svg" alt="neki_tekst "></a>
            </li>
            <li onclick='reloadPage("about.php")'><a>About</a></li>
            <li onclick='reloadPage("contact.php")'> <a>FAQ</a></li>
        </ul>
    </div>
    <div id="ex_image"> <img id="large"> </div>
    <div id="context"> </div>
</body>

</html>