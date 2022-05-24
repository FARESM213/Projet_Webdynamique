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
    <title>Rendez-vous</title>
    <script src="
    https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">




        </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
  <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
    <a href="index.html" class="navbar-brand p-0">
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
        <a href="rdv.html" class="btn btn-primary py-2 px-4 ms-3">Prendre un Rendez-vous</a>
        <form class="d-flex" style= "padding-left: 190px;"role="search">
          <input class="form-control me-2 " type="search" placeholder="Recherche" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
    </div>
</nav>



<div class="container px-4 py-5" id="custom-cards">
  <h2 class="pb-2 border-bottom" style="text-align: center;">Services disponibles chez OMNES Santé</h2>

  <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
    <div class="col">
      <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg" style="background-image: url('medgen.jpg'); background-size: cover;">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
          <h2 class="pt-7 mt-5 mb-4 display-4 lh-1 fw-bold" style="color: #0056ab;">Médecine Générale</h2>
          <ul class="d-flex list-unstyled mt-auto">
              <a class="btn btn-info" href="rdvGeneral.php">Plus d'informations</a>
          </ul>

          
  
        </div>
      </div>
    </div>


    <div class="col">
      <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg" style="background-image: url('medspe.PNG');  background-size: cover;">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
          <h2 class="pt-7 mt-5 mb-4 display-4 lh-1 fw-bold" style="color: #0056ab; ">Médecins Specialistes</h2>
          <ul class="d-flex list-unstyled mt-auto">
              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#medSpe">Plus d'informations</button>
          </ul>

          </div>
      </div>
    </div>

    <div class="col">
      <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg" style="background-image: url('labo.jpg');  background-size: cover;">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
          <h2 class="pt-7 mt-5 mb-4 display-4 lh-1 fw-bold" style="color: #0056ab;" >Laboratoire de biologie médicale</h2>

          <ul class="d-flex list-unstyled mt-auto">
              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#labo">Plus d'informations</button>
          </ul>

         
              </div>
      </div>
    </div>
    </div>
      </div>
    </div>
            
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
    <a class="text-dark" href="index.html">OMNESSante.com</a>
  </div>
  <!-- Copyright -->
</footer>
</html>