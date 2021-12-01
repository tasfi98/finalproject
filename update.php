<?php
session_start();
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){
	if(!isset($_REQUEST["status"])){
		echo "Invalid Parameter";
	}
	else{
		$myfile = fopen("donation.txt", "r") or die("Unable to open file!");
		$data=array();
		//loads the array with file data
		while($line=fgets($myfile)) {
			$line=trim($line);
			$ar=explode("-",$line);
			$temp["donar"]=$ar[0];
			$temp["amount"]=$ar[1];
			$temp["collector"]=$ar[2];
			$temp["status"]=$ar[3];
			$temp["extarnal"]=$ar[4];
			$data[]=$temp;
		}
		fclose($myfile);

		/*Change info in array*/
		$i=0;
		foreach($data as $row){
				if ($row["donar"]==$_GET['donar']) {
					$row["status"]=$_REQUEST["status"];
					if (strlen($_REQUEST["extarnal"])==0) {
						$row["extarnal"]="Any Comment";
					}
					else{
						$row["extarnal"]=$_REQUEST["extarnal"];
					}
					
				}
				
			
			$data[$i]=$row;
			$i++;
		}
		/*End of change info in array*/
		$str="";
		foreach($data as $row){

				$str.=$row["donar"]."-".$row["amount"]."-".$row["collector"]."-".$row["status"]."-".$row["extarnal"]."\r\n";

			
		} //prepare data for writing into file
		$str=trim($str);

		$myfile = fopen("donation.txt", "w") or die("Unable to open file!");
		echo fwrite($myfile,$str); //writes array data into file
		echo " characters written to file";
		fclose($myfile);
		?>
		<br/><a href="home.php">Home</a>
		<?php 
	}
}
else{
	header("Location:logout.php");
}
?>