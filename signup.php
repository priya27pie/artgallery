<?php 
    include("header.php");
    $show=new Oops($db);
?>
<script>
$(document).ready(function(){
$('#phn').keyup(function(){
var phn1=$('#phn').val();
//alert(phn1);
$.ajax({
type:"POST",
url:"ajax_check_phone.php",
data:$('#form').serialize(),
success:function(html){
$("#error_phone").html(html);
$('#btn').disable=true;     
     
 }
});
});    
});
$(document).ready(function(){
$('#em').keyup(function(){
var em=$('#em').val();
//alert(em);
$.ajax({
type:"POST",
url:"ajax_email.php",
data:$('#form').serialize(),
success:function(html){
$("#error_em").html(html);
$('#btn').disable=true;     
     
 }
});
});    
});

function check_pass(){
  $('#reg_confirm_pass').on('keyup', function () {
  if($('#reg_pass').val() == $('#reg_confirm_pass').val()) {
      
  $('#message').html('Matched').css('color', 'green');
   document.getElementById("btn").disabled = false;
  }else{ 
  $('#message').html('Not Matching').css('color', 'red');
  document.getElementById("btn").disabled = true;
}
});
}
</script>
<div class="banner-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
                <h3>Registration</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li></li>
                    <li class="active">Registration</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="signup_form">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <div class="form-main">
                    <form method="post" id="form">
                        <div class="form-group">
                             <label for="text">Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="" placeholder="Name" required>
                                        <input type="hidden" name="tablename" value="client">

                        </div>
                         <div class="form-group">
            			    <label for="sex">Sex :</label>
                              <span><input type="radio" id="male" name="sex" value="Male" required>Male</span>
                              <span><input type="radio" id="female" name="sex" value="Female" required>Female</span>
                              <span><input type="radio" id="other" name="sex" value="Other" required>Other</span>
            			</div>
                        <div class="form-group">
                            <label for="mobile">Mobile No</label>
                            <input type="text" id="phn" name="phone" title="please give phone number" pattern="[0-9]{10}" placeholder="+91 **********" required="">                        </div>
                                    <div id="error_phone"></div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="em" aria-describedby="" placeholder="Enter email" required>
                            <div id="error_em"></div>

                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" placeholder="Address" required></textarea> 
                        </div>  
                        <div class="form-group">
                            <label for="States">States</label>
                         <select  name="st" class="form-control">
                                    <option value="">State</option>
                            <?php  
                            $table1='state_list';
                            $stmt=$show->state($table1);
                            $num=$stmt->rowCount();
                            if($num>0){
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                            	
                            echo "<option value='".$row['state']."'>".$row['state']."</option>";
                            }
                            }
                            
                            ?>
                </select>	   
    					</div>
                        <div class="form-group">
                            <label for="Cities">City</label>
                         <input type="text" class="form-control" aria-describedby="" name="city" placeholder="City">

    					</div>    					
                        <div class="form-group">
                            <label for="pin">Pincode</label>
                            <input type="text" class="form-control" name="pincode" pattern="[0-9]+" maxlength="7" title="Please give correct format" aria-describedby="" placeholder="Pincode">
                        </div>                        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="reg_pass" placeholder="Password" required>
                        </div>
                        <div class="form-group">
            			    <label for="com-password">Confirm Password :</label>
            				<input type="password" placeholder="Confirm Password" name="cpassword1" onkeyup="check_pass()" id="reg_confirm_pass" required="">
            		                <div id="message"></div>

            			</div>
                        <button type="submit" name="sub" id="btn" class="btn">Sign Up</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

    <?php
if(isset($_POST['sub'])){
   // $status='Active';
    include 'ids.php';

     $table='client';
      $data = array(
    'client_id' => $uid, 
    'name' => htmlentities(strip_tags($_POST['name'])), 
    'phone' => htmlentities(strip_tags($_POST['phone'])), 
    'email' => htmlentities(strip_tags($_POST['email'])), 
    'sex' => htmlentities(strip_tags($_POST['sex'])),
    'password' =>md5($_POST['cpassword1']),
    'address'=>htmlentities(strip_tags($_POST['address'])),
    'state'=>htmlentities(strip_tags($_POST['st'])),
    'city'=>htmlentities(strip_tags($_POST['city'])),
    'pincode'=>htmlentities(strip_tags($_POST['pincode'])),
    'created_at'=>date('d-m-Y'),
   'update_by'=>'SELF'
    );
print_r($data);
if($show->insert($table,$data)){
    
 echo "<script>alert('Thank you for Registration.Please login to continue.');window.location.href='login.php';</script>";
 }
  
}
?>       
      


<?php 
include("footer.php");
?>
