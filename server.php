<?php
$cred=array();
$file=fopen("cred.txt","r") or die("file error");
while($c=fgets($file)){
	//echo $c."<br/>";
	$ar=explode("-",$c);
	$cred[$ar[0]]=array($ar[1],$ar[2]);
}
//print_r($cred);
$flag=0;
$i="admin";
session_start();
foreach($cred as $k=>$v){
	
	if($_REQUEST["uname"]==$k && md5($_REQUEST["pass"])==$v[0]){
			
				echo "Login success";
				$_SESSION["valid"]="yes";
				$_SESSION["uname"]=$_REQUEST["uname"];
				$flag=1;
				break;
			
		
	}
	
}
if($flag==0){
	echo "<p style='color:red'>Wrong credentials</p>";
}
if($flag==1){
	header("Location:home.php");
}
/*if($_POST["uname"]=="raju" && $_POST["pass"]=="123"){
	echo "Login success";
}
else{
	echo "<p style='color:red'>Wrong credentials</p>";
}*/
?>