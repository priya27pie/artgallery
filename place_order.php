<?php
include('header.php'); $order=$_REQUEST['order'];

?>



<!-- banner-inner -->
<div class="banner-inner">
    <div class="container">
        <div class="row">
	        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
	            <h3>Your Order</h3>
	        </div>
	        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
	            <ul>
	                <li><a href="index.php">Home</a></li>
	                <li>//</li>
	                <li class="active">Place Your Order</li>
	            </ul>
	        </div>	        
	     </div> 
	</div>     
</div>
<!--// banner-inner -->


	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
		    
		<!-- tittle heading -->

        <h3 class="tittle-w3l aos-init aos-animate" data-aos="fade-down" style="transition:all 2300ms ease-in-out;">
        Place Your Order
        <span class="heading-style">
          <i></i>
          <i></i>
          <i></i>
        </span>
      </h3>
      <!-- //tittle heading -->
		    
			<div class="row">
<?php $show=new Oops($db);
$stmt=$show->readwithdata('client','client_id',$_SESSION['login_id']);
$r=$stmt->rowCount();
   if($r>0){
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $address=$row['address'];   
        $phone=$row['phone'];   
  

        }
    
       
   }
?>
				<!-- product left -->
					<?php include('user_profile.php');?>
				<!-- //product left -->
				<!-- product right -->

					<div class="agileinfo-ads-display col-md-9 w3l-rightpro">
						<div class="wrapper-profile">
							<!-- first section -->
							<div class="profile-banner">
								<h4><strong>Place Your Order</strong></h4>
								<hr>
    								<div class="col-md-4 agileinfo_mail_grid_left">
                    					<ul class="big">
                    						<li><span>Address</span></li>
                    					</ul>
                                    </div>
                                    <form  method="post" action="placed1.php">
                                    <div class="col-md-8 agileinfo_mail_grid_right">
                    				
                    					<input type="hidden" name="order_id" value="<?php echo $order;?>">			
                    					<textarea placeholder="" name="address" class="form-control" readonly><?=$address?></textarea>
                                       <!--- <a data-target="#myModal2" data-backdrop="static" data-toggle="modal" href="#" style="float:right; margin-right:15px;">Change Shipping Address</a>--> 
                                        
                    				</div>
                                    <div class="clearfix"></div>
    
                                    <div class="col-md-4 agileinfo_mail_grid_left">
                    					<ul class="big">
                    						<li><span>Email</span></li>
                    					</ul>
                                    </div>
                                    <div class="col-md-8 agileinfo_mail_grid_right">
                    					<input type="email" class="form-control" name="email" value="<?=$_SESSION['username']?>" readonly />
                    				</div>
                                    <div class="clearfix"></div>
    
                                    <div class="col-md-4 agileinfo_mail_grid_left">
                    					<ul class="big">
                    						<li><span>Phone</span></li>
                    					</ul>
                    				</div>
                    				<div class="col-md-8 agileinfo_mail_grid_right">
                    					<input type="text" class="form-control" name="phon" value="<?=$phone?>" readonly />
                                   </div>
                                <div class="col-md-4 agileinfo_mail_grid_left">
                    					<ul class="big">
                    						<li><span>Payment Type</span></li>
                    					</ul>
                    				</div>
								<div class="col-md-8 agileinfo_mail_grid_right">
                    					<input type="radio"  name="pay_status" value="Online" checked required/> Online
                    					<input type="radio"  name="pay_status" value="COD" required/> COD
                    					
                                   </div>
                    			
                                <div class="clearfix"></div>
                                
                                <div class="col-md-offset-6">
									<div>
							 <input type="submit" class="btn btn-info" value="Place Order" name="sub" id="submit_pay">
									</div>
								</div>
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


<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Your Shipping Address</h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" role="form" action="place_holder_change_shipping.php?order=<?php echo $order; ?>" method="post">
        <div class="form-group">
        <div class="col-md-10 col-xs-offset-1">
        
        <textarea class="form-control" rows="4" name="add"></textarea>
        </div>
        </div>
        <div class="col-xs-offset-6">
    		<div class="snipcart-details top_brand_home_details">
                <input type="submit" class="button_1" value="Update" name="change"/> 
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>  
        </div>
        </form>
     </div>
      
    </div>

  </div>
</div>