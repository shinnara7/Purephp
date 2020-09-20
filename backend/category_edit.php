 <?php 
 session_start();
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) {
 include 'include/header.php'; 
 include 'dbconnect.php';

 $id=$_GET['id'];
 $sql="SELECT * FROM categories WHERE id=:id";
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':id',$id);
 $stmt->execute();
 $category=$stmt->fetch(PDO::FETCH_ASSOC);

 ?> 

<h1 class="h3 mb-4 text-gray-800 text-center">Edit Existing Category</h1>
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <form method="POST" action="updatecategory.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$category['id']?>">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="category_name" class="form-control" value="<?=$category['name']?>">
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="category_photo" class="form-control-file">
                    <img src="<?=$category['photo']?>" width="150" height="120" class="mt-3">
                     <input type="hidden" name="old_photo" value="<?=$category['photo']?>">
                </div>
                <input type="submit" class="btn btn-outline-primary float-right mb-3" value="Update">

            </form>

<?php 
 include 'include/footer.php'; 
 }else{
  header("location:../index.php");
}
 ?> 