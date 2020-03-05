<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Accueil</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <!--sidebar end-->
 <?PHP
if (!isset($_SESSION['admin'])) {
   header('Location: login.php?#deconncter');
}
if ($_SESSION['admin']=="administrateur") {
include("header.php");
}else{
  include("header_sec.php");
}
?>
    <!--main content start-->
     <?php

$connexion=mysqli_connect("localhost","root","");
$s="stage";
$connect_base=mysqli_select_db($connexion,$s); 

$m1="SELECT COUNT( * ) AS stagiaire
FROM  `stagiaire`";
$resultat1=mysqli_query($connexion,$m1);
$ligne = mysqli_fetch_array ($resultat1);
$nb_stagiaire=$ligne['stagiaire'];
//=============
$m2="SELECT COUNT( * ) AS stagiaire
FROM  `stagiaire` where etat='demandeur'";
$resultat2=mysqli_query($connexion,$m2);
$ligne = mysqli_fetch_array ($resultat2);
$nb_demande=$ligne['stagiaire'];
//========
$m3="SELECT COUNT( * ) AS stage
FROM  `stage`";
$resultat3=mysqli_query($connexion,$m3);
$ligne = mysqli_fetch_array ($resultat3);
$nb_stage=$ligne['stage'];
//=======
$m1="SELECT COUNT( * ) AS enc
FROM  `encadrant`";
$resultat1=mysqli_query($connexion,$m1);
$ligne = mysqli_fetch_array ($resultat1);
$nb_enc=$ligne['enc'];

?>
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
<?php
if (isset($_GET['var'])) {
  $_SESSION['var']=$_GET['var'];

}
$var=$_SESSION['var'];

 $connexion=mysqli_connect("localhost","root","");
$s="stage";
$connect_base=mysqli_select_db($connexion,$s); 
//recuperer le nom d`utilisateur 
$role=$_SESSION['admin'];
//recuperer le nom d`utilisateur 
$m1="SELECT * FROM `compte` WHERE role='$role'";
$resultat1=mysqli_query($connexion,$m1);
 
$ligne = mysqli_fetch_array ($resultat1);

$nom_d_utilisateur=$ligne['Nom_d_utilisateur'];
$m1="SELECT * FROM `compte` WHERE Nom_d_utilisateur='$nom_d_utilisateur'";
$resultat1=mysqli_query($connexion,$m1);
 
$ligne= mysqli_fetch_array($resultat1);

$nomm=$ligne['Nom_d_utilisateur'];

$m2="SELECT * FROM `stagiaire` WHERE id_compte='$nom_d_utilisateur'";
$resultat2=mysqli_query($connexion,$m2);
 
$ligne1= mysqli_fetch_array($resultat2);
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
      <th scope="col"> <?php echo $role ?></th>
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

$m2="INSERT INTO `compte`(`Nom_d_utilisateur`, `mail`, `mot_de_pass`, `role`) VALUES ('$nom2','$mail','$mot','stagiare')";
$resultat1=mysqli_query($connexion,$m2);


$m6="UPDATE `stagiaire` SET `id_compte`='$nom2' WHERE id_compte='$nom_d_utilisateur'";
$resultat=mysqli_query($connexion,$m6);
  echo  "<center><font color=\"#FF0000\"><h1>Enregister 1!</h1></font></center>";
  $m11="DELETE FROM `compte` WHERE nom_d_utilisateur='$nom_d_utilisateur'";
$resultat1=mysqli_query($connexion,$m11);


}

}

?>
        <!--/.row-->

</section>
</section>
                <!-- project team & activity end -->

      
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
