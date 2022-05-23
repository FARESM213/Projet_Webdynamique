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
   
    <nav class="navbar" style="background-color: #d3e2ed;">          
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">
            <img src="logo.PNG" alt="" width="270" height="70">
          </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
         
          <div class="collapse navbar-collapse" style="background-color: #a2b9cd; padding-top: 5px; padding-bottom: 5px;" id="navbarSupportedContent">
            <ul class="nav nav-pills nav- justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.html">Accueil</a>
                  </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="toutparc.html">Tout Parcourir</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Votre compte
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="profil.html">Profil</a></li>
                  <li><a class="dropdown-item" href="profil.html">Mes RDV</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="index.html">Log out</a></li>
                </ul>
              </li>
              <form class="d-flex" style= "padding-left: 190px;"role="search">
                <input class="form-control me-2 " type="search" placeholder="Recherche" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
              </form>
            </ul>
          </div>
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
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#medGen">Plus d'informations</button>
                </ul>

                <div class="modal fade" id="medGen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="medGenLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="medGenLabel">Médecins Generalistes</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="list-group">

                                <a data-bs-toggle="modal" href="#mod1" class="list-group-item list-group-item-action" aria-current="true">
                                  <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Dr. ABC DEF</h5>
                                  </div>
                                  <p class="mb-1">Medecin Généraliste.</p>
                                </a>
              <!-- A faire : RECUP UN ID DE DOCTEUR EN CLIQUANT SUR UN DES DOC PROPOSES, REMPLIR LA LISTE DYNAMIQUEMENT DEPUIS DATABASE-->

                                <a data-bs-toggle="modal" href="#mod1" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                      <h5 class="mb-1">Dr. ABC DEF</h5>
                                    </div>
                                    <p class="mb-1">Medecin Généraliste.</p>
                                  </a>
                                  <a data-bs-toggle="modal" href="#mod1" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                      <h5 class="mb-1">Dr. ABC DEF</h5>
                                    </div>
                                    <p class="mb-1">Medecin Généraliste.</p>
                                  </a>
                                  <a data-bs-toggle="modal" href="#mod1" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                      <h5 class="mb-1">Dr. ABC DEF</h5>
                                    </div>
                                    <p class="mb-1">Medecin Généraliste.</p>
                                  </a>
                              </div>             
                           </div>
                          <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                      </div>
                    </div>
                  </div>

                <!-- Modal 1 Docteur Generaliste, a faire : RECUP INFORMATIONS DES DOC A PARTIR DU CLICK CHOIX PRECEDENT-->

                  <div class="modal fade" id="mod1" tabindex="-1" aria-labelledby="mod1Label" aria-hidden="true">
                    <div class="modal-dialog  modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" style=" color: #000;" id="mod1Label">Medecin Généraliste</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style=" color: #000;">
                          
                          <div class="page-content page-container" id="page-content" >
                            <div class="padding">
                                <div class="row container d-flex">
                                            <div class="col-xl-6 col-md-12" style="height: 600px;">
                                                                        <div class="card user-card-full flex-column "  style="height: 600px; width: 300px;">
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

                                                                                            <div class="col-sm-12" style="padding-top: 260px; padding-left: 100px;">
                                                                                              <button type="button" class="btn btn-info">Contact</button>
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
                                         
                                                  <div class="col align-self-auto" style="width: 400px;">
                                                    <ul class="list-group">
                                                        <li class="list-group-item active">Active item</li>
                                                        <li class="list-group-item">Click me to active item</li>
                                                        <li class="list-group-item">Click me too active item item</li>
                                                    </ul>
                                                  </div>
                                </div>
                            </div>
                    </div>
