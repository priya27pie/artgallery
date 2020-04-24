<?php include('header.php');
$tot=$_SESSION['total'];
$show=new Oops($db);
?>


<div class="col-md-9">

<div class="mail">
			<h3>Place Your Order</h3>
			<div class="agileinfo_mail_grids" style="border:1px solid #ccc; padding:2em;">
	<?php
if(isset($_POST['sub'])){

$status=$_POST['pay_status']=="COD"?'PLACED':'PENDING';
$order_id=$_POST['order_id'];
if($_POST['pay_status']=='COD'){
unset($_SESSION["cart_item"]);	  

}
$allowed = ["address","pay_status"];
$params = [];
$setStr = "";
foreach ($allowed as $key)
{
    if (isset($_POST[$key]) && $key != "uid")
    {
        $setStr .= "`$key` = :$key,";
        $params[$key] = htmlspecialchars(strip_tags($_POST[$key]));
    }
}
$setStr = rtrim($setStr, ",");
$setStr .= ",`status` = :status";
$params['order_id']=$order_id;
$params['status'] =$status;

$show->table ='place_order';
$show->cols =$setStr;
$show->id_name ='order_id';
//print_r($setStr);
$show->params =$params;

if($show->update_all()){ echo "<script>alert('Redirecting to Payment....');
			    window.location.href='place_online_order.php?id=$order_id';</script>";
		        echo "Your order has been placed thank you";}
    

}
?>
				<div class="clearfix"> </div>
				
				
			</div>
		</div>
</div>
</div>

<?php
include('footer.php');

?>
