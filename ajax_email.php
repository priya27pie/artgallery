<?php
include('admin@art/inc/db.php');
include('admin@art/inc/oops.php');
include('admin@art/inc/database.php');
$database = new Db();
$db = $database->getConnection();

if(isset($_POST['email'])){
$email=$_POST['email'];
$show=new oops($db);
$stmt=$show->readwithdata($_POST['tablename'],'email',$email);
$num=$stmt->rowCount();
if($num>0){
echo "<span class='label label-info'>Email already in use.Please Give another Email</span>";
}

}