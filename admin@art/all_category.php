<?php

include('header.php');
$show=new Oops($db);

?>

<script src="tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
		
        <!--  page-wrapper -->
          <div id="page-wrapper">
			<div class="main-page">
				
         <div class="tables">
                    <!-- Form Elements -->
               <h3 class="title1">All Category</h3>
					<div class="panel-body widget-shadow">
		<table class="table" id="example">
			<thead>
				<tr>
				<th>ID</th>
				<th>Category</th>
				<th>Delete</th>
                                            
				</tr>
			</thead>
			<tbody>
	<?php
			
$count=1;
$sr='category';
$stmt =$show->readAll($sr);
$num = $stmt->rowCount();
     
     if($num>0){
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $id=$row['id'];     
       

		echo "<tr>
		<td>$count</td>
		<td>".$row['category']."</td>		
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
                     <!-- End Form Elements -->
                </div>
            </div>
        
<?php
if(isset($_POST['sub'])){

	$table="category";
	$col="category";
	$data=htmlspecialchars(trim($_POST['category']));
$r=$show->readwithdata($table,$col,$data);
$num=$r->rowCount();
if($num>0){
	
echo "<script>sweetAlert('Oops','Category Exists','error');</script>";

}else{
	$data=array(
    'category'=>htmlentities(strip_tags($_POST['category'])),
	);
	$r1=$show->insert('category',$data);
	if($r1){
	echo "<script>sweetAlert('Ok','Category is added','success');</script>";
	
	}
	
}
}
?>	
<script src="js/bootstrap-datepicker.js"></script>
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