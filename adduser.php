<?php 
include 'backend/dbconnect.php';


		$name=$_POST['user_name'];
		$email=$_POST['user_email'];
		$password=$_POST['user_password'];
		$phone=$_POST['user_phone'];
		$address=$_POST['user_address'];
		$status=1;
		$role_id=1;
		
		
		$profile=$_FILES['user_photo'];

			$basepath="backend/images/users/";
			$fullpath=$basepath.$profile['name'];
			move_uploaded_file($profile['tmp_name'], $fullpath);

			$sql=" INSERT INTO users(name,profile,email,password,phone,address,status,role_id) VALUES(:user_name,:user_photo,:user_email,:user_password,:user_phone,:user_address,:user_status,:user_role_id)";

			$stmt=$pdo->prepare($sql);
			
			$stmt->bindParam(':user_name',$name);
			$stmt->bindParam(':user_photo',$fullpath);
			$stmt->bindParam(':user_email',$email);
			$stmt->bindParam(':user_password',$password);
			$stmt->bindParam(':user_phone',$phone);
			$stmt->bindParam(':user_address',$address);
			$stmt->bindParam(':user_status',$status);
			$stmt->bindParam(':user_role_id',$role_id);
			
			
		

			$stmt->execute();

			if($stmt->rowCount()){
				header("location:index.php");
			}else{
				echo "Error";
			}



 ?>
