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
    <title>Rendez Vous</title>
    <script src="
    https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
        </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  
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
                      <a href="login.html" class="dropdown-item">Se connecter</a>
                  </div>
              </div>
              <a href="contact.html" class="nav-item nav-link">Contact</a>
          </div>
          <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
          <a href="rdv.html" class="btn btn-primary py-2 px-4 ms-3">Prendre un Rendez-vous</a>
          <form class="d-flex" style= "padding-left: 190px;"role="search">
            <input class="form-control me-2 " type="search" placeholder="Recherche" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
          </form>
      </div>
  </nav>


          <div class="col-md-4">
              <form>
                <h4>Docteur</h4>
                  <select class="form-control"  id='firstList' name='firstList'>
                  <option> - Choisir un Docteur -</option>
                        <?php

                        $sql="SELECT * FROM medecin WHERE medjob='Generale'";
                        $res = mysqli_query($db_handle,$sql);

                        while ($row = mysqli_fetch_array($res)) {
                            echo "<option value='" . $row[1] . "'>" . $row[1] . "</option>
                            ";
                        }
                        $selected1 = $_POST['firstList'];
                        ?>
                  </select>



                <h4>Horaires Disponibles</h4>
                  <select class="form-control"  id='secondList' name='secondList' >
                  <option> - Choisir un horaire -</option>
                        <?php
          
                      //  $sql1="SELECT medno FROM medecin WHERE medname='$selected1'";
                       // $res1= mysqli_query($db_handle,$sql1);

                        $sql2="SELECT rdv_horaire FROM rendez_vous WHERE medno='$res1'";
                        $res2 = mysqli_query($db_handle,$sql2);

                        while ($row = mysqli_fetch_array($res2)) {
                            echo "<option value='" . $row['rdv_horaire'] . "'>" . $row['rdv_horaire'] . "</option>";
                        }
                        ?>
                  </select>          
              </form>
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
      <a class="text-dark" href="index.html">OMNESSante.com</a>
    </div>
    <!-- Copyright -->
  </footer>
</html>