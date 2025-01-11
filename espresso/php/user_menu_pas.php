<?php $dbcon = mysqli_connect("localhost","root","","espresso") or die(mysqli_error()); ?>
<?php

$sql1 = "SELECT COUNT(*) AS 'total_count' FROM products WHERE categories = 'Iced Coffee'";
$all_session1 = $dbcon->query($sql1);
while($row = mysqli_fetch_assoc($all_session1)){   
    $numbeOfItems = $row['total_count'];
    for ($i=0; $i < $numbeOfItems; $i++) {
        if(isset($_POST['add_to_pas'. $i])){
            $product_name = $_POST['product_name'. $i];
            $product_price = $_POST['product_price'. $i];
            $product_image = $_POST['product_image'. $i];
            $hidden = $_POST['hiddenn'];
            $product_quantity = 1;
            
            
            $select_cart = mysqli_query($dbcon, "SELECT * FROM `carts` WHERE prod_name = '$product_name'");
            
            if(mysqli_num_rows($select_cart) > 0){
            while($row = mysqli_fetch_assoc($select_cart)){
            $total = $row['quantity'];
            $totalprice = $row['prod_price'];
            }
            $total++;
            $tp = $totalprice + $product_price;
            $insert_product = mysqli_query($dbcon, "UPDATE carts SET prod_name='$product_name', prod_price='$product_price', prod_image='$product_image', quantity='$total' WHERE prod_name='$product_name'");
            header('Location: user_menu.php');
            ?>
                    <script>
                        alert("Successfully Added");
                        window.location = 'user_menu.php';
                    </script>
                    <?php
            }
                // Insert the product into the cart
                else {
                $insert_product = mysqli_query($dbcon, "INSERT INTO `carts`(prod_name, prod_price, prod_image, quantity, participant_id) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity', '$hidden')");
                if($insert_product){
                    $message[] = 'Product added to cart successfully';
                    header('Location: user_menu.php');
                    ?>
                    <script>
                        alert("Successfully Added");
                        window.location = 'user_menu.php';
                    </script>
                    <?php
                } else {
                    $message[] = 'Error adding product to cart';
                }
        }

    }
}
}
?>