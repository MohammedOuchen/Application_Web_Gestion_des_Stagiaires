<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ocp stage </title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" />
  <!-- =======================================================


<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>


  <header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
            <div class="navbar-brand">
             <a href="index.php"><img src="images/Ocp2.png" width="100" height="100"></a>
             <!-- <img src="Ocp.jpg">-->
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="index.php" class="active">Acceuil</a></li>
                <li role="presentation"><a href="index.php#about">À propos de nous</a></li>
                <li role="presentation"><a href="contact.php">Contact</a></li>
                <li role="presentation"><a href="platform.php">Espace Stagiaire</a></li>
                 <li role="presentation"><?php if (isset($_SESSION['username'])) {
                   echo "<a href=\"login.php?etat=deconncter#login\">Deconnexion</a>";
                 }else{ echo "<a href=\"login.php\">Connexion</a>";}  ?></a></li>
                   <li role="presentation"><a href="NiceAdmin\login.php">Administration</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <section id="main-slider" class="no-margin">
    <div class="carousel slide">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url(images/slider/bg1.png)">
          <div class="container">
            <div class="row slide-margin">
              <div class="col-sm-6">
                <div class="carousel-content">
                  <h2 class="animation animated-item-1">Bienvenue <span>OCP</span></h2>
                 <p class="animation animated-item-2">Vous voulez effectuer un stage dans notre société ? </br>
                  voici la démarche que vous devez suivre...</p>
                  <a class="btn-slide animation animated-item-3" href="test.html">afficher la suite</a>
                </div>
              </div>

              <div class="col-sm-6 hidden-xs animation animated-item-4">
                <div class="slider-img">
            
                </div>
              </div>

            </div>
          </div>
        </div>
        <!--/.item-->
      </div>
      <!--/.carousel-inner-->
    </div>
    <!--/.carousel-->
  </section>
  <!--/#main-slider-->
<!-- pour la login -->

  

  <!---la fin login -->
  <div class="feature">
    <div class="container">
      <div class="text-center">
        <div class="col-md-6">
          <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <i class="fa fa-book"></i>
         <a href="compte.php"><h2>Creer un Compte </h2></a>
            <p>A fin d`envoye un demande de stage il faut creer un compte .</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <i class="fa fa-laptop"></i>
            <a href="platform.php"><h2>Plus D`information</h2></a>
            <p>Si vous voulez plus des information sur notre societe.</p>
          </div>
        </div>
   <!--     <div class="col-md-3">
          <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
            <i class="fa fa-heart-o"></i>
            <h2>Full Responsive</h2>
            <p>Quisque eu ante at tortor imperdiet gravida nec sed turpis phasellus.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
            <i class="fa fa-cloud"></i>
            <h2>Friendly Code</h2>
            <p>Quisque eu ante at tortor imperdiet gravida nec sed turpis phasellus.</p>
          </div>
        </div>
     --> </div>
    </div>
  </div>
<a name="about"></a>

  <div class="about">
    <div class="container">
      <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <h2>à propos de nous</h2>
        <img src="images/6.jpg" class="img-responsive" />
        <p>Le groupe OCP commença son activité d’extraction et de traitement d’expédition du phosphate le 1er mars 1921, avec l’ouverture de la première mine à Boujniba, dans le gisement de Khouribga, le gisement de phosphate le plus riche du monde12. L’acheminement du phosphate jusqu’au port de Casablanca débute la même année, ce qui permet la première exportation de phosphate le 27 juillet 192113. Par la suite, OCP va exploiter trois autres sites miniers à savoir Benguérir, Boucraâ-Laâyoune et Youssoufia14.
        </p>
      </div>

      <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <h2>qui sommes-nous</h2>
        <p>Le groupe OCP (anciennement Office chérifien des phosphates), fondé le 7 août 1920 au Maroc1,2 et transformé en 2008 en une société anonyme (OCP SA), est l'un des principaux exportateurs de phosphate brut, d’acide phosphorique et d’engrais phosphatés dans le monde.</p>
<p>
Le groupe OCP compte près de 20 000 collaborateurs implantés principalement au Maroc"  sur quatre sites miniers et deux complexes chimiques10, ainsi que sur d'autres sites internationaux. Le groupe détient plusieurs filiales à l'intérieur et à l'extérieur du Maroc. En 2018, son chiffre d'affaires s'élevait à 55,9 milliards de dirhams marocains11.
      </p>
      </div>
    </div>
  </div>
  <section id="partner">
    <div class="container">
      <div class="center wow fadeInDown">
        <h2>Our Partners</h2>
        <p>Convaincu que le développement du Groupe OCP passe par celui de ses écosystèmes industriels et que la performance du Groupe est intimement corrélée à leurs performances, OCP s’engage, de façon proactive, dans le développement du tissu industriel autour du Groupe, grâce à des outils de développement, des formations internes et la création de liens forts et durables avec ses partenaires.</p>
      </div>

      <div class="partners">
        <ul>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/partners/partner1.png"></a></li>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="images/partners/partner2.png"></a></li>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="images/partners/partner3.png"></a></li>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="images/partners/partner4.png"></a></li>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="images/partners/partner5.png"></a></li>
        </ul>
      </div>
    </div>
    <!--/.container-->
  </section>
  <!--/#partner-->

  <section id="conatcat-info">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="pull-left">
              <i class="fa fa-phone"></i>
            </div>
            <div class="media-body">
              <h2>Si vous avez des Quetions ?</h2>
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/.container-->
  </section>
  <!--/#conatcat-info-->

  <footer>
    <div class="footer">
      <div class="container">
        <div class="social-icon">
          <div class="col-md-4">
            <ul class="social-network">
              <li><a href="https://web.facebook.com/OCPGroupMA/" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="http://www.twitter.com/ocpgroup" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
             
              <li><a href="http://www.youtube.com/ocpchannel" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
            </ul>
          </div>
        </div>

        <div class="col-md-4 col-md-offset-4">
          <div class="copyright">
           OCP. All Rights Reserved.
            <div class="credits">
         
                     </div>
        </div>
      </div>

      <div class="pull-right">
        <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
      </div>
    </div>
  </footer>



  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-2.1.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/functions.js"></script>

</body>

</html>
