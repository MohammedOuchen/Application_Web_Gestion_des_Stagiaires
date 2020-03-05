<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Demande de stage </title>
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
          <li class="menu-active"><a href="platform.php">Espace Stagiaire</a></li>
         <li><a href="login.php?etat=deconncter#login">Deconnexion</a></li>
           <li role="presentation"><a href="NiceAdmin\login.php">Administration</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
<?PHP
if (!isset($_SESSION['username'])) {
   header('Location: index.php?');
}
?>


 <section >
<nav aria-label="breadcrumb">
  <div class="container">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php"><i>Acuielle</i></a></li>
    <li class="breadcrumb-item active" aria-current="page"><i>demande de stage</i></li>
  </ol>
</div>
</nav>
</section>
<div class="shadow p-3 mb-5 bg-white rounded">
  <div class="container">
<ul class="nav nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link" href="platform.php">Demande de Stage</a>
  </li>
  <li class="nav-item">
    <a class="nav-link activee" href="information.php">Mon Compte</a>
  </li>
</ul>
</div>
</div>

<?php
 $connexion=mysqli_connect("localhost","root","");
$s="stage";
$connect_base=mysqli_select_db($connexion,$s); 
//recuperer le nom d`utilisateur 
$nom_d_utilisateur=$_SESSION['username'];
$m1="SELECT * FROM `compte` WHERE nom_d_utilisateur='$nom_d_utilisateur'";
$resultat1=mysqli_query($connexion,$m1);
 
$ligne = mysqli_fetch_array ($resultat1);

$m2="SELECT * FROM `stagiaire` WHERE id_compte='$nom_d_utilisateur'";
$resultat2=mysqli_query($connexion,$m2);
 
$ligne1= mysqli_fetch_array ($resultat2);

$nom=$ligne1['nom'];
$prenom=$ligne1['prenom'];
$cin=$ligne1['cin'];
$pass=$ligne['mot_de_pass'];
$nomm=$ligne['Nom_d_utilisateur'];
$mail=$ligne1['mail'];

?>


<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Stagiaire</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="row">Nom </th>
      <td><?php echo $nom ?></td>
        <th><div class="float-right"><button type="button" class="btn btn-outline-success"><a href="modifier.php?var=nom">Modifier</a></button></div></th>
    </tr>
    <tr>
      <th scope="row">Prenom</th>
      <td><?php echo $prenom ?></td>
       <th><div class="float-right"><button type="button" class="btn btn-outline-success"><a href="modifier.php?var=prenom">Modifier</a></button></div></th>
    <tr>
      <th scope="row">CIN</th>
      <td><?php echo $cin ?></td>
       <th><div class="float-right"><button type="button" class="btn btn-outline-success"><a href="modifier.php?var=cin">Modifier</a></button></div></th>
    </tr>
    <tr>
      <th scope="row">Nom d`utilisateur</th>
      <td><?php echo $nomm ?></td>
       <th><div class="float-right"><button type="button" class="btn btn-outline-success"><a href="modifier.php?var=nom_d_utilisateur">Modifier</a></button></div></th>
    </tr>
    <tr>
      <th scope="row">Mail</th>
      <td><?php echo $mail ?></td>
     <th><div class="float-right"><button type="button" class="btn btn-outline-success"><a href="modifier.php?var=mail">Modifier</a></button></div></th>
    </tr>
     <tr>
      <th scope="row"></th>
      <td></td>
       <th><div class="float-right"><button type="button" class="btn btn-outline-success"><a href="modifier_mot_passe.php?var=cin">Modifier mot de passe</a></button></div></th>
    </tr>
  </tbody>
</table>



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




  



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>


