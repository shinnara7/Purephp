<?php 
session_start();
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) {

include 'include/header.php';
include 'dbconnect.php';
$id=$_GET['id'];
$sql="SELECT * FROM subcategories WHERE id=:id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$subcategory=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800 text-center">Subcategory Edit</h1>
  <div class="row">
    <div class="offset-md-2 col-md-8">
      <form method="POST" action="updatesubcategory.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$subcategory['id']?>">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="subcategory_name" class="form-control" value="<?=$subcategory['name']?>">
        </div>
        
        <div class="form-group">
          <label>Category ID</label>
          <input type="text" name="category_id" class="form-control" value="<?=$subcategory['category_id']?>">
        </div>
        <input type="submit" class="btn btn-outline-primary float-right mb-3" value="Update">
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php  
include 'include/footer.php';
}else{
  header("location:../index.php");
}

?>