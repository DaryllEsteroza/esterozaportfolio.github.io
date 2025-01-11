<?php $dbcon = mysqli_connect("localhost","root","","espresso") ?>	

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin_nav.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hello, world!</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
  <?php

if (isset($_POST['delete-message'])) {
  
  $delete_message = $_POST['delete-message'];
  $delete_query = "DELETE FROM messages WHERE id = '$delete_message'";
  $result = mysqli_query($dbcon, $delete_query);

  if ($result) {
    echo "Success";
  } else {
    echo "Error deleting item: " . mysqli_error($dbcon);
  }
  exit;
}
?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MESSAGES</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php
        $sql_rc = mysqli_query($dbcon, "SELECT * FROM messages");
        while($sql_rc_row = mysqli_fetch_array($sql_rc)){
      ?>
        <div class="messages">
          <div class="messages-inner">
            <form class="delete-message-form" action="../nav_footer/admin_nav.php" method="post">
              <button type="submit" name="delete-message" value="<?php echo $sql_rc_row['id']; ?>" class="btn btn-danger ">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </form>
            <div class="message-content">
              <p class="name">from: <?php echo $sql_rc_row['fname']; ?>&nbsp;<?php echo $sql_rc_row['lname']; ?></p>
            </div>
            <p class="main-message"><?php echo $sql_rc_row['message']; ?></p>
            <div class="d-flex justify-content-between date-email">
              <p class="email"><?php echo $sql_rc_row['email']; ?></p>
              <p><?php echo $sql_rc_row['date']; ?></p>
            </div>
          </div>
        </div>
      <?php 
        }
      ?>
      </div>
    </div>
  </div>
</div>


    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-ligh">
        <div class="container-fluid">
          <img src="../images/logog.png" class="logo" >
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             
            </ul>
            
            <form class="join_us d-flex gap-3">
           
                <?php
            $sql_rc = mysqli_query($dbcon, "SELECT COUNT(*) AS total_messages FROM messages");
            $total_messages = 0;

            while ($sql_rc_row = mysqli_fetch_array($sql_rc)) {
               
                ?>
              
                <?php
               
                $total_messages += $sql_rc_row['total_messages'];
            }
            ?>
                <button type="button" class="btnmessages btn-success position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-regular fa-envelope"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              <?php echo number_format($total_messages); ?>
                <span class="visually-hidden">unread messages</span>
              </span>
          </button>
              
          <button class="btn btn-danger logout" onclick="location.href='http://localhost/espresso/nav_footer/signout.php'">Logout<i class="fa-solid fa-arrow-right-from-bracket"></i></button>
            </form>
          </div>
        </div>

      </nav>
      <script>
  $(document).ready(function() {

    $(document).on('submit', '.delete-message-form', function(e) {
      e.preventDefault(); 
      
      var form = $(this);
      var deleteMessageId = form.find('button[name="delete-message"]').val();
      
      $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: { 'delete-message': deleteMessageId },
        success: function(response) {
        
          if(response.includes('Error')) {
            alert('Error deleting item: ' + response);
          } else {
         
            form.closest('.messages').remove();
          }
        },
        error: function(xhr, status, error) {
          alert('Error: ' + error);
        }
      });
    });
  });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>