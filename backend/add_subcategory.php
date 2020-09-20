<?php  
include 'dbconnect.php';
$name=$_POST['subcategory_name'];
$category=$_POST['subcategory_category'];
$sql="INSERT INTO subcategories (name,category_id) VALUES (:subcategory_name,:subcategory_category)";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':subcategory_name',$name);
$stmt->bindParam(':subcategory_category',$category);
$stmt->execute();
if ($stmt->rowCount()) {
	# code...
header("location:index.php");
}else{
	echo "Error";
}
?>