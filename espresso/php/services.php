<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/services.css" />
    <link rel="stylesheet" type="text/css" href="../nav_footer/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="../nav_footer/footer.css"/>
    <script defer src="../script.js"></script>
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
    <div id="progress">
          <span id="progress-value">&#x1F815;</span></div>
    <div class="container-fluid d-flex align-items-center justify-content-center con1">
      <div class="row">
        <div class="col-md-12 ">
          <div class="servtitle">SERVICES</div>
          <p>We find amazing single-origin coffee beans, roast them to perfections and deliver it to your door.</p>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="container con2 d-flex justify-content-center">
      <div class="row">
        <div class="col-md-12">
            <h1 class="titltext">Have our coffee, delivered right at your doorstep</h1>
            <p>Start your day and order to get your Espresso Coffee favourites delivered to you via our services.</p>
            <br>
            
            <div class="d-flex gap-5 servserv">
            <div class="grab">
              <center><H1>MAKE AN ORDER</H1>
              <img src="../images/order.png" alt="" class="ord">
            </center>
            </div>
            <div class="foodpanda">
            <center><H1>WAIT A WHILE</H1>
          <img src="../images/fooddeliver.png" alt="" class="dlv"></center>
            </div>
            <div class="foodpanda">
            <center><H1>GET YOUR FOOD</H1>
            <img src="../images/recieve.png" alt="" class="pck"></center>
            </div></div>

        </div>
      </div>

    </div>
    <?php
  include '../nav_footer/footer.php'
  ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>