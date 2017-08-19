
<?php $title="Accueil"; ?>
<?php include('includes/constants.php'); ?>
<?php include('partials/_header.php'); ?>

<div id="main-content">

    <div class="container">

      <div class="jumbotron">
        <h1><?= WEBSITE_NAME; ?></h1>
        <p class="lead"><?= WEBSITE_NAME; ?> est le réseau social des développeurs. ⌨ <br/>
        Et qui dit développeurs, dit également code source ! ↩<br/>
        Grace à cette plateforme, vous aurez la possibilité de tisser des liens d'amitiés avec d'autres développeurs, échanger des codes sources, recevoir de l'aide si vous rencontrez des problèmes sur l'un de vos projets, et bien plus encore ! <br>
        alors n'hésitez plus et <a href="register.php">rejoignez dès maintenant la communauté</a> !</p>
        <a href="register.php" class="btn btn-primary btn-lg">Créer un compte</a>
      </div>

    </div><!-- /.container -->

</div>

<?php include('partials/_footer.php'); ?>
