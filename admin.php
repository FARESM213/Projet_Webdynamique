<?php

// Start the session
session_start();
require("traitement.php");
header( 'content-type: text/html; charset=utf-8' );


?>
<!doctype html>
<html lang="en">
    <wrapper>

      <style>
        body {
         
        }
        </style>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>OMNES Sante</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
            <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
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
            width: 300px;
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
            color: #bdb8d7 ;
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
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-1" aria-selected="true" role="tab">Informations Clients</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-2" aria-selected="false" tabindex="-1" role="tab">Informations Docteurs</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-3" aria-selected="false" tabindex="-1" role="tab">Informations Laboratoires</a>
                </li>
              </ul>
            </div>
        </div>
    </div>
         
    <div class="tab-content" style="margin-left:310px;">
        <div class="tab-pane" id="tab-1" role="tabpanel">
            <div class="row justify-content">      
                <div class="tableScroll" style="width:73%; height:600px; overflow-x: auto; white-space: nowrap;">    
                    <table class="table table-dark table-bordered table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Login</th>
                            <th scope="col">Mot de Passe</th>
                            <th scope="col">Email</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Pays</th>
                            <th scope="col">Code Postal</th>
                            <th scope="col">Telephone</th> 
                            <th scope="col">Carte vitale</th>
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
                    <div class="col-md-12">
                        <div class="tableScroll" style="width:100%; height:600px; overflow-x: auto;white-space: nowrap;">    
                            <table class="table table-dark table-bordered table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Login</th>
                                    <th scope="col">Mot de Passe</th>
                                    <th scope="col">Specialité</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Hopital</th>
                                    <th scope="col">Telephone</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php getTableContents2($db_handle);  ?>  
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-3" role="tabpanel">
                    <div class="row justify-content">
                        <div class="col-xl-12">
                            <div class="tableScroll" style="width:100%; height:600px; overflow-x: auto;white-space: nowrap;">    
                                <table class="table table-dark table-bordered table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Numero de Telephone</th>
                                        <th scope="col">Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php getTableContents3($db_handle);?>  
                                    </tbody>
                                    </table>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </wrapper>   
</html>