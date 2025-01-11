
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/signup.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../nav_footer/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="../nav_footer/footer.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Hello, world!</title>
    <?php
    include 'connection.php'
    ?>

    <script type="text/javascript">
                    (function ($, window, document) {
                        $(function () {
                            $("form input").on({
                                "keyup": function () {
                                    var pass = $('#password1').val();
                                    var confirmPass = $('#password2').val();
                                    var saveButton = $("#btnsub");
                                    if (pass == confirmPass) {
                                        saveButton.removeAttr('disabled');
                                        $('#message').html('Password Matched').css('color', 'green').css('margin-left', '0px').css('margin-top', '0px');
                                    } else {
                                        saveButton.attr('disabled', 'disabled');
                                        $('#message').html('Password Not Matched').css('color', 'red').css('margin-left', '0px').css('margin-top', '0px');
                                    }
                                }
                            });
                        });

                       

                    }(window.jQuery, window, document));
                  </script>

  </head>
  <body>
  <?php
    include '../nav_footer/navbar.php'
    ?>
    <div class="container con1">
        <div class="row">
            <div class="col-md-6  colsign">
                <h1 class="mb-5">Create your account</h1>
                <form class="" action="signup.php" method="POST">
                  <div class="mb-0 d-flex justify-content-center">
                  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
                  </div>
                  <div class="d-flex justify-content-center gap-3">
                  <div class="mb-3 inputbox">
                    <input type="text" name="fname" required="required">
                    <span>FirstName</span>
                  </div>
                  <div class="mb-3 inputbox">
                    <input type="text" name="lname" required="required">
                    <span>lastname</span>
                  </div></div>
                  <div class="d-flex justify-content-center gap-3">
                    <div class="mb-3 inputbox">
                      <input type="text" name="address" required="required">
                      <span>Address</span>
                    </div>
                    <div class="mb-0 inputbox">
                      <input  name="contact" required="required">
                      <span>Contact Number</span>
                      <p class="exnum">Ex. (09385993755)</p>
                    </div>
                   </div>
                    <div class="d-flex justify-content-start gap-3">
                    <div class="mb-0 inputbox">
                      <input type="text" name="email" required="required">
                      <span>Email</span>
                      <p class="exnum">Note: This will be use as your username.</p>
                    </div>
                    </div>
                    <div class="mb-3 inputbox">
                      <input required="required" name="password1" id="password1" type="password" autocomplete="on"  minlength="8">
                      <span>password</span>
                      <p class="passval">You're password must contain at least 8 characters legnth.</p>
                    </div>
                    <div class="mb-3 inputbox">
                      <input  id="password2" type="password" autocomplete="on" required="true" >
                      <span>confirm password</span>
                      <p class="messagematch" id="message"></p>
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label" for="flexCheckChecked">
                        <p>Creating an account means you're okay with our <span>Terms and Conditions</span> and our <span>Privacy Policy.</span></p>
                      </label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" id="btnsub" value="Register">Sign up</button>
                </form>
            </div>
            <div class="col-md-6">
              <img src="../images/signup.jpg">
          </div>
        </div>
    </div>

 



   
<?php

	if(isset($_POST['submit'])){

		$fname 			= $_POST['fname'];
		$lname 			= $_POST['lname'];
		$address 			= $_POST['address'];
		$email 				= $_POST['email'];
    $contact 				= $_POST['contact'];
		$password1 			= $_POST['password1'];
		$hashed_password 	= md5($password1);
  
		mysqli_query($dbcon, "INSERT INTO `user_account`(`id`, `fname`, `lname`, `address`, `email`, `password`, `contact`) VALUES ('', '$fname', '$lname', '$address', '$email', '$hashed_password', '$contact')");


	?>	
			
				
			<script>
			 Swal.fire(
  				'Success!',
  				'Registration Successful!',
  				'success'
			)
			
			</script>

			
			<?php
		}

	?> 
   <?php
  include '../nav_footer/footer.php'
  ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>