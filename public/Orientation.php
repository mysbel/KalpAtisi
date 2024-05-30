<?php

session_start();
require_once "connexion.php";
if(!isset($_SESSION['email']))
{
  header('Location: login.php');
  die;
}

if(isset($_GET['c']))
{
    $c=$_GET['c'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalp Atışi</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="/public/js/bootstrap.js">
    <link rel="stylesheet" href="/public/js/bundel.js">
    <link rel="stylesheet" href="css/style.css">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        h1 {
            text-align: center;
            color: #087990;
            font-weight: bold;
            font-size: 50px;
        }
a{
    text-decoration: none;
}
        .cards-list {
            z-index: 0;
            width: 90%;
            margin: 50px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            margin: 30px;
            width: 300px;
            height: 400px;
            border-radius: 40px;
            box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);
            cursor: pointer;
            transition: 0.4s;
            display: flex;
            flex-direction: column; 
            align-items: center; 
        }

        .card .card_image {
            width: 100%;
            height: 70%;
            border-radius: 40px 40px 0 0; 
            overflow: hidden; 
        }

        .card .card_image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card .card_content {
            padding: 20px;
            flex: 1; 
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #20247b;
            font-weight: bold;
            font-size: 30px;
        }

        .card:hover {
            transform: scale(0.9, 0.9);
            box-shadow: 5px 5px 30px 15px rgba(0,0,0,0.25), -5px -5px 30px 15px rgba(0,0,0,0.22);
        }

        @media all and (max-width: 500px) {
            .cards-list {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
     <!-- Navbar start -->
     <div class="container-fluid nav-bar">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg py-4">
                <a href="index.php" class="navbar-brand">
                    <h1 class="text fw-bold mb-0" style="color: #087990;";>Kalp<span class="text-dark">Atışi</span> </h1>
                </a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                </div>
            </nav>
                </div>
            </div>
            <!--Navbar end -->
            <br>
            <br>
    <h1>Orientation</h1>
    <div class="cards-list">
        <a href="Scanner.php?c=<?php echo $c; ?>" >
        <div class="card">
            <div class="card_image">
                <img src="/public/image/Services/Scanner.jpg" />
            </div>
            <div class="card_content" >
              <h2>Scanner</h2>
          </div>
            </div>
        </a>
            <a href="Radio.php?c=<?php echo $c; ?>">
        <div class="card">
            <div class="card_image">
                <img src="/public/image/Services/Radiologie Générale (1).jpg" />
            </div>
            <div class="card_content">
              <h2>Radiographie</h2>
          </div>
        </div>
    </a>
    <a href="irm.php?c=<?php echo $c; ?>">
        <div class="card">
            <div class="card_image">
                <img src="/public/image/Services/IRM.jpg" />
            </div>
            <div class="card_content">
              <h2>I.R.M</h2>
          </div>
            </div>
        </a>

        <a href="analyses.php?c=<?php echo $c; ?>">
        <div class="card">
            <div class="card_image">
                <img src="/public/image/Services/Annalyses.jpg" />
            </div>
            <div class="card_content">
              <h2>Analyses</h2>
          </div>
            
        </div>
    </a>


    <a href="écho.php?c=<?php echo $c; ?>">
        <div class="card">
            <div class="card_image">
                <img src="/public/image/Services/échographie.jpg" />
            </div>
            <div class="card_content">
              <h2>Echographie</h2>
          </div>
        </div>
    </a>
    </div>
<br><br>
      <!-- Footer Start -->
      <div class="container-fluid footer py-6 my-6 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s" >
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h1 class="text">Kalp<span class="text-dark">Atışi</span></h1>
                        <p class="lh-lg mb-4">Le service d'urgence de notre hôpital offre une assistance médicale immédiate et efficace, avec une équipe spécialisée et des soins de haute qualité centrés sur le patient.</p>
                        <div class="footer-icon d-flex">
                            <a class="btn btn-sm-square me-2 rounded-circle" style="background-color:#087990; color: white;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square me-2 rounded-circle" style="background-color:#087990; color: white;"ref="#"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-sm-square me-2 rounded-circle" style="background-color:#087990; color: white;"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-sm-square rounded-circle" style="background-color:#087990; color: white;"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="mb-4">Services</h4>
                        <div class="d-flex flex-column align-items-start">
                            <a class="text-body mb-3" href=""><i class="fa fa-check text me-2" style="color: #087990;"></i>Pneumologie</a>
                            <a class="text-body mb-3" href=""><i class="fa fa-check text me-2" style="color: #087990;"></i>Traumatologie</a>
                            <a class="text-body mb-3" href=""><i class="fa fa-check text me-2" style="color: #087990;"></i>ORL</a>
                            <a class="text-body mb-3" href=""><i class="fa fa-check text me-2" style="color: #087990;"></i>Ophtalmologie</a>
                            <a class="text-body mb-3" href=""><i class="fa fa-check text me-2" style="color: #087990;"></i>cardiologie</a>
                            <a class="text-body mb-3" href=""><i class="fa fa-check text me-2" style="color: #087990;"></i>Pédiatrie</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="mb-4">Contactez-Nous</h4>
                        <div class="d-flex flex-column align-items-start">
                            <p><i class="fa fa-map-marker-alt text me-2" style="color: #087990;"></i> Yeşilköy, 34149 Istanbul, Turquie.</p>
                            <p><i class="fa fa-phone-alt text me-2" style="color: #087990;"></i> (+90) 212 463 63 63 / <br>                                                               (+33) 1 579 79 849</p>
                            <p><i class="fas fa-envelope text me-2" style="color: #087990;"></i>Kalpatışi@gmail.com</p>
                            <p><i class="fa fa-clock text me-2" style="color: #087990;"></i> 24/7 Hours Service</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="mb-4" >Galerie Sociale</h4>
                        <div class="row g-2">
                            <div class="col-4">
                                 <img src="image/About us/pexels-anna-shvets-3845126.jpg" class="img-fluid rounded-circle " alt="">
                            </div>
                            <div class="col-4">
                              <img src="image/About us/pexels-amornthep-srina-1164531.jpg" class="img-fluid rounded-circle" alt="">
                         </div>
                            <div class="col-4">
                              <img src="image/About us/2.jpg" class="img-fluid rounded-circle" alt="">
                              </div>
                              <div class="col-4">
                                <img src="image/About us/istockphoto-942403276-612x612.jpg" class="img-fluid rounded-circle " alt="">
                              </div>
                              <div class="col-4">
                                <img src="image/About us/matériel.jpg" class="img-fluid rounded-circle" alt="">
                              </div>
                              <div class="col-4">
                                <img src="image/About us/female-doc-with-other-docs.jpg" class="img-fluid rounded-circle" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
</body>
</html>