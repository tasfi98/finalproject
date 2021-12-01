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
                <h1>Donars Donations</h1>
                <hr>
                <table style="width:100%">
                      <tr>
                        <th>Donar</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>External Info</th>
                        <th>Action</th>
                      </tr>
                      <?php
                foreach($donation as $k=>$v){?>
                    
                      <tr>
                        <form action="update.php?donar=<?php echo $k;?>" method="post">
                        <td><input type="text" value="<?php echo $k;?>" name="donar" disabled="disabled"></td>
                        <td><input type="text" value="<?php echo $v[0];?>" name="amount" disabled="disabled"></td>
                        <td>
                                <select name="status" id="status">
                                  <option value="<?php echo $v[2];?>"><?php echo $v[2];?></option>
                                  <option value="confirmed">confirmed</option>
                                  <option value="recieved">recieved</option>
                                  <option value="requested">requested</option>
                                   <option value="deliverd">deliverd</option>
                                </select> </td>
                        </td>
                        <td><input type="text" value="<?php echo $v[3];?>" name="extarnal"></td>
                        <td><input type="submit" name="sbt" value="submit" />
                    
                            </form><a href="admin_request.php">Send Request</a></td>
                      </tr>
                <?php }?>
                 </table>
            </div>
            
        </div>
<?php
}
else{
	header("Location:logout.php");
}
?>