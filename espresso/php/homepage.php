<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/homepage.css"/>
    <link rel="stylesheet" type="text/css" href="../nav_footer/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="../nav_footer/footer.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" charset="utf-8"></script>
    <script defer src="../script.js"></script>
    <script defer src="../app.js"></script>
    <title>Hello, world!</title>
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

    </div>
  </div>
</div>
            <div id="progress">
          <span id="progress-value">&#x1F815;</span></div>
   <div class="container car hidden">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="../images/samppp.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>First slide label</h5>
                      <p>Some representative placeholder content for the first slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="../images/vector-coffee-banners-set.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Second slide label</h5>
                      <p>Some representative placeholder content for the second slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="../images/coffee-horizontal-banners-set-vector.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Third slide label</h5>
                      <p>Some representative placeholder content for the third slide.</p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
        <div class="col-md-6 col-sm-12 banner1 my-auto">
            <h1 class="text-center">Where Your Coffee <br>Dreams Come True</h1>
            <br>
            <h2 class="text-center">Espresso Club</h2>
            <br>
            <br>
            <center><a href="menu.php"><button class="discover">Discover</button></a></center>
        </div>
    </div>
   </div>
   <div class="container con2 hidden">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <img src="../images/kape.jpg" class="w-100 h-50">
            <div class="overlay-text">
              <h1>Brewed to Perfection</h1>
              <h2>Try our quality coffee made from premium quality beans.</h2>
              <br>
              <a href="menu.php#con-icedd">Explore</a>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <img src="../images/pastries.jpg" class="w-100 h-50">
            <div class="overlay-text">
              <h1>Captivating Pastries</h1>
              <h2>Burgen. Harnessing the Power of Nature.</h2>
              <br>
              <a href="menu.php#conpast">Explore</a>
            </div>
    </div>
   </div>
  </div>
   <div class="container con3 hidden">
    <div class="row">
      <div class="col-md-7 col-sm-12 my-auto">
        <h1 class="text-center">We go where you go</h1>
        <h2 class="text-center">You deserve the best, and we deliver!</h2>
        <center><a href="services.php"><button>Explore</button></a></center>
      </div>
      <div class="col-md-5 col-sm-12">
        <img src="../images/grabfood.jpg" class="w-100">
      </div>
    </div>
   </div>
   <div class="container con4 hidden">
      <div class="row">
        <div class="col-md-6">
          <img src="../images/car1.jpg" class="w-100 h-100">
        </div>
        <div class="col-md-6">
          <h1 class="text-center text-white">Espresso Club</h1>
        <h2 class="text-center text-white">Experience the comfy place to sit down to chill!</h2>
        <p class="text-center text-white">Come and visit us here at OMG Milkshake, Talavera Nueva Ecija
          (beside Iglesia ni Cristo).</p>
        <center><a href="about.php#imthemap"><button>Locate Us</button></a></center>
        </div> 
      </div>
   </div>
   <!-- <div class="container con5 hidden">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center">Let’s stay in touch!</h1>
        <p class="text-center">Join our newsletter to get the latest news, updates, and special offers directly in your inbox.</p>
        <center><label>
          <input type="text" placeholder="Email Address">
          <button>Subscribe</button>
        </label></center>
      </div>
    </div>
   </div> -->
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php
  include '../nav_footer/footer.php'
  ?>
  </body>
</html>