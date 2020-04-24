<?php
include('header.php');
?>
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
	
	function send(){
		
		if(window.confirm("Do You Really Want To Delete The Posted Bill??")){
			
			return true;
		}
		else return false;
		
		
	}
  </script>
  
  
  
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	 <script>
  $(document).ready(function(){
	  $('#example').DataTable();
  
 });
 
  </script>
	
    	
		<div id="page-wrapper">
			<div class="main-page">
				
					<div class="tables">
					
						<h3 class="title1"> Placed(Not Paid) Bill</h3>
					<div class="panel-body widget-shadow" style="overflow:auto;">
			
	
			<table class="table" id="datatable">
							<thead>
								<tr>  
								  <th>Sl</th>
								  <th>Bill No</th>
								  <th>Customer Email</th>
								   <th>Amount</th>   <th>Bill Time</th> 
								    <th>Payment Mode</th> 
								    <th>Payment Id</th> 
								    <th>Status</th> 
						<th>Bill</th> 	

							
								<th>Show/Delete</th>
								</tr>
							</thead>
							<tbody>

<?php

$count=1;

$date1=date("Y-m-d")." 00:00:00";
$date2=date("Y-m-d")." 23:59:59";

$sq="select * from place_order where date between '$date1' and '$date2' and status!='paid'  group by order_id order by id desc ";
$r=$con->prepare($sq);
$r->execute();
while($row = $r->fetch(PDO::FETCH_ASSOC)){
	//$status=$row['status'];
$pro_id=$row['order_id'];

$paym=$row['pay_status'];

$txid=empty($row['txid'])?"---":$row['txid'];

echo "	<tr>
								  <td>$count</td>
								  <td>".$row['order_id']."</td>
								  <td>".$row['user_id']."</td>
								  <td>".$row['amount']."</td>
								  <td>".$row['date']."</td>
								    <td>".$paym."</td>
								    <td>".$txid."</td>
									<td>".$row['status']."</td>
								<td><a href='bill_final.php?user=".$row['user_id']."&order=".$pro_id."' target='_blank'class='label label-info'>Show Bill</a></td>


								   <td><a href='show_bill.php?id=$pro_id' class='label label-info'>Edit</a>
								  <a href='#' class='label label-danger' onclick='return send();'>Delete</a>
								 </td>
								</tr>";

++$count;
								}

?>						
								</tbody></table>
					</div></div>
			</div>
		</div>
		<!--footer-->
			<?php 
		
		include('footer.php');
		?>