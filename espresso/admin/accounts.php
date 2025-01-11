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
    <link rel="stylesheet" type="text/css" href="../css/user_account.css"/>
    <link rel="stylesheet" type="text/css" href="../nav_footer/admin_nav.css"/>
  </head>
  <body>
  <?php
    include '../nav_footer/admin_nav.php'
    ?>
    <div class="container conuser">
    <div class="d-flex flex-row-reverse"><a class="btn-warning" href="admin_dashboard.php"><i class="fa-solid fa-arrow-left"></i>RETURN</a></div>
        <h1 class="">USERS ACCOUNTS</h1>
        <div class="row">
  <table class="table table-dark table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col"><center>OPTIONS</center></th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql_rc = mysqli_query($dbcon, "SELECT * FROM user_account");
        while($sql_rc_row = mysqli_fetch_array($sql_rc)){
  ?>
    <tr>
      <th><?php echo $sql_rc_row['id']; ?></th>
      <td><?php echo $sql_rc_row['fname']; ?><?php echo $sql_rc_row['lname']; ?></td>
      <td><?php echo $sql_rc_row['address']; ?></td>
      <td><?php echo $sql_rc_row['email']; ?></td>
      <td><?php echo $sql_rc_row['contact']; ?></td>
      <td><center><button class="btn-primary" data-bs-toggle="modal" data-bs-target="#updatemodal"><i class="fa-solid fa-pen"></i>Update</button>
      <button class="btn-danger" data-bs-toggle="modal" data-bs-target="#deletemodal"><i class="fa-solid fa-trash"></i>Delete</button></center></td>
    </tr>
    <?php 
          }
  ?>
  </tbody>
</table>
</div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updatemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">UPDATE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalContent">
        
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="First Name" aria-label="Username" aria-describedby="basic-addon1" value="">
          <input type="text" class="form-control" placeholder="Last Name" aria-label="Username" aria-describedby="basic-addon1" value="">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Address" aria-label="Username" aria-describedby="basic-addon1" value="">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" value="">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Contacts" aria-label="Username" aria-describedby="basic-addon1" value="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Changes</button>
      </div>
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
      <div class="modal-body">
        <p>Are you sure you want to removed this user?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>