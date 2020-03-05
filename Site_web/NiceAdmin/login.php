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

  <title>Administration</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>
<?php
if (isset($_GET['var'])) {
  if ($_GET['var']="deconnecter") {
    session_destroy();
  }
}


?>
<?php
if (isset($_POST['nom'])){ 
$donne=$_POST;
$nom=$donne['nom'];
$pass=$donne['pass'];
$connexion=mysqli_connect("localhost","root","");
$s="stage";
$connect_base=mysqli_select_db($connexion,$s); 

$m1="SELECT * FROM `compte` WHERE Nom_d_utilisateur='$nom' and mot_de_pass='$pass'  ";
$resultat1=mysqli_query($connexion,$m1);
 $ligne = mysqli_fetch_array ($resultat1);
$role=$ligne['role'];
if ($ligne['role']=="administrateur"||$ligne['role']=="secraitaire") {
 $_SESSION['admin'] =$role;
if ($role=="administrateur") {
 header('Location: index.php');
 $_SESSION['admin'] =$role;
}else{
header('Location: index.php');
}
}else{
   echo " <center><font color=\"#FF0000\"><h1>Mot de pass ou Nom d`utilisateur est incorrect!</h1></font></center> "; 
}
}
?>


<a name="deconnecter"></a>
<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" placeholder="Nom d`Utilisateur" name="nom" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="Mot de Pass" name="pass">
        </div>
        <label class="checkbox">
                <span class="pull-right"> <a href="#"> Mot de Pass Oublier?</a></span>
            </label>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Connecter</button>
      </div>
    </form>
    <div class="text-right">
    
    </div>
  </div>


</body>

</html>
