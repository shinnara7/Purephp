<?php
 session_start(); 
include 'backend/dbconnect.php';
$sql="SELECT * FROM subcategories";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$subcategories=$stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Shinnara Online Shop Template">
    <meta name="keywords" content="Shinnara Online Shop, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shinnara Online Shop | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg" style="background: rgba(0,0,0,.8);">
  <a class="navbar-brand text-white" href="index.php" style="margin-right: 300px;">Shinnara Online Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown" >
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-white" href="index.php">HOME<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="product.php">PRODUCTS</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="product.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CATEGORIES
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php  
        foreach ($subcategories as $subcategory) {
          # code...
        
          ?>
          <a class="dropdown-item" href="category.php?id=<?=$subcategory['id']?>"><?=$subcategory['name']?></a>
          <?php } ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="about.php">ABOUT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="contact.php">CONTACT</a>
      </li>
      
      <?php 
      if (isset($_SESSION['loginuser'])){
        ?>

        <li class="nav-item dropdown mt-5">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" >
          <?=$_SESSION['loginuser']['name']?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
     <?php
      }else{
        ?>
      }
      <li class="nav-item">
        <a class="nav-link text-white" href="login.php">LOGIN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="register.php">REGISTER</a>
      </li>
      <?php } ?>
      <li class="nav-item"><a href="checkout.php" class="nav-link" id="count"><span class="p1 fa-stack has-badge" id="item_count"><i class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse text-white"></i></span></a></li>
      
      
    </ul>
  </div>
</nav>
      </div>
    </div>