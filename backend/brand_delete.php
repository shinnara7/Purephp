<?php
	include 'dbconnect.php';
	$id=$_GET['id'];

	$sql="DELETE FROM brands where id=:id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	if($stmt->rowCount()){
		header("location:brandlist.php");

	}else{
		echo "Error!";
	}

  ?>