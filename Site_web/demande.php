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
          <li class="menu-active"><a href="index.php">Accueil</a></li>
          <li><a href="index.php#about">À propos de nous</a></li>
          <li><a href="#portfolio">contact</a></li>
          <li role="presentation"><a href="platform.php">Espace Stagiaire</a></li>
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
    <a class="nav-link activee" href="#">Demande de Stage</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="information.php">Mon Compte</a>
  </li>
</ul>
</div>
</div>



<div class="container">
<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" enctype="multipart/form-data" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">Téléphone</label>
      <input type="text" class="form-control" id="tele" placeholder="Téléphone" name="tel">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Adresse</label>
    <input type="text" class="form-control" id="address" placeholder="Adresse" name="add">
  </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Date de naissance</label>
      <input type="date" class="form-control" id="date" placeholder="date" name="date">
    </div>
   </div>
<div class="form-row">
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Niveau</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="niveau" id="gridRadios1" value="bac+1" checked>
          <label class="form-check-label" for="gridRadios1">
            Bac+1
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio"  name="niveau" id="gridRadios1" value="bac+2" >
          <label class="form-check-label" for="gridRadios2">
            Bac+2
          </label>
        </div>
           <div class="form-check">
          <input class="form-check-input" type="radio"  name="niveau" id="gridRadios1" value="bac+3" >
          <label class="form-check-label" for="gridRadios2">
            Bac+3
          </label>
        </div>
           <div class="form-check">
          <input class="form-check-input" type="radio"  name="niveau" id="gridRadios1" value="bac+4" >
          <label class="form-check-label" for="gridRadios2">
            Bac+4
          </label>
        </div>
           <div class="form-check">
          <input class="form-check-input" type="radio"  name="niveau" id="gridRadios1" value="bac+5" >
          <label class="form-check-label" for="gridRadios2">
            Bac+5
          </label>
        </div>
      </div>
    </div>
  </fieldset>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Filière (Formation)</label>
      <input type="text" class="fili" id="Filiere" name="filiere">
    </div>
  </div>
  
 <div class="form-row">
<div class="form-group">
    <label for="exampleFormControlFile1">Votre CV (Taille moins de 1MO ,Format : PDF,TXT, DOC )</label>
    <input  name="cv" type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
</div>
 <h1> <button type="submit" class="btn btn-success">Envoyer</button></h1>
</form>
</div>
















<?php
if (isset($_FILES['cv'])) {

$connexion=mysqli_connect("localhost","root","");
$s="stage";
$connect_base=mysqli_select_db($connexion,$s);
$nom_de_utilisateur=$_SESSION['username'];
$donne=$_POST;
$erreur =0;
$tel=$donne['tel'];
$add=$donne['add'];
$date=$donne['date'];
$niveau=$donne['niveau'];
$filiere=$donne['filiere'];

if ($_FILES['cv']['size'] >1048576) {
echo "<center><font color=\"#FF0000\"><h1>Le fichier est trop gros !</h1></font></center>";
$erreur =1; 
}
if ($_FILES['cv']['error'] > 0){  
$erreur =1;
echo "Erreur lors du transfert";
 }
 
if ($_FILES['cv']['type'] > 0){  
$erreur =1;
echo "Erreur lors du transfert";
 }
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png','pdf','txt');

$extension_upload = strtolower(  substr(  strrchr($_FILES['cv']['name'], '.')  ,1)  );
if ( !in_array($extension_upload,$extensions_valides) ) {
  echo "Extension incorrecte";
  $erreur =1;
}


if ($erreur==0){
 
$m3="UPDATE `stagiaire` SET `tel`='$tel',`date_de_naissnce`='$date',`adresse`='$add',`niveau`='$niveau',`filiere`='$filiere',`etat`='demandeur' WHERE id_compte='$nom_de_utilisateur' ";
$resultat3=mysqli_query($connexion,$m3);
$m3="SELECT * FROM `stagiaire` WHERE id_compte='$nom_de_utilisateur'";
$resultat3=mysqli_query($connexion,$m3);
$ligne4=mysqli_fetch_array($resultat3);

$enregistrer="cv".$ligne4['cin'].".".$extension_upload;
//====
$cin=$ligne4['cin'];
 $m3="INSERT INTO `stage`.`fichier` (`id_fichier`, `type`, `nom_fichier`, `cin`) VALUES (null,'cv','$enregistrer','$cin')";
$resultat3=mysqli_query($connexion,$m3);
$ftp_host="127.0.0.1";
$ftp_user="demo";
$ftp_pass="demo";
// on établit la connexion au serveur
$conn_id = ftp_connect($ftp_host)or die("could not connect");
// on se connecte en tant qu'utilisateur
$login_result = ftp_login($conn_id, $ftp_user, $ftp_pass);
// on active le mode passif 

if ($login_result) {
 echo "<center><font color=\"#FF0000\"><h1>Enregistrer!</h1></font></center>";
}else{
  echo "<center><font color=\"#FF0000\"><h1>Error</h1></font></center>";
}
$dis=$_FILES['cv']['tmp_name'];
ftp_put($conn_id,$enregistrer,$dis,FTP_ASCII);
//echo ftp_get($conn_id,"file.txt","recu.txt",FTP_ASCII);

ftp_close($conn_id);
}

}
?>




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
