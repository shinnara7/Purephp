<?php
    include 'include/header.php';
    include 'backend/dbconnect.php';

    $sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id";

    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $items=$stmt->fetchAll();
  ?>


    <!-- Banner Section End -->

    <!-- Product Section Begin -->
     <div class="text-center"><h1>Our Products</h1><hr></div>


  <div id="cards">
    <div class="container-fluid ">
      <div class="row justify-content-center my-5">

        <?php 
            foreach ($items as $item) {

              
            
         ?>


        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-5"><div class="card">
          <img class="card-img-top" width="200" height="350" src="backend/<?=$item['photo']?>" alt="Card image cap">
          <div class="card-body">
            <p class="text-muted py-1 my-0"><b>CODENO:</b><?=$item['codeno']?></p>
            <p class="text-muted py-1 my-0"><b>NAME:</b><?=$item['name']?></p>
            <p class="text-muted py-1 my-0"><b>PRICE:</b>
              <?php if($item['discount']){
                echo $item['discount'];
                ?>
                <del><?=$item['price']?></del>
              <?php }else{
                echo $item['price'];
              } ?>
              
               </p>
               <a href="javascript:void(0)" class="btn btn-info float-right addtocart" data-id="<?=$item['id']?>" data-name="<?=$item['name']?>" data-photo="<?=$item['photo']?>" data-price="<?=$item['price']?>" data-discount="<?=$item['discount']?>"><i class="icofont-cart-alt">Add to cart</i></a>
           
          </div>
        </div></div>
        <?php 
        }
         ?>

        
        

      </div>
     <div class="row mt-5">
    <div class="container text-center">
      <div class="col-12">
        <a href="product.php" class="btn btn-primary" id="btn">View More</a>
      </div>
    </div>
  </div>  
    </div>
  </div>
   
<?php
    include 'include/footer.php';
  ?>