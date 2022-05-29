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

    <form action="" method="post" enctype="multipart/form-data">


<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-6 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><?php image_display($db_handle,$id); ?>  <div> </div>
<span class="font-weight-bold"><?php echo $_SESSION['LoginClient'];?></span><span class="text-black-50"><?php echo $_SESSION['Client'];?></span><span> </span></div>

  <input name="userImage" type="file" class="imageFile"  accept="image/*"   id="userImage " onchange="ResizeImage()"/> 



  <?php 

     if($_SESSION['Type']=='patient') {

   ?>

/// Faire un if avec tout les champs pour medecin ou patient + + ajouter changement dans traitement 
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nom </label><input type="text" class="form-control"  name="Nom" placeholder="first name"value="<?php echo $_SESSION['Nom'];?>"></div>
                    <div class="col-md-6"><label class="labels">Login</label><input type="text" class="form-control" name="Login" value="<?php echo $_SESSION['LoginClient'];?>"></div> 
                </div>

                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mot de passe </label><input type="password" class="form-control"  name="password" id="password" value="<?php echo $_SESSION['MdpClient'];?>" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$"></div>

                    <div class="col-md-12"><label class="labels">Address Line 1</label><input  type="text"  name="Add1" class="form-control" placeholder="enter address line 1" value="<?php echo $_SESSION['Add1'];?>"></div>
                    <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text"  name="Add2" class="form-control" placeholder="enter address line 2" value="<?php echo $_SESSION['Add2'];?>"></div>
                    <div class="col-md-12"><label class="labels">Ville</label><input type="text" class="form-control"  name="Ville" placeholder="enter address line 2" value="<?php echo $_SESSION['Ville'];?>"></div>
                    <div class="col-md-12"><label class="labels">Pays</label><input type="text" class="form-control"  name="Pays" placeholder="enter address line 2" value="<?php echo $_SESSION['Pays'];?>"></div>
                    <div class="col-md-12"><label class="labels">CodePostal</label><input type="text" class="form-control"  name="CodePostal" placeholder="enter address line 2" value="<?php echo $_SESSION['CodePostal'];?>"></div>
                <div class="col-md-12"><label class="labels">Telephone</label><input type="text" class="form-control"  name="Telephone" placeholder="enter email id" value="<?php echo $_SESSION['Client'];?>" > </div>
                    <div class="col-md-12"><label class="labels">Carte Vitale </label><input type="text"  name="Vitale" class="form-control" placeholder="education" value="<?php echo       $_SESSION['Vitale'];?>"></div>
                </div>

                <div class="mt-5 text-center"> <input  class="btn btn-primary py-2 px-4 ms-3"  type="submit" value="Modifier" name="Upload" id ="Modifier" onchange="ResizeImage()"> </input> </div>
            </div>
        </div>
    </div>
</div>


  <?php 

     } else { ?>


         </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nom </label><input type="text" class="form-control" name="Nom"  placeholder="first name"value="<?php echo $_SESSION['Nom'];?>"></div>
                    <div class="col-md-6"><label class="labels">Login</label><input type="text" class="form-control" name="Login" value="<?php echo $_SESSION['LoginClient'];?>"></div> 
                </div>

                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mot de passe </label><input type="password" class="form-control"  name="password" id="password" value="<?php echo $_SESSION['MdpClient'];?>" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$"></div>

                    <div class="col-md-12"><label class="labels">Specialité</label><input type="text" name="Specialite" class="form-control" placeholder="Specialité" value="<?php echo $_SESSION['Job'];?>"></div>
                    <div class="col-md-12"><label class="labels">Hospital</label><input type="text" name="Hospital" class="form-control" placeholder="Hospital" value="<?php echo $_SESSION['Hospital'];?>"></div>
                <div class="col-md-12"><label class="labels">Telephone</label><input type="text"  name="Telephone" class="form-control" placeholder="Telephone" value="<?php echo $_SESSION['Tel'];?>" > </div>

                <div class="mt-5 text-center"> <input  class="btn btn-primary py-2 px-4 ms-3"  type="submit" value="Modifier" name="Upload" id ="Modifier" onchange="ResizeImage()"> </input> </div>
            </div>
        </div>
    </div>
</div>


   <?php 

      }


    ?>

    


    </form>

 </div>



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
