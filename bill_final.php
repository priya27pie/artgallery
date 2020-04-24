<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
ob_start();
session_start();
include('admin@art/inc/db.php');
include('admin@art/inc/oops.php');
include('admin@art/inc/database.php');
$database = new Db();
$db = $database->getConnection();
$user=$_REQUEST['user'];
$order=$_REQUEST['order'];
$show=new Oops($db);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Bill</title>
<style type="text/css" media="print">
    @page 
    {
        size:  auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }

    html
    {
        background-color: #FFFFFF; 
        margin: 0px;  /* this affects the margin on the html before sending to printer */
		
    }

    body
    {
       
    }
	</style>
<style>
body{font-family: 'Open Sans', sans-serif; font-size:12px;}
table{ border-collapse:collapse; width:100%;}
table tr,td,th{ border:1px solid #333; padding:6px;}
div.table{margin:2% 2%;}
.left-border{
	border-left: 1px solid #000;}
table.top tr:nth-child(1) p { margin-top: 0px !important;
margin-bottom: 0px !important; text-align:left;}
table.top tr:nth-child(2){ border-bottom:none;}
table.top tr:nth-child(3){border-top:none; border-bottom:none;}
table.top tr:nth-child(4){border-top:none;}
table.top tr:nth-child(2) td{text-align:left;}
table.top tr:nth-child(3) td{text-align:left;}
table.top tr:nth-child(4) td{text-align:left;}
label{
	font-weight:bold;}
.no{border:none;}
table.no tr th{
	border:none;}
.heigh{
	border-top:none;
	text-align:center;
	}
	table.heigh tr:last-child td{ padding-bottom:1em;}
	table.heigh tr,td{}
	table.top{border:1px solid #333;}
	table.top tr,td{ border:none;}
	table.bottom td{ text-align:left; border:none;}
	table.bottom tr:nth-child(1){ border-bottom:none;}
	table.bottom tr:nth-child(2){ border-bottom:none; border-top:none;}
	table.bottom tr:nth-child(3){ border-top:none;}
	table.bottom tr:nth-child(4) td{ padding-top:5em; padding-bottom:2em;}
	.text-center{ text-align:center !important;}
	.text-right{ text-align:right !important;}
.print{padding:7px 15px; margin:0 auto; background:rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #cae0b0 0%, #a6cb7a 2%, #6da42b 100%) repeat scroll 0 0; background:#619126; Color:#fff; }
.no-print{ margin:2em 0;}
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>
<link href='//fonts.googleapis.com/css?family=Montserrat+Alternates:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Racing+Sans+One' rel='stylesheet' type='text/css'>
</head>
<body><?php
	$sq="select * from place_order inner join client on client.client_id = place_order.user_id where place_order.user_id='".$user."' and place_order.order_id='".$order."' order by place_order.id desc limit 1";
	$r=$con->prepare($sq);
	$r->execute();
	$c=$r->rowCount();
if($c<=0){
	echo "";
}else{
	while($row = $r->fetch(PDO::FETCH_ASSOC)){
	
	$add=$row['address']; 
	$order=$row['order_id'];
	$amt=$row['amount'];
	$pin=$row['pincode'];
	$state=$row['state'];

	$name=$row['name'];
	$id=$row['user_id'];
	$phn=$row['phone'];

	}
}
$stmt1=$show->readwithdata('place_order','order_id',$order);
$num1=$stmt1->rowCount();
if($num1>0){
	while($row=$stmt1->fetch(PDO::FETCH_ASSOC)){
	 
	$add1=$row['address']; 
	//$pin1=$row1['pincode'];
	$pay_st=$row['pay_status'];
	$amount=$row['amount'];

}
}
	?>
<div class='privacy about' style='padding:0 5em 5em 2em;'>
<div class="table">
<table class="top">
<tr>
<td colspan="4" class="text-center" style="border-bottom:1px solid #000;"><label>Thank you for shopping with us !!</label></td>
</tr>
<tr>

<td width="30%">
<p><b><h2>dnmsquareart.com</h2></b></p>
<h4>Address</h4>
<p>Madhurwada, Visakhapatnam,</p>
<p>Andhra Pradesh pin:530048</p>
<p>Registried address: 18-221/3 Devarakonda,</p>
<p>Nalagonda District, Telangana</p>
<p>Email : ganapathiart@gmail.com</p>
<p>contact@dnmsquareart.com</p>
<p>Phone : 9492871006</p>
</td>
</td>
<td width="30%"><h2 class="text-center"> DNMSQUAREART</h2></td>
<td width="20%" class="text-right"><img src="images/bill-logo.png" width="100%" /></td></tr>
</table>
<style>
table.new-table{
border:solid 1px #000;}
table.new-table tr th{
border:solid 1px #000;}
table.new-table tr{
border:none;}
table.new-table tr td.no-left{
border-right:1px solid #000;
}
</style>
<table width="100%" class="new-table">

<tr>
	<th colspan="2" class="text-center">BILLED To</th>
    <th colspan="2" class="text-center">SHIP TO</th>
    <th colspan="2" class="text-right">DNMSQUAREART</th>
    </tr>
    <tr>
    	<td colspan="2" rowspan="2" class="no-left">
        <p><label>Name</label>: <?php echo $name;?></p>
   	    <p><label>Address</label>: <?php echo $add;?></p>
   	    <p><label>State</label>: <?php echo $state;?></p>
   	    <p><label>Pin Code</label>: <?php echo $pin;?></p>
   	    <p><label>Contact</label>: <?php echo $phn;?></p>
        </td>
    	<td colspan="2" rowspan="2" class="no-left">
        <p><label>Name</label>: <?php echo $name;?></p>
   	    <p><label>Address</label>: <?php echo $add1;?></p>
   	    <p><label>State</label>: <?php echo $state;?></p>
   	    <p><label>Pin Code</label>: <?php echo $pin;?></p>
   	    <p><label>Contact</label>: <?php echo $phn;?></p>
        </td>
        <td colspan="2"></td>
    </tr>
    <tr>
    	<td colspan="2" class="text-right">
                 <?php
        $total1=0;
        $stmt1=$show->readwithdata('bill','order_id',$order);
        $num1=$stmt1->rowCount();
        if($num1>0){
	    while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
	 
		$total=intval($row1['quantity']*$row1['price']);
		$total1+=$total;
		$price=$row1['price'];
	    $in=$price; 
}
}
?>
        <p>Rs  <?php echo $amount; ?></p>
        <p>Invoice ID <?php echo $order; ?></p>
        <p>Invoice Date <?php echo date("d-m-Y"); ?></p>
        <p>Amount (INR)<?php echo $amount; ?></p>
        </td>
    </tr>
    <tr>
    	<td colspan="6" style="border:1px solid #000;">&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="6" style="border:1px solid #000;"><h2 class="text-center">Order Id: <?=$order;?></h2></td>
    </tr>
</table>
<table class="no">
<tr>
<th width="30%">Item</th>
<th width="14%">Quantity</th>
<th width="14%">Paper Size</th>
<th width="14%">Unit Cost</th>
<th width="14%">Total</th>
</tr>
</table>
<table class="heigh">
<?php
$stmt1=$show->readwithdata('bill','order_id',$order);
$num1=$stmt1->rowCount();
if($num1>0){
	while($row=$stmt1->fetch(PDO::FETCH_ASSOC)){
		$total=intval($row['quantity']*$row['price']);
		$total1+=$total;

	  ?>
<tr>
<td width='30%'><?=$row['product_name']?></td>
<td width='14%'><?=$row['quantity']?></td>
<td width='14%'><?=$row['size']?></td>
<td width='14%'><?=$row['price']?></td>
<td width='14%'><?=$total?></td>

</tr>
<?php } } ?>
<tr>
<td width='40%' colspan="2" rowspan="5"></td>
<td width='10%' class="left-border">Gross Total</td>
<td width='10%'>&nbsp;</td>
<td width='10%'>&nbsp;</td>

<td width='1%'><?php echo $amount; ?></td>
</tr>
<tr>
  <td class="left-border">Total</td>
  <td>&nbsp;</td>
  <td width='10%'>&nbsp;</td>
  <td></td>
</tr>


<tr>
  <td class="left-border">
  	<label>ORDER TOTAL(INR)</label>
  </td>
  <td>&nbsp;</td>
  <td width='10%'><?php echo $amount; ?></td>
  <td></td>
</tr>

<tr>
	<td colspan="6">Happy to assist you 24*7 -  9492871006</td>
</tr>
<tr>
	<td colspan="6">To provide feedback please write to contact@dnmsquareart.com</td>
</tr>
</table>


<!--<table class="bottom">
<tr><td>Total Amount in Dollar $</td><td width="15%" class="text-center">aaaaaa</td></tr>

<tr><td>Point Balance Discount</td><td width="15%" class="text-center">aaaaaaa</td></tr>
<tr><td><hr />Total Payable(In Words) :  aaaaaa</td><td width="15%" class="text-center"><hr />aaaaaaa</td></tr>

<tr><td><hr />Total Payable(In Words) : aaaaa</td><td width="15%" class="text-center"><hr />aaaaaaaa</td></tr>
<tr><td></td><td class="text-center"><hr />Royal-kart.com</td></tr>
</table>-->
<div class="no-print" align="center">
<button onclick="myFunction()" class="print">Print this page</button>
<div>
<script>
function myFunction() {
    window.print();
}
</script>
</div>
</body>
</html>
