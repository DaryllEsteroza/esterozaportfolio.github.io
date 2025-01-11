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
    <link rel="stylesheet" type="text/css" href="../css/products.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="../nav_footer/admin_nav.css"/>
    <title>Hello, world!</title>
  </head>
  <body>
  <?php
    include '../nav_footer/admin_nav.php'
    ?>
 <?php

if(isset($_POST['submit'])){
    $file = $_FILES['file'];

    $product_name 			= $_POST['product_name'];
    $product_description 		= $_POST['product_description'];
    $product_price 			= $_POST['product_price'];
    $stocks 			= $_POST['stocks'];
    $categories 			= $_POST['categories'];

      $fileName              = $_FILES['file']['name'];
      $fileTmpName           = $_FILES['file']['tmp_name'];
      $fileSize              = $_FILES['file']['size'];
      $fileError             = $_FILES['file']['error'];
      $fileType              = $_FILES['file']['type'];

      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg', 'png');

      if (in_array($fileActualExt, $allowed)){
        if ($fileError === 0){
          if($fileSize < 1000000){
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = '../product_image/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            

    mysqli_query($dbcon, "INSERT INTO `products`(`id`, `product_name`, `product_description`, `product_price`,`image`, `stocks`, `categories`) VALUES ('', '$product_name', '$product_description','$product_price','$fileNameNew','$stocks','$categories')");
?>	    
        <script>
         Swal.fire(
              'Success!',
              'Product Inserted!!',
              'success'
        )   
             var delayInMilliseconds = 1000; //1 second

            setTimeout(function() {
              window.location = 'hot_coffee.php';
            }, delayInMilliseconds);
        </script>     
        <?php


}else{
  echo"There was an error uploading your file!";
}

}else{
echo"There was an error uploading your file!";
}
}else{
echo "You cannot upload files of this type!";
}
    }
    ?> 

<!-- UPDATE -->

<?php

if(isset($_POST['update'])){
    $update_id 			= $_POST['update_id'];
    $product_name 			= $_POST['product_name'];
    $product_description 		= $_POST['product_description'];
    $product_price 			= $_POST['product_price'];
    $stocks 			= $_POST['stocks'];
    $categories 			= $_POST['categories'];
    mysqli_query($dbcon, "UPDATE products SET product_name = '$product_name', product_description = '$product_description', product_price = '$product_price', stocks = '$stocks', categories = '$categories' WHERE id = '$update_id'"); 
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


<!-- DELETE-->
<?php

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    mysqli_query ($dbcon, "DELETE FROM products WHERE id='$id'");
    
    ?>
    <script>
         Swal.fire(
              'Success!',
              'Successfully Deleted!!',
              'success'
        )  
        </script>     
      <?php  
}

?>

    <div class="container conprod">
        
        <div class="d-flex flex-row-reverse"><a class="btn-warning" href="products_categories.php"><i class="fa-solid fa-arrow-left"></i>RETURN</a></div>
        <h1 class="mb-3">HOT COFFEE PRODUCTS</h1>
        <div class="row">
            <table class="table table-success table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Stocks</th>
                    <th scope="col">Categories</th>
                    <th scope="col"><center>OPTIONS</center></th>
                  </tr>
                </thead>
                <tbody>
                <?php
  $sql_rc = mysqli_query($dbcon, "SELECT * FROM products WHERE categories = 'hot coffee'");
        while($sql_rc_row = mysqli_fetch_array($sql_rc)){
  ?>
                  <tr>
                    <td><?php echo $sql_rc_row['id']; ?></td>
                    <td><?php echo $sql_rc_row['product_name']; ?></td>
                    <td><?php echo $sql_rc_row['product_description']; ?></td>
                    <td><?php echo $sql_rc_row['product_price']; ?></td>
                    <td><?php echo $sql_rc_row['image']; ?></td>
                    <td><?php echo $sql_rc_row['stocks']; ?></td>
                    <td><?php echo $sql_rc_row['categories']; ?></td>
                    <td><center><button id="editbtn" class="btn btn-primary editbtn"><i class="fa-solid fa-pen"></i>Update</button>
                        <button class="btn-danger deletebtn" id="deletebtn"><i class="fa-solid fa-trash"></i>Delete</button></center>
                    </td>
                  </tr>
                  <?php 
          }
  ?>
    
                </tbody>
              </table>
              <button name="submit" class="btnadd btn-success" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa-solid fa-plus"></i> ADD PRODUCTS</button>
        </div>
    </div>





<!-- ADD Modal -->

<div class="modal fade" id="addmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ADD PRODUCT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div class="modal-body">
      <form action="hot_coffee.php"  method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input name="product_name" type="text" class="form-control" placeholder="Product Name" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
          <input name="product_price" type="text" class="form-control" placeholder="Product Price" aria-label="Username" aria-describedby="basic-addon1">
          <input name="stocks" type="text" class="form-control" placeholder="stocks" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 gap-3">
        <input type="file" class="input-field" name="file" id="fileToUpload" value="" required>
        <label for="cat" class="cat" hidden>Categories:</label>
            <select class="catt" name="categories" id="categories" hidden>
              <option value="Hot Coffee">Hot Coffee</option>
            </select>
          											
        </div>
        <div class="input-group">
          <span class="input-group-text">Description</span>
          <textarea name="product_description" class="form-control" aria-label="With textarea"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" id="save-btn" value="Register" class="btn btn-success">Insert</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">UPDATE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="hot_coffee.php" method="POST">
      <div class="modal-body">
        
      <input type="hidden" name="update_id" id="update_id">

        <div class="input-group mb-3">
          <input name="product_name" type="text" id="product_name" class="form-control" placeholder="Product Name" aria-label="Username" aria-describedby="basic-addon1" value="">
          
        </div>
        <div class="input-group mb-3">
          <input name="product_price" type="text" id="product_price" class="form-control" placeholder="Product Price" aria-label="Username" aria-describedby="basic-addon1" value="">
          <input name="stocks" id="stocks" type="text" class="form-control" placeholder="stocks" aria-label="Username" aria-describedby="basic-addon1" value="">
        </div>
        <div class="input-group mb-3 gap-3">
          
          <label for="cat" class="cat" hidden>Categories:</label>
            <select class="catt" name="categories" id="categories" hidden>
              <option value="Hot Coffee">Hot Coffee</option>
            </select>						
        </div>
        <div class="input-group">
          <span class="input-group-text">Description</span>
          <textarea name="product_description" class="form-control" id="product_description" aria-label="With textarea"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="update" value="Register" class="btn btn-primary">Save Changes</button>
      </div>
        </form>
    </div>
  </div>

</div>

       
<!-- Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h3>Warning!</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="hot_coffee.php" method="POST">
      <div class="modal-body">
      <input type="hidden" name="delete_id" id="delete_id">
        <p>Are you sure you want to delete this product?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="SUBMIT" name="deletedata" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#update_id').val(data[0]);
                $('#product_name').val(data[1]);
                $('#product_price').val(data[3]);
                $('#stocks').val(data[5]);
                $('#image').val(data[4]);
                $('#product_description').val(data[2]);
            });
        });
    </script>

<script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

  </body>
</html>