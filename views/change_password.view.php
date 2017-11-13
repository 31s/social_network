<?php $title="Changement de mot de passe"; ?>
<?php include('partials/_header.php'); ?>

<div id="main-content">

    <div class="container">
        <div class="row">
      
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Changer de mot de passe</h3>
                        </div>
                        <div class="panel-body">
                            <?php include('partials/_errors.php'); ?>

                            <form data-parsley-validate method="post">
                                <div class="form-group">
                                    <label for="current_password">Mot de passe actuel<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" required="required" />
                                </div>

                                <div class="form-group">
                                    <label for="new_password">Nouveau mot de passe<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" required="required" data-parsley-minlength="6"/>
                                </div>

                                <div class="form-group">
                                    <label for="new_password_confirmation">Confirmer votre nouveau mot de passe<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required="required" data-parsley-equalto="#new_password"/>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Valider" name="change_password" />
                            </form>              
                        </div>
                    </div>
                </div> 

        </div>
    </div>
</div>

<?php include('partials/_footer.php'); ?>
