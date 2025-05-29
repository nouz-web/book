<?php
    if (isset($_POST["search"]))
    {




    }
?>
<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-color: #eee;">
    <div class="container-fluid bg-dark">
        <div class="container bg-dark">
            <?php require_once("./components/main_navigator.php"); ?>
        </div>
    </div>
    <!-- -->
    <main role="main">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="first-slide" src="./src/A.png">
      <div class="container">
        <div class="carousel-caption text-left">
          <h1>Example headline.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img class="second-slide" src="./src/B.png">
      <div class="container">
        <div class="carousel-caption">
          <h1>Another example headline.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img class="third-slide" src="./src/C.png">
      <div class="container">
        <div class="carousel-caption text-right">
          <h1>One more for good measure.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img class="third-slide" src="./src/D.png">
      <div class="container">
        <div class="carousel-caption text-right">
          <h1>One more for good measure.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container marketing pt-4">
  <!-- Three columns of text below the carousel -->
  <div class="row">
    <div class="col-lg-6" style="text-align: center;">
      <img class="rounded-circle" src="./src/t1.jpg" alt="Generic placeholder image" width="140" height="140">
      <h4 class="pt-4">Boutique</h4>
      <p>Créer votre propre compte votre boutique ...</p>
      <p><a class="btn btn-secondary" href="inscription.php?tp=1" role="button">Inscription</a></p>
    </div><!-- /.col-lg-4 -->
    
    <div class="col-lg-6" style="text-align: center;">
      <img class="rounded-circle" src="./src/t2.jpg" alt="Generic placeholder image" width="140" height="140">
      <h4 class="pt-4">Acheteur</h4>
      <p>Inscrivez vous pour faire vos cours ...</p>
      <p><a class="btn btn-secondary" href="inscription.php?tp=0" role="button">Inscription</a></p>
    </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->
</div><!-- /.container -->
<br>
<hr>
<br>
<footer class="container pt-4">
  <p class="float-right"><a href="#">....</a></p>
  <p>&copy; Année universitaire  2024-2025 </p>
</footer>
</main>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>