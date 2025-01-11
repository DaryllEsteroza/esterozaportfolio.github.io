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
    <link rel="stylesheet" href="../css/checkout_form.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <div class="container concheck">
        <div class="row">
          <div class="col-md-6 colform">
          <div class="text-center checktitle">Checkout Form</div>

  
      
      <div class="panel-group">
    <div class="panel panel-default">
      <div id="collapse1" class="panel-collapse">
        <table class="table">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
    
    <?php
$sql_rc = mysqli_query($dbcon, "SELECT prod_name, quantity, prod_price, (prod_price) AS total_price FROM carts");
$total_price = 0;

while ($sql_rc_row = mysqli_fetch_array($sql_rc)) {
  
    ?>
    <tr>
        <td ><?php echo $sql_rc_row['prod_name']; ?></td>
        <td><?php echo $sql_rc_row['quantity']; ?></td>
        <td><?php echo $sql_rc_row['prod_price']; ?></td>
    </tr>
    <?php
  
    $total_price += $sql_rc_row['total_price'];
}
?>
    </tbody>
  </table>
      </div>
    </div>
  </div>
  <form action="checkout_form.php" method="POST">
  <div class="mt-3 mb-3 total">
  <h1>Total Price: ₱<?php echo number_format($total_price, 2); ?></h1>
  <input type="hidden" name="total" value="<?php echo number_format($total_price, 2); ?>">
  </div>
  <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="part_id">
  
  <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Name</span>
  <input type="text" name="name" class="form-control" placeholder="..." aria-label="Username" aria-describedby="basic-addon1" required="required">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Email</span>
  <input type="text" name="email" class="form-control" placeholder="..." aria-label="Username" aria-describedby="basic-addon1" required="required">
  <span class="input-group-text" id="basic-addon1">Contact #</span>
  <input type="text" name="contact" class="form-control" placeholder="..." aria-label="Username" aria-describedby="basic-addon1" required="required">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Complete Address</span>
  <input type="text" name="address" class="form-control" placeholder="..." aria-label="Username" aria-describedby="basic-addon1" required="required">
</div>
<div class="input-group mb-3">
  <span class="input-group-text">Message</span>
  <textarea class="form-control" name="message" aria-label="With textarea" required="required"></textarea>
</div>
  <p class="text-center cod">Cash on delivery only.</p>
  <div class="d-flex flex-row-reverse">
  <button type="submit" name="checkout" class="btn_checkout btn-success">PROCEED</button>
</div>
</form>
</div>
<div class="col-md-6">
  <img src="../images/Self checkout-bro.png" class="w-100">
</div>
</div>
      </div>


      <?php

if(isset($_POST['checkout'])){
  $part_id = $_POST['part_id'];
  $total = $_POST['total'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $message = $_POST['message'];

  
  mysqli_query($dbcon, "INSERT INTO `orders`(`order_id`, `participant_id`, `total`, `name`, `email`, `contact`, `address`, `message`, `visibility`) 
                        VALUES ('', '$part_id', '$total', '$name', '$email', '$contact', '$address', '$message', 'visible')");

$orderId = mysqli_insert_id($dbcon);

  $sql_rc = mysqli_query($dbcon, "SELECT prod_name, quantity, prod_price FROM carts");
  while ($sql_rc_row = mysqli_fetch_array($sql_rc)) {
    $prod_name = $sql_rc_row['prod_name'];
    $quantity = $sql_rc_row['quantity'];
    $prod_price = $sql_rc_row['prod_price'];
    

    mysqli_query($dbcon, "INSERT INTO `orderitems`(`order_id`, `product_name`, `quantity`, `price`, `visibility`) 
                          VALUES ('$orderId', '$prod_name', '$quantity', '$prod_price' , '0')");
  }
  mysqli_query($dbcon, "DELETE FROM `carts` WHERE participant_id = '$part_id'");

   echo '<script>
  Swal.fire(
    "Success!",
    "Order Successful!",
    "success"
  ).then(() => {
    window.open("reciept.php?orderId='.$orderId.'", "_blank"); // Open receipt in a new tab
    window.location.href = "user_menu.php"; // Redirect to user_menu.php page
  });
</script>';
}
?> 



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

