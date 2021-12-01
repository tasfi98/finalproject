<?php
include('header.php');
//echo $proPicURL;
$mail=array();
$from="";
$file=fopen("mail.txt","r") or die("file error");
while($c=fgets($file)){
    //echo $c."<br/>";
    $ar=explode("-",$c);
    $mail[$ar[0]]=array($ar[1],$ar[2]);
}

$cred=array();
$file_cred=fopen("cred.txt","r") or die("file error");
while($c=fgets($file_cred)){
    //echo $c."<br/>";
    $ar=explode("-",$c);
    $cred[$ar[0]]=array($ar[1],$ar[2]);
}
foreach($cred as $k=>$v){
  
  if($_SESSION["uname"]==$k){
      
        $from=$v[1];       
      
    
  }
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
                <h1>Mails</h1>
                <hr>
                <table style="width:100%">
                      <tr>
                        <th>From</th>
                        <th>Mail</th>
                        <th>Action</th>
                      </tr>
                      <?php
                      $i=0;

                foreach($mail as $k=>$v){ ?>
                      
                      <tr>  
                        <td><?php echo $k;?></td>
                        <td><?php echo $v[0];?></td>
                        <td><a href="#">reply</a></td>
                      </tr>
                <?php }?>
                 </table>
                 <form action="send_mail.php" method="post">
                   <h3>Compose Mail</h3>
                   <input type="hidden" value="<?php echo $from;?>" name="from">
                   to:<br>
                   <input type="text" value=" " name="to"><br>
                   mail:<br>
                   <textarea type="text" value=" " name="mail"></textarea><br>
                   <input type="submit" name="sbt" value="Send Mail" />
                 </form>
                 
            </div>
            
        </div>
<?php
}
else{
	header("Location:logout.php");
}
?>