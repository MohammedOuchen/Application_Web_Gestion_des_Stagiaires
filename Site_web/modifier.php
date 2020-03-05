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
          <li><a href="index.php#about">À propos de nous</a></li>
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
if (isset($_GET['var'])) {
  $_SESSION['var']=$_GET['var'];

}
$var=$_SESSION['var'];

 $connexion=mysqli_connect("localhost","root","");
$s="stage";
$connect_base=mysqli_select_db($connexion,$s); 
//recuperer le nom d`utilisateur 
$nom_d_utilisateur=$_SESSION['username'];
$m1="SELECT * FROM `compte` WHERE nom_d_utilisateur='$nom_d_utilisateur'";
$resultat1=mysqli_query($connexion,$m1);
 
$ligne= mysqli_fetch_array ($resultat1);

$nomm=$ligne['Nom_d_utilisateur'];

$m2="SELECT * FROM `stagiaire` WHERE id_compte='$nom_d_utilisateur'";
$resultat2=mysqli_query($connexion,$m2);
 
$ligne1= mysqli_fetch_array ($resultat2);
$mail=$ligne1['mail'];
$nom=$ligne1['nom'];
$prenom=$ligne1['prenom'];
$cin=$ligne1['cin'];


?>
<form  action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
<div class="container">
<table class="table">
      
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Stagiaire</th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="row">Nom </th>
      <td><?php if ($var=='nom') {
        echo "<input type=\"text\" class=\"form-control\"   id=\"nom\" placeholder=\"Enter Nom\" name=\"nom\"></td>";
      }else { 
   print($nom); }
    ?></td>
    </tr>
    <tr>
      <th scope="row">Prenom</th>
      <td><?php if ($var=='prenom') {
        echo "<input type=\"text\" class=\"form-control\"   id=\"prenom\" placeholder=\"Enter Prenom\" name=\"prenom\"></td>";
      }else { 
   echo $prenom; }
      ?> </td>
    </tr>
    <tr>
      <th scope="row">CIN</th>
      <td> <?php if ($var=='cin') {
        echo "<input type=\"text\" class=\"form-control\"   id=\"cin\" placeholder=\"Enter CIN\" name=\"cin\"></td>";
      }else { 
   echo $cin; }
      ?>
       </td>
    </tr>
    <tr>
      <th scope="row">Nom d`utilisateur</th>
      <td><?php if ($var=='nom_d_utilisateur') {
        echo "<input type=\"text\" class=\"form-control\"   id=\"nomm\" placeholder=\"Enter Nom d`utilisateur\" name=\"nomm\"></td>";
      }else { 
   echo $nomm; }
      ?>
     </td>
    </tr>
    <tr>
      <th scope="row">Mail</th>
      <td><?php if ($var=='mail') {
        echo "<input type=\"text\" class=\"form-control\"   id=\"email\" aria-describedby=\"emailHelp\" placeholder=\"Enter Nom email\" name=\"email\"></td>";
      }else{   echo $mail;}
      ?> 
       </td>
    </tr>
  </tbody>

</table>
<pre><div class="float-right"><button type="submit" class="btn btn-success btn-lg" ><i>Enregister</i></button></div></pre> 
</form>

<?php 

if (isset($_POST['nom'])||isset($_POST['prenom'])||isset($_POST['cin'])||isset($_POST['nomm'])||isset($_POST['email'])){

$connexion=mysqli_connect("localhost","root","");
$s="stage";
$connect_base=mysqli_select_db($connexion,$s);

$donne=$_POST;

if ($var=='mail'){ 
  $mail=$donne['email'];
$m="UPDATE `stagiaire` SET `mail`=null WHERE id_compte='$nom_d_utilisateur'";
$resultat=mysqli_query($connexion,$m);
$m3="SELECT * FROM `stagiaire` WHERE mail='$mail'";
$resultat3=mysqli_query($connexion,$m3);
$ligne4 = mysqli_fetch_array ($resultat3);
 if ($ligne4['mail']==$mail) {
   echo  "<center><font color=\"#FF0000\"><h1>Mail est déjà existé !</h1></font></center>";
 }else{ 
  
$m6="UPDATE `stagiaire` SET `mail`='$mail' WHERE id_compte='$nom_d_utilisateur'";
$resultat=mysqli_query($connexion,$m6);
  echo  "<center><font color=\"#FF0000\"><h1>Enregister !</h1></font></center>";

}
}


if ($var=='nom') {
  $nom=$donne['nom'];
$m6="UPDATE `stagiaire` SET `nom`='$nom' WHERE id_compte='$nom_d_utilisateur'";
$resultat=mysqli_query($connexion,$m6);
  echo  "<center><font color=\"#FF0000\"><h1>Enregister 1 !</h1></font></center>";

}

if ($var=='prenom') {
  $prenom=$donne['prenom'];

$m6="UPDATE `stagiaire` SET `prenom`='$prenom' WHERE id_compte='$nom_d_utilisateur'";
$resultat=mysqli_query($connexion,$m6);
  echo  "<center><font color=\"#FF0000\"><h1>Enregister !</h1></font></center>";

}

if ($var=='cin') {
  $cin=$donne['cin'];
$m6="UPDATE `stagiaire` SET `cin`='$cin'WHERE id_compte='$nom_d_utilisateur'";
$resultat=mysqli_query($connexion,$m6);
  echo  "<center><font color=\"#FF0000\"><h1>Enregister !</h1></font></center>";

}

if ($var=='nom_d_utilisateur') {
  $nom2=$donne['nomm'];
$m1="SELECT * FROM `compte` WHERE Nom_d_utilisateur='$nom_d_utilisateur'";
$resultat1=mysqli_query($connexion,$m1);
$ligne= mysqli_fetch_array ($resultat1);

$mail=$ligne['mail'];
$mot=$ligne['mot_de_pass'];

$m2="INSERT INTO `compte`(`Nom_d_utilisateur`, `mot_de_pass`, `role`) VALUES ('$nom2','$mot','stagiare')";
$resultat1=mysqli_query($connexion,$m2);


$m6="UPDATE `stagiaire` SET `id_compte`='$nom2' WHERE id_compte='$nom_d_utilisateur'";
$resultat=mysqli_query($connexion,$m6);
  echo  "<center><font color=\"#FF0000\"><h1>Enregister 1!</h1></font></center>";
  $m11="DELETE FROM `compte` WHERE Nom_d_utilisateur='$nom_d_utilisateur'";
$resultat1=mysqli_query($connexion,$m11);

$_SESSION['username']=$nom2;
}

}

?>

</div>
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


