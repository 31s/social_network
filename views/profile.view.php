
<?php $title="Page de profil"; ?>
<?php include('partials/_header.php'); ?>

<div id="main-content">

  <div class="container">
      <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Profil de <?= e($user->pseudo) ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-5">
                        <img src="<?= get_avatar_url($user->email, 100) ?>" alt="Image de profil de <?= e($user->pseudo) ?>" class="img-circle">
                    </div>                
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <strong><?= e($user->pseudo) ?></strong><br />
                    <?=
                      e($user->name) ? e($user->name).'<br/>' : "";
                    ?>
                    <a href="mailto:<?= e($user->email) ?>"><?= e($user->email) ?></a> <br/>
                    <?=
                        $user->city && $user->country ? '<i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;'.e($user->city).' - '.e($user->country).'<br/>' : '';
                    ?>
                    <a href="//maps.google.com/maps?q=<?= e($user->city) . ' ' . e($user->country) ?>" target="_blank">Voir sur Google Maps</a>
                    </div>
                    <div class="col-sm-6">
                    <?=
                        $user->twitter ? '<i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;
                        <a href="//twitter.com/'.e($user->twitter).'">@'.e($user->twitter).'</a><br/>' : '';
                    ?>
                    <?=
                        $user->github ? '<i class="fa fa-github" aria-hidden="true"></i>&nbsp;
                        <a href="//github.com/'.e($user->github).'">'.e($user->github).'</a><br/>' : '';
                    ?>
                    <?=
                        $user->sex == 'H' ? '<i class="fa fa-male"></i>&nbsp;' : '<i class="fa fa-female"></i>&nbsp;';
                    ?>
                    <?=
                        $user->available_for_hiring ? 'Disponible pour emploi' : 'Non disponible pour emploi';
                    ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 well">
                      <h5>Petite biographie de <?= e($user->name) ?></h5>
                      <p>
                        <?= 
                          $user->bio ? nl2br(e($user->bio)) : 'Aucune biographie pour le moment';
                        ?>
                      </p>
                    </div>
                </div>
            </div>
        </div>
      </div>
      
        
    </div>
  </div><!-- /.container -->

</div>

<?php include('partials/_footer.php'); ?>
