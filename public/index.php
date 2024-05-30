<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalp Atışi</title>
    <link rel="stylesheet" href="/public/css/bootstrap.css">
    <link rel="stylesheet" href="/public/js/bootstrap.js">
    <link rel="stylesheet" href="/public/js/bundel.js">
    <link rel="stylesheet" href="/public/css/style.css">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
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
                    <div class="navbar-nav mx-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="aboutus.php" class="nav-item nav-link">À Propos</a>
                        <a href="Service.php" class="nav-item nav-link">Services</a>
                    </div>
                    <a href="login.php" class="btn py-2 px-4 d-none d-xl-inline-block rounded-pill" style="background-color:#087990a2; color:white;">Login</a>
                </div>
            </nav>
                </div>
            </div>
            <!--Navbar end -->
            
            <!-- Hero Start -->
            <header class="header">
                <div class="content">
                  <h1><span>Bienvenue</span><br/>Urgence Medicale</h1>
                  <p>
                    Le service d'urgence de notre hôpital est une unité spécialisée qui assure une prise en charge médicale rapide et efficace aux patients nécessitant des soins urgents. Disponible 24 heures sur 24, 7 jours sur 7, notre équipe multidisciplinaire de professionnels de la santé est dévouée à offrir des soins de qualité supérieure, en mettant l'accent sur la compassion et l'empathie.
                  </p>
                  <div class="boutton">
                  </div>
                  <br><br>
              <div class="buttons">

              <a class="medecin" href="AccesMedecin.php"><button class="neumorphic1">
                  <img src="/public/image/Doctor.png" width="50" height="50" style="display: flex;justify-content: center;margin: auto;">
                  <span>AccesMedecin</span>
                </button></a> 
               <a class="infirmier" href="AccesInf.php"><button class="neumorphic2">
                  <img src="/public/image/nurse.png" width="50" height="50"style="display: flex;justify-content: center;margin: auto;">
                  <span >AccesInf</span>
                </button></a> 
                <a class="admin" href="AccésAdmin.php"><button class="neumorphic3">
                  <img src="/public/image/administration.png" width="50" height="50" style="display: flex;justify-content: center;margin: auto;">
                  <span>AccésAdmin</span>
                </button></a>
                <a class="radiologue" href="Radiologue.php"><button class="neumorphic1">
                  <img src="/public/image/radiologue.png" width="50" height="50" style="display: flex;justify-content: center;margin: auto;">
                  <span>Radiologue</span>
                </button></a>
                <a class="laborantin" href="Laboratoire.php"><button class="neumorphic1">
                  <img src="/public/image/laboratoire.png" width="50" height="50" style="display: flex;justify-content: center;margin: auto;">
                  <span>Laboratoire</span>
                </button></a>
              </div>
                </div>
                

                <div class="image">
                  <span class="image__bg"></span>
                  <img src="image/acceuil (2).png" alt="image">
                  <div class="image__content__1">
                    <span><i class="ri-user-3-line"></i></span>
                    <div class="details">
                      <h4>1520+</h4>
                      <p>Active Patient</p>
                    </div>
                  </div>
                  <div class="image__content__2">
                    <ul>
                      <li>
                        <span><i class="ri-check-line" style="color: white;"> Get 20% off on every 1st month</i></span>
                      </li>
                      <li>
                        <span><i class="ri-check-line">Expert Doctors</i></span>
                </div>
                </div>
              </header>
              
       <!-- About Satrt -->
       <div class="container-fluid py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="section-title">
                    <h2>À Propos</h2>
                </div>
                <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                    <img src="image/aboutus.jpg" class="img-fluid rounded" alt="">
                </div>
            <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                <section class="about-us animated-section" style="text-align: center;">
                    <h2 style="color: #087990;"> Notre équipe </h2>
                    <p>Notre équipe est composée de professionnels de la santé hautement qualifiés, notamment des médecins d'urgence, des infirmiers spécialisés en soins d'urgence et du personnel de soutien. Nous travaillons ensemble pour garantir que chaque patient reçoive les meilleurs soins possibles.</p>
                </section>
            
                <section class="mission animated-section" style="text-align: center;">
                    <h2 style="color: #087990;"> Notre approche </h2>
                    <p>Notre approche en matière de soins d'urgence repose sur la rapidité, l'efficacité et la précision. Nous comprenons l'importance de diagnostiquer rapidement et avec précision les problèmes médicaux afin de fournir un traitement approprié dans les meilleurs délais.</p>
                </section>
            
                <section class="team animated-section" style="text-align: center;">
                    <h2 style="color: #087990;"> Notre engagement envers les patients </h2>
                    <p>Notre service d'urgence s'engage à fournir des soins médicaux de qualité supérieure à tous nos patients, en mettant l'accent sur la compassion, l'empathie et le respect. Nous nous efforçons de garantir que chaque patient reçoive l'attention urgente dont il a besoin dans un environnement sûr et accueillant.</p>
                    <!-- Add individual team member details here if needed -->
                </section>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!--Service start-->
    <div class="section-title">
        <h2>Nos Services</h2>
    </div>
