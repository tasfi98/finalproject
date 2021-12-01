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
                <a href="donar_donation.php">Donars</a><br/>
                <a href="collector_collection.php">Collectors</a><br/>
                <a href="tasks.php">Pending Task</a><br/>
            </div>
            
        </div>
<?php
}
else{
	header("Location:logout.php");
}
?>