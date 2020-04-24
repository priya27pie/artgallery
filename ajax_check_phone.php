<?php
include('admin@art/inc/db.php');
include('admin@art/inc/oops.php');
include('admin@art/inc/database.php');
$database = new Db();
$db = $database->getConnection();


if(isset($_POST['phone'])){
$phn=$_POST['phone'];
$show=new oops($db);
$stmt=$show->readwithdata($_POST['tablename'],'phone',$phn);
$num=$stmt->rowCount();
if($num>0){
echo "<span class='label label-danger'>Phone Number already in use.Please Give another Phone Number</span>";
}

}
