<?php
session_start();
error_reporting(0);

// $participant_id = $_SESSION['admin_id'];


if(!empty($_SESSION['participant_id'])){
  header("Location: /user_menu.php");
}

if(!empty($_SESSION['admin_id'])){
  header("Location: ../admin/admin_dashboard.php");
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/signin.css"/>
    <link rel="stylesheet" type="text/css" href="../nav_footer/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="../nav_footer/footer.css"/>
    <?php
     include("connection1.php");
    ?>

  </head>
  <body>
 
  <?php
    include '../nav_footer/navbar.php'
    ?>
    <form action="process.php" method="POST" >
    <div class="container con1">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <img src="../images/signin.png">
            </div>
            <div class="col-md-6 col-sm-12">
                <h1 class="log-title">Login</h1>
                <p class="log-title-text">Pleas login to continue.</p>
                <form class="" action="process.php" method="GET">
                    <div class="sign-input justify-content-center gap-3">
                        <div class="mb-3 inputbox">
                          <input type="text" name="username" required="required">
                          <span>Username</span>
                        </div>
                        <div class="mb-3 inputbox">
                          <input type="password" name="password" required="required">
                          <span>Password</span>
                          <div class="error" id="error">
            <?php
            if(isset($_GET['error'])==true){
              echo '<font color="#FF0000" size="2px">
              <p align="start">Incorrect Email or Password.</p>
              </font>';
            }
            ?>
          </div>
          <!-- <div  class="d-flex justify-content-end"><a href="">Forgot Password?</a></div> -->
          
                        </div></div>
                       
                          <button type="submit" name="submit" id="submit" class="btnnn btn-primary mb-2">Login</button>
                </form>
            </div>
        </div>
    </div>
    </form>
    <?php
  include '../nav_footer/footer.php'
  ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
<?php
    unset($_SESSION["error"]);
?>