<?php
session_start();

if(!empty($_SESSION['id'])){
 
}else{
  header('location:../php/signin.php');
}

?>
<?php $dbcon = mysqli_connect("localhost","root","","espresso") or die(mysqli_error()); ?>	

<!-- UPDATE -->







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
if (isset($_POST['accept'])) {
    $update_id = $_POST['accept'];
  
    // Update orders visibility
    $update_orders_query = "UPDATE orders SET visibility = '0' WHERE order_id = '$update_id'";
    $result_orders = mysqli_query($dbcon, $update_orders_query);

    // Update order items visibility
    $update_orderitems_query = "UPDATE orderitems SET visibility = 'visible' WHERE order_id = '$update_id'";
    $result_orderitems = mysqli_query($dbcon, $update_orderitems_query);

    // Decrease product stock based on order items
    $get_order_items_query = "SELECT * FROM orderitems WHERE order_id = '$update_id'";
    $order_items_result = mysqli_query($dbcon, $get_order_items_query);

    while ($item = mysqli_fetch_assoc($order_items_result)) {
        $product_name = $item['product_name'];
        $quantity = $item['quantity'];

        // Update product stock
        $update_product_stock_query = "UPDATE products SET stocks = stocks - $quantity WHERE product_name = '$product_name'";
        $result_stock_update = mysqli_query($dbcon, $update_product_stock_query);

        if (!$result_stock_update) {
            // Handle error if stock update fails
            echo "Stock update failed: " . mysqli_error($dbcon);
            // You might want to consider rolling back previous updates here if one fails
            break; // Exit loop on error
        }
    }

    if ($result_orders && $result_orderitems && $result_stock_update) {
        // All updates successful
        echo "<script>
                Swal.fire(
                    'Success!',
                    'Order Accepted!',
                    'success'
                );
              </script>";
    } else {
        // Handle overall update failure
        echo "Update failed: " . mysqli_error($dbcon);
    }
}
?>

<?php
if (isset($_POST['decline'])) {
    $decline_id = $_POST['decline'];

    
    $update_orders_query = "UPDATE orders SET visibility = 'declined' WHERE order_id = '$decline_id'";
    $result_orders = mysqli_query($dbcon, $update_orders_query);


    $update_orderitems_query = "DELETE FROM orderitems WHERE order_id = '$decline_id'";
    $result_orderitems = mysqli_query($dbcon, $update_orderitems_query);

    if ($result_orders && $result_orderitems) {

        echo "<script>
                Swal.fire(
                    'Success!',
                    'Order Accepted!!',
                    'success'
                );
              </script>";
    } else {
       
        echo "Update failed: " . mysqli_error($dbcon);
    }
}
?>
    <div class="container conuser">
    <div class="d-flex flex-row-reverse"><a class="btn-warning" href="order_dash.php"><i class="fa-solid fa-arrow-left"></i>RETURN</a></div>
        <h1 class="">PENDING ORDERS</h1>
        <div class="row">
        
          <form class="" action="orders.php" method="POST">
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
      <th scope="col"><center>OPTIONS</center></th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql_rc = mysqli_query($dbcon, "SELECT * FROM orders WHERE visibility = 'visible'");
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
      <td><center><button class="btn-primary accept" type="submit" name="accept" value="<?php echo $sql_rc_row['order_id']; ?>">Accept</button>&nbsp;&nbsp;
      <button class="btn-danger decline" type="submit" name="decline" value="<?php echo $sql_rc_row['order_id']; ?>">Decline</button></center></td>
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