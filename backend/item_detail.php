<?php
	include 'include/header.php';
	include 'dbconnect.php';
    session_start();
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) {

	$id=$_GET['item_id'];
	$sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name FROM  items INNER JOIN  brands ON  items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id WHERE  items.id=:id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	$item=$stmt->fetch(PDO::FETCH_ASSOC);

  ?>
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Item Detail</h1>
      <a href="itemlist.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-chevron-circle-left"></i>Go Back</a>
    </div>
    <div class="card">
    	<div class="card-header">
    		<h5 class="card-title">Item Detail</h5>
    	</div>
    	<div class="card">
    		<div class="row">
    			<div class="col-md-4">
    				<img src="<?=$item['photo']?>" class="img-fluid">
    		</div>
    		<div class="col-md-8">
    			<h5>Product Name:<span class="text-gray-dark"><?=$item['name']?></span></h5>
    			<h5>Product Code No:<span class="text-gray-dark"><?=$item['codeno']?></span></h5>
    			<h5>Price:<span class="text-gray-dark">
    				<?php
    					if ($item['discount']){
    						echo $item['discount'];
    						?>
    						<del><?=$item['price']?></del>

    					<?php }
    					else{
    						echo $item['price'];
    					} 
    					 ?>
    					</span></h5>
    				  
    			<h5>Product Brand:<span class="text-gray-dark"><?=$item['brand_name']?></span></h5>
    			<h5>Subcategory:<span class="text-gray-dark"><?=$item['sub_name']?></span></h5>
    			<h5>Dercription:<span class="text-gray-dark"><?=$item['description']?></span></h5>

    	</div>
    	
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