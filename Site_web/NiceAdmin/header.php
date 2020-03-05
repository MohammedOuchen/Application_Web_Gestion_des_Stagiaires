
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.php" class="logo">OCP <span class="lite">Administration</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
       <!-- <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>-->
        <!--  search form end -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

  

        

          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username">Responsaple</span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="profil.php"><i class="icon_profile"></i>Mon Compte</a>
              </li>
            
             <li>
                <a href="login.php?var=deconncter#deconncter"><i class="icon_key_alt"></i>Deconnection</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Acceuil</span>
                      </a>
          </li>
           <li>
            <a class="" href="demande_stage.php">
                          <i class="icon_genius"></i>
                          <span>Demande De Stage</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Stagiaire</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="stagiare_en_cours.php">Stagiaire en cours</a></li>
              <li><a class="" href="stagiare_nouveaux.php">Stagiaire nouveaux </a></li>
              <li><a class="" href="stagiaire_en_archives.php">Stagiaire en archive </a></li>
            <li><a class="" href="checher.php">Chercher Stagiaire</a></li>
            <li><a class="" href="ajouter.php">Ajouter Stagiaire</a></li>
              <li><a class="" href="supprimer_stagiaire.php">Supprimer Stagiaire</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Absence</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="marque_absence.php">Marque L`absence</a></li>
              <li><a class="" href="liste_absence.php">Liste d`absence</a></li>
            </ul>
          </li>
           <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Groupe</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="liste_group.php">Liste des Groupes</a></li>
              <li><a class="" href="ajouter_group.php">Ajouter Groupe</a></li>
              <li><a class="" href="supprimer_group.php">Supprimer Groupe</a></li>
            </ul>
          </li>
            <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Stage</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="liste_stage.php">Liste des Stage</a></li>
              <li><a class="" href="ajouter_stage.php">Ajouter Stage</a></li>
              <li><a class="" href="supprimer_stage.php">Supprimer Stage</a></li>
            </ul>
          </li>
             <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Encadrant</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="liste_encadrant.php">Liste des Encadrants</a></li>
              <li><a class="" href="ajouter_encadrant.php">Ajouter Encadrant</a></li>
              <li><a class="" href="supprimer_encadrant.php">Supprimer Encadrant</a></li>
            </ul>
          </li>
       

        

        

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>