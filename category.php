<?php  
include 'include/header.php';
include 'backend/dbconnect.php';
$id=$_GET['id'];
$sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id WHERE items.subcategory_id=:id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$items=$stmt->fetchAll();
?>
<div class="container mt-5" id="items">
	<div class="row">
		<?php foreach ($items as $item) { ?>
			<div class="col-md-3 col-12 mb-md-4 mb-2">
				<div class="card shadow">
					<div class="card-img-top">
						<img src="backend/<?=$item['photo']?>">
					</div>
					<div class="card-body">
						<h5 style="font-size: 20px;">
							<span style="font-size: 20px;" class="text-dark">Name:</span>
							<span class="text-secondary"><?=$item['name']?></span>
						</h5>
						
						<p style="font-size: 18px;" class="mb-1">
							<span class="text-dark">Price</span>
							<span><?php if($item['discount']){
									echo $item['discount'];
									?>
									<del><?=$item['price']?></del>
								<?php }else{
									echo $item['price'];
								} ?></span>
						</p>
						<p style="font-size: 18px;" class="mb-3">
							<span class="text-dark">CodeNo</span>
							<span class="text-danger" style="font-size: 15px;"><?=$item['codeno']?></span>
						</p>
						 <a href="#" class="btn btn-info float-right addtocart" data-id="<?=$item['id']?>" data-name="<?=$item['name']?>" data-photo="<?=$item['photo']?>" data-price="<?=$item['price']?>" data-discount="<?=$item['discount']?>"><i class="icofont-cart-alt">Add to cart</i></a>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
	<div class="row mt-5">
		<div class="container text-center">
			<div class="col-12">
				<a href="product.php" class="btn btn-primary" id="btn">View More</a>
			</div>
		</div>
	</div>		
<?php  
include 'include/footer.php';
?>