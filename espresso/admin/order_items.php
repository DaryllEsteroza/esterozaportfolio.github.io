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
    <link rel="stylesheet" type="text/css" href="../css/orders.css"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="../nav_footer/admin_nav.css"/>
  </head>
  <body>
  <?php
    include '../nav_footer/admin_nav.php'
    ?>

<?php

if(isset($_POST['done'])){
  $update_id = $_POST['done'];
    
    mysqli_query($dbcon, "UPDATE orderitems SET visibility = 'done' WHERE item_id = '$update_id'"); 
?>	    
        <script>
         Swal.fire(
              'Success!',
              'DONE!!',
              'success'
        )  
        </script>     
        <?php
    }
?> 
    <div class="container conuser">
    <div class="d-flex flex-row-reverse"><a class="btn-warning" href="order_dash.php"><i class="fa-solid fa-arrow-left"></i>RETURN</a></div>
        <h1 class="">ORDER PRODUCTS</h1>
        <div class="row">
        
          <form class="" action="order_items.php" method="POST">
          <div class="table-responsive-xxl">
  <table class="table table-dark table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">ITEM ID</th>
      <th scope="col">ORDER ID</th>
      <th scope="col">PRODUCT NAME</th>
      <th scope="col">QUANTITY</th>
      <th scope="col">PRICE</th>
      <th scope="col"><center>OPTIONS</center></th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql_rc = mysqli_query($dbcon, "SELECT * FROM orderitems WHERE visibility = 'visible'");
        while($sql_rc_row = mysqli_fetch_array($sql_rc)){
  ?>
    <tr>
      <th><?php echo $sql_rc_row['item_id']; ?></th>
      <td><?php echo $sql_rc_row['order_id']; ?></td>
      <td><?php echo $sql_rc_row['product_name']; ?></td>
      <td><?php echo $sql_rc_row['quantity']; ?></td>
      <td><?php echo $sql_rc_row['price']; ?></td>
      <td><center><button class="btn-success" name="done" value="<?php echo $sql_rc_row['item_id']; ?>">DONE</button></center></td>
    </tr>
    <?php 
          }
  ?>
  </tbody>
</table>
</form>
</div>
</div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>