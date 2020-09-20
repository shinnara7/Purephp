<?php 
include 'dbconnect.php'; 
$id=$_POST['id'];
//$id=$_POST['codeno'];
$name=$_POST['category_name'];
$photo=$_FILES['category_photo'];
$oldphoto=$_POST['old_photo'];
if($photo['size']>0){
	$basepath="images/categories/";
	$fullpath=$basepath.$photo['name'];
	move_uploaded_file($photo['tmp_name'], $fullpath);
}else{
	$fullpath=$oldphoto;
}
$sql="UPDATE categories SET name=:name,photo=:photo WHERE id=:id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(":id",$id);
$stmt->bindParam(":name",$name);
$stmt->bindParam(":photo",$fullpath);
$stmt->execute();
header("location:categorylist.php");
?>