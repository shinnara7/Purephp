<?php
	include 'dbconnect.php';
	$id=$_GET['id'];

	$sql="DELETE FROM categories where id=:id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	if($stmt->rowCount()){
		header("location:categorylist.php");

	}else{
		echo "Error!";
	}

  ?>