<?php
include('header.php');
$pid=$_REQUEST['id'];
?>

 <script src="tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });
  
  function show(){
	  
var file1 = $('#file1').val();
//alert(file1);
	 $.ajax({
        type: "POST",
        url: "upload_img.php", // Name of the php files
        data: "file1="+file1,
        success: function(html)
        {
            $("#s1").html(html);
		//	alert('jj');
			//document.getElementById("hide").style.display="none";
        }
    });  }
    
    function fill(Value,Value2)
{
$('#fli').val(Value);
$('#display').hide();
$('#ven_id').val(Value2);



}

$(document).ready(function(){
$("#fli").keyup(function() {
var name = $('#fli').val();
if(name=="")
{
$("#display").html("");
}
else
{
$.ajax({
type: "POST",
url: "fetch.php",
data: "name="+ name ,
success: function(html){
$("#display").html(html).show();

}
});
}
});
});
  </script>
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
                var html = "<div class='tr_input'><table class='table'><tbody><tr><td><input type='text' id='testcode_"+index+"' name='nsize[]'></td><td><input type='text' id='testcode_"+index+"' name='nprice[]' /><input type='hidden' value='<?=$_REQUEST['id']?>' name='product_id' maxlength='10'> </td><td><a href='javascript:void(0);' id='remove_field' class='btn btn-danger remCF' >-</a></td></tr></table></div>";

                // Append data
                $('#tab').append(html);
            });
			
           $("#tab").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    	});
       });
       
    </script>
        <div id="page-wrapper">
        <div class="main-page">
       
        <div id="col-md-12">
        
        
        <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
        <div class="form-title">
        <h4>Edit Product Entry</h4>
        </div>
        <div class="form-body">
        <?php  
         $show=new Oops($db); 
        $sq=$show->readwithdata('product','product_id',$pid);
        $num=$sq->rowCount();
        if($num>0){
        while($row=$sq->fetch(PDO::FETCH_ASSOC)){
        
        $pro_id=$row['product_id'];	
        $pname=$row['name'];
        $paper=$row['paper'];
        $desc=$row['description'];
        $cate=$row['category'];

                }					
        }
        ?>
        <form method="post" data-toggle="validator" enctype="multipart/form-data" action=""> 
        
        <div class="col-md-3">
        
        <label>Product Category</label>
        <select name="category" class="form-control" required>
        <option value="">Category</option>
        <?php  
        $table='category';
        $stmt=$show->readAll($table);
        $num=$stmt->rowCount();
        if($num>0){
        	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        		
        echo "<option value='".$row['category']."'";if($cate==$row['category']) echo "selected"; echo ">".$row['category']."</option>";	}
        }
        
        ?>
         </select>
        
        
        </div>
       
        <div class="col-md-6">
        
        <label>Product Name</label>
        <input type="hidden" class="form-control" value="<?php echo $pro_id; ?>" name="pid" size="30" /> 

        <input type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo $pname; ?>" size="30" required> 
        </div>
        <div class="col-md-3">
        <label>Product Paper</label>
        <input type="text" class="form-control"  value="<?php echo $paper; ?>" title="Please Provide the price" placeholder="Product Price" name="paper" size="30" required> 
                
        
        </div>
         <div class="col-md-6">
        <label>Product Image</label>

        <table class="table">
        <thead>
        <tr>  
        <th>Sl</th>
        <th>Image</th> 
        <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //			echo $_SERVER['REQUEST_URI'] ;
        $count=1;  
        $sq=$show->readwithdata('product_img','product_id',$pid);
        $num=$sq->rowCount();
        if($num>0){
        while($row=$sq->fetch(PDO::FETCH_ASSOC)){
                $id=$row['id'];

        echo "<tr>
        <td>$count</td>
        <td><img src='imgs/".$row['image']."' width='80' height='50'></td>
	   <td><button id='butinfo_".$row['id']."' class='btn btn-info btn-xs userinfo'>Edit Image</button> 
        

        </td>
        </tr>";	
        
        ++$count;
        }
        }
        
        
        ?>	

        </tbody></table>
        
           
        
        </div>
           <div class="col-md-6">
         <label>Product Size & Price</label>

        <table class="table">
        <thead>
<tr><th>Size</th><th>Price</th></tr>   

        </thead>
        <tbody>
      
        <?php
        
