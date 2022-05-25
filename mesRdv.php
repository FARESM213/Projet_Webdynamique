<?php

// Start the session
session_start();
require("traitement.php");
header( 'content-type: text/html; charset=utf-8' );


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Votre Profil</title>
    <script src="
    https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
        </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
      <a href="index.php" class="navbar-brand p-0">
          <img src="logo2.PNG" alt="" width="270" height="70">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav ms-auto py-0">
              <a href="index.php" class="nav-item nav-link active">Accueil</a>
              <a href="toutparc.php" class="nav-item nav-link">Tout Parcourir</a>
              <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profil</a>
                  <div class="dropdown-menu m-0">
                      <a href="login.php" class="dropdown-item">Se connecter</a>
                  </div>
              </div>
              <a href="contact.php" class="nav-item nav-link">Contact</a>
          </div>
          <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
          <a href="rdv.php" class="btn btn-primary py-2 px-4 ms-3">Prendre un Rendez-vous</a>
          <form class="d-flex" style= "padding-left: 190px;"role="search">
            <input class="form-control me-2 " type="search" placeholder="Recherche" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
          </form>
      </div>
  </nav>
      <div class="row container d-flex">
        <div class="col-xl-6 col-md-12" style="height: 300px; margin-top: 25px;">
            <div class="card user-card-full flex-column "  style="height: 300px; width: 300px;">
                <div class="row m-l-0 m-r-0">
                    <div class="col-sm-12 bg-c-lite-green user-profile">
                        <div class="card-block text-center text-black">
                            <div class="m-b-25">
                                <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                            </div>
                            <h6 class="f-w-600"style=" color: #000; ">NOM Prenom</h6>
                            <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                        </div>
                    </div>
                    <div class="col-sm-12" style="padding-left: 30px;">
                        <div class="card-block">
                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="m-b-10 f-w-600">Email</p>
                                    <h6 class="text-muted f-w-400">aaaaa@gmail.com</h6>
                                </div>
                                <div class="col-sm-12">
                                    <p class="m-b-10 f-w-600">Telephone</p>
                                    <h6 class="text-muted f-w-400">06 00 00 00 00</h6>
                                </div>
                            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('li').click(function() {
            $('li.list-group-item.active').removeClass("active");
            $(this).addClass("active");
        });
    });
</script>

<div class="col-xl-12" style="width: 500px; ">

<h1>Vos Rendez-vous</h1>
<h4> Vous pouvez annuler un rendez vous </h4>

<ul class="list-group">
<li class="list-group-item">RDV1</li>
<li class="list-group-item">RDV2</li>
<li class="list-group-item">RDV3</li>
<li class="list-group-item">RDV1</li>
<li class="list-group-item">RDV2</li>
<li class="list-group-item">RDV3</li>
<li class="list-group-item">RDV1</li>
<li class="list-group-item">RDV2</li>
<li class="list-group-item">RDV3</li>
<li class="list-group-item">RDV1</li>
<li class="list-group-item">RDV2</li>
<li class="list-group-item">RDV3</li>
</ul>
<div class="col-sm-12" style="margin-top: 25px ;" >
<button type="button" class="btn btn-danger">Annuler RDV</button>
</div>
        
</div>


</body>

<footer class="fixed-bottom bg-light">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">A propos de nous</h5>
  
          <ul class="list-unstyled mb-0">
            <li>
              <a href="omnessante@omnes.com!" class="text-dark">Mail : omnessante@omnes.com</a>
            </li>
            <li>
              <a href="#!" class="text-dark">Telephone : 01 00 00 00 00</a>
            </li>
            <li>
              <a href="https://www.google.com/maps/place/ECE+Paris/@48.8517668,2.2864819,15z/data=!4m2!3m1!1s0x0:0x167f5a60fb94aa76?sa=X&ved=2ahUKEwjq5cC_s_T3AhUP_4UKHX_KATsQ_BJ6BQi_ARAF!" class="text-dark">Adresse : 37 Quai de Grenelle, 75015 Paris</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
  
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgb(164, 231, 252);">
      © 2022 Copyright:
      <a class="text-dark" href="index.php">OMNESSante.com</a>
    </div>
    <!-- Copyright -->
  </footer>
</html>