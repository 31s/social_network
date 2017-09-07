
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
              <li class="<?= set_active('index') ?>"><a href="index.php">Accueil</a></li>

            <?php if(is_logged_in()): ?>
              <li class="<?= set_active('profile') ?>">
                <a href="profile.php?id=<?= get_session('user_id') ?>">Mon profil</a>
              </li>
			  <li><a href="logout.php">Deconnexion</a></li>
            <?php else: ?>
              <li class="<?= set_active('login') ?>"><a href="login.php">Connexion</a></li>
              <li class="<?= set_active('register') ?>"><a href="register.php">Inscription</a></li>
            <?php endif; ?>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
</nav>