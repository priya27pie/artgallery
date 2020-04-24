<?php
error_reporting(E_ALL);
ini_set('display_errors',0);
ob_start();
session_start();
include('admin@art/inc/db.php');
include('admin@art/inc/oops.php');
include('admin@art/inc/database.php');
$database = new Db();
$db = $database->getConnection();
include('admin@art/inc/dbcontroller.php');
$db_handle = new DBController();

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
	if(!empty($_POST["quantity"])) {
	    
		$productByCode = $db_handle->runQuery("SELECT * FROM product WHERE product_id='".$_GET["code"]."'");

$itemArray = array($productByCode[0]["product_id"]=>array('pro_name'=>$_POST["product_name"],'code'=>$_POST["code"],'paper_size'=>$_POST["size"],'quantity'=>$_POST["quantity"],'price'=>$_POST["price"],'img'=>$_POST["img"]));
//echo "<per>";
//print_r($itemArray);
//echo "</pre>";
		
		if(!empty($_SESSION["cart_item"])) {
			if(in_array($productByCode[0]["product_id"],$_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($productByCode[0]["product_id"] == $k)
							$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
				}
			} else {
			   // echo "add";
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
			//	print_r($_SESSION["cart_item"]);
			}
		} else {
			$_SESSION["cart_item"] = $itemArray;
		}
	}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}

?><!DOCTYPE html>
<html lang="zxx">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <!-- meta-tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="keywords" content="" />
    <title>Dnmsquareart.com</title>
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //meta-tags -->
    <link rel="icon" href="images/logo2.png" type="image/x-icon"> <!-- fav - icon -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> <!-- bootstrap css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> <!-- style css -->
    <link href="css/superfish.css" rel="stylesheet" type="text/css" media="all" /> <!-- superfish css -->
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="css/aos.css" rel="stylesheet" type="text/css" media="all" /> <!-- aos css -->
    
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

    <!-- font-awesome -->
    <link href="css/font-awesome.css" rel="stylesheet"> <!-- font-awesome css -->

    <!-- fonts on line -->
    <link href="https://fonts.googleapis.com/css?family=Gupter&display=swap" rel="stylesheet">
    <!--NAV / font-family: 'Gupter', serif; -->
    <link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
    <!--BAN / font-family: 'Monoton', cursive; -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">
    <!--About / font-family: 'Work Sans', sans-serif; -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <!--Servi / font-family: 'Roboto Condensed', sans-serif; -->
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
</head>

<body>


    <!-- Header Start -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="top-hight">
            <div class="container">
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <ul>
                        <li><span><i class="fa fa-phone"></i></span><a href="#">9492871006</a> </li>
                        <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span></i><a href="mailto:ganapathiart@gmail.com">ganapathiart@gmail.com</a></li>
                    </ul>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12" style="text-align:right;">
            		<div class="product_list_header">
            		  <?php if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) { ?>
            			<div class="dropdown">Hi ! <?=$_SESSION['login_user']?><b class="caret"></b>
                                    <div class="dropdown-content">  
                                    <a href="profile.php">Profile</a>
                                    <a href="logout.php">Logout</a>
                                </div></div>
                          <?php }else{?>	
            			<div class="dropdown">
                    		<button class="dropbtn">
                    			<i class="fa fa-user"> </i>        			
                    		</button>
                    					
                    		<div class="dropdown-content">
                             	<a href="login.php">Login</a>
                    			<a href="signup.php">Sign Up</a>
                    		</div> 
                    	</div>
                         <?php }?>	
              			<div class="agile-login">
            			<li style="list-style: none;">
                		<?php
                		if(isset($_SESSION["cart_item"])){
                			$item_total = 0; 
                			$no=0;
                			$sum=0;
                		?>		
                		<a id="btnEmpty" href="cart.php" class="w3view-cart"> <i class="fa fa-cart-arrow-down" aria-hidden="true"> </i><?php
                	  
                	    foreach ($_SESSION["cart_item"] as $item){
                				$no = count($item["code"]);
                			//	echo $no;
                				$sum +=$no;
                				
                			}
                		echo $sum;?> </a>	
                		 <?php
                		}else{
                		?> 
                		<a id="btnEmpty" href="cart_empty.php"  class="w3view-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                		<?php }?>	
                
                
                </a>
            			
            				</li>
            				<div class="clearfix"> </div>
            			</div>
            
            		</div>
                    <!--<span>-->
                    <!--    <a href="signup.php">Sign Up</a>-->
                    <!--</span>-->
                    <!--<span>-->
                    <!--    <a href="login.php">LogIn</a>-->
                    <!--</span>-->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="top-block">
                <div class="col-md-3 col-sm-3 col-xs-8">
                    <div class="web-logo">
                        <div class="logo-round"></div>
                        <a href="index.php"><img src="images/logoH.png" alt="hand-painted" class="logo"></a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-4">
                    <div id="navigation" data-aos="fade-down" style="transition:all 2300ms ease-in-out;float: right;">
                        <nav id="nav-wrap">
                            <ul class="sf-menu">
                                <li <?php if (stripos($_SERVER['REQUEST_URI'], 'index.php') !== false) {
                                        echo 'class="active"';}
                                    ?>>
                                    <a href="index.php"> Home</a>
                                </li>
                                <li <?php if (stripos($_SERVER['REQUEST_URI'], 'about.php') !== false) {
                                        echo 'class="active"';}
                                    ?>>
                                    <a href="#"> Gift Occasion <b class="caret"></b></a>
                                    <ul>
                                        <li><a href="product.php">Birthday Painting</a></li>
                                        <li><a href="#">Couple Painting</a></li>
                                        <li><a href="#">Baby Painting</a></li>
                                        <li><a href="#">Anniversary Painting</a></li>
                                        <li><a href="#">Children Painting</a></li>
                                        <li><a href="#">Family Painting</a></li>
                                        <li><a href="#">Pet Painting</a></li>
                                        <li><a href="#">Wedding Painting</a></li>
                                    </ul>
                                </li>
                                <li <?php if (stripos($_SERVER['REQUEST_URI'], 'about.php') !== false) {
                                        echo 'class="active"';}
                                    ?>>
                                    <a href="#">Shop <b class="caret"></b></a>
                                    <ul>
                                        <li><a href="product.php">home decor painting</a></li>
                                        <li><a href="#">Office decor painting</a></li>
                                        <li><a href="#">hotel restaurant decor </a></li>
                                        <li><a href="#">hospital decor painting</a></li>
                                        <li><a href="#">school collage painting</a></li>
                                    </ul>
                                </li>
                                <li <?php if (stripos($_SERVER['REQUEST_URI'], 'about.php') !== false) {
                                        echo 'class="active"';}
                                    ?>>
                                    <a href="#">Events <b class="caret"></b></a>
                                    <ul>
                                        <li><a href="product.php">customize painting</a></li>
                                        <li><a href="#">corporate event</a></li>
                                        <li><a href="#">Art workshop</a></li>
                                        <li><a href="#">open / private event</a></li>
                                    </ul>
                                </li>

                                <li <?php if (stripos($_SERVER['REQUEST_URI'], 'contact.php') !== false) {
                                        echo 'class="active"';}
                                    ?>>
                                    <a href="contact.php"> Contact</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Header End -->
    
    
  