<?php
include('header.php');
$show=new Oops($db);
?>
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h2 class="page-header">All Products</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
        	
			<table class="table" id="example">
							<thead>
								<tr>  
								  <th>Sl</th>
								  <th>Date</th>
								   <th>Product Id</th>
								  <th>Category</th>
								  <th>Product Name</th>
								
								    <th>Image</th>   
								<th>Edit/Delete</th>
								</tr>
							</thead>
							<tbody>

<?php

$count=1;
$stmt=$show->readAll('product');
$num=$stmt->rowCount();
if($num>0){
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	//$status=$row['status'];
$pro_id=$row['product_id'];
$id=$row['id'];
$s=$show->readwithdata_clause('product_img','product_id',$pro_id,'limit 1');
$row1=$s->fetch(PDO::FETCH_ASSOC);
$img=$row1['image'];
	echo "	<tr>
                        <td>$count</td>
                        <td>".date('d-m-Y',strtotime($row['date']))."</td>
                        <td>".$row['product_id']."</td>
                        <td>".$row['category']."</td>
                        <td>".$row['name']."</td>
                        
                        <td><img src='imgs/".$img."' width='80' height='50'></td>
                        
                        <td><a href='edit_product_final.php?id=$pro_id' class='label label-info'>Edit</a>
		<a href='delete.php?id=$id&table=product&url=".$_SERVER['REQUEST_URI']."' class='label label-danger' onclick='return send();'>Delete</a>
                        </td>
                        </tr>";
                        
                        ++$count;
								}

}else{
    
    
}
?>							
								</tbody></table>
					</div></div>         
                </div>
            </div>
        </div>

<script type="text/javascript">
            // When the document is ready
             $(document).ready(function(){
       $("#date").datepicker({
	   format: 'dd-mm-yyyy',
	   
	   });
	  
	 
       });
</script>
		<!--footer-->
<?php

include('footer.php');
?>		