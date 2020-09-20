<?php
	include 'dbconnect.php';
  	
  	$id=$_POST['id'];
  	$brand=$_POST['brand_name'];
	

	$logo=$_FILES['brand_logo'];
	$oldlogo=$_POST['old_logo'];
	

	if($logo['size']>0){
	$basepath="images/brands/";
	$fullpath=$basepath.$logo['name'];
	move_uploaded_file($logo['tmp_name'], $fullpath);
}else{
	$fullpath=$oldlogo;
}
$sql="UPDATE brands SET name=:name,logo=:logo WHERE id=:id";

$stmt=$pdo->prepare($sql);
$stmt->bindParam(":id",$id);
$stmt->bindParam(":name",$brand);
$stmt->bindParam(":logo",$fullpath);




$stmt->execute();

header("location:brandlist.php");

?>

