<?php
session_start();

if(!empty($_SESSION['id'])){
 
}else{
  header('location:signin.php');
}

?>

<?php $dbcon = mysqli_connect("localhost","root","","espresso") or die(mysqli_error()); ?>	
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/reciept.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row w-50 mx-auto">
        <input class="" value="<?php echo $_SESSION['id'];?>" type="hidden">
        <img src="../images/logog.png" class="w-50 mx-auto">
        <p class="text-center storeadd">National highway, Talavera, 3114 Nueva Ecija</p>
        <p class="text-center contactre">+639689475697</p>
        <hr style="border: 2px dashed #000000; background: none;" />
        
        <table class="table">
  <thead>
    <tr class="text-center">
      <th scope="col">Products</th>
      <th scope="col">Prices</th>
    </tr>
  </thead>
  <tbody>
  <?php
 
  $participant_id = $_SESSION['id'];
  $sql_order = "SELECT order_id FROM orders WHERE participant_id = '$participant_id' ORDER BY order_date DESC LIMIT 1";
  $result_order = mysqli_query($dbcon, $sql_order);

  if ($result_order && mysqli_num_rows($result_order) > 0) {
    $row_order = mysqli_fetch_assoc($result_order);
    $order_Id = $row_order['order_id'];

    
    $sql_order_items = "SELECT * FROM orderitems WHERE order_id = '$order_Id'";
    $result_order_items = mysqli_query($dbcon, $sql_order_items);

    if ($result_order_items) {
      while ($row_item = mysqli_fetch_assoc($result_order_items)) {
        ?>
        <tr class="text-center">
          <td><?php echo $row_item['product_name']; ?>(<?php echo $row_item['quantity']; ?>X)</td>
          <td><?php echo $row_item['price']; ?></td>
        </tr>
        <?php
      }
    } else {

      echo "Error fetching order items: " . mysqli_error($dbcon);
    }

  } else {

    echo "No orders found.";
  }
?>
</table>
<?php
 $sql_rc = mysqli_query($dbcon, "SELECT * FROM orders WHERE participant_id = '".$_SESSION['id']."' ORDER BY order_date DESC LIMIT 1");
        while($sql_rc_row = mysqli_fetch_array($sql_rc)){
  ?>
    <div class="d-flex flex-row-reverse tots">TOTAL BILLS: ₱ <?php echo $sql_rc_row['total']; ?></div>
    <hr style="border: 2px dashed #000000; background: none;" />
    <p class="text-center ordate">Order date: <?php echo $sql_rc_row['order_date']; ?></p>
    <p class="text-center inf">Order ID: <?php echo $sql_rc_row['order_id']; ?></p>
    <p class="text-center inf">Name: <?php echo $sql_rc_row['name']; ?></p>
    <p class="text-center inf">Address: <?php echo $sql_rc_row['address']; ?></p>
    <p class="text-center inf">Contact: <?php echo $sql_rc_row['contact']; ?></p>
    <p class="text-center inf">Email: <?php echo $sql_rc_row['email']; ?></p>
    <?php 
          }
  ?>



<hr style="border: 2px dashed #000000; background: none;" />
<h1 class="text-center thanks">Thank You!!!</h1>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>