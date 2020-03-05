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
    
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
  
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
$role=$_SESSION['admin'];
//recuperer le nom d`utilisateur 
$m1="SELECT * FROM `compte` WHERE role='$role'";
$resultat1=mysqli_query($connexion,$m1);
 
$ligne = mysqli_fetch_array ($resultat1);

$nom_d_utilisateur=$ligne['Nom_d_utilisateur'];

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
