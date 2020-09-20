<?php 
include 'include/header.php'; 
include 'backend/dbconnect.php';
if(!isset($_SESSION['loginuser'])){

?>
 <div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800 text-center">User Registration</h1>

  <div class="row">
    <div class="offset-md-2 col-md-8">
      <form method="POST" action="adduser.php" enctype="multipart/form-data">
        <div class="form-group"> <label>Name :</label><input type="text" name="user_name" class="form-control" style="border-radius: 20px;height: 50px;border: 3px solid green;"></div>
        <div class="form-group"> <label>Profile :</label><input type="file" name="user_photo" class="form-control-file" style="height: auto;width: auto; border: 3px solid green;border-radius: 20px;"></div>
        <div class="form-group"> <label>Email : :</label><input type="email" name="user_email" class="form-control" style="border-radius: 20px;height: 50px;border: 3px solid green;"></div>
        <div class="form-group"> <label>Password :</label><input type="password" name="user_password" class="form-control" style="border-radius: 20px;height: 50px;border: 3px solid green;"></div>
        <div class="form-group"> <label>Phone :</label><input type="text" name="user_phone" class="form-control" style="border-radius: 20px;height: 50px;border: 3px solid green;"></div>
        <div class="form-group"> <label>Address :</label><textarea name="user_address" class="form-control" style="border-radius: 20px;height: 50px;border: 3px solid green;"></textarea></div>
                         
         <input type="submit" name="" class="btn btn-success float-right mb-3" value="Register">

         <div class="form-group">
          <label>Already a member?<a href="loginform.php">Sign in</a></label>
        </div>

                </form>

              </div>
            </div>

          </div>
      </form>
    
  </div>

</div>
<?php 
include 'include/footer.php';
}else{
  header("location:index.php");
}

 ?>
<!-- /.container-fluid -->