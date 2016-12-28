<?php
$output='';
	if(isset($_POST['submitSearch'])){
		$pretraga = htmlEntities($_POST['search'], ENT_QUOTES);
		$files=glob('vijesti/*.xml');
	foreach($files as $file){
		$xml=new SimpleXMLElement($file,0,true);
		$fname=$xml->title;
		$lname=$xml->link;
		if($pretraga=='')
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
		}
		elseif(strpos(strtolower($fname), strtolower($pretraga))!==false || strpos(strtolower($lname),strtolower($pretraga))!==false)
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
		}
	}
}
?>
    <html>

    <head> </head>

    <body>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript">
            function searchq() {
                var searchTxt = $("input[name='search']").val();
                $.post("pretrazi.php", {
                    searchVal: searchTxt
                }, function (output) {
                    $("#output").html(output);
                });
            }
        </script>
        <script type="text/javascript">
            function prikaziSve() {
                var searchTxt = $("input[name='search']").val();
                $.post("pretrazi1.php", {
                    searchVal: searchTxt
                }, function (output) {
                    $("#output").html(output);
                });
            }
        </script>
        <form action="search.php" method="post" name="searchVal">
            <input type="text" name="search" onkeyup="searchq();">
            <input type="button" name="submitSearch" value="Search" onclick="prikaziSve();"> </form>
        <div id="output"> </div>
    </body>

    </html>