<article class="media status-media">
    <div class="pull-left">
        <img src="<?= get_avatar_url($user->email) ?>" alt="<?= $user->pseudo ?>" class="media-object">
    </div>
    <div class="media-body">
        <h4 class="media-heading"><?= e($user->pseudo) ?></h4>
        <p><i class="fa fa-clock-o"></i> <span class="timeago" title="<?= $micropost->created_at ?>"><?= $micropost->created_at ?></span> </p>
        <?= nl2br(e($micropost->content))?>
    </div>
</article>