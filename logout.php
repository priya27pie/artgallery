<?php
	session_start();
		
		$_SESSION['login_user']="";
		$_SESSION['Logged']=0;
		$_SESSION['login_id']="";
		$_SESSION['username']="";
		
        unset($_SESSION['login_user']);
	    unset($_SESSION['login_id']);
	    unset($_SESSION['username']);

		session_destroy();
		header('location:index.php');
	//echo "loged out successfully<a href='../index.php'>Login Again</a>";
				
		
?>


