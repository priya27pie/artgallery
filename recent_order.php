<?php include('header.php');?>
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>Order Details</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<div class="row">
				<!-- tittle heading -->
				<h3 class="tittle-w3l">ORDERS
					<span class="heading-style">
						<i></i>
						<i></i>
						<i></i>
					</span>
				</h3>
				<!-- //tittle heading -->
				<!-- product left -->
				<?php include('user_profile.php');?>

				<!-- //product left -->
				<!-- product right -->
				<div class="agileinfo-ads-display col-md-9 w3l-rightpro">
					<div class="wrapper">
						<!-- first section -->
					
				  <?php
	$sq="select * from place_order where user_id='".$user."' order by id desc limit 1";
	$r=mysqli_query($con,$sq);
$c=mysqli_num_rows($r);
if($c<=0){
	echo "	<div class='profile-banner'> <h5 class='text-center'><b>You Have No order Show</b></h5>	</div>";
}else{
	?>
				
				<?php	while($row=mysqli_fetch_array($r)){
		
	$order=$row['order_id'];
	$amt=$row['amount'];
$st=$row['status'];

	?>
	 <?php $s="select * from bill where user_id='".$user."' and  order_id='".$order."' group by order_id limit 1";
   $r1=mysqli_query($con,$s);
$qt1=0;
	while($row1=mysqli_fetch_array($r1)){
		$qt=$row1['quantity']+$qt1;
	$qt1=$qt;
	
		?>
						<div class="profile-banner">
							<div class="row">
								<div class="col-md-12">
									<label>Delivered Primary Information</label>
									<label><?php echo date("l ,jS F Y h:i:s A",strtotime($row['date']));?></label>
								</div>
								<div class="clearfix"></div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-md-12">
									<p><label>Order Total: <?php echo $amt; ?></label></p>
									<p><label>Order ID: <?php echo $order; ?></label></p>
									<p><label>Status: <?php echo $st; ?></label></p>
								</div>
								<div class="clearfix"></div>
							</div>
							<hr>
							<div class="text-center">
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
           <a href="order_details.php?id=<?php echo $order;  ?>" class="button">View Details</a>
										</div>
							</div>
						</div>
						<?php
						
	} 
				}
}
	?>
						<!-- //first section -->
					</div>
				</div>
				<!-- //product right -->
			</div>
		</div>
	</div>
	<!-- //top products -->
<?php include('footer.php');?>