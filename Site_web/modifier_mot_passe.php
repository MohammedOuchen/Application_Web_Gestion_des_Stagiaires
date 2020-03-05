<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Creer un compte</title>
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
  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
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
          <li><a href="index.php#about">À propos de nous</a></li>
          <li><a href="#portfolio">contact</a></li>
          <li class="menu-active"><a href="platform.php">Espace Stagiaire</a></li>
         <li><a href="login.php?etat=deconncter#login">deconnexion</a></li>
           <li role="presentation"><a href="NiceAdmin\login.php">Administration</a></li>
        </ul>
      </nav>
    </div>
  </header> 
<?PHP
if (!isset($_SESSION['username'])) {
   header('Location: index.php?#login');
}
?>

 <section >
<nav aria-label="breadcrumb">
  <div class="container">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Acceuil</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i>Modifier mot de passe</i></li>
  </ol>
</div>
</nav>
</section>



<div class="container">
 <center><h1><span class="badge badge-success"><i>modifier mot de passe</i></span></h1></center>
<form  action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">

    <div class="form-group">
    <label for="exampleInputEmail1">votre mot de passe:</label>
    <input type="text" class="form-control"   id="amp" placeholder="saisir votre mot de passe en cours" name="amp">
  </div>

    <div class="form-group">
    <label for="exampleInputEmail1">nouveau mot de passe  :</label>
    <input type="text" class="form-control" id="nmp" placeholder="saisir le nouveau mot de passe" name="nmp">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Confirmation du mot de passe  :</label>
    <input type="text" class="form-control" id="cnmp"  placeholder="resaisir votre mot de passe" name="cnmp">
  </div>
<pre><center><button type="submit" class="btn btn-success btn-lg" ><i>Envoyer</i></button></center></pre> 
</form>
</div>
<?php 
if (isset($_POST['amp'])){

$connexion=mysqli_connect("localhost","root","");
$s="stage";
$connect_base=mysqli_select_db($connexion,$s); 

//recuperer le nom d`utilisateur 

$nom_d_utilisateur=$_SESSION['username'];

$m1="SELECT * FROM `compte` WHERE Nom_d_utilisateur='$nom_d_utilisateur'";
$resultat1=mysqli_query($connexion,$m1);
$ligne = mysqli_fetch_array ($resultat1);
$pass=$ligne['mot_de_pass'];

$error=0;
$donne=$_POST;
$amp1=$donne['amp'];
$nmp1=$donne['nmp'];
$cnmp1=$donne['cnmp'];
if($pass!=$amp1)
{
  echo  "<center><font color=\"#FF0000\"><h1>mot de passe incorrecte !</h1></font></center>";
  $error=1 ;
}

if($nmp1!=$cnmp1)
{
echo  "<center><font color=\"#FF0000\"><h1>veuillez reconfirmer votre mot de passe !</h1></font></center>";
$error=1;
}

if($error!=1)
{
$req="UPDATE `compte` SET `mot_de_pass`='$nmp1' where mot_de_pass='$amp1'" ;
$resultat2=mysqli_query($connexion,$req); 

if ($resultat2==1) {
 header('Location: validation_confirmation.php?');
}
else {
   echo " <center><font color=\"#FF0000\"><h1>Error Reessayer!</h1></font></center>";
}
}
}
  ?>
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>OCP</strong>. All Rights Reserved
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




  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
