<?php
$file=fopen('sendmail.txt','a') or die("fle open error");
$c=0;
$dotPos=strpos($_REQUEST["to"],".");
$atPos=strpos($_REQUEST["to"],"@");
if(strlen($_REQUEST["to"])==0 || strlen($_REQUEST["mail"])==0){
	echo "All fields are mandatory!";
}
else if($atPos>$dotPos){
	echo "Invalid to";
}
else{
	$c=$c+fwrite($file,"\r\n");
	$c=$c+fwrite($file,$_REQUEST["to"]);
	$c=$c+fwrite($file,"-");
	$c=$c+fwrite($file,$_REQUEST["mail"]);
	$c=$c+fwrite($file,"-");
	$c=$c+fwrite($file,$_REQUEST["from"]);
}
echo "<br/>";
echo $c." charactes appended";
?>
<br/><a href="mails.php">Mails</a><br/>
