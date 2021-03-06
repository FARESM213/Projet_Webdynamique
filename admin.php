<?php

// Start the session
session_start();
require("traitement.php");
header( 'content-type: text/html; charset=utf-8' );

?>
<!doctype html>
<html lang="en">
    <wrapper>


        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>OMNES Sante</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
            <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
            <link rel="stylesheet" href="AdminTableStyle.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        </head>
        
        <body>          

        <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            font-family: arial;
        }
        body{
            background: #7d9d9e;
        }
        .wrapper{
            position: relative;
        }
        .sidebar{
            position: fixed;
            width: 275px;
            height: 100%;
            background: #a2b9ba;
            padding: 20px 0;
        }
        .text-muted{
            color: #000!important;
            font-size: 1.3em;
        }
        ul{
            padding-bottom: 20px; 
        }
        ul li a img{
            background: #7d9d9e;
            top: 0;
            border: none;
            width: 20px;
        }
        .sidebar ul li{
            padding: 15px;  
        }
        .sidebar ul li a{
            color: #000;
            display: block;
        }
        .sidebar ul li a .fas{
            width: 30px;
            color: #bdb8d7;
        }
        .liste
       {
            color: #000 ;
            text-decoration:none;
        } 
        .sidebar ul li a .far{
            width: 30px;
            color: black ;
        }
        .sidebar ul li:hover{
            background: #7d9d9e;
        }
        .sidebar ul li a:hover{
            text-decoration: none;
        }
            </style>


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
                                         echo " <a href='Deconnexion.php'class='dropdown-item'>Se deconnecter </a> " ;//// 
                                      }
                              ?>
                          </div>

                      </div>
                  </div>
              </div>
          </nav>
              
       
    <div class="wrapper d-flex">
        <div class="sidebar">
        <div class="row" >
            <div class="col-lg-3">
                <ul class="nav nav-tabs flex-column" role="tablist">
                    <li class="nav-item" role="presentation" style="width:300px;">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-1" aria-selected="true" role="tab" style="color:#070524; font-size:20px;font-weight: 900;">Informations Clients</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-2" aria-selected="false" tabindex="-1" role="tab" style="color:#070524; font-size:20px;font-weight: 900;">Informations Docteurs</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-3" aria-selected="false" tabindex="-1" role="tab" style="color:#070524; font-size:20px;font-weight: 900;">Informations Laboratoires</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-4" aria-selected="false" tabindex="-1" role="tab" style="color:#070524; font-size:20px;font-weight: 900;">Informations Rendez-vous</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


        <div class="tab-content" style="margin-left:320px; overflow-x: auto; white-space: nowrap;width:1555px; height: 810px;">
        <div class="tab-pane" id="tab-1" role="tabpanel">
            <div class="row justify-content">
                <div class="table_header" style="margin-bottom:5px;">
                    <form method='POST' action='' >
                        <div>  <button  name="plusPat" id="plusPat" class="add_new BTN-bleu" style="margin-left:50px; ">+ Add New</button>   </div>
                    </form>

                </div><br>      
                <div class="tableScroll">    
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>

                                <th scope="col" class="table-light" style="width : 150px; color: black;">Commands</th>
                                <th scope="col" class="table-light" style="width : 200px; color: black;">#</th>
                                <th scope="col" class="table-light" style="width : 200px; color: black;">Nom</th>
                                <th scope="col" class="table-light" style="width : 200px; color: black;">Login</th>
                                <th scope="col" class="table-light" style="width : 200px; color: black;">Mot de Passe</th>
                                <th scope="col" class="table-light" style="width : 200px; color: black;">Email</th>
                                <th scope="col" class="table-light" style="width : 200px; color: black;">Adresse</th>
                                <th scope="col" class="table-light" style="width : 200px; color: black;">Ville</th>
                                <th scope="col" class="table-light" style="width : 200px; color: black;">Pays</th>
                                <th scope="col" class="table-light" style="width : 200px; color: black;">Code Postal</th>
                                <th scope="col" class="table-light" style="width : 200px; color: black;">Telephone</th> 
                                <th scope="col" class="table-light" style="width : 200px; color: black;">Carte vitale</th>

                            </tr>
                        </thead>
                            <tbody>
                                <?php getTableContents($db_handle);  ?>   
                            </tbody>         
                        </table>
                    
                     </div>
                  </div>
                </div>

            <div class="tab-pane" id="tab-2" role="tabpanel">
                <div class="row justify-content">
                    <div class="table_header" style="margin-bottom:5px;">
                        
                        <form method='POST' action='' >
                            <div>  <button name="plusMed" id="plusMed" class="add_new BTN-bleu" style="margin-left:50px; ">+ Add New</button> </div> 
                         </form>

                    </div><br> 
                        <div class="tableScroll">       
                            <table class="table table-secondary table-bordered table-hover" >
                                <thead>
                                      <tr>
                                        <th scope="col" class="table-light" style="width : 150px; color: black;">Commands</th>
                                        <th scope="col" class="table-light" style="width : 200px; color: black;">#</th>
                                        <th scope="col" class="table-light" style="width : 200px; color: black;">Nom</th>
                                        <th scope="col" class="table-light" style="width : 200px; color: black;">Login</th>
                                        <th scope="col" class="table-light" style="width : 200px; color: black;">Mot de Passe</th>
                                        <th scope="col" class="table-light" style="width : 200px; color: black;">Specialite</th>
                                        <th scope="col" class="table-light" style="width : 200px; color: black;">Mail</th>
                                        <th scope="col" class="table-light" style="width : 200px; color: black;">Hospital</th>
                                        <th scope="col" class="table-light" style="width : 200px; color: black;">Telephone</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <?php getTableContents2($db_handle);  ?>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                    <div class="tab-pane" id="tab-3" role="tabpanel">
                        <div class="row justify-content">
                            <div class="table_header" style="margin-bottom:5px;">

                                <form method='POST' action='' >
                                    <div>  <button name="plusLab" id = "plusLab" class="add_new BTN-bleu" style="margin-left:50px; ">+ Add New</button>  </div> 
                                </form>

                            </div><br> 
                            <div class="tableScroll">       
                                <table class="table  table-dark table-bordered table-hover">
                                    <thead>
                                        <tr>

                                        <th scope="col" style="width : 150px;color: white;">Commands</th>
                                        <th scope="col" style="width : 200px;color: white;">#</th>
                                        <th scope="col" style="width : 200px;color: white;">Nom</th>
                                        <th scope="col" style="width : 200px;color: white;">Email</th>
                                        <th scope="col" style="width : 200px;color: white;">Numero de Telephone</th>
                                        <th scope="col" style="width : 200px;color: white;">Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php getTableContents3($db_handle);?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-4" role="tabpanel">
                        <div class="row justify-content">
                            <div class="table_header" style="margin-bottom:5px;">
                            <form method='POST' action='' >
                                    <div>  <button name="plusRdv" class="add_new BTN-bleu" style="margin-left:50px; ">+ Add New</button>  </div> 
                                </form>
                            </div><br> 
                                <div class="tableScroll">       
                                    <table class="table  table-dark table-bordered table-hover">
                                        <thead>
                                            <tr>

                                                <th scope="col" style="width : 150px;color: white;">Commands</th>
                                                <th scope="col" style="width : 200px;color: white;">#</th>
                                                <th scope="col" style="width : 200px;color: white;">Medecin</th>
                                                <th scope="col" style="width : 200px;color: white;">Patient</th>
                                                <th scope="col" style="width : 200px;color: white;">Date</th>
                                                <th scope="col" style="width : 200px;color: white;">Motif</th>
                                                <th scope="col" style="width : 200px;color: white;">Dure</th>
                                                <th scope="col" style="width : 200px;color: white;">Heure</th>
                                                <th scope="col" style="width : 200px;color: white;">Lieu</th>
                                                <th scope="col" style="width : 200px;color: white;">Disponibilit??</th>
                                                <th scope="col" style="width : 200px;color: white;">Type de rdv</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php getTableContents4($db_handle);?>  
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </body>
            </wrapper>   


        <script type="text/javascript">


            function change (id) 
            { 
                var Modifier=id

                //alert("Informations modif??es");

          }
      </script> 
        <script > function change2 () {}</script> 
</html>