<?php
include('admin@art/inc/database.php');
$table1="ids";
$show=new Oops($db);
$r=$show->readAll($table1);

while ($row=$r->fetch(PDO::FETCH_ASSOC))
{
$id=$row['referid'];
}
$id1=$id+1;

$stmt=$con->prepare('update ids set referid=:referid');
$stmt->bindParam(':referid', $id1);
 if($stmt->execute()){

$oid="ORDR".$id;

 }

?>
