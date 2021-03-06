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
            <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
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

                            <?php if($_SESSION['Clien']=="")
                            {

                              echo " <a href='login.php' class='dropdown-item'>Se connecter</a> " //// 


                            }  

                            ?>

                          </div>
                      </div>
                      <a href="contact.php" class="nav-item nav-link">Contact</a>
                  </div>
                  <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
                  <a href="rdv.php" class="btn btn-primary py-2 px-4 ms-3">Prendre un Rendez-vous</a> <!-- //// -->

                  <form class="d-flex" style= "padding-left: 190px;"role="search">
                    <input class="form-control me-2 " type="search" placeholder="Recherche" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                  </form>
              </div>
          </nav>
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="true" >
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>   
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="stockMed.jpg" style="width:400px;height:500px" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="stockMed2.jpg" style="width:400px;height: 500px;" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="eiffel.jpg" style="width:400px;height: 500px;" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>



              <section id="departments" class="departments" style="margin-top: 25px;">
                <div class="container">
          
                  <div class="section-title">
                    <h2>Departments</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                  </div>
          
                  <div class="row gy-4">
                    <div class="col-lg-3">
                      <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                          <a class="nav-link show active" data-bs-toggle="tab" href="#tab-1">Cardiology</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Neurology</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Hepatology</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Pediatrics</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Eye Care</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-lg-9">
                      <div class="tab-content">
                        <div class="tab-pane show active" id="tab-1">
                          <div class="row gy-4">
                            <div class="col-lg-8 details order-2 order-lg-1">
                              <h3>Cardiology</h3>
                              <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                              <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                              <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab-2">
                          <div class="row gy-4">
                            <div class="col-lg-8 details order-2 order-lg-1">
                              <h3>Et blanditiis nemo veritatis excepturi</h3>
                              <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                              <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                              <img src="assets/img/departments-2.jpg" alt="" class="img-fluid">
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab-3">
                          <div class="row gy-4">
                            <div class="col-lg-8 details order-2 order-lg-1">
                              <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                              <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                              <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                              <img src="assets/img/departments-3.jpg" alt="" class="img-fluid">
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab-4">
                          <div class="row gy-4">
                            <div class="col-lg-8 details order-2 order-lg-1">
                              <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                              <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                              <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                              <img src="assets/img/departments-4.jpg" alt="" class="img-fluid">
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab-5">
                          <div class="row gy-4">
                            <div class="col-lg-8 details order-2 order-lg-1">
                              <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                              <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                              <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                              <img src="assets/img/departments-5.jpg" alt="" class="img-fluid">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
          
                </div>
              </section>

              
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
    ?? 2022 Copyright:
    <a class="text-dark" href="index.php">OMNESSante.com</a>
  </div>
  <!-- Copyright -->
        </div>
</footer>
    </wrapper> 


</html>