<?php $dbcon = mysqli_connect("localhost","root","","espresso") or die(mysqli_error()); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/About.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../nav_footer/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="../nav_footer/footer.css"/>
    <script defer src="../script.js"></script>
    <script defer src="../app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Hello, world!</title>
  </head>
  <body>
     <script>
        const btn = document.querySelector('.btn');
        btn.onmousemove = function(e){
          const x = e.pageX - btn.offsetLeft;
          const y = e.pageY - btn.offsetTop;

          btn.style.setProperty('--x', x + 'px');
          btn.style.setProperty('--y', y + 'px');
        }
      </script>
  <?php
    include '../nav_footer/navbar.php'
    ?>
    <?php

if(isset($_POST['submit'])){

  $fname 			= $_POST['fname'];
  $lname 			= $_POST['lname'];
  $email 				= $_POST['email'];
  $phone 				= $_POST['phone'];
  $message 				= $_POST['message'];

  mysqli_query($dbcon, "INSERT INTO `messages`(`id`, `fname`, `lname`, `email`, `phone`, `message`) VALUES ('', '$fname', '$lname', '$email', '$phone', '$message')");


?>	
    
      
    <script>
     Swal.fire(
        'Thank you for messaging us!!',
        'Message Sent!',
        'success'
    )
    
    </script>

    
    <?php
  }

?> 



    <div id="progress">
          <span id="progress-value">&#x1F815;</span></div>
     <div class="container conprod hidden">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-5">
          <div class="vidiv"><video controls autoplay>
            <source src="../images/prodvid.mp4" type="video/mp4">
          </video></div>
        </div>
        <div class="col-sm-12 col-md-12  col-lg-7">
          <h1 class="coftags-title">Delicious <span>coffee</span><br> in the town</h1>
          <p class="coftags">The most Instagrammable Coffee Shop in the Philippines. Serving good quality concoctions of espresso-based drinks and mouth-watering food.</p>
          <div class="opening">
          <h1>Open: Saturday-Sunday</h1>
          <h1>10:00am-10:00pm</h1></div>
        </div>
      </div>
    </div>
    <div class="container con1 hidden">
        <div class="row">
        <div class="col-lg-5 col-md-12 col-sm-12">
        <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <img src="../images/place1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="../images/place2.jpg" class="d-block w-100" alt="...">
                
              </div>
              <div class="carousel-item">
                <img src="../images/place3.jpg" class="d-block w-100" alt="...">
                
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="col-lg-7 col-md-12 col-sm-12 about">
            <div class="about-about border shadow">
           <div class="about-title shadow-sm">
            <span>About Espresso Club</span> 
           </div>
        <div class="about-text ">
            <p>It all started with our loved for coffee. We usually go buy coffee every after we eat our meal. Coffee shop is like heaven for us.
                a different kind of invironment, it gives us a feeling of being in our own home while we enjoy the bond with the family and
                the sumptuous beverages and desserts a coffee shop offers.
            </p>
            <p>We opened our first store in Matias District, Talavera, Nueva Ecija on October 24, 2022
          </p>
          <h1 class="mission">Mission</h1>
          <p>To thrive and grow as business that supports the local community and uplift the lives of the people we touch through coffee.</p>
          <h1 class="vision">Vision</h1>
          <p>Treat people with love and passion and make them feel special in every sip of their coffee.</p>
        </div>
        </div>
        </div>
    </div>
    </div>
    <div class="container conmap hidden" id="imthemap">
      <h1>We are located at:</h1>
      <div class="row">
        <div class="col-md-12">
        <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d970.7569830616231!2d120.91897826957556!3d15.591824299063811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33972b36639f4b8b%3A0xcff73c8dae7261b3!2sOMG%20Talavera%20Nueva%20Ecija!5e1!3m2!1sen!2sph!4v1708925796524!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div></div>
    </div>
   
    <div class="container contus hidden" id="contactusid">
      <div class="row">
        <div class="col-md-6 colform">
          <div class="form">
          <h1 class="rout">Reach out to us!</h1>
          <p>Got a question about Espresso? Are you interested in partnering with us? Have some suggestion or just want to say hi? Contact Us:</p>
          <form class="forminp" action="about.php" method="POST">
            <div class="mb-3">
              <input type="" name="fname" class="form-control" id="exampleInputEmail1" placeholder="First Name" aria-label="Username" required>
            </div>
            <div class="mb-3">
              <input type="" name="lname" class="form-control" id="exampleInputEmail1" placeholder="Last Name" aria-label="Username" required>
            </div>
            <div class="mb-3">
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Your Email Address" aria-label="Username" required>
            </div>
            <div class="mb-3">
              <input type="" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Phone Number" aria-label="Username" required>
            </div>
            <div class="input-group mb-3">
  <textarea class="form-control" name="message" aria-label="With textarea" placeholder="Message" rows="6" required maxlength="200" oninput="updateCount(this.value.length)"></textarea>
</div>
<div id="char-count">200 characters remaining</div>

<script>
  function updateCount(length) {
    const maxLength = 200;
    const remaining = maxLength - length;
    document.getElementById('char-count').textContent = remaining + " characters remaining";
  }
</script>
            <div class="d-flex flex-row-reverse">
            <button type="submit" name="submit" class="btn btn-success">SUBMIT</button>
            </div>
          </form></div>
        </div>
  
        <div class="col-md-6 others">
        <h1 class="cus-care">Customer Care</h1>
        <p class="cus-care-text">Not sure where to start? Have something to recommend or want to have collaboration? Just visit our help center or get in touch with us:</p>
        <div class="cusnum">
          <p>Customer care telephone no. :</p>
          <p>+639689475697</p>
        </div>
        <h1 class="others-con">Other ways to connect</h1>
        <div class="d-flex social-account">
          <div class="fbicon">
            <i class="fa-brands fa-facebook-f fa-2x" style="color: #976E4E;"></i>
          </div>
          <div class="fbicon-text">
          <p class="">Be the first on your block to get product updates, announcements, news and lots of really good content, like us on facebook today!</p>
        </div>
      </div>
      <div class="d-flex social-account1">
        <div class="instaicon">
          <i class="fa-brands fa-instagram fa-2x" style="color: #976E4E;"></i>
        </div>
        <div class="instaicon-text">
        <p class="">Want to connect with us on Instagram and stay updated on the promos and product updates the follow us on Instagram <a href="">@EspressoClub</a></p>
      </div>
    </div>
      </div>
    </div>
    </div>
      <?php
  include '../nav_footer/footer.php'
  ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>