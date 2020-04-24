<?php 
    include("header.php");    $show=new Oops($db);

?>
<script>
    $(document).ready(function(){
    $('#size').change(function(){
    var size=$('#size').val();
   // alert(size);
    var code="<?=$_REQUEST['product_id']?>";
    $.ajax({
    type: "POST",
    url: "ajax_check.php", // Name of the php files
    data: "size="+size+"&code="+code,
    async: false,
    global: false,
    success: function(data)
    {
      $('#price').text(data);  
      $('#item_price').val(data);  

   

      
    }
    });
    });
    });
    function runMyFunction1(){
var a=document.getElementById('size').value;
if(a==""){
    alert('Please select Size');
    return false;
}else{
	alert('Added To Cart');

}
}
</script>

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
 <?php
   $sq=$show->readwithdata('product','product_id',$_REQUEST['product_id']);
   $r=$sq->rowCount();
   if($r>0){
        while($row=$sq->fetch(PDO::FETCH_ASSOC)){
        $name=$row['name'];   
        $paper_color=$row['paper'];
        $category=$row['category'];
        $description=$row['description'];

        }
    
       
   }
   ?>        
<!-- product_single.php  --> 
<!-- product_single.php  --> 
<div class="single_product">
    <div class="container">
        <div class="row">
        
        <div class="col-md-4 single-right-left ">
            <div class="grid images_3_of_2">
                <div class="flexslider">
                    
                    <ul class="slides">
                       	<?php
			    $sq1=$show->readwithdata('product_img','product_id',$_REQUEST['product_id']);
                 while($row1=$sq1->fetch(PDO::FETCH_ASSOC)){ $img=$row1['image'];?>		    
						<li data-thumb="admin@art/imgs/<?=$row1['image']?>">
							<div class="thumb-image"> <img src="admin@art/imgs/<?=$row1['image']?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
					<?php } ?>
					
                    </ul>
                    <div class="clearfix"></div>
                </div>  
            </div>
        </div>
        
    <form method="post" class="cart_single" action="product_single.php?product_id=<?=$_REQUEST['product_id'];?>&action=add&code=<?=$_REQUEST['product_id']?>&price=<?=$_REQUEST['price']?>">
 
        <div class="col-md-8 single-right-left simpleCart_shelfItem">
            <h3><strong>CATEGORY :</strong> <?=$category?></h3>
            <h4><strong>PRODUCT NAME :</strong><?=$name?></h4>
            <h5><strong>PAPER COLOR : </strong><?=$paper_color?></h5>
            <input type="hidden" name="img" value="<?=$img?>">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="product_name" value="<?=$name?>">
            <input type="hidden" name="price" id="item_price">
            <input type="hidden" name="code" value="<?=$_REQUEST['product_id']?>">

            <div class="color-quality">
                <div class="color-quality-right">
                    <h5>SIZE :</h5>
                    <select class="box" name="size" id="size" required>
                    <option value=''>Select size</option>
                     <?php 
                     $sq1=$show->readwithdata('product_size','product_id',$_REQUEST['product_id']);
                    while($row1=$sq1->fetch(PDO::FETCH_ASSOC)){
                    echo  "<option value='".$row1['size']."'>".$row1['size']."</option>";
                    }
                    ?>
                    </select>
                    <span class="item_price" id="price">Rs <?=$_REQUEST['price']?></span>
                </div>
            </div>
            

            <div class="description">
                <h5><strong>DESCRIPTION :</strong> <?=$description?></h5>
            </div>
            
            <div class="occasion-cart">
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                   
            <input type="submit" name="submit" value="Add to cart" class="button" onclick="runMyFunction1();return true">
                   
                </div>
                        
            </div>
        </div>
      </form>  
        
        </div>  
    </div>  
</div>

<!-- // product_single.php  --> 

<style>
    
/*-- single-page --*/

.single-right-left p{
    font-family: auto;
    font-size: 22px;
    line-height: 30px;
    color: #170e00;
    padding: 0 0 5px;
    margin: 0;
}
span.item_price{    display: inline-block;
    padding: 5px 20px;
    margin: 0;
    text-align: left;
    background: #4f00bb;
    color: #fff;
    font-size: 17px;
    font-weight: bold;
}
.description{
    margin:1.5em 0;
}
.description h5 {
    font-family: 'Josefin Sans', sans-serif;
    font-size: 15px;
    line-height: 25px;
    color: #170e00;
    padding: 0 0 5px;
    margin: 0;
    text-align: justify;
}
.description p{
color: #545454;
    line-height:1.8em;
    margin:0.5em 0 0;
    font-size:0.9em;
}
.occasional{
    margin:2em 0;
}
.color-quality-right h5,.occasional h5 {
 font-family: 'Work Sans', sans-serif;
    font-weight: normal;
    color: #210844;
    font-size: 20px;
    line-height: 50px;
        float: left;
}
.color-quality-right select {
    padding: 5px 21px;
    font-size: 15px;
    margin: 10px 0 0 20px;
        border: 2px solid #4f00bb;
}
.colr {
    width: 33.333%;
    float: left;
}
.description input[type="text"]{
    padding:8px 8px;
    color:#ccc;
    font-size:13px;
    width:45%;
    outline:none;   
    letter-spacing:1px;
}
.description input[type="submit"]{
    color: #fff;
    font-size: 16px;
    background: #000000;
    border: none;
    outline: none;
    padding: 7px 17px 9px;
    letter-spacing: 2px;
    text-transform: uppercase;
}
.description input[type="submit"]:hover{
    background:#fc636b;
}

