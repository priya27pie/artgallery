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
		
		if(window.confirm("Do You Really Want To Delete The Bill??")){
			
			return true;
		}
		else return false;
		
		
	}
  </script>
    	
		<div id="page-wrapper">
			<div class="main-page">
				
					<div class="tables">
					
						<h3 class="title1">All Bill</h3>
					<div class="panel-body widget-shadow">
			
		
	
			<table class="table" id="example">
							<thead>
								<tr>  
								  <th>Sl</th>
								  <th>Bill No</th>
								  <th>Customer Email</th>
								   <th>Amount</th>   
								   <th>Bill Time</th> 
								    <th>Status</th> 
								    <th>TXNID/TXN MSG</th> 	
									<th>Bank TXN/BANK TXNID</th> 	

									<th>Bill</th> 	

								
								<th>Show/Delete</th>
								</tr>
							</thead>
							<tbody>

<?php
$show=new Oops($db);

$count=1;
$sr='place_order';
$stmt =$show->readAll($sr);
$num = $stmt->rowCount();
if($num>0){
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $id=$row['id'];
$pro_id=$row['order_id'];
	echo "	<tr>
								  <td>$count</td>
								  <td>".$row['order_id']."</td>
								  <td>".$row['user_id']."</td>
								  <td>".$row['amount']."</td>
								  <td>".$row['date']."</td>
								  	<td>".$row['status']."</td>									

								<td>".$row['txnid']."<br>".$row['txn_msg']."</td>	
								<td>".$row['bank_name']."<br>".$row['bank_txn']."</td>	
								

									<td><a href='bill_final.php?user=".$row['user_id']."&order=".$pro_id."' target='_blank'class='label label-info'>Show Bill</a></td>



								   <td><a href='show_bill.php?id=$pro_id' class='label label-info'>Edit</a>
		<a href='delete.php?id=$id&table=$sr&url=".$_SERVER['REQUEST_URI']."' class='label label-danger' onclick='return send();'>Delete</a>
								 </td>
								</tr>";

++$count;
								}

}
?>							
								</tbody></table>
					</div></div>
			</div>
		</div>
					<script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
             $(document).ready(function(){
       $("#date1").datepicker({
	   format: 'dd-mm-yyyy',
	   
	   });
	         $("#date2").datepicker({
	   format: 'dd-mm-yyyy',
	   
	   });      $("#date3").datepicker({
	   format: 'dd-mm-yyyy',
	   
	   });      $("#date4").datepicker({
	   format: 'dd-mm-yyyy',
	   
	   });
       });
        </script>
		<!--footer-->
			<?php 
		
		include('footer.php');
		?>