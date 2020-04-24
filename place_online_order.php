<?php
include('header.php');
$order_id=$_REQUEST['id'];

?>
<?php
$show=new Oops($db);

$stmt1=$show->readwithdata('place_order','order_id',$order_id);
$num1=$stmt1->rowCount();
if($num1>0){
	while($row=$stmt1->fetch(PDO::FETCH_ASSOC)){
	  
        $address=$row['address'];
         $amount=$row['amount'];
         $status=$row['status'];
      $date=$row['date'];
         $pstatus=$row['pay_status'];
         $user_id=$row['user_id'];

}
    
}
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
	                <li class="active">Your Order</li>
	            </ul>
	        </div>	        
	     </div> 
	</div>     
</div>
<!--// banner-inner -->


	<!-- top Products -->
	<div class="ads-grid">
	    		<!-- tittle heading -->

        <h3 class="tittle-w3l aos-init aos-animate" data-aos="fade-down" style="transition:all 2300ms ease-in-out;">
        Your Order
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
					<div class="wrapper">
						<!-- first section -->
						
		          <div class="agileinfo_mail_grids" style="border:1px solid #ccc; padding:2em;">
	            <h4 class="text-center_1">
	                <div class="row">
            			<div class="col-md-5 col-xs-12">
            				<div class="col-md-4 col-sx-6" style="padding: 0;">
            					<label class="hik">Order No:</label>
            				</div>
            				<div class="col-md-8 col-sx-6">
            					<p class="hik"><?=$order_id?></p>
            				</div>
            			</div>
            			<div class="col-md-7">
            				<div class="col-md-4" style="padding: 0;">
            					<label class="hik">Order Placed:</label>
            				</div>
            				<div class="col-md-8">
            					<p class="hik"><?php echo date("l ,jS F Y h:i:s A",strtotime($date)); ?></p>
            				</div>
            			</div>
            			<div class="col-md-5">
            				<div class="col-md-4" style="padding: 0;">
            					<label class="hik">Status:</label>
            				</div>
            				<div class="col-md-8">
            					<p class="hik"><?=$status?></p>
            				</div>
            			</div>
            			<div class="col-md-7">
            				<div class="col-md-4" style="padding: 0;">
            					<label class="hik">Address:</label>
            				</div>
            				<div class="col-md-8">
            					<p class="hik"><?=$address?></p>
            				</div>
            			</div>
            				<div class="col-md-7">
            				<div class="col-md-4" style="padding: 0;">
            					<label class="hik">Payment Mode:</label>
            				</div>
            				<div class="col-md-8">
            					<p class="hik"><?=$pstatus?></p>
            				</div>
            			</div>
			            <div class="clearfix"></div>
		        </div>
                </h4>
        		<hr>	
	        <div class="col-md-3 col-xs-6 text-center_1 mobile-view">Name</div>
            <div class="col-md-3 col-xs-6 text-center_1 mobile-view">Paper Size</div>
            <div class="col-md-3 col-xs-6 text-center_1 mobile-view">Quantity</div>
            <div class="col-md-3 col-xs-6 text-center_1 mobile-view">Price</div>

        <div class="clearfix"></div>
		
         <div class="bod"></div>
   <?php
$count=1;
$st="select * from bill inner join place_order on bill.order_id=place_order.order_id where place_order.order_id='".$order_id."'";
//echo  $st;
$stmt=$con->prepare($st);
$stmt->execute();
$num = $stmt->rowCount();
     if($num>0){
     $count=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
?>
	        <div class="col-md-3 col-xs-6 text-center_1 mobile-view2"><?=$row['product_name']?></div>
            <div class="col-md-3 col-xs-6 text-center_1 mobile-view2"><?=$row['size']?></div>
            <div class="col-md-3 col-xs-6 text-center_1 mobile-view2"><?=$row['quantity']?></div>
            <div class="col-md-3 col-xs-6 text-center_1 mobile-view2"><?=$row['price']?></div>
<?php } }?>

        <div class="clearfix"> </div>
 <br><div class='col-md-3 col-xs-8 text-center'>Rs <?=$amount?></div>
     
        <input name="amount" type="hidden" value="<?=$amount?>">
    	<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
	        <!---<a href="bill_final.php" target="_blank" class="button">print bill</a>-->
	       <?php if($pstatus=='Online'){?>
	       <a href="#" target="_blank" class="button">Pay Now</a>
	       <?php }else{?>
	       <a href="bill_final.php?user=<?=$user_id?>&order=<?=$order_id?>" target="_blank" class="button">Print bill</a>
	       <?php } ?>
		</div>

		<div class="clearfix"> </div>
				
        	</div>
        	</div>

					
					
		</div>

				<!-- //product right -->
			</div>
		</div>
	</div>
	<!-- //top products -->
<?php include('footer.php');?>