<?php 
    include("header.php");
    $login=new Oops($db);
?>

<div class="banner-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
                <h3>Login</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li>//</li>
                    <li class="active">Log in</li>
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
                    <form method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>

                        <button type="submit" name="sub" class="btn">Submit</button>
                    </form>
                </div>
<?php 
if(isset($_POST['sub'])){
    $login->data1=filter_var($_POST['email'],FILTER_SANITIZE_STRING);
	$login->data2=md5(filter_var($_POST['password'],FILTER_SANITIZE_STRING));
	$login->col1="email";
	$login->col2="password";
	$login->table="client";

    $r=$login->login();
 
    if($r){
    $num = $r->rowCount();
    if($num>0){
    while($row= $r->fetch(PDO::FETCH_ASSOC)) //fetching the contents of the row
    {
    extract($row);
    $uid=session_id();
    $_SESSION['Logged'] = 1;
    $_SESSION['login_user'] = $row['name'];
    $_SESSION['username'] = $_POST['email'];
    $_SESSION['login_id'] = $row['client_id'];
    $_SESSION['sessionid'] = $uid;
     //  echo 'Success!';
 //   header("location:guest/dashboard.php");
        if(!empty($_REQUEST['pg'])){
        $location=base64_decode($_REQUEST['pg']);
        header("location:product_single.php?id=$location");     
        }else{
        header("location:index.php");
        }
        if(isset($_SESSION['redirect'])){
        $redirect=$_SESSION['redirect'];
        echo $redirect;
        echo "<script>window.location.href='$redirect';</script>";
        }else{
        echo "<script>window.location.href='index.php';</script>";
        
        }
    //exit();
    }
        
    }else{
        echo "<script>alert('Please give correct email/password');</script>";
    }
} 
  
}
?>
            </div>
        </div>
    </div>
</div>


<?php 
include("footer.php");
?>