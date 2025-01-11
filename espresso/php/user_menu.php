<?php
session_start();

if(!empty($_SESSION['id'])){
 
}else{
  header('location:signin.php');
}

?>
<?php $dbcon = mysqli_connect("localhost","root","","espresso") or die(mysqli_error()); ?>

<?php
if (isset($_POST['add_to_cart'])) {
  $prod_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $prod_image = $_POST['product_image'];
  $prod_id = $_POST['id'];
  $part_id = $_POST['part_id'];
  $quantity = 1;


  $select_stock = mysqli_query($dbcon, "SELECT stocks FROM products WHERE product_name = '$prod_name'");
  $row = mysqli_fetch_assoc($select_stock);
  $stock = $row['stocks'];
  
  if($stock >= $quantity) {
    
    $new_stock = $stock - $quantity;


    mysqli_query($dbcon, "UPDATE products SET stocks = '$new_stock' WHERE product_name = '$prod_name'");
  
    
    $select_cart = mysqli_query($dbcon, "SELECT * FROM `carts` WHERE prod_name = '$prod_name'");
            
    if(mysqli_num_rows($select_cart) > 0) {
      while($row = mysqli_fetch_assoc($select_cart)) {
        $total = $row['quantity'];
        $totalprice = $row['prod_price'];
      }
      $total++;
      $tp = ($product_price * $total); 
      mysqli_query($dbcon, "UPDATE carts SET prod_name='$prod_name', prod_price='$tp', prod_image='$prod_image', quantity='$total' WHERE prod_name='$prod_name'");
    } else {
      mysqli_query($dbcon, "INSERT INTO `carts` (`prod_image`, `prod_name`, `prod_price`, `quantity`, `participant_id`, `product_id`) 
      VALUES ('$prod_image', '$prod_name', '$product_price', '$quantity', '$part_id', '$prod_id')");
    }
  
  
    header('Location: user_menu.php');
    exit; 
  } else {

    header('Location: user_menu.php?error=stock');
    exit;
  }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/user_menu.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="../wordscript.js"></script>
    <script defer src="../script.js"></script>
    <script defer src="../app.js"></script>
    <link rel="stylesheet" type="text/css" href="../nav_footer/user_nav.css"/>
  </head>
  <?php
    include '../nav_footer/user_nav.php'
    ?>
  <body class="">
  <script>
        const btn = document.querySelector('.btn');
        btn.onmousemove = function(e){
          const x = e.pageX - btn.offsetLeft;
          const y = e.pageY - btn.offsetTop;

          btn.style.setProperty('--x', x + 'px');
          btn.style.setProperty('--y', y + 'px');
        }
      </script>
      <div id="progress">
          <span id="progress-value">&#x1F815;</span></div>
    <div class="container-fluid congreet">
      <div class="row">
        <div class="col">
          <?php
        $sql = "SELECT * FROM user_account WHERE id = ".$_SESSION['id']."";
$all_session = $dbcon->query($sql);
      if($row = mysqli_fetch_assoc($all_session)){      
?>
        <p>Hello <?php echo ucfirst ($row["fname"]); ?> please make your order.</p>
        <?php 
       }
        ?>
        </div>
      </div>
    </div>
    
  <div class="container con-hot hidden">
  <div class="about-title shadow-sm">
    
    <span class="dot" for="floatingSelectGrid"></span>
    <span>BEST SELLER</span> 
    <span class="dot1" for="floatingSelectGrid"></span>
   </div>
   <div class="row">
  <?php
  $sql_rc = mysqli_query($dbcon, "SELECT p.stocks, o.product_name, p.product_price, p.id, p.image, SUM(o.quantity) AS total_quantity
  FROM orderitems o
  JOIN products p ON o.product_name = p.product_name
  GROUP BY o.product_name, p.product_price, p.id, p.image
  ORDER BY total_quantity DESC
  LIMIT 4");

  while ($sql_rc_row = mysqli_fetch_array($sql_rc)) {
    $product_name = $sql_rc_row['product_name'];
    $product_price = $sql_rc_row['product_price'];
    $product_image = $sql_rc_row['image'];
    $prod_id = $sql_rc_row['id'];
    $total_quantity = $sql_rc_row['total_quantity'];
    $stock = $sql_rc_row['stocks'];
  ?>
  
  <div class="cofcol col-sm-6 col-md-4 col-lg-3 border">
    <div class="coffee-wrapper">
      <img src="../product_image/<?php echo $product_image; ?>">
    </div>
    <div class="coffee-details">
      <div class="cofname"><?php echo $product_name; ?></div>
      <div class="price">from: <span>₱<?php echo $product_price; ?></span></div>
    </div>

    <!-- Each product has its own form -->
    <form action="user_menu.php" method="post">
      <input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
      <input type="hidden" name="product_price" value="<?php echo $product_price; ?>">
      <input type="hidden" name="product_image" value="<?php echo $product_image; ?>">
      <input type="hidden" name="id" value="<?php echo $prod_id; ?>">
      <input type="hidden" name="part_id" value="<?php echo $_SESSION['id']; ?>">
      <div class="text-center">
      <div class="text-center">
      <?php if($stock > 0){?>
        <button type="submit" class="btn btn-primary position-relative" name="add_to_cart">from: <span>₱<?php echo $product_price; ?>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
        <i class="fa-solid fa-crown"></i>
    <span class="visually-hidden">unread messages</span>
  </span></button>
  <?php
      }else {?>
      <button style="background-color: #fff; border: 2px solid #65451F; color: #65451F;" type="submit" class="btn btn-primary position-relative" name="add_to_cart" disabled>SOLD OUT
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
        <i class="fa-solid fa-crown"></i>
    <span class="visually-hidden">unread messages</span>
  </span></button>
  <?php
  }
      ?>
      </div>
        
      </div>
    </form>
  </div>

  <?php
  }
  ?>
</div></div>
<div class="container con-iced hidden">
  <div class="about-title shadow-sm">
    
            <span class="dot" for="floatingSelectGrid"></span>
            <span>ICED COFFEE</span> 
            <span class="dot1" for="floatingSelectGrid"></span>
           </div>
           
           <form action="user_menu_add.php" method="post">
            <div class="row">
            <?php
            
  $sql_rc = mysqli_query($dbcon, "SELECT * FROM products WHERE categories = 'Iced Coffee'");
  $countrow = array();
        while($sql_rc_row = mysqli_fetch_array($sql_rc)){
          $countrow[] = $sql_rc_row;
        }
       
          for($i = 0; $i < count($countrow); $i++){
            $stock = $countrow[$i]['stocks'];       
  ?>
  <div class="cofcol col-sm-6 col-md-4 col-lg-3 border">
                    <div class="coffee-wrapper">
                    
                    <img src="../product_image/<?php echo $countrow[$i]['image']; ?>">
                </div>
                <div class="coffee-details">
                    <div class="cofname"><?php echo $countrow[$i]['product_name']; ?></div>
                    <div class="price">from:<span>₱<?php echo $countrow[$i]['product_price']; ?></span></div>
                </div>
                
                <input type="hidden" name="product_name<?php echo $i; ?>" value="<?php echo $countrow[$i]['product_name']; ?>">
            <input type="hidden" name="product_price<?php echo $i; ?>" value="<?php echo $countrow[$i]['product_price']; ?>">
            <input type="hidden" name="product_image<?php echo $i; ?>" value="<?php echo $countrow[$i]['image']; ?>">
            <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="hiddenn">
                <div class="text-center">
                <?php if($stock > 0){?>
        <input type="hidden" value="<?php echo $countrow[$i]['id']; ?>" name="hidden">
                <input type="submit" class="btn" value="add to cart" name="add_to_cart<?php echo $i; ?>">
  <?php
      }else {?>
      <button style="background-color: #fff; border: 2px solid #65451F; color: #65451F;" type="submit" class="btn btn-primary position-relative" name="add_to_cart" disabled>SOLD OUT
  </span></button>
  <?php
  }
      ?>
                
              </div>
                
                </div>
              
                  <?php 
            } 
           
  ?>           
            </div>
        </div></form>

  <form action="user_menu_hot.php" method="post">
  <div class="container con-hot hidden">
  <div class="about-title shadow-sm">
            <span class="dot" for="floatingSelectGrid"></span>
            <span>HOT COFFEE</span> 
            <span class="dot1" for="floatingSelectGrid"></span>
           </div>
            <div class="row">
            <?php
            
  $sql_rc = mysqli_query($dbcon, "SELECT * FROM products WHERE categories = 'Hot Coffee'");
  $countrow = array();
        while($sql_rc_row = mysqli_fetch_array($sql_rc)){
          $countrow[] = $sql_rc_row;
        }
       
          for($i = 0; $i < count($countrow); $i++){
            $stock = $countrow[$i]['stocks'];      
  ?>

  
  <div class="cofcol col-sm-6 col-md-4 col-lg-3 border">
                    <div class="coffee-wrapper">
                    <img src="../product_image/<?php echo $countrow[$i]['image']; ?>">
                </div>
                <div class="coffee-details">
                    <div class="cofname"><?php echo $countrow[$i]['product_name']; ?></div>
                    <div class="price">from:<span>₱<?php echo $countrow[$i]['product_price']; ?></span></div>
                </div>
                <input type="hidden" name="product_name<?php echo $i; ?>" value="<?php echo $countrow[$i]['product_name']; ?>">
            <input type="hidden" name="product_price<?php echo $i; ?>" value="<?php echo $countrow[$i]['product_price']; ?>">
            <input type="hidden" name="product_image<?php echo $i; ?>" value="<?php echo $countrow[$i]['image']; ?>">
            <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="hiddenn">
                <div class="text-center">
                <?php if($stock > 0){?>
        <input type="hidden" value="<?php echo $countrow[$i]['id']; ?>" name="hidden">
                <input type="submit" class="btn" value="add to cart" name="add_to_hot<?php echo $i; ?>">
  <?php
      }else {?>
      <button style="background-color: #fff; border: 2px solid #65451F; color: #65451F;" type="submit" class="btn btn-primary position-relative" name="add_to_cart" disabled>SOLD OUT
  </span></button>
  <?php
  }
      ?>
                
              </div>
                
                </div>
              
                  <?php 
            } 
           
  ?>           
            </div>
        </div></form>


        <form action="user_menu_pas.php" method="post">
  <div class="container con-pastries hidden">
    <div class="about-title shadow-sm">
      <span class="dot" for="floatingSelectGrid"></span>
      <span>PASTRIES</span>
      <span class="dot1" for="floatingSelectGrid"></span>
    </div>
    <div class="row">
      <?php
        $sql_rc = mysqli_query($dbcon, "SELECT * FROM products WHERE categories = 'Pastries'");
        $countrow = array();
        while ($sql_rc_row = mysqli_fetch_array($sql_rc)) {
          $countrow[] = $sql_rc_row;
        }

        for ($i = 0; $i < count($countrow); $i++) {
          $stock = $countrow[$i]['stocks'];
      ?>
        <div class="cofcol col-sm-6 col-md-4 col-lg-3 border">
          <div class="coffee-wrapper">
            <img src="../product_image/<?php echo $countrow[$i]['image']; ?>">
          </div>
          <div class="coffee-details">
            <div class="cofname"><?php echo $countrow[$i]['product_name']; ?></div>
            <div class="price">from:<span>₱<?php echo $countrow[$i]['product_price']; ?></span></div>
          </div>
          <input type="hidden" name="product_name<?php echo $i; ?>" value="<?php echo $countrow[$i]['product_name']; ?>">
          <input type="hidden" name="product_price<?php echo $i; ?>" value="<?php echo $countrow[$i]['product_price']; ?>">
          <input type="hidden" name="product_image<?php echo $i; ?>" value="<?php echo $countrow[$i]['image']; ?>">
          <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="hiddenn">
          <div class="text-center">
            <?php if ($stock > 0) { ?>
              <input type="hidden" value="<?php echo $countrow[$i]['id']; ?>" name="hidden">
              <input type="submit" class="btn" value="add to cart" name="add_to_pas<?php echo $i; ?>">
            <?php } else { ?>
              
                <button style="background-color: #fff; border: 2px solid #65451F; color: #65451F;" type="submit" class="btn btn-primary position-relative" name="add_to_cart" disabled>SOLD OUT</button>
              
            <?php } ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</form>
  
        

                      
            </div>
        </div></form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>