<?php
session_start();

if(!empty($_SESSION['id'])){
 
}else{
  header('location:../php/signin.php');
}

?>
<?php $dbcon = mysqli_connect("localhost","root","","espresso") or die(mysqli_error()); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/admin_dashboard.css"/>
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
        <div class="row">
            <div class="col-md-3">
                <img src="../images/Order ride-bro.png  " class="w-100">
                <br>
                <br>
                <center><a href="order_dash.php">ORDERS</a></center>
            </div>
            <div class="col-md-3">
                <img src="../images/Product quality-bro.png" class="w-100">
                <br>
                <br>
                <center><a href="products_categories.php">PRODUCTS</a></center>
            </div>
            <div class="col-md-3">
                <img src="../images/My password-bro.png" class="w-100">
                <br>
                <br>
                <center><a href="accounts.php">ACCOUNTS</a></center>
            </div>
            <div class="col-md-3">
                <img src="../images/Marketing-bro.png" class="w-100">
                <br>
                <br>
                <center><a href="admin_report.php">SALES & REPORTS</a></center>
            </div>
           
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>