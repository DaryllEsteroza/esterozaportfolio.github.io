<?php $dbcon = mysqli_connect("localhost","root","","espresso") or die(mysqli_error($dbcon)); ?>	


<?php


if (isset($_POST['deletebtn'])) {
 
  $delete_id = $_POST['deletebtn'];
  $product_name = $_POST['product_name'];

  
  $quantity_to_delete = 0;
  $delete_query = "SELECT quantity FROM carts WHERE id = '$delete_id'";
  $result = mysqli_query($dbcon, $delete_query);
  if ($row = mysqli_fetch_assoc($result)) {
    $quantity_to_delete = $row['quantity'];
  }

 
  $delete_query = "DELETE FROM carts WHERE id = '$delete_id'";
  $result = mysqli_query($dbcon, $delete_query);

  if ($result) {
    
    echo "Item deleted successfully.";

   
    $update_query = "UPDATE products SET stocks = stocks + $quantity_to_delete WHERE product_name = '$product_name'";
    mysqli_query($dbcon, $update_query);

   
    header("Location: ../php/user_menu.php");
    exit;
  } else {

    echo "Error deleting item: " . mysqli_error($dbcon);
  }
}
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="user_nav.css" />
    
    <title>Hello, world!</title>
  </head>
  <body>
  <nav class="navbar navbar-light bg-light">
    
  <div class="container-fluid con_user_nav">
    
  <img src="../images/logog.png" alt="" width="190" height="50" class="navbar-brand">
  
    
    <form class="d-flex gap-3">
    <?php
$sql_rc = mysqli_query($dbcon, "SELECT (quantity) AS total_quantity FROM carts");
$total_quantity = 0;

while ($sql_rc_row = mysqli_fetch_array($sql_rc)) {
    
    ?>
   
    <?php
   
    $total_quantity += $sql_rc_row['total_quantity'];
}
?>


<!-- update -->
<?php
if(isset($_POST['saveupdate'])){
    $userid 			= $_POST['userid'];
    $upfname 			= $_POST['upfname'];
    $uplname 		= $_POST['uplname'];
    $upaddress 			= $_POST['upaddress'];
    $upemail			= $_POST['upemail'];
    $upcontact 			= $_POST['upcontact'];
    $uppass 			= $_POST['uppass'];
    mysqli_query($dbcon, "UPDATE user_account SET fname = '$upfname', lname = '$uplname', address = '$upaddress', email = '$upemail', password = '$uppass', contact = '$upcontact' WHERE id = '$userid'"); 
?>	    

        <script>
         Swal.fire(
              'Success!',
              'Updated Successfully!!',
              'success'
        )  
        </script>     
        <?php
    }
?> 

<!-- update -->
<?php  // Make sure session is started



if (isset($_POST['delivered'])) {
    // Update query with correct string concatenation
    $query = "UPDATE orders SET visibility = 'success' WHERE participant_id = '".$_SESSION['id']."' ORDER BY order_date DESC LIMIT 1";
    
    // Execute the query
    if (mysqli_query($dbcon, $query)) {
        // If the query is successful, show the success message
        echo "<script>
            Swal.fire(
                'Success!',
                'Updated Successfully!!',
                'success'
            );
        </script>";
    } else {
        // If there is an error in the query, show the error message
        echo "<script>
            Swal.fire(
                'Error!',
                'Update Failed: " . mysqli_error($dbcon) . "',
                'error'
            );
        </script>";
    }
}
?>
<button class="btn btn-success prof" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fa-solid fa-user"></i></button>

<button class="btn btn-success delivery" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalord"><i class="fa-solid fa-motorcycle"></i></button>
    <a type="button" class="icon-cart btn-warning position-relative"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <i class="fa-solid fa-cart-shopping"></i>
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
  <?php echo number_format($total_quantity); ?>
    <span class="visually-hidden">unread messages</span>
  </span>
</a>

<button class="btn btn-danger logout" onclick="location.href='http://localhost/espresso/nav_footer/signout.php'">Logout<i class="fa-solid fa-arrow-right-from-bracket"></i></button>

    </form>
  </div>
</nav>

