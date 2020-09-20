<?php 
session_start();
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) {

  include 'include/header.php';
  include 'dbconnect.php';

  $voucherno=$_GET['voucherno'];

  $sql= "SELECT orders.*,orders.created_at as order_date ,orderdetails.*,items.*,users.name as customer_name,users.phone as customer_phone,users.address as customer_address FROM orderdetails 
  INNER JOIN orders ON orders.voucherno=orderdetails.voucherno INNER JOIN items ON orderdetails.item_id=items.id
  INNER JOIN users ON orders.user_id=users.id WHERE orderdetails.voucherno=:voucherno";
  $stmt=$pdo->prepare($sql);
  $stmt->bindParam('voucherno',$voucherno);
  $stmt->execute();
  $data=$stmt->fetch(PDO::FETCH_ASSOC);


  $sql1 = "SELECT orderdetails.*, items.* FROM orderdetails INNER JOIN items ON orderdetails.item_id = items.id WHERE orderdetails.voucherno=:voucherno";
  $stmt = $pdo->prepare($sql1);
  $stmt->bindParam(':voucherno', $voucherno);
  $stmt->execute();
  $v_orders = $stmt->fetchAll();


  ?>


  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
      <a href="order_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="icofont-arrow-left"></i> Go Back</a>
    </div>
  </div>  

    <div class="table-responsive">
      <table class="table table-bordered"  width="100%" cellspacing="0">
       <tr>
        <th style="text-align: center;" colspan="6">
          <div align="center" class="text-dark">
            <h2>Shinnara Online_Store</h2>
            <h4>Yangon, Yankin Tsp.</h4>
            <h5><i class="fas fa-phone-square-alt"></i>&nbsp;09-425023860</h5><br>
          </div>
          <div class="row">
            <div class="col-md-8">
              <h5 style="text-align: left;">Customer Name:<span class="text-dark">&emsp;&emsp;&emsp;<?=$data['customer_name']?> </span></h5>
            </div>
            <div class="col-md-4 float-right">
              <h5 style="text-align: left;">Voucher No:<span class="text-dark">&emsp;&emsp;&emsp;<?=$data['voucherno']?> </span></h5>
            </div>
            <div class="col-md-8">
              <h5 style="text-align: left;">Customer Phone:<span class="text-dark">&emsp;&emsp;&emsp;<?=$data['customer_phone']?> </span></h5>
            </div>

            <div class="col-md-8">
              <h5 style="text-align: left;">Customer Address:<span class="text-dark">&emsp;&emsp;<?=$data['customer_address']?> </span></h5>
            </div>
            <div class="col-md-4">
              <h5 style="text-align: left;">Order Time:<span class="text-dark">&nbsp;&nbsp;<?=$data['order_date']?> </span></h5>
            </div>
          </th>
        </tr>
        <tr>
          <th>No.</th>
          <th>Item Name</th>
          <th>Qty</th>
          <th>Price</th>
          <th>Amount</th>
          
        </tr>

        <tbody>
          <?php 
          $i=1;$total=0;$subtotal=0;
          foreach ($v_orders as $v_order) {

           ?>
           <tr><td><?=$i++?></td>
            <td><?=$v_order['name']?></td>
            <td><?=$v_order['qty']?></td>
            <?php 
            if($v_order['discount']){
              $p=$v_order['discount']*$v_order['qty'];

              $total=$total+$p;
             ?>
            <td><?=$v_order['discount']?></td>
          <?php 
            }else{ 
              $p=$v_order['price']*$v_order['qty'];
              $total=$total+$p;
          ?>
            <td><?=$v_order['price']?></td>
          <?php 
            }
          ?>
          <td>
            <?=$p?>
          </td>
          </tr>
      <?php } ?>
      <tr>
        <td colspan="4">Total Amount</td>
        <td><?=$total?></td>
      </tr>
      </tbody>
      <tfoot>
      </tfoot>
    </table>
    <div align="center">
                    <h4>Thank You For Your Purchase!</h4>
                  </div>
  </div>


<?php 
include 'include/footer.php';
}else{
  header("location:../index.php");
}
?>