<h2>User Info</h2>
<a href="home.php">Home</a><br/><br/><br/>
<?php
session_start();
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){
	if(isset($_REQUEST["uname"])){
		
		$data=array();
		
		
		/*$conn = mysqli_connect("localhost", "root", "","cred");
		$sql="select * from user where uname='".$_REQUEST["uname"]."'";
		//echo $sql;
		$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
		while($row = mysqli_fetch_assoc($result)) {
			//echo $row["uname"];echo "<br/>";
			//print_r($row);
			$temp["uname"]=$row["uname"];
			$temp["pass"]=$row["pass"];
			$temp["email"]=$row["email"];
			$data[]=$temp;
		}*/
		
		//loads the array with file data
		
		$myfile = fopen("cred.txt", "r") or die("Unable to open file!");
		while($line=fgets($myfile)) {
			$line=trim($line);
			$ar=explode("-",$line);
			if($_REQUEST["uname"]==$ar[0]){
				$temp["uname"]=$ar[0];
				$temp["pass"]=$ar[1];
				$temp["email"]=$ar[2];
				$data[]=$temp;
			}
		}
		fclose($myfile);
		
		print_r($data);
		echo "<h1>".$data[0]["uname"]."</h1><hr/>";
		echo "<h4>Email:".$data[0]["email"]."</h4>";
		echo "<h4>Pass:".$data[0]["pass"]."</h4>";
	}
}
else{
	header("Location:logout.php");
}
?>