<?php
session_start();

if(!empty($_SESSION['id'])){
 
}else{
  header('location:../php/signin.php');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../css/product_categories.css"/>
    <link rel="stylesheet" type="text/css" href="../nav_footer/admin_nav.css"/>
  </head>
  <body>
  <?php
    include '../nav_footer/admin_nav.php'
    ?>
    <div class="container concat">
      <center><h1 class="txtcat">CATEGORIES</h1></center>
        <div class="row">
            <div class="col-md-3">
                <img src="../images/icedcoffee.jpg" class="w-100">
                <a href="iced_coffee.php" type="button" class="btn btn-dark w-100">Iced Coffees</a>
            </div>
            <div class="col-md-3">
                <img src="../images/Hot-Coffee-coffee-24525824-900-1200.jpg" class="w-100">
                <a href="hot_coffee.php" type="button" class="btn btn-dark w-100">Hot Coffees</a>
            </div>
            <div class="col-md-3">
                <img src="../images/pastst.png" class="w-100">
                <a href="pastries.php" type="button" class="btn btn-dark w-100">Pastries</a>
            </div>
            <div class="col-md-3">
                <img src="../images/view.jpg" class="w-100">
                <a href="products.php" type="button" class="btn btn-dark w-100">View All</a>
            </div>
        </div>
        <div class="d-flex flex-row-reverse"><a class="btn-warning" href="admin_dashboard.php"><i class="fa-solid fa-arrow-left"></i>RETURN</a></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>