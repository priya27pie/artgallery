<?php
include('admin@art/inc/db.php');
include('admin@art/inc/oops.php');
include('admin@art/inc/database.php');
$database = new Db();
$db = $database->getConnection();

if(isset($_POST['size']))
{
$query2="SELECT price FROM product_size WHERE product_id='".$_POST['code']."' && size='".$_POST['size']."'";   
$stmt=$con->prepare($query2);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
echo "Rs ".$row['price'];
}
?>