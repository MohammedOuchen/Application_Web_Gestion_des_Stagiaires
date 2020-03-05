<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Stage </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">



  <!-- Bootstrap CSS File -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">


  <!-- Main Stylesheet File -->
  <link href="css/style2.css" rel="stylesheet">
  <link href="fichier.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
 <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style3.css">
</head>


<body id="body">

  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
      <!--  <h1><a href="#body" class="scrollto">Reve<span>al</span></a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
          <a href="index.php"><img src="Ocp2.png" width="100" height="100"></a>
      </div>

            <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li ><a href="index.php">Accueil</a></li>
          <li><a href="#about">A propos de nous</a></li>
          <li><a href="#portfolio">contact</a></li>
          <li><a href="platform.php">Espace Stagiaire</a></li>
           <li role="presentation"><a href="NiceAdmin\login.php">Administration</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->


    </br>


<?php
if (isset($_GET['etat'])) {
  if ($_GET['etat']=='deconncter') {
session_destroy();
  }
  
}
?>
<?php
if (isset($_POST['username'])) {
  $connexion=mysqli_connect("localhost","root","");
$s="stage";
$connect_base=mysqli_select_db($connexion,$s); 

$donne=$_POST;
$nom=$donne['username'];
$mail=$donne['pass'];


$m1="SELECT role FROM `compte` WHERE Nom_d_utilisateur='$nom' and mot_de_pass='$mail'  ";
$resultat1=mysqli_query($connexion,$m1);
 
//header('Location: compte.html'); 
$ligne = mysqli_fetch_array ($resultat1);
$parametres = ['nom'=>$nom,
              ];
              
if($ligne['role']!=null)
{
$_SESSION['username'] =$nom;
$_SESSION['pass'] = $mail;
  header('Location: platform.php?');
}else
{
echo " <center><font color=\"#FF0000\"><h1>Nom d'Utilisateur ou Mot de pass est incorrect !</h1></font></center> ";

}
  

}
/*
  

*/
?>



        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="compte.php" class="signup-image-link"><button type="button" class="btn btn-success">Créer Un Compte</button></a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Connexion</h2>
                        <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="your_name" placeholder="Entrer Nom d`utilisateur"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Mot De Pass"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Se Connecter"/>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </section>
    </div>
  </br>
  </br>
    </br>
      </br>
  <footer id="footer">
    <div class="container">
      <div class="copyright">

        &copy; Copyright <strong>Reveal</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Reveal
       -->
      </div>
    </div>
  </footer><!-- #footer -->




  

 <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main1.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>


