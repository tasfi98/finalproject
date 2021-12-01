<head>
	<link rel="stylesheet" href="style.css">
	<title>Crowd FUNDING</title>
</head>
<?php
session_start();
$file=fopen("pictures/images.txt","r") or die("file error");

$proPicURL="";
while($c=fgets($file)){
	$ar=explode("-",$c);
	if($_SESSION["uname"]==$ar[0]){
		$proPicURL=$ar[1];
	}
}

if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){?>
 
	<ul>
		<div class="nav">
			<li><a class="active" href="home.php">Crowd FUNDING</a></li>
			<li style="float:right"><a href="logout.php">Logout</a></li>
			<li style="float:right"><a href="mails.php">Mails</a></li>
			<li style="float:right"><a href="">Logged As <?php echo $_SESSION["uname"]; ?></a></li>
		</div>
	  
	</ul>
<?php
}
