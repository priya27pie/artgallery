<?php include('header.php');?>

<div class="banner-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
                <h3>All Order</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li>//</li>
                    <li>Order Details</li>
                </ul>
            </div>
        </div>
    </div>
</div>


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
$show=new Oops($db);

$stmt1=$show->readwithdata('place_order','user_id',$_SESSION['login_id']);
$num1=$stmt1->rowCount();
if($num1>0){
	while($row=$stmt1->fetch(PDO::FETCH_ASSOC)){
	    	$order=$row['order_id'];
	$amt=$row['amount'];
$st=$row['status'];
	?>
	  	<div class="profile-banner">
							<div class="row">
								<div class="col-md-12">
									<label>Delivered Primary Information, </label>
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
      
<?php }
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