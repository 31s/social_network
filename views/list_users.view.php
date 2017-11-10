
<?php $title="Liste des utilisateurs"; ?>
<?php include('partials/_header.php'); ?>

<div id="main-content">
    <div class="container">
      
        <h1>Liste des utilisateurs</h1>
        <?php foreach ($users as $user) : ?>
            <div class="col-md-3 user-block">
                <a href="profile.php?id=<?= $user->id ?>">
                    <img src="<?= get_avatar_url($user->email, 70) ?>" alt="<?= e($user->pseudo) ?>" class="img-circle">
                </a>                    
                <h4 class="user-block-username">
                    <a href="profile.php?id=<?= $user->id ?>">
                        <?= e($user->pseudo) ?>
                    </a>
                </h4>
            </div>
        <?php endforeach; ?>
        <div id="pagination"><?= $pagination ?></div>

    </div><!-- /.container -->
</div>

<?php include('partials/_footer.php'); ?>
