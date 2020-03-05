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

  <title>Demande de stage</title>

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
if (!isset($_SESSION['admin'])||!isset($_SESSION['variable'])) {
   header('Location: login.php?#deconncter');
}
if ($_SESSION['admin']=="administrateur") {
include("header.php");
}else{
  include("header_sec.php");
}
?>
<section id="main-content">
  <section class="wrapper">
    <!--main content start-->
   <?php
$connexion=mysqli_connect("localhost","root","");
$s="stage";
$connect_base=mysqli_select_db($connexion,$s); 
if (isset($_GET['cin'])) {
$_SESSION['variable']=$_GET['cin'];
}?>
<?php
if (isset($_POST['cin_enc'])) {
$cin=$_SESSION['variable'];
$ligne=$_POST;
$id_group=$ligne['id_group'];
$cin_enc=$ligne['cin_enc'];
$m1="UPDATE `stagiaire` SET `etat`='stagiaire',`id_group`='$id_group',`cin_encadrant`='$cin_enc' 
WHERE cin='$cin'";
$resultat1=mysqli_query($connexion,$m1);

$id_stage=$ligne['sujet'];
$debut=$ligne['debut'];
$fin=$ligne['fin'];
$m2="INSERT INTO `affectation`(`id_stage`, `cin`, `date_debut`, `date_fin`, `note`) VALUES ($id_stage,'$cin','$debut','$fin',0)";
$resultat2=mysqli_query($connexion,$m2);
if ($resultat1==1&&$resultat2==1) {
   header('Location: Enregistrer_absence.php');
}else
{
echo " <center><font color=\"#FF0000\"><h1>Error Reeseyer!</h1></font></center> ";

}
session_destroy();
}
?>


 <div class="row">
 <section class="panel">
              <header class="panel-heading">
                Les Demande de Stage
              </header>
              <div class="panel-body">
                <div class="alert alert-success fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                  <strong>Demande a ete accepter!</strong> Vous devez accorder un sujet , un encadrant et un groupe a ce stagiaire a fin de completer ce  demande.
                </div>
               

              </div>
            </section>
        </div>

  <div class="col-lg-4">
  </div>    
  <!-- container section start -->


        <div class="row">
          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
              Demande
              </header>
              <div class="panel-body">
                <form role="form" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id Group</label>
                    <input type="text" class="form-control"  placeholder="Enter Id de Group" name="id_group">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Numero De Sujet</label>
                    <input type="text" class="form-control"  placeholder="Entrer Le Nom de Group"  name="sujet">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Date de debut de Stage</label>
                    <input type="date" class="form-control"  placeholder="Entrer Le Nom de Group"  name="debut">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Date de fin de Stage</label>
                    <input type="date" class="form-control"  placeholder="Entrer Le Nom de Group"  name="fin">
                  </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">CIN de L`Encadrant</label>
                    <input type="text" class="form-control"  placeholder="Entrer Le Nom de Group"  name="cin_enc">
                  </div>
               
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button type="submit" class="btn btn-success">Envoyer</button>
                    </div>
                  </div>
            
                </form>

              </div>
            </section>
          </div>

      </section>
    </section>
  <!-- container section start -->

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
