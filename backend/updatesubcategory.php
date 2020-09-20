<?php 
include 'dbconnect.php'; 
$id=$_POST['id'];
//$id=$_POST['codeno'];
$name=$_POST['subcategory_name'];
$category_id=$_POST['category_id'];
$sql="UPDATE subcategories SET name=:name,category_id=:category_id WHERE id=:id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(":id",$id);
$stmt->bindParam(":name",$name);
$stmt->bindParam(":category_id",$category_id);
$stmt->execute();
header("location:subcategorylist.php");
?>