<?php $title = "Notifications"; ?>
<?php include('partials/_header.php'); ?>

<div id="main-content">
    <div class="container">
        <h1 class="lead">Vos notifications</h1>

        <?php if(count($notifications) > 0): ?>
            <ul class="list-group">
                <?php foreach($notifications as $notification): ?>
                    <li class="list-group-item
                        <?= $notification->seen == '0' ? 'not_seen' : '' ?>">
                        <?php require("partials/notifications/{$notification->name}.php"); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucune notification disponible pour l'instant.</p>
        <?php endif; ?>
    </div>
</div>

<?php include('partials/_footer.php'); ?>
