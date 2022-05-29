<?php

// Start the session
session_start();
require("traitement.php");
include('db_config.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rendez Vous</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

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

      <div class="col-md-4">
        
        <form> 

        <!------------------ Premier Picker ------------>

        <label for="Medecin">Medecin</label>
        <select class="form-control" id="Medecin">
          <option value="">Choisir un medecin </option>


           <?php // Prend la valeur du premier picker

            $query = "SELECT * FROM medecin WHERE medjob='Generale'";
            $result = $con->query($query);
            if ($result->num_rows > 0) 
            {
                while ($row=$result->fetch_assoc()) 
                {
                    echo '<option value="'.$row['medno'].'">'.$row['medname'].'</option>'; // Ici on met la "valeur du medecin "egale a son id 
                }
            }
            else
            {
                  echo '<option value="">Medecin non disponible</option>'; 
             }

          ?>   

        </select>
        <br />

           <!--------------------------------------------->

        <!------------------ Second Picker ------------>

        <label for="Medecin">Horaire</label>
        <select class="form-control" id="Horaire">
          <option value="">Choisir un horaire</option>
        </select>
        <br />
        <!------------------------------------------------->

      </div>
    </form>
  </div>

  <!---------------Javascript Pour changer le second picker------------------->

  <script type="text/javascript">
    $(document).ready(function()  // Fonction callback de ce que j'ai compris qui attend les " event"
    {
      $("#Medecin").on("change",function()     // Fonction qui se declanche au changement du champ avec l'id " Medecin"
      {
        var medecinId = $(this).val();         // Renvoie la valeur de Medecin ( donc en gros les informations contenu dans la balise )
        $.ajax({
                  url :"action.php",           // Valeur va etre renvoyée a action.php
                  type:"POST",                 
                  cache:false,                          // jsp ce que c'est 
                  data:{medecinId:medecinId},          // la en gros bah quand on va essayer de recuperer la valeur dans action.php, faudra mettre ca 
                  success:function(data)
                  {
                    $("#Horaire").html(data);           // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                  }
              });     
       });

      });

  </script>

    <!------------------------------------------------------------------------>

</body>
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
  </div>
  <!-- Copyright -->
        </div>
</footer>


</html>