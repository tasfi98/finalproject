<?php
//print_r($GLOBALS);
session_start();
$file=fopen('pictures/images.txt','a') or die("fle open error");

$source=$_FILES['fileToUpload']['tmp_name'];
$target="pictures/".$_FILES['fileToUpload']['name'];
if(move_uploaded_file($source,$target)){
	echo "File uploaded:".$target."<br/>";
	$data=$_SESSION["uname"]."-".$target;
	$a=fwrite($file,"\r\n");
	$b=fwrite($file,$data);
	if($a>0 && $b>0){
		echo "Info added to text file<br/>";
	}
}
?>
<a href="home.php">Home</a>