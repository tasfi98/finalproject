<?php
include('header.php');
//echo $proPicURL;
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){?>
	
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
                <form action="upload.php" method="post" enctype="multipart/form-data" name="mfm"><pre>
					Select image to upload : <input type="file" name="fileToUpload">
					<input type="submit" value="Upload File" name="sbt"></pre>
				</form>
            </div>
            
        </div>
	
<?php
}
else{
	header("Location:logout.php");
}
?>