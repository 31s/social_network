
<?php $title="Affichage codes sources"; ?>
<?php include('partials/_header.php'); ?>

<div id="main-content">
    <div id="main-content-share-code">
        <pre class="prettyprint linenums"><?= e($data->code); ?></pre>
        <div class="btn-group nav-share">
            <a href="share_code.php?id=<?= $_GET['id'] ?>" class="btn btn-warning">Cloner</a>
            <a href="share_code.php" class="btn btn-primary">Nouveau</a>
        </div>
    </div>
</div>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>
    <script>
        prettyPrint();
    </script>
  </body>
</html>
