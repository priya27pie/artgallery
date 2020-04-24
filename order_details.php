<?php include('header.php');
$order_id=$_REQUEST['id'];
$show=new Oops($db);

?>
<?php
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

	<!-- banner-2 -->
<div class="banner-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
                <h3>Order Details</h3>
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
	<!-- //page -->
	
	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<div class="row">
				<!-- tittle heading -->
				<h3 class="tittle-w3l">ORDER DETAILS
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
						<div class="profile-banner">
							<div class="row">
						
						<div class="col-md-5 col-xs-12">
            				<div class="col-md-4 col-xs-6" style="padding: 0;">
            					<label class="hik">Order No:</label>
            				</div>
            				<div class="col-md-8 col-xs-6">
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
							<hr/>
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
  $pro_id=$row['product_id'];
  $stmt1=$show->readwithdata_clause('product_img','product_id',$pro_id,'limit 1');
  $row1=$stmt1->fetch(PDO::FETCH_ASSOC);
  $img=$row1['image'];
?>			
                            <div class="row">

								<div class="col-md-4">
                    <img src="admin@art/imgs/<?=$img?>"  class="img-responsive img-thumbnail" alt="logo" style="width: 50%;">
								</div>
								<div class="col-md-8">
									<p><strong>Product Name </strong>: <?php echo $row['product_name']; ?> </p>
									<p>Total Amount : Rs <?php echo $row['price']; ?> | Qty : <?php echo $row['quantity']; ?></p>
								</div>
								<div class="clearfix"></div>
							</div>
<?php } }?>							
							<hr>
							<div class="text-center">
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
	       <a href="bill_final.php?user=<?=$user_id?>&order=<?=$order_id?>" target="_blank" class="button">Print bill</a>
								</div>
							</div>
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
