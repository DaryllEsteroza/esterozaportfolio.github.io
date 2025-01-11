<?php
session_start();

if(!empty($_SESSION['id'])){
 
}else{
  header('location:signin.php');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/order_dash.css"/>
    <link rel="stylesheet" type="text/css" href="../nav_footer/admin_nav.css"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <?php
    include '../nav_footer/admin_nav.php'
    ?>
  <body>
   
    <div class="container condash">
    <div class="d-flex flex-row-reverse"><a class="btn-warning" href="admin_dashboard.php"><i class="fa-solid fa-arrow-left"></i>RETURN</a></div>
        <div class="row justify-content-evenly">
            <div class="col-md-4">
                <img src="../images/Work time-pana.png" class="w-100">
                <br>
                <br>
                <center><a href="orders.php">PENDING ORDERS</a></center>
            </div>
            <div class="col-md-4">
                <img src="../images/Cash Payment-rafiki.png" class="w-100">
                <br>
                <br>
                <center><a href="accepted_orders.php">ACCEPTED ORDERS</a></center>
            </div>
            <div class="col-md-4">
                <img src="../images/Online Groceries-cuate.png" class="w-100">
                <br>
                <br>
                <center><a href="order_items.php">ORDERED PRODUCTS</a></center>
            </div>
           
           
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>