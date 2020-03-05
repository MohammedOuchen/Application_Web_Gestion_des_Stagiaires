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

  <title>Chercher</title>

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


<section id="main-content">
  <section class="wrapper"> 
 <center><a class="btn btn-success btn-lg" href="checher.php?var=cin" title="Bootstrap 3 themes generator">Chercher par CIN</a>
  <a class="btn btn-primary btn-lg" href="checher.php?var=nom" title="Bootstrap 3 themes generator">Chercher par Nom</a></center>
</br>
</br>
  <div class="col-lg-4">
  </div>    
  <!-- container section start -->
  <?php

if (isset($_GET['error'])) {

if ($_GET['error']=="CIN") {
  echo " <center><font color=\"#FF0000\"><h1>CIN est incorrect !</h1></font></center> ";
}

if ($_GET['error']=="nom") {
  echo " <center><font color=\"#FF0000\"><h1>Nom ou Prenom  est incorrect !</h1></font></center> ";
}


}


if (isset($_GET['var'])) {
$var=$_GET['var'];
if ($var=="nom") {
  echo " <center>
  <div class=\"col-lg-4\">
            <section class=\"panel\">
              <header class=\"panel-heading\">
                Chercher
              </header>
              <div class=\"panel-body\">
                <form class=\"form-horizontal\"  action=\"afficher.php\" method=\"post\" role=\"form\">
                  <div class=\"form-group\">
                    <label for=\"inputEmail1\" class=\"col-lg-2 control-label\">Nom</label>
                    <div class=\"col-lg-10\">
                      <input type=\"text\" class=\"form-control\"  placeholder=\"Entrer Nom\" name=\"nom\">
                      <p class=\"help-block\"></p>
                    </div>
                  </div>
                  <div class=\"form-group\">
                    <label for=\"inputPassword1\" class=\"col-lg-2 control-label\">Prenom</label>
                    <div class=\"col-lg-10\">
                      <input type=\"text\" class=\"form-control\"  placeholder=\"Entrer Prenom\" name=\"prenom\">
                    </div>
                  </div>
                 
                  <div class=\"form-group\">
                    <div class=\"col-lg-offset-2 col-lg-10\">
                      <button type=\"submit\" class=\"btn btn-danger\">Chercher</button>
                    </div>
                  </div>
                </form>
              </div>
            </section>
</div>
</center>";
}else{
  echo " <center>
  <div class=\"col-lg-4\">
            <section class=\"panel\">
              <header class=\"panel-heading\">
                Chercher
              </header>
              <div class=\"panel-body\">
                <form class=\"form-horizontal\"   action=\"afficher.php\" method=\"post\" role=\"form\">
                  <div class=\"form-group\">
                    <label for=\"inputEmail1\" class=\"col-lg-2 control-label\">CIN</label>
                    <div class=\"col-lg-10\">
                      <input type=\"text\" class=\"form-control\"  placeholder=\"Entrer CIN\" name=\"cin\">
                      <p class=\"help-block\"></p>
                    </div>
                  </div>
               
                 
                  <div class=\"form-group\">
                    <div class=\"col-lg-offset-2 col-lg-10\">
                      <button type=\"submit\" class=\"btn btn-danger\">Chercher</button>
                    </div>
                  </div>
                </form>
              </div>
            </section>
</div>
</center>";
}




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
