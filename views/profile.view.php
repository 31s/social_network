
<?php $title="Page de profil"; ?>
<?php include('partials/_header.php'); ?>

<div id="main-content">

    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Profil de <?= e($user->pseudo) ?> (<?= friends_count($_GET['id']) ?> ami<?= friends_count($_GET['id']) <= 1 ? '' : 's' ?>)</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="<?= $user->avatar ? $user->avatar : get_avatar_url($user->email, 100) ?>" alt="Image de profil de <?= e($user->pseudo) ?>" class="avatar-md">
                        </div>
                        <div class="col-md-7">
                            <?php if(!empty($_GET['id']) && $_GET['id'] !== get_session('user_id')): ?>
                                <?php include('partials/_relation_links.php'); ?>
                            <?php endif; ?>
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
        <div class="row">
            <div class="col-md-6">
                <?php if( !empty($_GET['id']) && $_GET['id'] === get_session('user_id') ): ?>

                <div class="status-post">
                    <form action="microposts.php" method="post" data-parsley-validate>
                        <div class="form-group">
                            <label for="content" class="sr-only">Statut:</label>
                            <textarea name="content" id="content" rows="3" class="form-control" placeholder="Alors quoi de neuf ?" required="required" maxlength="140" data-parsley-maxlength="140" minlength="3" data-parsley-minlength="3"></textarea>
                        </div>

                        <div class="form-group status-post-submit">
                            <input type="submit" name="publish" value="Publier" class="btn btn-default btn-xs">
                        </div>

                    </form>
                </div>

                <?php endif; ?>

                <?php if(count($microposts) != 0): ?>
                    <?php foreach ($microposts as $micropost): ?>
                        <?php include('partials/_micropost.php'); ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Cet utilisateur n'a encore rien posté pour le moment...</p>
                <?php endif; ?>


            </div>
        </div>       
            
        </div>
    </div><!-- /.container -->

</div>

<?php include('partials/_footer.php'); ?>

<script src="assets/js/jquery.timeago.js"></script>
<script src="assets/js/jquery.timeago.fr.js"></script>

<script>
    $(document).ready(function() {
        $(".timeago").timeago();
    });
</script>


