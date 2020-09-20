<?php 
session_start();
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) {
include 'include/header.php';
include 'dbconnect.php';
?>
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Subcategory List</h1>
    <a href="subcategory_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"></i>Add Subcategory</a>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Subcategory List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $i=1; 
            $sql="SELECT * FROM subcategories";
            $stmt=$pdo->prepare($sql);
            $stmt->execute();
            $subcategories=$stmt->fetchAll();
            foreach ($subcategories as $subcategory) {
              # code...
              ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $subcategory['name'] ?></td>
                <td><a href="subcategorydetail.php?subcategory_id=<?=$subcategory['id']?>" class="btn btn-primary btn-sm">Detail</a><a href="subcategory_edit.php?id=<?=$subcategory['id']?>" class="btn btn-warning btn-sm">Edit</a><a href="subcategory_delete.php?id=<?=$subcategory['id']?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete?')">Delete</a></td>
              </tr>
            <?php
            }
             ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
  
<?php 
include 'include/footer.php';
}else{
  header("location:../index.php");
}
 ?>