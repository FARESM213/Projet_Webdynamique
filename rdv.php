<?php

// Start the session
session_start();
require("traitement.php");
header( 'content-type: text/html; charset=utf-8' );
include('db_config.php');


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

  <script type='text/javascript'>


  $(document).ready(function()
   {

          $('#clear').on('click', function(event) {

          const  ul = document.getElementById("Rdv");
          ul.innerHTML="";
      });


      $('#modDocs').on('show.bs.modal', function(event) 
      {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var getID = button.data('id')

       $.ajax({
                  url :"action.php",           // Valeur va etre renvoyée a action.php
                  type:"POST",                 
                  cache:false,                          // jsp ce que c'est 
                  data:{getID:getID},          // la en gros bah quand on va essayer de recuperer la valeur dans action.php, faudra mettre ca 
                  success:function(data)
                  {
                       $("#Retour").html(data);           // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                  }
              });     
    })

    $('#Confirmer').on('click', function(event) 
      {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var oui = button.data('id')

         $.ajax({
                    url :"action.php",           // Valeur va etre renvoyée a action.php
                    type:"POST",                 
                    cache:false,                          // jsp ce que c'est 
                    data:{Confirmer:oui},          // la en gros bah quand on va essayer de recuperer la valeur dans action.php, faudra mettre ca 
                    success:function(data)
                    {
                        // $("#Retour").html(data);           // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                    }
                });     
    })

      $('#mod2').on('hidden.bs.modal', function () {

          const  ul = document.getElementById("Rdv");
          ul.innerHTML="";


        // do something…
      })



      $('#mod2').on('show.bs.modal', function(event) 
      {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var Info = button.data('id')
           $.ajax({
                      url :"action.php",           // Valeur va etre renvoyée a action.php
                      type:"POST",                 
                      cache:false,                          // jsp ce que c'est 
                      data:{Info:Info,Nom:Info,Mail:Info,Img:Info,Num:Info},   // la en gros bah quand on va essayer de recuperer la valeur dans action.php, faudra mettre ca 
                      }).done(function(response) {
                      {
                          var splitted = response.split("|"); // RESULT
                           $("#Info").html(splitted[0]);   // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                           $("#Nom").html(splitted[1]);    // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                           $("#Mail").html(splitted[2]);    // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                           $("#Img").html(splitted[3]);    // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                           $("#Num").html(splitted[4]);    // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire


                      }
                  });     

          });


      $('#datefield2').on("change",function()
      {      
          var date = $(this).val();         
           $.ajax({
                      url :"action.php",           // Valeur va etre renvoyée a action.php
                      type:"POST",                 
                      cache:false,                          // jsp ce que c'est 
                      data:{Test:date},   // la en gros bah quand on va essayer de recuperer la valeur dans action.php, faudra mettre ca 
                      success:function(data)
                      {
                            $("#Rdv").html(data);           // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                      }
                  });     

           closeDate(this);
      });

      $('#fin').on('show.bs.modal', function(event) 
      {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var Info = button.data('id')
           $.ajax({
                      url :"action.php",           // Valeur va etre renvoyée a action.php
                      type:"POST",                 
                      cache:false,                          // jsp ce que c'est 
                      data:{Finition:Info},   // la en gros bah quand on va essayer de recuperer la valeur dans action.php, faudra mettre ca 
                      success:function(data)
                      {
                            $("#finito").html(data);           // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                      }
                  });     

                const  ul = document.getElementById("Rdv");
                ul.innerHTML="";

          });


      $('#fin').on('hidden.bs.modal', function () {

          const  ul = document.getElementById("Rdv");
          ul.innerHTML="";


        // do something…
      })




      $('#medGen').on('show.bs.modal', function(event) 
      {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var getID = 'Generale'

       $.ajax({
                  url :"action.php",           // Valeur va etre renvoyée a action.php
                  type:"POST",                 
                  cache:false,                          // jsp ce que c'est 
                  data:{getID:getID},          // la en gros bah quand on va essayer de recuperer la valeur dans action.php, faudra mettre ca 
                  success:function(data)
                  {
                       $("#medGeneral").html(data);           // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                  }
              });     
    })



      $('#mod1').on('show.bs.modal', function(event) 
      {
          var button2 = $(event.relatedTarget) // Button that triggered the modal
          var Info2 = button2.data('id')
           $.ajax({
                      url :"action.php",           // Valeur va etre renvoyée a action.php
                      type:"POST",                 
                      cache:false,                          // jsp ce que c'est 
                      data:{Info2:Info2,Nom2:Info2,Mail2:Info2,Img2:Info2,Num2:Info2},   // la en gros bah quand on va essayer de recuperer la valeur dans action.php, faudra mettre ca 
                      }).done(function(response) {
                      {
                          var splitted = response.split("|"); // RESULT
                           $("#Info2").html(splitted[0]);   // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                           $("#Nom2").html(splitted[1]);    // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                           $("#Mail2").html(splitted[2]);    // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                           $("#Img2").html(splitted[3]);    // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                           $("#Num2").html(splitted[4]);    // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire

                      }
                  });     

          });


       $('#mod1').on('hidden.bs.modal', function () {

          const  ul = document.getElementById("Rdv");
          ul.innerHTML="";

        // do something…
      })


          $('#labo').on('show.bs.modal', function(event) 
      {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var getLabo1 = button.data('id')

       $.ajax({
                  url :"action.php",           // Valeur va etre renvoyée a action.php
                  type:"POST",                 
                  cache:false,                          // jsp ce que c'est 
                  data:{getLabo1:getLabo1},          // la en gros bah quand on va essayer de recuperer la valeur dans action.php, faudra mettre ca 
                  success:function(data)
                  {
                       $("#listeLabo").html(data);           // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                  }
              });     
    })

             $('#labo').on('hidden.bs.modal', function () {

          const  ul = document.getElementById("Rdv2");
          ul.innerHTML="";


        // do something…
      })


    $('#datefield3').on("change",function()
      {      
          var date = $(this).val();         
           $.ajax({
                      url :"action.php",           // Valeur va etre renvoyée a action.php
                      type:"POST",                 
                      cache:false,                          // jsp ce que c'est 
                      data:{Test2:date},   // la en gros bah quand on va essayer de recuperer la valeur dans action.php, faudra mettre ca 
                      success:function(data)
                      {
                            $("#Rdv2").html(data);           // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                      }
                  });     

           closeDate(this);
      });


      $('#mod3').on('show.bs.modal', function(event) 
      {
          var button3 = $(event.relatedTarget) // Button that triggered the modal
          var Info3 = button3.data('id')
           $.ajax({
                      url :"action.php",           // Valeur va etre renvoyée a action.php
                      type:"POST",                 
                      cache:false,                          // jsp ce que c'est 
                      data:{Info3:Info3,Nom3:Info3,Mail3:Info3,Num3:Info3},   // la en gros bah quand on va essayer de recuperer la valeur dans action.php, faudra mettre ca 
                      }).done(function(response) {
                      {
                          var splitted = response.split("|"); // RESULT
                           $("#Info3").html(splitted[0]);   // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                           $("#Nom3").html(splitted[1]);    // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                           $("#Mail3").html(splitted[2]);    // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                          $("#Num3").html(splitted[3]);    // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire

                      }
                  });     

          });

       $('#mod3').on('hidden.bs.modal', function () {

          const  ul = document.getElementById("Rdv2");
          ul.innerHTML="";


        // do something…
      })

  });

    
  </script>

  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
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

                    <div class="list-group" id = "medGeneral">

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
                                      <div class="col-xl-6 col-md-12"  id="Information" style="height: 600px;">
                                                                  <div class="card user-card-full flex-column "  style="height: 600px; width: 300px;">
                                                                      <div class="row m-l-0 m-r-0">
                                                                          <div class="col-sm-12 bg-c-lite-green user-profile">
                                                                              <div class="card-block text-center text-black">
                                                                                  <div class="m-b-25" id="Img2">
                                                                                      <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                                                                  </div>
                                                                                  <h6 class="f-w-600"style=" color: #000; " id="Nom2"></h6>
                                                                                  <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                                              </div>
                                                                          </div>
                                                                          <div class="col-sm-12" style="padding-left: 30px;">
                                                                              <div class="card-block">
                                                                                  <h3 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h3>
                                                                                  <div class="row">
                                                                                      <div class="col-sm-12">
                                                                                          <p class="m-b-10 f-w-600">Email</p>
                                                                                          <h6 class="text-muted f-w-400" id="Mail2"></h6>
                                                                                      </div>
                                                                                      <div class="col-sm-12">
                                                                                          <p class="m-b-10 f-w-600">Téléphone</p>
                                                                                          <h6 class="text-muted f-w-400" id="Num2">06 00 00 00 00</h6>
                                                                                      </div>

                                                                                      <div class="col-sm-12" style="padding-top: 260px; padding-left: 100px;">
                                                                                        <button type="button" class="btn btn-info">Voir Cv</button>
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

          <div class="modal fade" id="medSpe" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="medSpeLabel"aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="medSpeLabel">Médecins Spécialistes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                      <div class="list-group">

                          <a data-bs-toggle="modal"  data-target="#modDocs" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true" data-id="Addictologie">
                            <div class="d-flex w-100 justify-content-between">
                              <h5 class="mb-1">Addictologie</h5>
                            </div>
                            <p class="mb-1">Médecine consacrée à l’étude et la prise en charge des addictions.</p>
                          </a>
                        

                            <a data-bs-toggle="modal"  data-target="#modDocs" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true" data-id="Andrologie">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Andrologie</h5>
                              </div>
                              <p class="mb-1">Médecin spécialiste des fonctions sexuelles et reproductives de l’homme.</p>
                            </a>


                            <a data-bs-toggle="modal"  data-target="#modDocs" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true" data-id="Cardiologie">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Cardiologie</h5>
                              </div>
                              <p class="mb-1">Médecine qui étudie le cœur et les vaisseaux.</p>
                            </a>
                           <a data-bs-toggle="modal"  data-target="#modDocs" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true" data-id="Dermatologie">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Dermatologie</h5>
                              </div>
                              <p class="mb-1">Médecine qui s’intéresse à l’étude de la peau, des cheveux, des poils et des ongles.</p>
                            </a>
                            <a data-bs-toggle="modal"  data-target="#modDocs" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true" data-id="Gastro-Hepato-Enterologie">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Gastro-Hepato-Enterologie</h5>
                              </div>
                              <p class="mb-1">Médecine qui s’intéresse aux organes de la digestion, leurs fonctionnements, leurs maladies et les moyens de les soigner.</p>
                            </a>
                            <a data-bs-toggle="modal"  data-target="#modDocs" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true" data-id="Gynecologie">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Gynecologie</h5>
                              </div>
                              <p class="mb-1">Domaine médical qui étudie et traite les différentes pathologies de l’appareil génital de la femme et les troubles hormonaux féminins</p>
                            </a>
                            <a data-bs-toggle="modal"  data-target="#modDocs" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true" data-id="I.S.T.">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">I.S.T.</h5>
                              </div>
                              <p class="mb-1">Infections Sexuellement Transmissibles.</p>
                            </a>
                            <a data-bs-toggle="modal"  data-target="#modDocs" href="#modDocs" class="list-group-item list-group-item-action" aria-current="true" data-id="Osteopathie">
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
      <div class="list-group" id="Retour">  <!--// Modal modifié  -->
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


        <div class="modal fade" id="mod2" tabindex="-1" aria-labelledby="mod2Label" aria-hidden="true">
                       <div class='modal-dialog  modal-xl'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' style=' color: #000;' id='Info'></h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                  </div>
                  <div class='modal-body' style=' color: #000;'>
                    
                    <div class='page-content page-container' id='page-content' >
                      <div class='padding'>
                          <div class='row container d-flex'>
                                      <div class='col-xl-6 col-md-12' style='height: 600px;'>

                                                                  <div class='card user-card-full flex-column '  style='height: 600px; width: 300px;'>
                                                                      <div class='row m-l-0 m-r-0'>
                                                                          <div class='col-sm-12 bg-c-lite-green user-profile'>
                                                                              <div class='card-block text-center text-black'>
                                                                                  <div class='m-b-25' id='Img'>
                                                                                      <img src='https://img.icons8.com/bubbles/100/000000/user.png' class='img-radius' alt='User-Profile-Image'>
                                                                                  </div>
                                                                                  <div id="Nom">

                                                                                  </div>
                                                                                  <i class=' mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16'></i>
                                                                              </div>
                                                                          </div>
                                                                          <div class='col-sm-12' style='padding-left: 30px;'>
                                                                              <div class='card-block'>
                                                                                  <h3 class='m-b-20 p-b-5 b-b-default f-w-600'>Information</h3>
                                                                                  <div class='row'>
                                                                                      <div class='col-sm-12'>
                                                                                          <p class='m-b-10 f-w-600'>Email</p>
                                                                                          <h6 class='text-muted f-w-400' id="Mail"></h6>
                                                                                      </div>
                                                                                      <div class='col-sm-12'>
                                                                                          <p class='m-b-10 f-w-600'>Téléphone</p>
                                                                                          <h6 class='text-muted f-w-400' id="Num">06 00 00 00 00</h6>
                                                                                      </div>

                                                                                      <div class='col-sm-12' style='padding-top: 260px; padding-left: 100px;'>
                                                                                        <a href="Affich_CV.php" target="_blank" type='button' class='btn btn-info'>Consulter Cv</a>
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
                                                        $('li.list-group-item.active').removeClass('active');
                                                        $(this).addClass('active');
                                                    });
                                                });
                                            </script>
                                   
                                   <div class='col-xl-2' style='width: 500px; '>

        <h1> Liste de créneaux disponibles</h1>
        <h4> Veuillez choisir un horaire disponible :</h4>

        <div style='margin-top: 50px; margin-bottom: 25px;'>

            
        <label for='start'>Date :</label>

        <input type='date' id='datefield2' name='dateRdv'
        value='min'
        min='2018-01-01' max='2025-12-31'>


                
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
                    document.getElementById('datefield2').setAttribute('min', today);

  </script>

</div>
                        <div class='list-group' id="Rdv"> </div>

                                  

      
                                  </div>
                          </div>
                      </div>
              </div>
</div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal' id="clear" >Close</button>
                  </div>
                </div>
              </div> 
        </div>


        </div>
      </div>
    </div>





     <div class="modal fade" id="fin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="finDocsLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title" id="finDocsLabel">Information</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                      <div class="list-group" id="finito"> 

                                      </div>
                                      </div>

                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                         <a href="formCarte.php" class="btn btn-info " id="Confirmer" name="Confirmer">Prendre Rendez-vous</a>
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

                        <?php

                        test2($db_handle);
                         ?>
                         
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
                                                                                  <h6 class="f-w-600"style=" color: #000;" id="Nom3">NOM LABO</h6>
                                                                                  <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                                              </div>
                                                                          </div>
                                                                          <div class="col-sm-12" style="padding-left: 30px;">
                                                                              <div class="card-block">
                                                                                  <h3 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h3>
                                                                                  <div class="row">
                                                                                      <div class="col-sm-12">
                                                                                          <p class="m-b-10 f-w-600">Email</p>
                                                                                          <h6 class="text-muted f-w-400" id="Mail3">aaaaa@gmail.com</h6>
                                                                                      </div>
                                                                                      <div class="col-sm-12">
                                                                                          <p class="m-b-10 f-w-600">Téléphone</p>
                                                                                          <h6 class="text-muted f-w-400" id="Num3">06 00 00 00 00</h6>
                                                                                      </div>

                                                                                      <div class="col-sm-12" style="padding-top: 260px; padding-left: 100px;">
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
                                   



                              <div class='list-group' id="Rdv2"> </div>

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


<footer class="fixed-bottom bg-light" style="padding-bottom:10px;">
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
  <!-- Copyright -->
        </div>
</footer>
</html>