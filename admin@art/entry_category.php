<?php

include('header.php');
$show=new Oops($db);

?>

<script src="tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
		
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
						Entry Category                        
						</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post">
                                        <div class="form-group">
                                         <label>Category</label>
                       
					<input type="text" name="category" class="form-control" placeholder="Category" required>
                     </div>
						<input type="submit" class="btn btn-primary" name="sub" value="submit">
						<button type="reset" class="btn btn-success">Reset Button</button>
					</form>
                      </div>
                       </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
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