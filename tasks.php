<?php
include('header.php');
//echo $proPicURL;
$donation=array();
$file=fopen("donation.txt","r") or die("file error");
while($c=fgets($file)){
    //echo $c."<br/>";
    $ar=explode("-",$c);
    $donation[$ar[0]]=array($ar[1],$ar[2],$ar[3],$ar[4]);
}
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
                <h1>Pending Tasks</h1>
                <hr>
                <table style="width:100%">
                      <tr>
                        <th>Donar</th>
                        <th>Amount</th>
                        <th>Status</th>
                      </tr>
                      <?php
                foreach($donation as $k=>$v){
                    if($v[2]!=="deliverd"){?>
                      <tr>
                        <td><?php echo $k;?></td>
                        <td><?php echo $v[0];?></td>
                        <td><?php echo $v[2];?></td>
                      </tr>
                <?php
            }
                 }?>
                 </table>
            </div>
            
        </div>
<?php
}
else{
	header("Location:logout.php");
}
?>