<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
session_start();
include('inc/db.php');
include('inc/oops.php');

$database = new Db();
$db = $database->getConnection();

$login=new Oops($db); 
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAINT Admin</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back" style="background: url('images/back.jpg') !important;background-size:100% 100% ; background-repeat: no-repeat; >

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <!--<img src="assets/img/logo.png" alt=""/>-->
			  <h2>PAINT</h2>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login" name="sub">
                            </fieldset>
                        </form>
<?php
if(isset($_POST['sub'])){
	
	$login->data1=filter_var($_POST['email'],FILTER_SANITIZE_STRING);
	$login->data2=md5(filter_var($_POST['password'],FILTER_SANITIZE_STRING));
	$login->col1="email";
	$login->col2="password";
	$login->table="admin";

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
    $_SESSION['sessionid'] = $uid;
     //  echo 'Success!';
    header("location:dashboard.php");
    //exit();
    }
        
    }
} 
}
?>						
						
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
