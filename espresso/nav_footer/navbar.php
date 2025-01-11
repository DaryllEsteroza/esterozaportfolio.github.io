<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="navbar.css" />
    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-ligh">
        <div class="container-fluid">
          <a href="../php/homepage.php"><img src="../images/logog.png" class="logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link px-3" aria-current="page" href="../php/homepage.php">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-3" href="../php/menu.php">MENU</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-3" href="../php/services.php">SERVICES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-3" href="../php/about.php#contactusid">CONTACTS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-3" href="../php/about.php">ABOUT US</a>
              </li>
            </ul>
            <form class="join_us d-flex">
              <a href="../php/signin.php" class="btn me-2" type="submit" >LOGIN</a>
              <a href="../php/signup.php" class="btn" type="submit">JOIN US</a>
            </form>
          </div>
        </div>
      </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>