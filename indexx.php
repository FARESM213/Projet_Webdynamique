<?php
session_start();


require("traitement.php");
header( 'content-type: text/html; charset=utf-8' );
include('db_config.php');

?>

<!DOCTYPE html>
<html>
 <head>
  <title>Recherche</title>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="JsLocalSearch.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <style> 
  .mark {
    background-color: #d7ffe7 !important
  }

  .mark .gsearch{
    font-size: 20px
  }

  .unmark {
    background-color: #e8e8e8 !important
  }

  .unmark .gsearch{
    font-size: 10px
  }
  
  .marktext
  {
   font-weight:bold;
   background-color: antiquewhite;
  }
  </style>
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
                                        echo "<a href='chat.php' class='nav-item nav-link'>Contact</a>" ;//// 
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
              
  <br />
  <br />
  <div class="container">   <br />

   <h3 align="center">Recherche d'un medecin par son nom</h3>
   <br />
   <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
     <input type="text" id="gsearchsimple" class="form-control input-lg" placeholder="Search..." />
     <ul class="list-group">

     </ul>
     <div id="localSearchSimple"></div>
     <div id="detail" style="margin-top:16px;"></div>
    </div>

    <div class="col-md-3"></div>


   </div>
  </div>


 </body>
</html>


<script>


$(document).ready(function(){
 $('#gsearchsimple').keyup(function(){
  var query = $('#gsearchsimple').val();
  $('#detail').html('');
  $('.list-group').css('display', 'block');
  if(query.length == 3)
  {
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{query:query},
    success:function(data)
    {
     $('.list-group').html(data);
    }
   })
  }
  if(query.length == 0)
  {
   $('.list-group').css('display', 'none');
  }
 });

 $('#localSearchSimple').jsLocalSearch({
  action:"Show",
  html_search:true,
  mark_text:"marktext"
 });

 $(document).on('click', '.gsearch', function(){
  var email = $(this).text();
  $('#gsearchsimple').val(email);
  $('.list-group').css('display', 'none');
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{email:email},
   success:function(data)
   {

    $('#detail').html(data);
   }
  })
 });
});
</script>