$array_size = array(); 
$array_price = array(); 
$array_dis = array(); 
$array = array(); 


        $sq1=$show->readwithdata('product_size','product_id',$pid);
        $num1=$sq1->rowCount();
        if($num1>0){
        while($row1=$sq1->fetch(PDO::FETCH_ASSOC)){
        $array_size[] = $row['size'];
        $array_price[] = $row['price']; 
 ?>  

<tr>
<td><input type="checkbox" name="size[]" value="<?=$row1['size']?>" checked><?=$row1['size']?></td>
<td><input type="text" name="price[]" value="<?=$row1['price']?>" >
<input type="hidden" name="id[]" value="<?=$row1['id']?>" >
</td>
<td>
<a href="delete.php?id=<?=$row1['id']?>&table=product_size&url=<?=$_SERVER['REQUEST_URI']?>" class='label label-danger' onclick='return send();'>Delete</a>

</td>

</tr>
<?php  } } ?>
  
        </tbody></table>
        <input type="hidden" name="all_size" value="<?= implode(" ",$array_size)?>" >
        <input type="hidden" id="getid" value="1">
		<input type="hidden" id="lastdata" >
        <table class="table">
            <label>Add New Size</label>
        <tr>
        <td><label>Size</label></td>   
        <td><label>Price</label></td>   
        </tr>    
        </table>
       <div class='tr_input' id="tab" style="border:none !important;">
        <table class="table">
        <tbody>
        <tr>
        <td>
      <input type='text'  id='dtestcode_1' name='nsize[]' maxlength='10' > 
</td>   
        <td><input type='text'  id='dtestcode_1' name='nprice[]' maxlength='10' >  </td>
        <input type='hidden' id='dtestcode_1' value="<?=$_REQUEST['id']?>" name='p_id[]' maxlength='10'> 
        </td>
        <td><input type='button' class="btn btn-info" value='+' id='addmore'></td>
        </tr>  
       </tbody>
        
        </table>
        </div>     
				
        
        <div class="clearfix"></div>
        </div>

        <div class="col-md-12">
        
        <label>Description</label>
        
        <textarea class="form-control" name="description" required> <?php echo $desc; ?></textarea>	</div>
        <div class="col-md-6">
        
        
        <input type="submit" class="btn btn-info" name="sub" value="Submit">
        </div>
        </form> 

        </div>
        
        </div>
                         <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">User Info</h4>
                        </div>
                        <div class="modal-body">
                     <form method="post" id="insert_form" enctype="multipart/form-data">  
                        
                          <label>Image</label>  
                          <input type="file" name="file" onchange="return fileValidation('file')" id="file" class="form-control" />  
                         <br />
                        <input type="hidden" name="image" id="image" />  
                          <input type="hidden" name="id" id="id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>     
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                  
                </div>
            </div>
        
<?php		
 
if(isset($_POST['sub'])){

$allowed = ["category","name","paper","description"];
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
$params['product_id'] =$_POST['pid'];
$show->table ='product';
$show->cols =$setStr;
$show->id_name ='product_id';
$show->params =$params;   


if(isset($_POST['nsize'])){
foreach($_POST['nsize'] as $key=>$n){
  
   $data=array( 
    'price'=>htmlentities(strip_tags($_POST['nprice'][$key])),
	'product_id'=>$_POST['pid'],
    'size'=>htmlentities(strip_tags($_POST['nsize'][$key]))	
   );
   print_r($data);
   $r=$show->insert('product_size',$data);
}  
}
if(isset($_POST['size'])){
foreach($_POST['size'] as $key=>$n){
   $r="update product_size set size='".htmlentities(strip_tags($_POST['size'][$key]))."' where id='".$_POST['pid']."'";
  $stmt=$con->prepare($r);
   $stmt->execute();
} 
}
$r=$show->update_all();
if($r){
    echo "<script>window.location.href='".$_SERVER['REQUEST_URI']."'</script>";
}

}
        
        
        ?>				
        
        </div>
        
        
        </div></div>			
   <script type='text/javascript'>
$(document).ready(function(){
$('.userinfo').click(function(){
var id = this.id;
var splitid = id.split('_');
var userid = splitid[1];
$.ajax({
url: 'ajax_check.php',
type: 'post',
dataType:"json",  
data: {userid: userid},
success: function(data){ 
$('#id').val(data.id);  
$('#image').val(data.image);  

$('#empModal').modal('show'); 
}
});
});
});
$('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#file').val() == "")  
           {  
                alert("File is required");  
           }  
           else  
           {  
              // var file=$('#file').val();
               //var id=$('#id').val();
                var formData = new FormData($(this)[0]); 
              //  alert(formData)
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                    // data:"file="+file+"&id="+id,  
                    data:formData,
                    cache: false,
                    contentType: false,
                    processData: false, 
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                    location.reload(); 
                   // alert(data);
                        }
                });  
           }  
      });
   function fileValidation(response){
    var fileInput = document.getElementById(response);
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}  
</script>              
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
	