</div>

                      <div class="col-sm-2" >
                        <button type="button" class="btn btn-info">Prendre Rendez-vous</button>
                    </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
    
          

          <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg" style="background-image: url('medspe.PNG');  background-size: cover;">
              <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                <h2 class="pt-7 mt-5 mb-4 display-4 lh-1 fw-bold" style="color: #0056ab; ">Médecins Specialistes</h2>
                <ul class="d-flex list-unstyled mt-auto">
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#medSpe">Plus d'informations</button>
                </ul>

                <div class="modal fade" id="medSpe" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="medSpeLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="medSpeLabel">Médecins Spécialistes</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="list-group">
                                <a data-bs-toggle="modal" href="#mod2" class="list-group-item list-group-item-action" aria-current="true">
                                  <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Addictologie</h5>
                                  </div>
                                  <p class="mb-1">Médecine consacrée à l’étude et la prise en charge des addictions.</p>
                                </a>
                                <a data-bs-toggle="modal" href="#mod2" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                      <h5 class="mb-1">Andrologie</h5>
                                    </div>
                                    <p class="mb-1">Médecin spécialiste des fonctions sexuelles et reproductives de l’homme.</p>
                                  </a>
                                  <a data-bs-toggle="modal" href="#mod2" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                      <h5 class="mb-1">Cardiologie</h5>
                                    </div>
                                    <p class="mb-1">Médecine qui étudie le cœur et les vaisseaux.</p>
                                  </a>
                                  <a data-bs-toggle="modal" href="#mod2" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                      <h5 class="mb-1">Dermatologie</h5>
                                    </div>
                                    <p class="mb-1">Médecine qui s’intéresse à l’étude de la peau, des cheveux, des poils et des ongles.</p>
                                  </a>
                                  <a data-bs-toggle="modal" href="#mod2" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                      <h5 class="mb-1">Gastro-Hepato-Enterologie</h5>
                                    </div>
                                    <p class="mb-1">Médecine qui s’intéresse aux organes de la digestion, leurs fonctionnements, leurs maladies et les moyens de les soigner.</p>
                                  </a>
                                  <a data-bs-toggle="modal" href="#mod2" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                      <h5 class="mb-1">Gynecologie</h5>
                                    </div>
                                    <p class="mb-1">Domaine médical qui étudie et traite les différentes pathologies de l’appareil génital de la femme et les troubles hormonaux féminins</p>
                                  </a>
                                  <a data-bs-toggle="modal" href="#mod2" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                      <h5 class="mb-1">I.S.T.</h5>
                                    </div>
                                    <p class="mb-1">Infections Sexuellement Transmissibles.</p>
                                  </a>
                                  <a data-bs-toggle="modal" href="#mod2" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                      <h5 class="mb-1">Osteopathie</h5>
                                    </div>
                                    <p class="mb-1">Thérapeutique manuelle fondée sur des manipulations osseuses ou musculaires.</p>
                                  </a>
                              </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="modal fade" id="mod2" tabindex="-1" aria-labelledby="mod2Label" aria-hidden="true">
                    <div class="modal-dialog  modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" style=" color: #000;" id="mod2Label">Medecin Specialiste 1</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style=" color: #000;">
                          
                          <div class="page-content page-container" id="page-content" >
                            <div class="padding">
                                <div class="row container d-flex">
                                            <div class="col-xl-6 col-md-12" style="height: 600px;">
                                                                        <div class="card user-card-full flex-column "  style="height: 600px; width: 300px;">
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

                                                                                            <div class="col-sm-12" style="padding-top: 260px; padding-left: 100px;">
                                                                                              <button type="button" class="btn btn-info">Contact</button>
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
                                         
                                                  <div class="col align-self-auto" style="width: 400px;">
                                                    <ul class="list-group">
                                                        <li class="list-group-item active">Active item</li>
                                                        <li class="list-group-item">Click me to active item</li>
                                                        <li class="list-group-item">Click me too active item item</li>
                                                    </ul>
                                                  </div>
                                </div>
                            </div>
                    </div>
</div>
       
                      <div class="col-sm-2" >
                        <button type="button" class="btn btn-info">Prendre Rendez-vous</button>
                    </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>


              </div>
            </div>
          </div>
    
          <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg" style="background-image: url('labo.jpg');  background-size: cover;">
              <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                <h2 class="pt-7 mt-5 mb-4 display-4 lh-1 fw-bold" style="color: #0056ab;" >Laboratoire de biologie medicale</h2>

                <ul class="d-flex list-unstyled mt-auto">
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#labo">Plus d'informations</button>
                </ul>

                <div class="modal fade" id="labo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="medGenLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="labo">Médecins Generalistes</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                  <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Prise de sang</h5>
                                  </div>
                                  
                                </a>
                                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                      <h5 class="mb-1">Depistage COVID-19</h5>
                                    </div>
                                  </a>
                              </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
      <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
      <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
      <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
      <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
</body>
</html>