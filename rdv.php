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
            <a href="index.html" class="nav-item nav-link active">Accueil</a>
            <a href="toutparc.html" class="nav-item nav-link">Tout Parcourir</a>
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



<div class="container px-4 py-5" id="custom-cards">
  <h2 class="pb-2 border-bottom" style="text-align: center;">Services disponibles chez OMNES Santé</h2>

  <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
    <div class="col">
      <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg" style="background-image: url('medgen.jpg'); background-size: cover;">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
          <h2 class="pt-7 mt-5 mb-4 display-4 lh-1 fw-bold" style="color: #0056ab;">Médecine Générale</h2>
          <ul class="d-flex list-unstyled mt-auto">
              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#medGen">Plus d'informations</button>
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

                    <<?php 

                    $message="";
                    test($db_handle,$message);

                     ?>



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
                    <h5 class="modal-title" style=" color: #000;" id="mod1Label">Médecin Généraliste</h5>
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
                                                                                          <p class="m-b-10 f-w-600">Téléphone</p>
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
                                    <div class="col-xl-2" style="width: 500px; ">

                                      <h1> Liste de créneaux disponibles</h1>
                                      <h4> Veuillez choisir un horaire disponible :</h4>

                                      
<div style="margin-top: 50px; margin-bottom: 25px;">
<label for="start">Date :</label>

<input type="date" id="datefield1" name="dateRdv"
   value="min"
   min="2018-01-01" max="2025-12-31">

   
<script>  
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
 dd = '0' + dd;
}

if (mm < 10) {
 mm = '0' + mm;
} 
  
today = yyyy + '-' + mm + '-' + dd;
document.getElementById("datefield1").setAttribute("min", today);

</script>
</div>
                                              <ul class="list-group">
                                                  <li class="list-group-item">RDV1</li>
                                                  <li class="list-group-item">RDV2</li>
                                                  <li class="list-group-item">RDV3</li>
                                              </ul>
                                              <div class="col-sm-12" style="margin-top: 25px ;" >
                                                <button type="button" class="btn btn-info">Prendre Rendez-vous</button>
                                            </div>
                                            </div>
                          </div>
                      </div>
              </div>
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
              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#medSpe">Plus d'informations</button>
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
                          <a data-bs-toggle="modal" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                              <h5 class="mb-1">Addictologie</h5>
                            </div>
                            <p class="mb-1">Médecine consacrée à l’étude et la prise en charge des addictions.</p>
                          </a>
                          <a data-bs-toggle="modal" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Andrologie</h5>
                              </div>
                              <p class="mb-1">Médecin spécialiste des fonctions sexuelles et reproductives de l’homme.</p>
                            </a>
                            <a data-bs-toggle="modal" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Cardiologie</h5>
                              </div>
                              <p class="mb-1">Médecine qui étudie le cœur et les vaisseaux.</p>
                            </a>
                            <a data-bs-toggle="modal" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Dermatologie</h5>
                              </div>
                              <p class="mb-1">Médecine qui s’intéresse à l’étude de la peau, des cheveux, des poils et des ongles.</p>
                            </a>
                            <a data-bs-toggle="modal" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Gastro-Hepato-Enterologie</h5>
                              </div>
                              <p class="mb-1">Médecine qui s’intéresse aux organes de la digestion, leurs fonctionnements, leurs maladies et les moyens de les soigner.</p>
                            </a>
                            <a data-bs-toggle="modal" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Gynecologie</h5>
                              </div>
                              <p class="mb-1">Domaine médical qui étudie et traite les différentes pathologies de l’appareil génital de la femme et les troubles hormonaux féminins</p>
                            </a>
                            <a data-bs-toggle="modal" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">I.S.T.</h5>
                              </div>
                              <p class="mb-1">Infections Sexuellement Transmissibles.</p>
                            </a>
                            <a data-bs-toggle="modal" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true">
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



            <div class="modal fade" id="modDocs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modDocsLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modDocsLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="list-group">
                          <a data-bs-toggle="modal" href="#mod2" class="list-group-item list-group-item-action" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                              <h5 class="mb-1">MED1</h5>
                            </div>
                            <p class="mb-1">ASDASDASD.</p>
                          </a>
                          <a data-bs-toggle="modal" href="#mod2" class="list-group-item list-group-item-action" aria-current="true">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">MED2</h5>
                              </div>
                              <p class="mb-1">SDFGSDFGSD.</p>
                            </a>
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>


            <div class="modal fade" id="mod2" tabindex="-1" aria-labelledby="mod2Label" aria-hidden="true">
              <div class="modal-dialog  modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" style=" color: #000;" id="mod2Label">Médecin Spécialiste 1</h5>
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
                                                                                          <p class="m-b-10 f-w-600">Téléphone</p>
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
                                   
                                   <div class="col-xl-2" style="width: 500px; ">

        <h1> Liste de créneaux disponibles</h1>
        <h4> Veuillez choisir un horaire disponible :</h4>

        <div style="margin-top: 50px; margin-bottom: 25px;">
        <label for="start">Date :</label>

        <input type="date" id="datefield2" name="dateRdv"
        value="min"
        min="2018-01-01" max="2025-12-31">

                
                <script>  
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth() + 1; //January is 0!
                    var yyyy = today.getFullYear();

                    if (dd < 10) {
                    dd = '0' + dd;
                    }

                    if (mm < 10) {
                    mm = '0' + mm;
                    } 

                    today = yyyy + '-' + mm + '-' + dd;
                    document.getElementById("datefield2").setAttribute("min", today);

                </script>
