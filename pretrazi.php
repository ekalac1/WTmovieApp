<?php
$output='';
	if(isset($_POST['searchVal'])){
		$pretraga = htmlEntities($_POST['searchVal'], ENT_QUOTES);
		$files=glob('vijesti/*.xml');
		$brojac=1;
	foreach($files as $file){
		if($brojac>10) break;
		$xml=new SimpleXMLElement($file,0,true);
		$fname=$xml->title;
		$lname=$xml->link;
		$fullName=$fname.' '.$lname;
		if($pretraga=='')
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
			$brojac=$brojac+1;
		}
		elseif(strpos(strtolower($fname), strtolower($pretraga))!==false || strpos(strtolower($lname),strtolower($pretraga))!==false || strpos(strtolower($fullName),strtolower($pretraga))!==false)
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
			$brojac=$brojac+1;
		}
		
	}
}
echo $output;
?>