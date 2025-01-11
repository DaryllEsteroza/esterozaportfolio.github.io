<?php
$dbcon = mysqli_connect("localhost","root","","espresso") or die(mysqli_error());
$sql_rc = mysqli_query($dbcon, "SELECT * FROM products");

    if (isset($_GET['productId'])) {
        // Sanitize the input to prevent SQL injection
        $productId = $_GET['id'];

        // Prepare a SQL statement to fetch product data based on the product ID
        $statement = $pdo->prepare("SELECT * FROM product WHERE id = :productId");

        // Bind parameter values
        $statement->bindParam(':productId', $productId);

        // Execute the prepared statement
        $statement->execute();

        // Fetch the product data
        $product = $statement->fetch(PDO::FETCH_ASSOC);

        // Check if product data exists
        if ($product) {
            // Output the product data as JSON (you can customize this output format as needed)
            echo json_encode($product);
        } else {
            // Product not found
            echo json_encode(array('error' => 'Product not found'));
        }
    } else {
        // productId parameter not provided
        echo json_encode(array('error' => 'Product ID not provided'));
    }

?>