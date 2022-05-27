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

              <div class="tab-content" style="margin-left:320px;">
                <div class="tab-pane" id="tab-1" role="tabpanel">
                    <div class="row justify-content-md-center">
                   
                      <div class="col-md-6">
                      </br></br><h3>Modifier informations d'un client</h3></br></br>
                      		<input type="number" name="idClient" id="idClient" placeholder="ID du Client"/></br></br>
                              <input type="text" name="nomClient" id="nomClient" placeholder="Nom du Client"/></br></br>
                              <input type="text" name="loginClient" id="loginClient" placeholder="Login du Client"/></br></br>
                              <input type="text" name="passClient" id="passClient" placeholder="Mot de passe du Client"/></br></br>
                              <input type="email" name="mailClient" id="mailClient" placeholder="Mail du Client"/></br></br>
                              <input type="file" name="photoClient" id="photoClient" placeholder="Photo du Client"/></br></br>
                              <input type="number" name="carteClient" id="carteClient" placeholder="Carte credit du Client"/></br></br>
                              <input type="number" name="cvcClient" id="cvcClient" placeholder="CVC du Client"/></br></br>
                              <input type="text" name="villeClient" id="villeClient" placeholder="Ville du Client"/></br></br>
                              <input type="text" name="adresseClient" id="adresseClient" placeholder="Adresse du Client"/></br></br>
                              <input type="number" name="codepostalClient" id="codepostalClient" placeholder="Code postal du Client"/></br></br>
                              <input type="number" name="telephoneClient" id="telephoneClient" placeholder="Telephone du Client"/></br></br>

                              <button type="button" class="btn btn-info">Ajouter</button></br></br>
                            </div>
                        </br><h3> Supprimer un Client</h3>
                        <div class="form-group">
							<label for="idClient"><i class="zmdi zmdi-email"></i></label>
                      		<input type="number" name="idClient2" id="idClient2" placeholder="ID du Client"/>
                              <button type="button" class="btn btn-danger">Supprimer</button>
                            </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-2" role="tabpanel">
                    <div class="row justify-content-md-center">
                    <div class="col-md-12">
                    </br></br><h3>Modifier informations d'un docteur</h3></br></br>
                             <input type="number" name="idDocteur" id="idDocteur" placeholder="ID du Docteur"/></br></br>
                              <input type="text" name="nomDocteur" id="nomDocteur" placeholder="Nom du Docteur"/></br></br>
                              <input type="text" name="loginDocteur" id="loginDocteur" placeholder="Login du Docteur"/></br></br>
                              <input type="text" name="passDocteur" id="passDocteur" placeholder="Mot de passe du Docteur"/></br></br>
                              <input type="text" name="typeDocteur" id="typeDocteur" placeholder="Type de Docteur"/></br></br>
                              <input type="email" name="mailDocteur" id="mailDocteur" placeholder="Mail du Docteur"/></br></br>
                              <input type="file" name="photoDocteur" id="photoDocteur" placeholder="Photo du Docteur"/></br></br>
                              <input type="text" name="hopitalDocteur" id="hopitalDocteur" placeholder="Hopital du Docteur"/></br></br>

                              <button type="button" class="btn btn-info">Ajouter</button></br></br>

                        </br><h3> Supprimer un docteur</h3>
                        <div class="form-group">
							<label for="idClient"><i class="zmdi zmdi-email"></i></label>
                      		<input type="number" name="idDocteur2" id="idDocteur2" placeholder="ID du Docteur"/>
                              <button type="button" class="btn btn-danger">Supprimer</button>
                            </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-3" role="tabpanel">
                    <div class="row justify-content-md-center">
                    <div class="col-md-12">
                    </br></br><h3>Modifier informations d'un laboratoire</h3></br></br>
                              <input type="number" name="idLabo" id="idLabo" placeholder="ID du Laboratoire"/></br></br>
                              <input type="text" name="nomLabo" id="nomLabo" placeholder="Nom du Laboratoire"/></br></br>
                              <input type="email" name="mailLabo" id="mailLabo" placeholder="Mail du Laboratoire"/></br></br>
                              <input type="number" name="telephoneClient" id="telephoneClient" placeholder="Telephone du Laboratoire"/></br></br>
                              <input type="text" name="typeLabo" id="typeLabo" placeholder="Type de Laboratoire"/></br></br>

                              <button type="button" class="btn btn-info">Ajouter</button></br></br>

                        </br><h3> Supprimer un laboratoire</h3>


                        <div class="form-group">
							<label for="idClient2"><i class="zmdi zmdi-email"></i></label>
                      		<input type="number" name="idLabo2" id="idLabo2" placeholder="ID du Laboratoire"/>
                              <button type="button" class="btn btn-danger">Supprimer</button>
                            </div>
                    </div>
                  </div>

              </div>
    
    </body>
    
    </wrapper> 
    
    
</html>