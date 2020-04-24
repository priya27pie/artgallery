<?php
include('header.php');
?>



<!-- banner-inner -->
<div class="banner-inner">
    <div class="container">
        <div class="row">
	        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
	            <h3>Profile</h3>
	        </div>
	        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
	            <ul>
	                <li><a href="index.php">Home</a></li>
	                <li>//</li>
	                <li class="active">Profile</li>
	            </ul>
	        </div>	        
	     </div> 
	</div>     
</div>
<!--// banner-inner -->

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
        Profile
        <span class="heading-style">
          <i></i>
          <i></i>
          <i></i>
        </span>
      </h3>
      <!-- //tittle heading -->
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
						<form class="profile" action="edit_profile.php" method="post">
				        <div class="col-md-2">
			            <label>Name:</label>
			            </div>
			            <div class="col-md-4">
			            	<input type="text" value="<?=$name?>" name="name"   readonly/>
			            </div>

			           	<div class="col-md-2">
			            <label>City:</label>
			            </div>
			            <div class="col-md-4">
			            	<input type="text"  value="<?=$city?>" name="city"   readonly/>
			            </div>

						<div class="clearfix"></div>
			            <div class="col-md-2">
			            <label>E-mail id:</label>
			            </div>
			            <div class="col-md-4">
			            	<input type="email" value="<?=$email?>" name="em"   readonly/>
			            </div>
			            <div class="col-md-2">
			            <label>Mobile No.:</label>
			            </div>
			            <div class="col-md-4">
			            	<input type="text" value="<?=$phone?>" name="mob"  readonly/>
			            </div>
			            <div class="clearfix"></div>
			            
			             <div class="col-md-2">
			            <label>State:</label>
			            </div>
			            <div class="col-md-4">
			            	<input type="text" value="<?=$state?>" name="st"   readonly/>
			            </div>
						<div class="clearfix"></div>
			            <div class="col-md-2">
			            <label>Pincode:</label>
			            </div>
			            <div class="col-md-4">
			            	<input type="text" value="<?=$pincode?>" name="pin" readonly/>
			            </div>
			           
			           
			            <div class="clearfix"></div>
			            <div class="col-md-2">
			            <label>Address:</label>
			            </div>
			            <div class="col-md-10">
			            	<textarea name="add" readonly><?=$address?></textarea>
			            </div>
				            
				            <div class="clearfix"></div>
				            <input type="submit" class="green_button" value="Edit" />
			            </form>							
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