<div class="modal fade modalcart" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content modnav">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">My Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
 
      <form action="../nav_footer/user_nav.php"  method="POST">
        <div class="wrapper">
        
        <?php
  $sql_rc = mysqli_query($dbcon, "SELECT * FROM carts");

        while($sql_rc_row = mysqli_fetch_array($sql_rc)){
        
  ?>
          <div class="item d-flex justify-content-between">
            <input value="<?php echo $sql_rc_row['prod_name']; ?>" type="hidden" name="product_name">
            <p class="" name="delete_id" hidden><?php echo $sql_rc_row['id']; ?></p>
            <img src="../product_image/<?php echo $sql_rc_row['prod_image']; ?>" class="">
            <p class="cart_prod_name" name="prod_names"><?php echo $sql_rc_row['prod_name']; ?></p>
            <p class="cart_prod_name" name="prod_prices">Price: ₱ <?php echo $sql_rc_row['prod_price']; ?></p>
              <p class="quan">Quantity: <span name="quanity" class="num"><?php echo $sql_rc_row['quantity']; ?></span></p>
              <button class="btn-danger deletebtn" name="deletebtn" type="submit" value="<?php echo $sql_rc_row['id']; ?>"><i class="fa-solid fa-trash"></i></button>
          </div>
          <?php 
          }
        
  ?>
          <div class="d-flex flex-row-reverse">
          <div class="input-group mt-3">
  <span class="input-group-text" id="basic-addon1" name="total">Total</span>
  <?php
  $sql1 = "SELECT sum(prod_price) AS 'total_count' FROM carts";
  $all_session1 = $dbcon->query($sql1);
  while($row = mysqli_fetch_assoc($all_session1)){   
      $numbeOfItems = $row['total_count'];
  ?>
  <input type="text" class="form-control" placeholder="Price: ₱ <?php echo $numbeOfItems ?>" aria-label="Total" aria-describedby="basic-addon1" readonly>
</div></div>
        </div> 
        
  <?php
  }
  ?>      

    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
        <a type="submit" name="checkout" class="btn btn-success" href="../php/checkout_form.php">CHECK OUT</a>
      </div>
      </form>
      
    </div>
  </div>
</div> 
<?php
$sql = mysqli_query($dbcon, "SELECT * FROM products");
while($row = mysqli_fetch_array($sql)){
$sql_rc = mysqli_query($dbcon, "SELECT * FROM carts");
      while($sql_rc_row = mysqli_fetch_array($sql_rc)){

  ?>
<script>
  const plus = document.querySelector(".plus"),
   minus = document.querySelector(".minus"),
   num = document.querySelector(".num"),
   price = document.querySelector(".form-control");
   let a = <?php echo $sql_rc_row['quantity']; ?>;
   plus.addEventListener("click", ()=>{
    a++;
    a = (a < 10) ? + a : a;
    num.innerText = a;
      console.log(a);
   });
   minus.addEventListener("click", ()=>{
    if(a > 0){
      a--;
      a = (a < 10) ? + a : a;
      num.innerText = a;
    }
   });
   let p = <?php echo $sql_rc_row['prod_price']; ?>;
   var pesoSign = "Price: ₱";
   plus.addEventListener("click", ()=>{
    t = p + <?php echo $row['product_price']; ?>;
    p = (t < 10) ? + t : t;
    var tprice = pesoSign + " " + p;
    price.setAttribute("placeholder", tprice);
      console.log(p);
   });
   minus.addEventListener("click", ()=>{
    var pesoSign = "Price: ₱";
    if(p > 0){
      
      t = p - <?php echo $row['product_price']; ?>;
      p = (t < 10) ? + t : t;
    var tprice = pesoSign + " " + p;
    price.setAttribute("placeholder", tprice);
    }
   });
</script>
<?php 
          }
        }
  
        
  ?>


<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="user_menu.php" method="post">
      <div class="modal-body">
      <?php
        $sql = "SELECT * FROM user_account WHERE id = ".$_SESSION['id']."";
