<header>
  <div class="container-fluid">
    <div class="row" id="block_header">

      <div class="col-md-2">
        <h1>MonForums</h1>
      </div>

      <?php
      if(isset($_SESSION['pseudo']))
      {
        $avatar = infos_profil($cnx,$_SESSION['id_pseudo']);
        echo
        '
        <div id="login_connecter" class="dropdown">
        '.($avatar['avatar_profil'] != null?'<img src="../../vue/forums/img/avatar/'.$avatar['avatar_profil'].'"/> ':'').'<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$_SESSION['pseudo'].'
        <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
        <li><a href="index.php?menu=mon_profil">Mon profil</a></li>
        <li><a href="index.php?menu=mes_discussions">Mes discussions</a></li>
        <li><a href="index.php?menu=deconnexion">Déconnexion</a></li>
        </ul>
        </div>
        ';
      }
      else
      {
        ?>
        <div class="col-md-2 col-md-offset-10" id="nav_connexion_inscription">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php?menu=inscription" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="index.php?menu=connexion"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
        <?php
      }
      ?>
    </div>

    <div class="row">
      <nav class="navbar navbar-inverse">
        <div class="col-md-4 col-md-offset-4" id="navbar_header">
          <ul class="nav navbar-nav">
            <li>
              <div id="anim1" class="etiquette_nav_anim_before">
                <a id="a1" href="index.php?menu=accueil">Accueil</a>
                <span id="fleche1" aria-hidden="true"></span>
              </div>
            </li>
            <li>
              <div id="anim2" class="etiquette_nav_anim_before">
                <a id="a2" href="index.php?menu=forums&categorie=1">Forums</a>
                <span id="fleche2" aria-hidden="true"></span>
              </div>
            </li>
            <li>
              <div id="anim3" class="etiquette_nav_anim_before">
                <a id="a3" href="index.php?menu=contact">Contact</a>
                <span id="fleche3" aria-hidden="true"></span>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <div id="bande_nav_anim"></div>
    </div>

    <div id="infos_login" class="row">
      <div class="col-md-2">
        <p>
          <strong>Compte Utilisateur:</strong><br>
          <strong>Login:</strong> "utilisateur_test"<br>
          <strong>Password:</strong> "usertest"
        </p>
      </div>
      <div class="col-md-2">
        <p>
          <strong>Compte Administrateur:</strong><br>
          <strong>Login:</strong> "dannyadmin"<br>
          <strong>Password:</strong> "dannyadmin"
        </p>
      </div>
    </div>
  </div>
</header>
