
<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><?= WEBSITE_NAME ?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="list_users.php">Liste des utilisateurs</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- <li class="<?= set_active('index') ?>">
                    <a href="index.php"><?= $menu['accueil'][$_SESSION['locale']]; ?></a>
                </li> -->

            <?php if (is_logged_in()) : ?>

            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><img src="<?= get_session('avatar') ? get_session('avatar') : get_avatar_url(get_session('email')) ?>" alt="Image de profil de <?= get_session('pseudo') ?>" class="avatar-xs"> <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
                <a class="dropdown-item" href="../default/">Default</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="profile.php?id=<?= get_session('user_id') ?>">Mon profil</a>
                <a class="dropdown-item" href="share_code.php">Partager</a>
                <a class="dropdown-item" href="logout.php">Deconnexion</a>
                <a class="dropdown-item" href="login.php">Connexion</a>
                <a class="dropdown-item" href="register.php">Inscription</a>
              </div>
            </li> -->
            
                <li class="<?= set_active('profile') ?>">
                    <a href="profile.php?id=<?= get_session('user_id') ?>"><?= $menu['mon_profil'][$_SESSION['locale']]; ?></a>
                </li>
                <li class="<?= set_active('edit_user') ?>">
                    <a href="edit_user.php?id=<?= get_session('user_id') ?>"><?= $menu['editer_profil'][$_SESSION['locale']]; ?></a>
                </li>
                <li class="<?= set_active('share_code') ?>">
                    <a href="share_code.php"><?= $menu['share_code'][$_SESSION['locale']]; ?></a>
                </li>
                <li>
                    <a href="logout.php"><?= $menu['deconnexion'][$_SESSION['locale']]; ?></a>
                </li>
            <?php else : ?>
              <li class="<?= set_active('login') ?>"><a href="login.php"><?= $menu['connexion'][$_SESSION['locale']]; ?></a></li>
              <li class="<?= set_active('register') ?>"><a href="register.php"><?= $menu['inscription'][$_SESSION['locale']]; ?></a></li>
            <?php endif; ?>

            <li><a href="?lang=fr">FR</a></li>
            <li><a href="?lang=en">EN</a></li>
            
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
</nav>