$all_session = $dbcon->query($sql);
      if($row = mysqli_fetch_assoc($all_session)){      
?>
        
        <input type="text" name="userid" hidden class="form-control" placeholder="Username" aria-label="Username" value=" <?php echo ($row["id"]); ?>" aria-describedby="basic-addon1">    
      <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">First Name</span>
  <input type="text" name="upfname" class="form-control" placeholder="Username" aria-label="Username" value=" <?php echo ($row["fname"]); ?>" aria-describedby="basic-addon1">
  
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Last Name</span>
  <input type="text" name="uplname" class="form-control" placeholder="Username" aria-label="Username" value=" <?php echo ($row["lname"]); ?>" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Address</span>
  <input type="text" name="upaddress" class="form-control" placeholder="Username" aria-label="Username" value=" <?php echo ($row["address"]); ?>" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Email</span>
  <input type="text" name="upemail" class="form-control" placeholder="Username" aria-label="Username" value=" <?php echo ($row["email"]); ?>" aria-describedby="basic-addon1">
  
</div>
<div class="input-group mb-3">
  
  <span class="input-group-text" id="basic-addon1">Contact #</span>
  <input type="text" name="upcontact" class="form-control" placeholder="Username" aria-label="Username" value=" <?php echo ($row["contact"]); ?>" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3" hidden>
  
  
  <input type="text" name="uppass" class="form-control" placeholder="Username" aria-label="Username" value=" <?php echo ($row["password"]); ?>" aria-describedby="basic-addon1">
</div>
<?php 
       }
        ?>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="saveupdate"  value="Register" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade Modalord" id="exampleModalord" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <?php
 $sql_rc = mysqli_query($dbcon, "SELECT * FROM orders WHERE participant_id = '".$_SESSION['id']."' ORDER BY order_date DESC LIMIT 1");
        while($sql_rc_row = mysqli_fetch_array($sql_rc)){
          $status = $sql_rc_row['visibility'];
          
  ?>
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php if($status == 'visible'){?>
         <div class="d-flex justify-content-between p-5 ordstat">
       <p class="status" style="color: #00b300;">Order Placed</p>
       <p class="status">In the kitchen</p>
       <p class="status">On the way</p>
       <p class="status">Delivered</p>
       </div>
  <?php
      }elseif($status == '0') {?>
       <div class="d-flex justify-content-between p-5 ordstat">
       <p class="status">Order Placed</p>
       <p class="status" style="color: #00b300;">In the kitchen</p>
       <p class="status">On the way</p>
       <p class="status">Delivered</p>
       </div>
  <?php
  }elseif($status == 'done') {?>
    <div class="d-flex justify-content-between p-5 ordstat">
    <p class="status">Order Placed</p>
    <p class="status">In the kitchen</p>
    <p class="status" style="color: #00b300;">On the way</p>
    <p class="status">Delivered</p>
    </div>
<?php
}elseif($status == 'success') {?>
  <div class="d-flex justify-content-between p-5 ordstat">
  <p class="status">Order Placed</p>
  <p class="status">In the kitchen</p>
  <p class="status">On the way</p>
  <p class="status" style="color: #00b300;">Delivered</p>
  </div>
<?php
}elseif($status == 'declined') {?>
  <div class="d-flex justify-content-between p-5 ordstat">
  <p class="status" style="color: #e60000;">Order Declined</p>
  <p class="status">In the kitchen</p>
  <p class="status">On the way</p>
  <p class="status" >Delivered</p>
  </div>
<?php
}else {?>
  <p>Dont have order yet.</p>
<?php
}
      ?>
     
       <form action="user_menu.php" method="post">
       <div class="input-group mb-3">
       <input type="text" hidden class="form-control" name="orduserid" placeholder="<?php echo $sql_rc_row['participant_id']; ?>"  aria-label="" aria-describedby="basic-addon1">
  <span class="input-group-text" id="basic-addon1">Order Id</span>
  <input type="text" class="form-control" name="ord_id" placeholder="<?php echo $sql_rc_row['order_id']; ?>"  aria-label="" aria-describedby="basic-addon1">
  <span class="input-group-text" id="basic-addon1">Order Date</span>
  <input type="text" class="form-control" placeholder="<?php echo $sql_rc_row['order_date']; ?>"  aria-label="" aria-describedby="basic-addon1">
</div>
       <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Name</span>
  <input type="text" class="form-control" placeholder="<?php echo $sql_rc_row['name']; ?>"  aria-label="" aria-describedby="basic-addon1">
  <span class="input-group-text" id="basic-addon1">email</span>
  <input type="text" class="form-control" placeholder="<?php echo $sql_rc_row['email']; ?>" aria-label=""  aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Contact</span>
  <input type="text" class="form-control" placeholder="<?php echo $sql_rc_row['contact']; ?>" aria-label=""  aria-describedby="basic-addon1">
  <span class="input-group-text" id="basic-addon1">Address</span>
  <input type="text" class="form-control" placeholder="<?php echo $sql_rc_row['address']; ?>" aria-label="" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
<div class="input-group">
  <span class="input-group-text">Message</span>
  <textarea class="form-control" placeholder="<?php echo $sql_rc_row['message']; ?>" aria-label="With textarea"></textarea>
</div>
</div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="delivered" value="Register" class="btn btn-success" <?php if($status !== 'done') echo 'disabled'; ?>>Delivery Accepted</button>
      </div>
      </form>
      <?php 
          }
  ?>
    </div>
  </div>
  
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>