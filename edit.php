<?php 
include('header.php');
$file=fopen("pictures/images.txt","r") or die("file error");
$proPicURL="";
while($c=fgets($file)){
	//echo $c."<br/>";
	$ar=explode("-",$c);
	if($_SESSION["uname"]==$ar[0]){
		$proPicURL=$ar[1];
	}
}
$cred=array();
$pass="";
$email="";
$file=fopen("cred.txt","r") or die("file error");
while($c=fgets($file)){
	//echo $c."<br/>";
	$ar=explode("-",$c);
	$cred[$ar[0]]=array($ar[1],$ar[2]);
}
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){
	

	foreach($cred as $k=>$v){
	
	if($_SESSION["uname"]==$k){
			
				$pass=$v[0];
				$email=$v[1];				
			
		
	}
	
}
?>
<div class="outerDiv">
            <div class="leftDiv">
                <h1>Account</h1>
                <hr>
                <a href="home.php">Dashboard</a><br/>
                <a href="profile.php">View Profile</a><br/>
                <a href="edit.php">Edit Profile</a><br/>
				<a href="picture.php">Change Profile Picture</a><br/>
            </div>
            <div class="rightDiv">
            	<h1>Hello: <?php echo $_SESSION["uname"]; ?></h1>
                <hr>
                <img src="<?php echo $proPicURL;?>" width="100px" height="100px" />
                <form action="change_in_file.php" method="post">
					User Name:<br>
					<input type="text" value="<?php echo $_SESSION["uname"];?>" name="uname" disabled="disabled"><br/>
					Password:<br>
					<input type="password" value="<?php echo $pass;?>" name="pass"><br/>
					E Mail:<br>
					<input type="text" value="<?php echo $email;?>" name="email"><br/>
					<input type="submit" name="sbt" value="submit" />
					
				</form>
				
            </div>
            
        </div>

<?php 
}
else{
	header("Location:logout.php");
}
?>