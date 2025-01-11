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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../css/orders.css"/>
    <link rel="stylesheet" type="text/css" href="../nav_footer/admin_nav.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
  <?php
    include '../nav_footer/admin_nav.php'
    ?>
    
<?php

if(isset($_POST['done'])){
  $update_id = $_POST['done'];
    
    mysqli_query($dbcon, "UPDATE orders SET visibility = 'done' WHERE order_id = '$update_id'"); 
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
        <h1 class="">ACCEPTED ORDERS</h1>
        <div class="row">
        
          <form class="" action="accepted_orders.php" method="POST">
          <div class="table-responsive-xxl">
  <table class="table table-dark table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Participant ID</th>
      <th scope="col">Total Payment</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">Address</th>
      <th scope="col">Message</th>
      <th scope="col">Order Date</th>
      <th scope="col"> OPTION</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql_rc = mysqli_query($dbcon, "SELECT * FROM orders WHERE visibility = '0'");
        while($sql_rc_row = mysqli_fetch_array($sql_rc)){
  ?>
    <tr>
      <th><?php echo $sql_rc_row['order_id']; ?></th>
      <td><?php echo $sql_rc_row['participant_id']; ?></td>
      <td><?php echo $sql_rc_row['total']; ?></td>
      <td><?php echo $sql_rc_row['name']; ?></td>
      <td><?php echo $sql_rc_row['email']; ?></td>
      <td><?php echo $sql_rc_row['contact']; ?></td>
      <td><?php echo $sql_rc_row['address']; ?></td>
      <td><?php echo $sql_rc_row['message']; ?></td>
      <td><?php echo $sql_rc_row['order_date']; ?></td>
      <td><center><button class="btn-success" name="done" value="<?php echo $sql_rc_row['order_id']; ?>">DONE</button></center></td>
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