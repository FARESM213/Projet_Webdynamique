<?php

// Start the session
session_start();
require("traitement.php");

?>


<!doctype html>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catégories des Services</title>
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
                              <?php 
                                      if($_SESSION['Client']=="")
                                      {
                                        echo " <a href='login.php'class='dropdown-item'>Se connecter</a> " ;//// 
                                      }  
                                      else
                                      {                                        
                                         echo " <a href='profil.php'class='dropdown-item'>Mon profil</a> " ;//// 
                                         echo " <a href='mesRdv.php'class='dropdown-item'>Mes Rendez-vous </a> " ;//// 
                                         echo " <a href='Deconnexion.php'class='dropdown-item'>Se deconnecter </a> " ;//// 

                                      }

                              ?>
                          </div>

                      </div>
                      
                      <?php 
                                      if($_SESSION['Client']!="")
                                      {
                                        echo "<a href='chat.php' class='nav-item nav-link'>Contact</a>";//// 
                                      }  
                                      else
                                      {                                        
                                        echo "<a href='Login.php' class='nav-item nav-link'>Contact</a>";//// 
                                      }
                              ?>
                  </div>
                  <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>

                   <?php 
                                    if($_SESSION['Client']=="")
                                      {
                                          echo "<a href='Login.php' class='btn btn-primary py-2 px-4 ms-3'>Prendre un Rendez-vous</a>";
                                      }  
                                      else if($_SESSION['Type']=="patient") 
                                      {                           
                                          echo "<a href='rdv.php' class='btn btn-primary py-2 px-4 ms-3'>Prendre un Rendez-vous</a>";
                                      }

                    ?>


                  <form class="d-flex" style= "padding-left: 190px;"role="search">
                    <a href="indexx.php" class="btn btn-outline-success" type="submit">Rechercher</a>
                  </form>
              </div>
          </nav>

   
    
      <section id="departments" class="departments" style="margin-top: 25px;">
        <div class="container">
  
          <div class="section-title">
            <h2>Nos Services</h2>
            <p>Notre clinique vous offre un service de qualite dans tous les domaines suivants :</p>
          </div>
  
          <div class="row gy-4">
            <div class="col-lg-3">
              <ul class="nav nav-tabs flex-column">
                <li class="nav-item">
                  <a class="nav-link show active" data-bs-toggle="tab" href="#tab-1">Médecine Générale</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Médecins Spécialistes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Laboratoires</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-9">
              <div class="tab-content">
                <div class="tab-pane show active" id="tab-1">
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Médecine Générale</h3>
                      <p class="fst-italic">La médecine générale est la branche de la médecine prenant en charge le suivi durable et les soins médicaux généraux d'une communauté, sans se limiter à des groupes de maladies relevant d'un organe, d'un âge, ou d'un sexe particulier. </p>
                      <p>Le médecin généraliste (on dit aussi médecin omnipraticien) est donc le spécialiste de la santé assurant le suivi, la prévention, les soins et le traitement des malades de sa collectivité, dans une vision à long terme de la santé et du bien-être de ceux qui le consultent.</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="team-1.jpg" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-2">
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Médecins Spécialistes</h3>
                      <p class="fst-italic">Les meilleurs médecins, dans tous les domaines, a votre disposition</p>
                      <p>Notre clinique vous propose des services dans les domaines suivants : Addictologie, Andrologie, Cardiologie, Dermatologie, Gastro-Hepato-Enterologie, Gynecologie, I.S.T., Osteopathie</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="team-2.jpg" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-3">
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Laboratoire</h3>
                      <p class="fst-italic">Les meilleures installations en France</p>
                      <p>Un laboratoire de biologie médicale ou LBM est un lieu où sont prélevés et analysés divers fluides biologiques d'origine humaine ou animale sous la responsabilité des biologistes médicaux, qui en interprètent les résultats dans le but d'aider au diagnostic médical.</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="team-3.jpg" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
        </div>
      </section>

    </body><footer class="fixed-bottom bg-light" style="padding-bottom:10px;">
  <!-- Grid container -->
  <div class="container" style="margin-top:10px;">
    <!--Grid row-->
    <div class="row"style="margin-bottom:10px;">
      <!--Grid column-->
      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <a href="mailto:omnessante@omnes.com" class="text-dark" >Mail : omnessante@omnes.com</a>
      </div>
      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <a href="https://www.google.com/maps/place/ECE+Paris/@48.8517668,2.2864819,15z/data=!4m2!3m1!1s0x0:0x167f5a60fb94aa76?sa=X&ved=2ahUKEwjq5cC_s_T3AhUP_4UKHX_KATsQ_BJ6BQi_ARAF!" class="text-dark">Adresse : 37 Quai de Grenelle, 75015 Paris</a>
      </div> 
      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <a href="#!" class="text-dark">Telephone : 01 00 00 00 00</a>
      </div>
    </div> 
      <!--Grid column-->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgb(164, 231, 252);">
    © 2022 Copyright:
    <a class="text-dark" href="index.php">OMNESSante.com</a>
  </div>
  <!-- Copyright -->
        </div>
</footer>

</html>