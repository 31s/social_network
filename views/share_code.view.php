
<?php $title="Partage de codes sources"; ?>
<?php include('partials/_header.php'); ?>

<div id="main-content">
    <div id="main-content-share-code">
        <form method="post" autocomplete="off">
            <textarea name="code" id="code" placeholder="Entrez votre code ici..." required="required"><?= e($code); ?></textarea>

            <div class="btn-group nav-share">
                <input type="reset" name="reset" class="btn btn-danger" value="Tout effacer !">
                <input type="submit" name="save" class="btn btn-success" value="Enregistrer">
            </div>        
        </form>
    </div>
</div>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="assets/js/tabby.js"></script>
    <script>
        $('#code').tabby();
        $('#code').height($(window).height() - 50);
    </script>
  </body>
</html>
