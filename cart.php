<?php include('header.php');
$insert=new Oops($db);
?>
		
<!-- banner-inner -->
<div class="banner-inner">
    <div class="container">
        <div class="row">
	        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
	            <h3>Cart</h3>
	        </div>
	        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
	            <ul>
	                <li><a href="index.php">Home</a></li>
	                <li>//</li>
	                <li class="active">Cart</li>
	            </ul>
	        </div>	        
	     </div> 
	</div>     
</div>
<!--// banner-inner -->

			
	<div class="top-brands banner_bottom" style="background:none;margin: 0 0 20px 0;">
		<div class="container">
      <!-- tittle heading -->

        <h3 class="tittle-w3l aos-init aos-animate" data-aos="fade-down" style="transition:all 2300ms ease-in-out;">
        Welcome to Cart
        <span class="heading-style">
          <i></i>
          <i></i>
          <i></i>
        </span>
      </h3>
      <!-- //tittle heading -->

			<div class="agile_top_brands_grids">
				<div class="col-md-12" style="border:5px double #fee5cc; padding: 0 0 15px 0;
				-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);-moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);">
					<form class="order_cart" method="post">
					    <div class="col-md-2"><input type="text" value="Images" /></div>
				        <div class="col-md-2"><input type="text" value="Name" /></div>
				        <div class="col-md-2"><input type="text" value="Paper Size" /></div>
				        <div class="col-md-2"><input type="text" value="No.of Items" /></div>
				        <div class="col-md-2"><input type="text" value="Price" /></div>
				        <div class="col-md-2"><input type="text" value="Action" /></div>
				        <div class="clearfix"></div>

				        <div class="bod"></div>
<?php
if(isset($_SESSION["cart_item"])){
$item_total = 0;
?>	
<?php		
foreach ($_SESSION["cart_item"] as $item){
//print_r($item); 
?>				         	
						<div class="col-md-2">
						    <img src="admin@art/imgs/<?=$item['img']?>" alt="" style="width:100%;height:auto;" />
						</div>
				        <div class="col-md-2"><input type="text" name="product_name[]" value="<?=$item["pro_name"]; ?>" readonly style="color: #929292;"/>
				        <input type="hidden" name="code[]" value="<?=$item["code"]; ?>"/>
				        </div>
				        <div class="col-md-2"><input type="text" name="paper_size[]"  value="<?=$item["paper_size"]; ?>"  readonly style="color: #929292;" /></div>
				        <div class="col-md-2"><input type="text" name="qty[]" value="<?=$item["quantity"]; ?>" readonly style="color: #929292;"/></div>
						<div class="col-md-2"><input type="text" name="price[]" value="<?=$item["price"]; ?>" readonly style="color: #929292;"/></div>
				        <div class="col-md-2">
							<div class="snipcart-details top_brand_home_details">
							<a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>&size=<?php echo $item["paper_size"]; ?>" class="button" >Remove Item</a>

							</div>
						</div>
				        <div class="clearfix"></div>
<?php
        $item["price"]=explode("Rs",$item["price"]); 
        $item_total += ($item["price"][1]*$item["quantity"]);
		}
		echo"<input type='hidden' value='$item_total' name='tot'>";

		?>
<?php
}
?>				        
						<div class="totall">
					      <input type="text" value="Total :<?php echo "Rs ".$item_total; ?>"  readonly />
					    </div>
				        
						<div class="clearfix"></div>
						<div class="col-md-2">
						<div class="snipcart-details top_brand_home_details">
						   <input type="submit" value="CHECKOUT" name="sub" class="button">
						   
						</div>
						</div>
						<div class="clearfix"></div>
					</form>	

<?php 

if(isset($_POST['sub'])){
	
	if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {
	include('order_id.php');
	$item_name=$_POST['product_name'];
	$item_code=$_POST['code'];
	$item_qty=$_POST['qty'];
	$item_price=$_POST['price'];
	$item_typ=$_POST['paper_size'];

	for($i = 0; $i < count($item_name); $i++){
$price =explode("Rs",$item_price[$i]);
    $data=array(
        'order_id'=>$oid,
        'product_id'=>$item_code[$i],
        'product_name'=>$item_name[$i],
        'quantity'=>$item_qty[$i],
        'price'=>$price[1],
        'order_time'=>date('Y-m-d h:i:s'),
        'user_id'=>$_SESSION['login_id'],
        'size'=>$item_typ[$i]
       
        );
	$r=$insert->insert('bill',$data);
	}
    $data2=array(
        'order_id'=>$oid,
        'amount'=>$_POST['tot'],
        'date'=>date('Y-m-d h:i:s'),
        'status'=>'Pending',
        'user_id'=>$_SESSION['login_id'],
        'client_name'=>$_SESSION['login_user'],
        'email'=>$_SESSION['username']
      
        );
        //print_r($data2);
	$tot=intval($_POST['tot']);
    $r1=$insert->insert('place_order',$data2);

	if($r && $r1){
	$_SESSION['total']=$tot;
    echo "<script>window.location.href='place_order.php?order=".$oid."&no_of_p=".urlencode($item_qty[$i])."'</script>";		
	}

	}
	else {
		$_SESSION['redirect']='cart.php';
	//	echo "<script>alert('ok');</script>";
		echo "<p><h4>Please login to continue shopping <a href='login.php'>Login</a></h4></p>";
		echo "<br>";
	}
}
	
?>					
					
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //top-brands -->       

<?php
include('footer.php');

?>