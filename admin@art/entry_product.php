<?php

include('header.php');
$show=new Oops($db);

?>
<script src="tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
 <script type="text/javascript">
        $(document).ready(function(){
            // Add more
            $('#addmore').click(function(){
                // Get last id 
                var lastname_id = $('.tr_input input[type=text]:nth-child(1)').last().attr('id');
                var split_id = lastname_id.split('_');
              //  alert('ss');
                // New index
                var index = Number(split_id[1]) + 1;

                // Create row with input elements
                var html = "<div class='tr_input'><table class='table'><tbody><tr><td><input type='text' id='testcode_"+index+"' name='size[]'/></td><td><input type='text' id='testcode_"+index+"' name='price[]'/></td><td><a href='javascript:void(0);' id='remove_field' class='btn btn-danger remCF' >-</a></td></tr></tbody></table></div>";

                // Append data
                $('#tab').append(html);
				
				
            });
			
       $("#tab").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
       });
	   
  
    </script>		
        <!--  page-wrapper -->
          <div id="page-wrapper">
<div class="main-page">
       
                    <!-- Form Elements -->
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Entry Product:</h4>
						</div>
                        <div class="form-body">
                     <form role="form" method="post" enctype="multipart/form-data">
                    <div class="col-lg-3"> 
                    <div class="form-group">
                    <label>Category</label>
                    
                    <select name="category" class="form-control" required>
                    <option value="">Category</option>
                    <?php  
                    $table='category';
                    $stmt=$show->readAll($table);
                    $num=$stmt->rowCount();
                    if($num>0){
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    	
                    echo "<option value='".$row['category']."'>".$row['category']."</option>";	}
                    }
                    
                    ?>
                    </select>
                    </div> </div>
                                   
                    <div class="col-lg-4"> 
                    <div class="form-group">
                    <label>Product Name</label>
                    
                    <input type="text" name="pname"  class="form-control" placeholder="Product Name" required>
                    </div>       
                    </div> 
                                    
                    <div class="col-lg-4"> 
                    <div class="form-group">
                    <label>Paper Color</label>
                    
                    <input type="text" name="paper" class="form-control" placeholder="Paper Color" required>
                    </div>       
                    
                    </div> 
                    <div class="col-lg-6"> 
                    <div class="form-group">
                    <input type="hidden" id="getid" value="1">
                    <label>Add Size</label>
                    <div class='tr_input' id="tab" style="border:none !important;">
                    <table class="table">
                    <thead><tr>
                    <th>Size</th>   
                    <th>Price</th>   
                    <th>Add/Remove</th>		
                    </tr> </thead>  
                    <tbody>
                    <tr>
                    <td><input type='text'  id='dtestcode_1' name='size[]'> </td>
                    <td><input type='text'  id='dtestcode_1' name='price[]'></td>
                    <td><input type='button' class="btn btn-info" value='+' id='addmore'></td>
                    </tr>  
                    </tbody>
                    
                    </table>
                    </div>       
                    </div>       
                    
                    </div> 
                    <div class="col-lg-6"> 
                    <div class="form-group">
                    <label>Image</label>
                    
                    <input type="file" name="img[]" >
                    		  <input type="file" name="img[]">
                              <input type="file" name="img[]">
                    </div>       
                    
                    </div> 
                    <div class="col-lg-12"> 
                    <div class="form-group"> 
                    <label>Description</label>	  
                    <textarea placeholder="Description" name="desc"> </textarea>
                    
                    </div>       
                    </div> 	
                    <div class="col-lg-6"> 			 
                    <input type="submit" class="btn btn-primary" name="sub" value="submit">
                    <button type="reset" id="" class="btn btn-success">Reset Button</button>
                    </div> 			
				</form>
 <?php
if(isset($_POST['sub'])){
	
include 'ids.php';	
if(isset($_POST['size'])){

foreach($_POST['size'] as $key=>$n){
    
   $data=array(
   'product_id'=>$uid,
   'size'=>htmlentities(strip_tags($_POST['size'][$key])),
   'price'=>htmlentities(strip_tags($price=$_POST['price'][$key])),
	);
	$r=$show->insert('product_size',$data);
}   
}
if(isset($_FILES['img'])){
echo "aa";
echo "aa";
foreach($_FILES['img']['tmp_name'] as $key=>$value){
     
$extension = pathinfo($_FILES["img"]["name"][$key], PATHINFO_EXTENSION);
$file=explode(".",$_FILES["img"]["name"][$key]);
$filename = str_replace(" ", "_", $file[0]);
$pic=$filename.".".$extension;
$img1=uniqid().$pic;
        $data1 = array(
        'product_id' => $uid,  
        'image' => $img1,
        );
		if(move_uploaded_file($_FILES['img']['tmp_name'][$key],"imgs/".$img1)){
        if($show->insert('product_img',$data1)){
        }
		}
}   
}

  
   $data=array(
   'product_id'=>$uid,
   'name'=>htmlentities(strip_tags($_POST['pname'])),
   'paper'=>htmlentities(strip_tags($price=$_POST['paper'])),
   'description'=>htmlentities(strip_tags($price=$_POST['desc'])),
   'category'=>htmlentities(strip_tags($price=$_POST['category'])),
   'updated_by'=>'Admin',
   'date'=>date('d-m-Y')
	);
if($show->insert('product',$data)){

        echo "<script>sweetAlert('OK','Thank you for entering all Documents','success');</script>";

}

	
	
}
?>	                
                       </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
               
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