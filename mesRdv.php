<?php

// Start the session
session_start();
require("traitement.php");
header( 'content-type: text/html; charset=utf-8' );

$_SESSION['Rdv_Supp']="";

include('db_config.php');

       if($_SESSION["Type"]=='medecin')
              {
                             $data4="medno";

                     } 
                      else if ($_SESSION["Type"]=="patient")
                     {
                             $data4="patno";
                     
                     }
                    else
                    {
                      $data4="adno";
             
                     }        
    $data="";
    $data2=$_SESSION['IdClient']; 
    $data3=$_SESSION['Type_Rdv'];
  
    $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "BDD";
  $con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);
    $query = " SELECT DISTINCT * FROM rendez_vous WHERE etat='1' AND $data4='$data2' ORDER BY rdv_date ASC,rdv_horaire ASC"; 
    $result = $con->query($query);

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
                      <a href="#contactUs" class="nav-item nav-link">Contact</a>
                  </div>
                  <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>

                   <?php 
                                      if($_SESSION['Client']=="")
                                      {
                                          echo "<a href='Login.php' class='btn btn-primary py-2 px-4 ms-3'>Prendre un Rendez-vous</a>";
                                      }  
                                      else
                                      {                                        
                                          echo "<a href='rdv.php' class='btn btn-primary py-2 px-4 ms-3'>Prendre un Rendez-vous</a>";
                                      }

                              ?>

                  <form class="d-flex" style= "padding-left: 190px;"role="search">
                    <input class="form-control me-2 " type="search" placeholder="Recherche" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                  </form>
              </div>
          </nav>


  </nav>
      <div class="row container d-flex">
        <div class="col-xl-6 col-md-12" style="height: 300px; margin-top: 25px;">
            <div class="card user-card-full flex-column "  style="height: 300px; width: 300px;">
                <div class="row m-l-0 m-r-0">
                    <div class="col-sm-12 bg-c-lite-green user-profile">
                        <div class="card-block text-center text-black">
                            <div class="m-b-25">
                                <?php image_display($db_handle,$_SESSION['IdClient']) ?></img>
                            </div>
                            <h6 class="f-w-600"style=" color: #000; "><?php echo $_SESSION['Nom']; ?></h6>
                            <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                        </div>
                    </div>
                    <div class="col-sm-12" style="padding-left: 30px;">
                        <div class="card-block">
                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="m-b-10 f-w-600">Email</p>
                                    <h6 class="text-muted f-w-400"> <?php echo $_SESSION['Client']; ?></h6>
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

       $('li').click(function() 
          {
               $(this).addClass('active').siblings().removeClass('active');
          });
  
    });

      function Supp()
      {
          var interest = $('ul#MesRDV').find('li.active').data('id');
          var type= $('ul#MesRDV').find('li.active').data('type');
           $.ajax({
                      url :"Traitement.php",           // Valeur va etre renvoyée a action.php
                      type:"POST",                 
                      cache:false,                          // jsp ce que c'est 
                      data:{interest:interest,type:type},   // la en gros bah quand on va essayer de recuperer la valeur dans action.php, faudra mettre ca 
                      success:function(data)
                      {
                            $("#finito").html(data);           // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                      }
                  });     
      }

      function Supprimer()
      {
          var Supprimer = $('ul#MesRDV').find('li.active').data('id');
          var type= $('ul#MesRDV').find('li.active').data('type');

           $.ajax({
                      url :"Traitement.php",           // Valeur va etre renvoyée a action.php
                      type:"POST",                 
                      cache:false,                          // jsp ce que c'est 
                      data:{Supprimer:Supprimer,type:type},   // la en gros bah quand on va essayer de recuperer la valeur dans action.php, faudra mettre ca 
                      success:function(data)
                      {
                            $("#finito2").html(data);           // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                                // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                      }
              });     
      }


</script>


<div class="col-xl-12" style="width: 500px; ">

<h1>Vos Rendez-vous</h1>
<h4> Vous pouvez annuler un rendez vous </h4>


  <div >
    <ul class="list-group" id="MesRDV" name="MesRDV">
    <?php 
    while ($row = $result->fetch_assoc()) { ?>

        <li class='list-group-item list-group-item-action' aria-current='true' data-type='Rendez-vous' data-id='<?php echo $row['rdvno'] ?>' value='<?php echo $row['rdv_horaire'] ?> '> <?php echo $row['rdv_horaire'];?> h  <?php echo $row['rdvno'];  ?> </li>
        
      <?php }; 


            if($_SESSION["Type"]=='medecin')
              {
                             $data4="medno";

                 } 
                      else if ($_SESSION["Type"]=="patient")
                     {
                             $data4="patno";
                     
                     }
                    else
                    {
                      $data4="adno";
             
                     }        
          $data2=$_SESSION['IdClient']; 
          $data3=$_SESSION['Type_Rdv'];
  
          $dbhost = "localhost";
          $dbuser = "root";
          $dbpass = "";
          $db = "BDD";
          $con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);
          $query = " SELECT DISTINCT * FROM laboRdv WHERE dispo='1' AND patno='$data2' ORDER BY rdv_date ASC,rdv_horaire ASC"; 
          $result = $con->query($query);
    
    while ($row = $result->fetch_assoc()) { ?>


 <li class='list-group-item list-group-item-action' aria-current='true' data-type='Labo' data-id='<?php echo $row['rdvNo'] ?>' value='<?php echo $row['rdv_horaire'] ?> '> <?php echo $row['rdv_horaire'];?> h  <?php echo $row['rdvNo'];  ?> </li> <?php } ?> 

    </ul>


  </div>

<div class="col-sm-12" style="margin-top: 25px ;" >
<button data-bs-toggle='modal' data-target='#fin' href='#fin' type="button" class="btn btn-danger" onclick="Supp();">Annuler RDV</button>
</div>
        
</div>
      

    <form action="" method="post" enctype="multipart/form-data">
     <div class="modal fade" id="fin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="finDocsLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="finDocsLabel">Informations Supplementaires</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                      <div class="list-group" id="finito"> 

                                      </div>
                                      </div>

                                      <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                       <a href="mesRDV.php" class="btn btn-danger" id="Suppression" name="Suppression"  onclick="Supprimer();">Annuler ce Rendez-Vous </a>
                                        </div>
                                    </div>
                       </div>
          </div> 

     <div class="modal fade" id="fin2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="finDocsLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="finDocsLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                      <div class="list-group" id="finito2"> 

                                      </div>
                                      </div>

                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                                      
                                        </div>
                                    </div>
                       </div>
          </div> 

</form>

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