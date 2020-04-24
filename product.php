<?php 
    include("header.php");
?>


<!-- banner-inner -->
<div class="banner-inner">
    <div class="container">
        <div class="row">
	        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
	            <h3>All Product</h3>
	        </div>
	        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
	            <ul>
	                <li><a href="index.php">Home</a></li>
	                <li>//</li>
	                <li class="active">Product</li>
	            </ul>
	        </div>	        
	     </div> 
	</div>     
</div>
<!--// banner-inner -->

<!-- Product? -->
<div class="all_product">

    <div class="container">
        <div class="row">
       <?php
$count=1;
$sr='product';
$st="select * from product inner join product_img on product.product_id=product_img.product_id inner join product_size on product.product_id=product_size.product_id  group by product.product_id order by product.product_id desc ";
$stmt=$con->prepare($st);
$stmt->execute();
$num = $stmt->rowCount();
     if($num>0){
     $count=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
?>      <div class="col-md-4 col-sm-4 col-xs-6">
               <div class="product-item">
                    <img src="admin@art/imgs/<?=$row['image']?>" alt="logo" style="width: 100%;">
                    <h2><?=$row['category']?></h2>
                    <p><?=$row['name']?></p>
                    <h5>Rs : <?=$row['price']?></h5>
                    <a href="product_single.php?product_id=<?=$row['product_id']?>&price=<?=$row['price']?>">Details</a>
                </div>
            </div>
            
<?php } } ?>          
       <!--  <div class="col-md-4 col-sm-4 col-xs-6">
               <div class="product-item">
                    <img src="images/pr5.jpg" alt="logo" style="width: 100%;">
                    <h2>Category</h2>
                    <p>Product Name Raj</p>
                    <h5>Rs : 1,999 - 1,8599</h5>
                    <a href="product_single.php">Details</a>
                </div>
            </div>            
            <div class="col-md-4 col-sm-4 col-xs-6">
               <div class="product-item">
                    <img src="images/pr2.jpg" alt="logo" style="width: 100%;">
                    <h2>Category</h2>
                    <p>Product Name Raj</p>
                    <h5>Rs : 1,999 - 1,8599</h5>
                    <a href="product_single.php">Details</a>
                </div>
            </div>
            
            <div class="col-md-4 col-sm-4 col-xs-6">
               <div class="product-item">
                    <img src="images/pr3.jpg" alt="logo" style="width: 100%;">
                    <h2>Category</h2>
                    <p>Product Name Raj</p>
                    <h5>Rs : 1,999 - 1,8599</h5>
                    <a href="product_single.php">Details</a>
                </div>
            </div>            
            <div class="col-md-4 col-sm-4 col-xs-6">
               <div class="product-item">
                    <img src="images/pr4.jpg" alt="logo" style="width: 100%;">
                    <h2>Category</h2>
                    <p>Product Name Raj</p>
                    <h5>Rs : 1,999 - 1,8599</h5>
                    <a href="product_single.php">Details</a>
                </div>
            </div>            
            <div class="col-md-4 col-sm-4 col-xs-6">
               <div class="product-item">
                    <img src="images/pr1.jpg" alt="logo" style="width: 100%;">
                    <h2>Category</h2>
                    <p>Product Name Raj</p>
                    <h5>Rs : 1,999 - 1,8599</h5>
                    <a href="product_single.php">Details</a>
                </div>
            </div>       -->      

        </div>
    </div>
</div>
<!--// HOW IT WORKS? -->

<!-- Footer_Include-Start -->
<?php 
include("footer.php");
?>
