<?php

// Start the session
session_start();
require("traitement.php");
header( 'content-type: text/html; charset=utf-8' );

$data=$_SESSION['Client'];
$data2=$_SESSION['Type'];
$id = $_SESSION["IdClient"];      



$sql="SELECT * FROM $data2 WHERE email='$data'";


?>

<!doctype html>
<html lang="en">


<script type="text/javascript">


    $(document).ready(function() {

    $('#userImage').change(function(evt) {

        var files = evt.target.files;
        var file = files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("preview").src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

});

function ResizeImage() {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        var filesToUploads = document.getElementById('userImage').files;
        var file = filesToUploads[0];
        if (file) {

            var reader = new FileReader();
            // Set the image once loaded into file reader
            reader.onload = function(e) {

                var img = document.createElement("img");
                img.src = e.target.result;

                var canvas = document.createElement("canvas");
                var ctx = canvas.getContext("2d");
                ctx.drawImage(img, 0, 0);

                var MAX_WIDTH = 200;
                var MAX_HEIGHT = 200;
                var width = img.width;
                var height = img.height;

                if (width > height) {
                    if (width > MAX_WIDTH) {
                        height *= MAX_WIDTH / width;
                        width = MAX_WIDTH;
                    }
                } else {
                    if (height > MAX_HEIGHT) {
                        width *= MAX_HEIGHT / height;
                        height = MAX_HEIGHT;
                    }
                }
                canvas.width = width;
                canvas.height = height;
                var ctx = canvas.getContext("2d");
                ctx.drawImage(img, 0, 0, width, height);

                dataurl = canvas.toDataURL(file.type);
                document.getElementById('output').src = dataurl;
            }
            reader.readAsDataURL(file);

        }

    } else {
        alert('The File APIs are not fully supported in this browser.');
    }
}
    
</script>
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

    <div class="page-content page-container" id="page-content" style="margin-top: 50px; margin-left: 250px;">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                        <div class="col-xl-6 col-md-12">
                                                    <div class="card user-card-full">
                                                        <div class="row m-l-0 m-r-0">
                                                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                                                <div class="card-block text-center text-white">
                                                                    <div class="m-b-25" id="Image">  

                                                                        <?php image_display($db_handle,$id); ?> <br> <br>
                                                                     
                                                                    </div>
                                                                    <h6 class="f-w-600">NOM Prenom</h6>
                                                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                                </div>
                                                            </div>


                                                            <div class="col-sm-8">
                                                                <div class="card-block">
                                                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <p class="m-b-10 f-w-600">Email</p>
                                                                            <h6 class="text-muted f-w-400"><?php echo $_SESSION['Client'];?></h6>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <p class="m-b-10 f-w-600">Telephone</p>
                                                                            <h6 class="text-muted f-w-400">06 00 00 00 00</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                        </div>
                                                                    </div>
                                                                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                                                            </ul>
                                                        </div>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
            </div>
        </div>



    <form action="" method="post" enctype="multipart/form-data">

        <label> Login : </label>
        <input type="text" name="Login"  value="<?php echo $_SESSION['LoginClient'];?>"> <br>
        <label> Mot de passe :</label>


  <input type="password" name="password" id="password" value="<?php echo $_SESSION['MdpClient'];?>" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$">

  <br> <br> <a  href="Supp.php" class="btn btn-primary py-2 px-4 ms-3">Modifier informations supplementaire</a>


        <!--
        <label> Adresse :</label>
        <input type="text" name="Login"><br>
        <label> Ville :</label>
        <input type="text" name="Login"><br>
        <label> Code Postal :</label>
        <input type="text" name="Login"><br>
        <label> Pays:</label>
        <input type="text" name="Login"><br> 
        <label> Numero telephone:</label>
        <input type="text" name="Login"><br> 
        <label> Carte Vitale:</label>
        <input type="text" name="Login"><br> -->


        
   
    <img src="" id="preview">


        <input name="userImage" type="file" class="imageFile"  accept="image/*"   id="userImage " onchange="ResizeImage()"/> 

        <input  class="btn btn-primary py-2 px-4 ms-3"  type="submit" value="Modifier" name="Upload" id ="Modifier" onchange="ResizeImage()"> </input>

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
      <a class="text-dark" href="index.php">OMNESSante.com</a>
    </div>
    <!-- Copyright -->
  </footer>
</html>