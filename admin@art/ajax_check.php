<?php

session_start();
ob_start();
include 'inc/database.php';
include 'inc/db.php';
include 'inc/oops.php';
$database = new Db();
$db = $database->getConnection();
$show=new Oops($db);
if(isset($_POST["userid"]))  
 { 
$table='product_img';
$stmt=$show->readwithdata($table,'id',$_POST['userid']);
$row = $stmt->fetch(PDO::FETCH_ASSOC);  
echo json_encode($row);  
 }
 
 
 ?>