<section class="articles">
<article>
  <div class="article-wrapper">
    <figure>
      <img src="image/Services/Pneumologie.jpg" alt="" />
    </figure>
    <div class="article-body">
      <h2>Pneumologie</h2>
      <p>
        La pneumologie est une spécialité médicale axée sur les maladies pulmonaires telles que l'insuffisance respiratoire, l'asthme, l'emphysème, la pneumonie, la tuberculose, les abcès pulmonaires, la pleurésie et les cancers du poumon ou de la plèvre.
      </p>
    </div>
  </div>
</article>
<article>
  <div class="article-wrapper">
    <figure>
      <img src="image/Services/Traumatologie.jpg" />
    </figure>
    <div class="article-body">
      <h2>Traumatologie</h2>
      <p>
        Ce service spécialisé dans la prise en charge de l'appareil locomoteur adulte traite les affections traumatiques (accidents de la route, du travail, blessures sportives) et dégénératives (maladies affectant le dos, les épaules, membres supérieurs, hanches, genoux, chevilles et pieds)
      </p>
    </div>
  </div>
</article>
<article>
  <div class="article-wrapper">
    <figure>
      <img src="image/Services/ORL.jpg" alt="" />
    </figure>
    <div class="article-body">
      <h2>ORL</h2>
      <p>
        L'oto-rhino-laryngologie (ORL) est une spécialité médicale qui traite des affections de la tête et du cou, comme les problèmes d'oreille, de nez et de gorge. Les médecins ORL, appelés oto-rhino-laryngologistes, diagnostiquent et traitent divers troubles, tels que les infections de l'oreille, les troubles de l'audition, les problèmes de sinus, les allergies et les cancers de la tête et du cou.
      </p>
    </div>
  </div>
</article>
<article>
  <div class="article-wrapper">
    <figure>
      <img src="image/Services/ophtalmologie.jpg" alt="" />
    </figure>
    <div class="article-body">
      <h2>Ophtalmologie</h2>
      <p>
        L'ophtalmologie est une spécialité médicale et chirurgicale qui s'occupe de l'anatomie, de la physiologie et des affections de l'œil. Elle traite des problèmes de vision courants tels que la prescription de lunettes ou de lentilles, ainsi que des pathologies plus graves comme la cataracte, la dégénérescence maculaire, la rétinopathie diabétique et le glaucome.
      </p>
    </div>
  </div>
</article>
<article>
  <div class="article-wrapper">
    <figure>
      <img src="image/Services/Cardiologue.jpg"" />
    </figure>
    <div class="article-body">
      <h2>cardiologie</h2>
      <p>
        La cardiologie est la spécialité de la médecine qui étudie le cœur et les vaisseaux. La cardiologie porte sur la prévention, le diagnostic, la prise en charge et la réadaptation de patients présentant des maladies du système cardiovasculaire et qui expert en diagnostic et en prise en charge de tous les aspects des maladies cardiovasculaires.
      </p>
    </div>
  </div>
</article>
<article>
  <div class="article-wrapper">
    <figure>
      <img src="image/Services/Pédiatrie.jpg" alt="" />
    </figure>
    <div class="article-body">
      <h2>Pédiatrie</h2>
      <p>
        La pédiatrie est une spécialité médicale qui se concentre sur la santé et le bien-être des enfants, depuis la vie intra-utérine (en collaboration avec l'obstétrique) jusqu'à la fin de l'adolescence. Les pédiatres sont formés pour diagnostiquer, traiter et prévenir les maladies et les problèmes de santé spécifiques aux enfants, ainsi que pour surveiller leur croissance et leur développement.
      </p>
    </div>
  </div>
</article>
<article>
</section>
<!--Service end-->
<br><br><br><br><br><br><br>
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