.occasion-cart a {
    text-decoration: none;
    letter-spacing: 1px;
    background: #4f00bb;
    padding: 10px 15px;
    border-radius: 6px;
    color: #FFF;
    transition: all 500ms ease-in-out;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 13px;
    margin: 0px 0 0;
    display: inline-block;

}
.occasion-cart a:hover { color:#FFF; background:#ffb440; }
.bootstrap-tab {
    margin: 5em 0 0;
}
.bootstrap-tab-text p{
    font-size:14px;
    color:#999;
    line-height:1.8em;
}
.bootstrap-tab-text h5,.add-review h4{
    text-transform: uppercase;
    font-size: 1em;
    color: #212121;
    margin: 2em 0 1em 0;
    font-weight: 600;
    letter-spacing: 1px;
}
.bootstrap-tab-text p span{
    display:block;
    margin:2em 0 0;
}
.bootstrap-tab-text-grid-left{
    float:left;
    width:14%;
}
.bootstrap-tab-text-grid-right{
    float:right;
    width:83%;
}
.bootstrap-tab-text-grid-right ul li{
    display:inline-block;
}
.bootstrap-tab-text-grid-right ul li:nth-child(2){
    float:right;
}
.bootstrap-tab-text-grid-right ul li a{
    font-size: 1em;
    color: #2fdab8;
    text-transform: uppercase;
    text-decoration: none;
    font-weight: 600;
}
.bootstrap-tab-text-grid-right ul li a:hover{
    color: #212121;
}
.bootstrap-tab-text-grid-right ul li a i{
    left:-1em;
}
.bootstrap-tab-text-grids{
    margin:3em 0 0 0em;
}
.bootstrap-tab-text-grid-right p{
    margin:2em 0 0;
    color: #545454;
    font-size: 0.9em;
    line-height:2sem;
}
.bootstrap-tab-text-grid:nth-child(2){
    margin:3em 0 0;
}
.add-review form{
    margin:2em 0 0;
}
.add-review input[type="text"],.add-review input[type="email"],.add-review textarea{
    outline: none;
    padding: 10px;
    border: 1px solid #D2D2D2;
    width: 49%;
    font-size: 15px;
    color: #888;
}
.add-review input[type="email"]{
    margin-left: 1.55%;
}
.add-review textarea{
    width: 100% !important;
    min-height: 120px;
    margin: 1em 0;
    resize: none;
}
.add-review input[type="text"]:nth-child(3){
    width:100%;
    margin:1em 0;
}
.add-review input[type="submit"]{
    outline: none;
    padding: 14px 0;
    background: #2fdab8;
    border: none;
    width: 20%;
    font-size: 1em;
    color: #fff;
    font-weight: 700;
    letter-spacing: 2px;
}
.add-review input[type="submit"]:hover{
    background: #000;
}
.nav .open > a, .nav .open > a:hover, .nav .open > a:focus {
    background-color: #2fdab8;
    color:#fff;
}
.product-men.single {
    margin: 0;
}
.w3_agile_latest_arrivals {
    margin: 4em auto 0;
}
.responsive_tabs_agileits {
    margin-top: 3em;
}
.single_page_agile_its_w3ls {
    padding: 2em;
    border: 1px solid #ddd;
}
.single_page_agile_its_w3ls h6 {
    font-size: 1.2em;
    text-transform: uppercase;
    font-weight: 700;
    letter-spacing: 1px;
    color: #292929;
    margin-bottom:0.5em;
}
.single_page_agile_its_w3ls p {
    line-height: 2em;
}
p.w3ls_para {
    margin-top: 1em;
}
/*-- Ratings --*/
.rating1 {
    direction:ltr;
}
.starRating:not(old) {
    display: inline-block;
    height: 18px;
    width:100px;
    overflow: hidden;
}

.starRating:not(old) > input{
  margin-right :-26%;
  opacity      : 0;
}

.starRating:not(old) > label {
    float: right;
    background: url(../images/1.png);
    background-size: contain;
    margin-right: 2px;
}

.starRating:not(old) > label:before{
  content         : '';
  display         : block;
  width           : 18px;
  height          : 18px;
  background      : url(../images/2.png);
  background-size : contain;
  opacity         : 0;
  transition      : opacity 0.2s linear;
}

.starRating:not(old) > label:hover:before,
.starRating:not(old) > label:hover ~ label:before,
.starRating:not(:hover) > :checked ~ label:before{
  opacity : 1;
}
/*-- //Ratings --*/
/*-- //single-page --*/
</style>
<!-- // product_single.php  --> 


 <?php 
    include("footer.php");
?> 