</div>



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
                                        <li class="list-group-item">RDV1</li>
                                        <li class="list-group-item">RDV2</li>
                                        <li class="list-group-item">RDV3</li>
                                    </ul>
                                    <div class="col-sm-12" style="margin-top: 25px ;" >
                                      <button type="button" class="btn btn-info">Prendre Rendez-vous</button>
                                  </div>
                                  </div>
                          </div>
                      </div>
              </div>
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
          <h2 class="pt-7 mt-5 mb-4 display-4 lh-1 fw-bold" style="color: #0056ab;" >Laboratoire de biologie médicale</h2>

          <ul class="d-flex list-unstyled mt-auto">
              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#labo">Plus d'informations</button>
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
                          <a data-bs-toggle="modal" href="#mod3" class="list-group-item list-group-item-action" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                              <h5 class="mb-1">Prise de sang</h5>
                            </div>
                            
                          </a>
                          <a data-bs-toggle="modal" href="#mod3" class="list-group-item list-group-item-action" aria-current="true">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Dépistage COVID-19</h5>
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


            <div class="modal fade" id="mod3" tabindex="-1" aria-labelledby="mod3Label" aria-hidden="true">
              <div class="modal-dialog  modal-xl">
                <div class="modal-content">
                  <div class="modal-header">  
                    <h5 class="modal-title" style=" color: #000;" id="mod3Label">Laboratoire</h5>
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
                                                                                  <h6 class="f-w-600"style=" color: #000; ">NOM LABO</h6>
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
                                                                                          <p class="m-b-10 f-w-600">Téléphone</p>
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
                                  <div class="col-xl-2" style="width: 500px; ">

                                    <h1> Liste de créneaux disponibles</h1>
                                    <h4> Veuillez choisir un horaire disponible :</h4>

                                    
<div style="margin-top: 50px; margin-bottom: 25px;">
<label for="start">Date :</label>

<input type="date" id="datefield3" name="dateRdv"
   value="min"
   min="2018-01-01" max="2025-12-31">

   
<script>  
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
 dd = '0' + dd;
}

if (mm < 10) {
 mm = '0' + mm;
} 
  
today = yyyy + '-' + mm + '-' + dd;
document.getElementById("datefield3").setAttribute("min", today);

</script>
</div>
                                    <ul class="list-group">
                                        <li class="list-group-item">RDV1</li>
                                        <li class="list-group-item">RDV2</li>
                                        <li class="list-group-item">RDV3</li>
                                    </ul>
                                    <div class="col-sm-12" style="margin-top: 25px ;" >
                                      <button type="button" class="btn btn-info">Prendre Rendez-vous</button>
                                  </div>
                                  </div>
                          </div>
                      </div>
              </div>
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