<?php $dbcon = mysqli_connect("localhost","root","","espresso") or die(mysqli_error()); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/samples.css"/>
    <link rel="stylesheet" type="text/css" href="../nav_footer/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="../nav_footer/footer.css"/>
    <script defer src="../script.js"></script>
    <script defer src="../app.js"></script>
  </head>
  <body>
  <?php
    include '../nav_footer/navbar.php'
    ?>
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
    <div class="container-fluid conmen">
        <div class="row1 row align-items-center">
       
            <h1 class="text-center" id="prod">PRODUCTS</h1>
        
    </div>
    </div>
    
   
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <div class="container concar hidden">
        <div class="menu-title">
        <h1 class="newprod">MOST ORDERED</h1>
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
    $stock = $sql_rc_row['stocks'];
    $total_quantity = $sql_rc_row['total_quantity'];
  ?>
  
  <div class="cofcol col-sm-6 col-md-4 col-lg-3 border">
  <div class="cofname"><?php echo $product_name; ?></div>
    <div class="coffee-wrapper">
      <img src="../product_image/<?php echo $product_image; ?>">
    </div>
    

    <!-- Each product has its own form -->
    
      <input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
      <input type="hidden" name="product_price" value="<?php echo $product_price; ?>">
      <input type="hidden" name="product_image" value="<?php echo $product_image; ?>">
      <input type="hidden" name="id" value="<?php echo $prod_id; ?>">
      <input type="hidden" name="part_id" value="<?php echo $_SESSION['id']; ?>">
      <div class="text-center">
      <?php if($stock > 0){?>
        <a href="signin.php"><button type="submit" class="btn btn-primary position-relative" name="add_to_cart">from: <span>₱<?php echo $product_price; ?>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
        <i class="fa-solid fa-crown"></i>
    <span class="visually-hidden">unread messages</span>
  </span></button></a>
  <?php
      }else {?>
      <a href="signin.php"><button style="background-color: #fff; border: 2px solid #65451F; color: #65451F;" type="submit" class="btn btn-primary position-relative" name="add_to_cart" disabled>SOLD OUT
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
        <i class="fa-solid fa-crown"></i>
    <span class="visually-hidden">unread messages</span>
  </span></button></a>
  <?php
  }
      ?>
      </div>
    
  </div>

  <?php
  }
  ?>
        </div>
    </div>


   

        <div class="container con-iced hidden" id="con-icedd">
            <h1 class="text-center">ICED COFFEE</h1>
            <div class="row">
            <?php
  $sql_rc = mysqli_query($dbcon, "SELECT * FROM products WHERE categories = 'Iced Coffee'");
        while($sql_rc_row = mysqli_fetch_array($sql_rc)){
          $stock = $sql_rc_row['stocks'];
          $product_price = $sql_rc_row['product_price'];
  ?>    
                <div class="cofcol col-sm-6 col-md-4 col-lg-3 border">
                <div class="coffname"><center><?php echo $sql_rc_row['product_name']; ?>
            </center></div>
                    <div class="coffee-wrapper">
                    <img src="../product_image/<?php echo $sql_rc_row['image']; ?>">
                </div>
                
                <div class="coffee-details">
                    
                <div class="desc"><?php echo $sql_rc_row['product_description']; ?></div>
                <input type="text" name="product_price" id="" value="<?php echo $sql_rc_row['product_price']; ?>" hidden>
                </div>
                <div class="text-center">
      <?php if($stock > 0){?>
        <a href="signin.php"><button type="submit" class="btn btn-primary position-relative" name="add_to_cart">from: <span>₱<?php echo $product_price; ?>
        </button></a>
  <?php
      }else {?>
      <a href="signin.php"><button style="background-color: #fff; border: 2px solid #65451F; color: #65451F;" type="submit" class="btn btn-primary position-relative" name="add_to_cart" disabled>SOLD OUT
  </span></button></a>
  <?php
  }
      ?>
      </div>
                </div>
                
                <?php 
          }
  ?>
            </div>
        </div>

        <div class="container con-hot hidden">
            <h1 class="text-center">HOT COFFEE</h1>
            <div class="row">
            <?php
  $sql_rc = mysqli_query($dbcon, "SELECT * FROM products WHERE categories = 'Hot Coffee'");
        while($sql_rc_row = mysqli_fetch_array($sql_rc)){
          $stock = $sql_rc_row['stocks'];
          $product_price = $sql_rc_row['product_price'];
  ?>      
                <div class="cofcol col-sm-6 col-md-4 col-lg-3 border">
                <div class="coffname"><center><?php echo $sql_rc_row['product_name']; ?>
            </center></div>
                    <div class="coffee-wrapper">
                    <img src="../product_image/<?php echo $sql_rc_row['image']; ?>">
                </div>
                
                <div class="coffee-details">
                    
                <div class="desc"><?php echo $sql_rc_row['product_description']; ?></div>
               
                </div>
                <div class="text-center">
      <?php if($stock > 0){?>
        <a href="signin.php"><button type="submit" class="btn btn-primary position-relative" name="add_to_cart">from: <span>₱<?php echo $product_price; ?>
        </button></a>
  <?php
      }else {?>
      <a href="signin.php"><button style="background-color: #fff; border: 2px solid #65451F; color: #65451F;" type="submit" class="btn btn-primary position-relative" name="add_to_cart" disabled>SOLD OUT
  </span></button></a>
  <?php
  }
      ?>
      </div>
                </div>
                <?php 
          }
  ?>
                
            </div>
        </div>
        <div class="container con-pastries hidden" id="conpast">
            <h1 class="text-center">PASTRIES</h1>
            <div class="row">
            <?php
  $sql_rc = mysqli_query($dbcon, "SELECT * FROM products WHERE categories = 'Pastries'");
        while($sql_rc_row = mysqli_fetch_array($sql_rc)){
          $stock = $sql_rc_row['stocks'];
          $product_price = $sql_rc_row['product_price'];
  ?>
                <div class="cofcol col-sm-6 col-md-4 col-lg-3 border">
                <div class="coffname"><center><?php echo $sql_rc_row['product_name']; ?>
            </center></div>
                    <div class="coffee-wrapper">
                    <img src="../product_image/<?php echo $sql_rc_row['image']; ?>">
                </div>
                
                <div class="coffee-details">
                    
                <div class="desc"><?php echo $sql_rc_row['product_description']; ?></div>
               
                </div>
                <div class="text-center">
      <?php if($stock > 0){?>
        <a href="signin.php"><button type="submit" class="btn btn-primary position-relative" name="add_to_cart">from: <span>₱<?php echo $product_price; ?>
        </button></a>
  <?php
      }else {?>
      <a href="signin.php"><button style="background-color: #fff; border: 2px solid #65451F; color: #65451F;" type="submit" class="btn btn-primary position-relative" name="add_to_cart" disabled>SOLD OUT
  </span></button></a>
  <?php
  }
      ?>
      </div>
                </div>
                
                <?php 
          }
  ?>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <?php
  include '../nav_footer/footer.php'
  ?>
  </body>
</html>