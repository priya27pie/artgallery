<?php 
    include("header.php");
?>


<!-- banner-inner -->
<div class="banner-inner">
    <div class="container">
        <div class="row">
	        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
	            <h3>Product Single</h3>
	        </div>
	        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
	            <ul>
	                <li><a href="index.php">Home</a></li>
	                <li>//</li>
	                <li class="active">Product Single</li>
	            </ul>
	        </div>	        
	     </div> 
	</div>     
</div>
<!--// banner-inner -->

<!-- Product Single -->
<div class="single_product">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-6">
               <div class="single-page">
                    <img id="myImg" src="images/pr5.jpg" alt="Snow" />
                </div>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-6">
               <div class="product-item-single">
                    <p>Near VIP Rode, Kolkata, Rewari</p>
                    <h2>Loren  lipsum </h2>
                    <ul>
                        <li><img src="star/5.png"></li>
                        <li> <strong>13</strong> Reviews</li>
                    </ul>
                    <div class="clearfix"></div>
                    <h5>Rs : 1,999 - 1,8599</h5>

                    <h6><strong>Description : </strong>Lorem ipsum dolor sit amet, con sectetur adipiscing elit. Proin sed ligula ac metus finibus hendrerit sed at libero. Praesent reiciendis voluptatibus maiores alias. Lorem ipsum dolor sit amet, con sectetur adipiscing elit. Proin sed ligula ac metus finibus hendrerit sed at libero. Praesent reiciendis voluptatibus maiores alias. Lorem ipsum dolor sit amet, con sectetur adipiscing elit. Proin sed ligula ac metus finibus hendrerit sed at libero. Praesent reiciendis voluptatibus maiores alias.</h6>
                    <a href="cart_empty.php">Buy now</a>
                    <a href="cart.php">cart</a>                    
                    <a href="contact.php">Contact us</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--// HOW IT WORKS? -->


<style>

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 20%;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>


<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>


<!-- Footer_Include-Start -->
<?php 
include("footer.php");
?>
