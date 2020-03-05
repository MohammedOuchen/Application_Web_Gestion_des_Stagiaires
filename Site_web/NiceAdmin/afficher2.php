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

  <title>Stagiaire</title>

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
    <!--sidebar end-->

    <!--main content start-->



<?php
$connexion=mysqli_connect("localhost","root","");
$s="stage";
$connect_base=mysqli_select_db($connexion,$s); 

if (isset($_GET['var'])) {
  $cin=$_GET['var'];

}elseif (isset($_POST['cin'])) {
   $cin=$_POST['cin'];
   $m1="SELECT * FROM `stagiaire` WHERE cin='$cin'  ";
$resultat1=mysqli_query($connexion,$m1);
 
//header('Location: compte.html'); 
$ligne = mysqli_fetch_array ($resultat1);
              
if($ligne['cin']==null){
header('Location: checher.php?error=CIN'); 
}

}else{
  
$donne=$_POST;
$nom=$donne['nom'];
$prenom=$donne['prenom'];


$m1="SELECT * FROM `stagiaire` WHERE  nom='$nom' and prenom='$prenom'  ";
$resultat1=mysqli_query($connexion,$m1);
 
//header('Location: compte.html'); 
$ligne=mysqli_fetch_array ($resultat1);
              
if($ligne['cin']!=null){
$cin=$ligne['cin'];
}else{
  header('Location: checher.php?error=nom'); 
}
}

?>
<?php
 /*
$m1="SELECT * FROM `compte` WHERE nom_d_utilisateur='$nom_d_utilisateur'";
$resultat1=mysqli_query($connexion,$m1);
$ligne = mysqli_fetch_array ($resultat1);
*/
$m2="SELECT * FROM `stagiaire` WHERE cin='$cin'  ";
$resultat2=mysqli_query($connexion,$m2);
$ligne1= mysqli_fetch_array ($resultat2);

$nom=$ligne1['nom'];
$prenom=$ligne1['prenom'];
$tel=$ligne1['tel'];
$date=$ligne1['date_de_naissnce'];
$adresse=$ligne1['adresse'];
$niveau=$ligne1['niveau'];
$filiere=$ligne1['filiere'];
$mail=$ligne1['mail'];
$etat=$ligne1['etat'];
$group=$ligne1['id_group'];
?>


<section id="main-content">
  <section class="wrapper">
  	<?php
$_SESSION['cin_modifier']=$cin;
?>
  </tbody>
</table>

  <section class="panel">
              <header class="panel-heading">
              </header>
             
              <div class="panel-body">
                <div class="btn-group btn-group-justified">
                 <a class="btn btn-primary" href="fichier.php">les fichiers  Reçus</a>
                </div>
              </div>
            </section>
    <header class="panel-heading">
               Information
              </header>
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
      <td><?php echo $nom ?></td>
    </tr>
    <tr>
      <th scope="row">Prenom</th>
      <td><?php echo $prenom ?></td>
    <tr>
      <th scope="row">CIN</th>
      <td><?php echo $cin ?></td>
    </tr>
    <tr>
      <th scope="row">Telephone</th>
      <td><?php echo $tel ?></td>
    </tr>
    <tr>
      <th scope="row">Date de naissance</th>
      <td><?php echo $date ?></td>
    </tr>
    <tr>
      <th scope="row">Mail</th>
      <td><?php echo $mail ?></td>
    </tr>
<?php
if ($etat=="stagiaire") {
$m11="SELECT nom_encadrant,prenom_encadrant,Email
FROM  `stagiaire` , encadrant
WHERE stagiaire.cin_encadrant = encadrant.cin_encadrant
";
$resultat11=mysqli_query($connexion,$m11);
$ligne= mysqli_fetch_array ($resultat11);
$nom_enc=$ligne['nom_encadrant'];
$pre_enc=$ligne['prenom_encadrant'];
$mail_enc=$ligne['Email'];
$m12="SELECT * 
FROM  `stagiaire` , affectation, stage
WHERE stagiaire.cin = affectation.cin
AND affectation.id_stage = stage.id_stage";
$resultat12=mysqli_query($connexion,$m12);
$ligne= mysqli_fetch_array ($resultat12);
$date_debut=$ligne['date_debut'];
$date_fin=$ligne['date_fin'];
$sujet=$ligne['sujet'];
$desc=$ligne['description'];
echo " <tr>
      <th scope=\"row\">Groupe</th>
      <td>".$group."</td>
    </tr>
      <tr>
      <th scope=\"row\">Nom d`Encadrant</th>
      <td>".$nom_enc."</td>
    </tr>
    <tr>
      <th scope=\"row\">Prenom d`Encadrant</th>
      <td>".$pre_enc."</td>
    </tr>
<tr>
      <th scope=\"row\">Mail d`Encadrant</th>
      <td>".$mail_enc."</td>
    </tr>
    <tr>
      <th scope=\"row\">Sujet de Stage</th>
      <td>\".$sujet.\"</td>
    </tr>
    <tr>
      <th scope=\"row\">Date de debut de stage</th>
      <td>".$date_debut."</td>
    </tr>
     <tr>
      <th scope=\"row\">Date de fin de stage</th>
      <td>".$date_fin."</td>
    </tr>
     <tr>
      <th scope=\"row\">Description de stage</th>
      <td>".$desc."</td>
    </tr>";

}
?>

            </section>
    </section>
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
