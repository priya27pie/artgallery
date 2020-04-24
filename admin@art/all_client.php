<?php include 'header.php' ;

$show=new Oops($db);
?>
<script type="text/javascript">
	function send(){
		
		if(window.confirm("Do You Really Want To Delete The Data??")){
			
			return true;
		}
		else return false;
		
		
	}	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>       <!-- Navbar -->

            <!-- End Navbar -->
          
		<div id="page-wrapper">


			<div class="main-page">
				
					<div class="tables">
					
						<h3 class="title1">All Clients</h3>
					<div class="panel-body widget-shadow">
			

                                    <table class="table table-hover table-striped" id='example'>
                                        <thead>
                                            <th>ID</th>
                                            <th>client ID</th>
                                            <th>Name</th>
                                            <th>Email / Phone</th>
                                            <th>State</th>
                                            <th>City/Pincode</th>
                                            <th>Address</th>
                                            <th>Date</th>

                                            <th>Delete</th>
                                            
                                        </thead>
<tbody>
		
<?php
			
$count=1;
$sr='client';
$stmt =$show->readAll($sr);
$num = $stmt->rowCount();
     
     if($num>0){
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $id=$row['id'];     
       

		echo "<tr>
		<td>$count</td>
		<td>".$row['client_id']."</td>
		<td>".$row['name']."</td>
		<td>".$row['email']."<br>".$row['phone']."</td>
		<td>".$row['state']."</td>
		<td>".$row['city']."<br>".$row['pincode']."</td>
		<td>".$row['address']."</td>

		<td>".date('d-m-Y',strtotime($row['created_at']))."</td>

		<td>
		<a href='delete.php?id=$id&table=$sr&url=".$_SERVER['REQUEST_URI']."' class='label label-danger' onclick='return send();'>Delete</a>
		</td>
		</tr>";
			

 ++$count;
 }
}

?>							
</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
           
                    </div>
               
<?php include 'footer.php' ?>
