<?php
include 'dbconnect.php';
$id=$_GET['id'];
$sql="DELETE FROM subcategories WHERE id=:id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
if($stmt->rowCount()){
	header("location:subcategorylist.php");
}else{
	echo "Error";
}
?>
