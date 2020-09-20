<?php 
include 'dbconnect.php'; 
$name=$_POST['item_name'];
$price=$_POST['item_price'];
$discount=$_POST['item_discount'];
$brand=$_POST['item_brand'];
$subcategory=$_POST['item_sub'];
$description=$_POST['item_description'];
$photo=$_FILES['item_photo'];
$codeno="CODE_".mt_rand(100000,999999);//random number
//print_r($photo).die();
$basepath="images/items/";//convert array to string,//to store place
$fullpath=$basepath.$photo['name'];//convert array to string//photo's name
move_uploaded_file($photo['tmp_name'], $fullpath);//convert array to string//add to place
$sql="INSERT INTO items(codeno,name,photo,price,discount,description,brand_id,subcategory_id) VALUES(:item_codeno,:item_name,:item_photo,:item_price,:item_discount,:item_des,:item_brand,:item_sub)";//query code
$stmt=$pdo->prepare($sql);//data code
$stmt->bindParam(':item_codeno',$codeno);//data code
$stmt->bindParam(':item_name',$name);
$stmt->bindParam(':item_photo',$fullpath);
$stmt->bindParam(':item_price',$price);
$stmt->bindParam(':item_discount',$discount);
$stmt->bindParam(':item_des',$description);
$stmt->bindParam(':item_brand',$brand);
$stmt->bindParam(':item_sub',$subcategory);//item_sub=sql's name
$stmt->execute();//add to database
if ($stmt->rowCount()) {
header("location:index.php");
}else{
echo "Error";
}
?>