<?php 
    include("header.php");
?>

<!-- Banner -->
<div class="banner-home">
    <div id="banner-demo" class="owl-carousel">
        <div class="item">
          <img src="images/hand--pick-bann02.jpg" alt="Banner photo" class="banner-img" />
        </div>
        <div class="item">
          <img src="images/hand--pick-bann01.jpg" alt="Banner photo" class="banner-img" />
        </div>

    </div>
    <div class="dec">
        <div class="container">
            <div class="banner-img-agile">
                <img src="images/bannerimg.png" alt="" class="img-fluid">
            </div>
            <h3>Hand painted</h3>
            <p>it’s a great day for Loren lipsum</p>
            <a href="contact.php">Contact us</a>
        </div>    
    </div>
</div>
<!--// Banner -->

<!-- About us -->
<div class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="ab-img">
                    <img src="images/1-19.jpg" alt=""  class="img-ab-1" /> 
                    <div class="ab-text">
                        <h3>Why do we use it?</h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="ab-img">
                    <img src="images/22.jpg" alt=""  class="img-ab-1" /> 
                    <div class="ab-text">
                        <h3>Why do we?</h3>
                        <p>Distracted by the readable content of a page when looking at its layout.</p>
                    </div>
                </div>
            </div> 
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="ab-img" data-aos="fade-right" style="transition:all 1800ms ease-in-out;">
                    <img src="images/5.jpg" alt=""  class="img-ab-1" /> 
                    <div class="ab-text">
                        <h3>Why use it?</h3>
                        <p>Distracted by the readable content of a page when looking at its layout.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="ab-img" data-aos="fade-left" style="transition:all 2000ms ease-in-out;">
                    <img src="images/2-19.jpg" alt=""  class="img-ab-1" /> 
                    <div class="ab-text">
                        <h3>Why do we use it?</h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>
                </div>
            </div>                       
        </div>
    </div>
</div>
<!--// About us -->

<!-- GIFT BY OCCASION -->
<div class="gift-by">
        <h3 class="tittle-w3l" data-aos="fade-down" style="transition:all 2300ms ease-in-out;">
        GIFT BY OCCASION
        <span class="heading-style">
          <i></i>
          <i></i>
          <i></i>
        </span>
      </h3>
    <div class="container">
        <div class="row">
            <div id="gift-demo" class="owl-carousel">
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
?>
                <div class="item">
                    <div class="gift-by-img" data-aos="fade-right" style="transition:all 1700ms ease-in-out;">
                    <img src="admin@art/imgs/<?=$row['image']?>" alt="logo" style="width: 100%;">
                        <div class="gift-by-text">
                            <h3><?=$row['category']?></h3>  
                            <h5>Rs : <?=$row['price']?></h5>

                    <a href="product_single.php?product_id=<?=$row['product_id']?>&price=<?=$row['price']?>">Buy Now</a>
                        </div>
                    </div>
                </div> 
 <?php }
 
     }?>
              
                
            </div>    
        </div>    
    </div>
</div>

<!-- Our popular -->
<div class="popular">
    <h3 class="tittle-w3l" data-aos="fade-down" style="transition:all 2300ms ease-in-out;">
      Popular right now
      <span class="heading-style">
        <i></i>
        <i></i>
        <i></i>
      </span>
    </h3>
  <div class="container">
      <div id="popular-demo" class="owl-carousel">
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
?>
                <div class="item">
                    <div class="gift-by-img" data-aos="fade-right" style="transition:all 1700ms ease-in-out;">
                    <img src="admin@art/imgs/<?=$row['image']?>" alt="logo" style="width: 100%; height:200px;">
                        <div class="gift-by-text">
                            <h3><?=$row['category']?></h3>  
                            <h5>Rs : <?=$row['price']?></h5>

                    <a href="product_single.php?product_id=<?=$row['product_id']?>&price=<?=$row['price']?>">Buy Now</a>
                        </div>
                    </div>
                </div> 
 <?php }
 
     }?>
               
      </div>
  </div>
</div>
<!--// Our popular -->


<!-- Events Painting -->
<div class="gift-by">
        <h3 class="tittle-w3l" data-aos="fade-down" style="transition:all 2300ms ease-in-out;">
        Events
        <span class="heading-style">
          <i></i>
          <i></i>
          <i></i>
        </span>
      </h3>
    <div class="container">
        <div class="row">
            <div id="event-demo" class="owl-carousel">
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
?>
                <div class="item">
                    <div class="gift-by-img" data-aos="fade-right" style="transition:all 1700ms ease-in-out;">
                    <img src="admin@art/imgs/<?=$row['image']?>" alt="logo" style="width: 100%;">
                        <div class="gift-by-text">
                            <h3><?=$row['category']?></h3>  
                            <h5>Rs : <?=$row['price']?></h5>

                    <a href="product_single.php?product_id=<?=$row['product_id']?>&price=<?=$row['price']?>">Buy Now</a>
                        </div>
                    </div>
                </div> 
 <?php }
 
     }?>
         
                
            </div>    
        </div>    
    </div>
</div>


<!-- HOW IT WORKS? -->
<div class="works">
      <h3 class="tittle-w3l" data-aos="fade-down" style="transition:all 2300ms ease-in-out;">
        HOW IT WORKS ?
        <span class="heading-style">
          <i></i>
          <i></i>
          <i></i>
        </span>
      </h3>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="works-det">
                    <img src="images/mainwork2.png" alt=""  class="img-gift-by-1" />
                    <h4>Upload Photo & Order</h4>
                    <p>No hidden charges.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="works-det">
                    <img src="images/mainwork3.png" alt=""  class="img-gift-by-1" />
                    <h4>Painting Starts</h4>
                    <p>Enjoy support along the process.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="works-det">
                    <img src="images/mainwork4.png" alt=""  class="img-gift-by-1" />
                    <h4>Preview your Painting</h4>
                    <p>Get unlimited revisions.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="works-det">
                    <img src="images/mainwork5.png" alt=""  class="img-gift-by-1" />
                    <h4>Framed & Delivered</h4>
                    <p>Shipping is super fast and free.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--// HOW IT WORKS? -->

<!-- Footer_Include-Start -->
<?php 
include("footer.php");
?>
