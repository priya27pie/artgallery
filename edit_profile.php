<?php include('header.php');
?>
<script>

function check(){
if ($('#reg_pass').val() == $('#reg_confirm_pass').val()) {
$('#message').html('Matched').css('color', 'green');
     document.getElementById("pass_up").disabled = false; 

 } else{ 
    $('#message').html('Not Matching').css('color', 'red'); 
     document.getElementById("pass_up").disabled = true; 
 }
}	
</script>
<!-- banner-inner -->
<div class="banner-inner">
    <div class="container">
        <div class="row">
	        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
	            <h3>Edit Profile</h3>
	        </div>
	        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
	            <ul>
	                <li><a href="index.php">Home</a></li>
	                <li>//</li>
	                <li class="active">Edit_Profile</li>
	            </ul>
	        </div>	        
	     </div> 
	</div>     
</div>
<!-- Banner End -->

<?php
$show=new Oops($db);

$stmt1=$show->readwithdata('client','client_id',$_SESSION['login_id']);
$num1=$stmt1->rowCount();
if($num1>0){
	while($row=$stmt1->fetch(PDO::FETCH_ASSOC)){
	  
	  $name=$row['name'];
        $phone=$row['phone'];
        $email=$row['email'];
        $password=$row['password'];
        $sex=$row['sex'];
        $state=$row['state'];
        $city=$row['city'];
        $address=$row['address'];
        $pincode=$row['pincode'];
    

}
    
}
?>
	<!-- top Products -->
	<div class="ads-grid">
		      <!-- tittle heading -->
		<h3 class="tittle-w3l aos-init aos-animate" data-aos="fade-down" style="transition:all 2300ms ease-in-out;">
        Edit_Profile
        <span class="heading-style">
          <i></i>
          <i></i>
          <i></i>
        </span>
      </h3>
      <!-- //tittle heading -->
		<div class="container">
			<div class="row">
				<!-- product left -->
				<?php include('user_profile.php');?>
				<!-- //product left -->
				<!-- product right -->
				<div class="agileinfo-ads-display col-md-9 w3l-rightpro">
					<div class="wrapper-profile">
						<!-- first section -->
						<div class="profile-banner">
							<h4><strong>Profile Information</strong></h4>
							<hr>
			<form class="profile_edit" method="post">
			            <div class="col-md-2">
			            <label>Name:</label>
			            </div>
			            <div class="col-md-4">
			            	<input type="text" name="name" value="<?=$name?>" readonly />
			            </div>

			           	<div class="col-md-2">
			            <label>City:</label>
			            </div>
			            <div class="col-md-4">
			            	<input type="text" name="city" value="<?=$city?>"  />
			            </div>

						<div class="clearfix"></div>
			            <div class="col-md-2">
			            <label>E-mail id:</label>
			            </div>
			            <div class="col-md-4">
			            	<input type="email" name="email" value="<?=$email?>"readonly/>
			            </div>
			            <div class="col-md-2">
			            <label>Mobile No.:</label>
			            </div>
			            <div class="col-md-4">
			            	<input type="text" name="phone" value="<?=$phone?>" readonly/>
			            </div>
			            <div class="clearfix"></div>
			            
			             <div class="col-md-2">
			            <label>State:</label>
			            </div>
			            <div class="col-md-4">
			            	<input type="text" name="state" value="<?=$state?>"  />
			            </div>
						<div class="clearfix"></div>
			            <div class="col-md-2">
			            <label>Pincode:</label>
			            </div>
			            <div class="col-md-4">
			            	<input type="text" name="pincode" value="<?=$pincode?>"  />
			            </div>
			           
			           
			            <div class="clearfix"></div>
			            <div class="col-md-2">
			            <label>Address:</label>
			            </div>
			            <div class="col-md-10">
			            	<textarea name="address"><?=$address?></textarea>
			            </div>
			            <input type="submit" class="green_button" value="Update" name='update' style="width: 18%;color: #FFF;background: #2b8fd8;padding: 7px 15px;" />
			            </form>
<?php if(isset($_POST['update'])){
$allowed = ["address","state","city","pincode"];
$params = [];
$setStr = "";
foreach ($allowed as $key)
{
    if (isset($_POST[$key]) && $key != "uid")
    {
        $setStr .= "`$key` = :$key,";
        $params[$key] = htmlspecialchars(strip_tags($_POST[$key]));
    }
}
$setStr = rtrim($setStr, ",");
$params['client_id'] =$_SESSION['login_id'];
$show->table ='client';
$show->cols =$setStr;
$show->id_name ='client_id';
print_r($params);
$show->params =$params;
if($show->update_all()){
    echo "<script>window.location.href='".$_SERVER['request_uri']."';</script>";
}else{
    echo "Something went wrong";
}


}?>						
							
						</div>


						<div class="profile-banner">
					<form class="profile" action="" method="post">
                       				    
                        <div class="input">
            			    <label for="password">New Password :</label>
            				<input type="password" placeholder="" id="reg_pass" name="password" required="">
            			</div>
            			<div class="input">
            			    <label for="com-password">Confirm Password :</label>
            				<input type="password" placeholder="" onkeyup="check()" id="reg_confirm_pass" name="password" required="">
            				<div id="message"></div>
            			</div>

            			<input type="submit" id="pass_up" class="green_button" name="update_pass" value="Update" />
					</form>
<?php if(isset($_POST['update_pass'])){

$sq="update client set password='".htmlentities(strip_tags(md5($_POST['password'])))."' where client_id='".$_SESSION['login_id']."'";
$stmt=$con->prepare($sq);
if($stmt->execute()){
    
     echo "<script>alert('Password has been changed. Please login again to continue');window.location.href='logout.php';</script>";
   
}
}?>					

						</div>
						<!-- //first section -->
					</div>
				</div>
				<!-- //product right -->
			</div>
		</div>
	</div>
	<!-- //top products -->
<?php include('footer.php');?>