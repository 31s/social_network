<?php $title="Edition de profil"; ?>
<?php include('partials/_header.php'); ?>

<div id="main-content">

    <div class="container">
        <div class="row">
      
            <?php if (!empty($_GET['id']) && $_GET['id'] === get_session('user_id')) : ?>
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Completer mon profil</h3>
                        </div>
                        <div class="panel-body">
                            <?php include('partials/_errors.php'); ?>

                            <form data-parsley-validate method="post">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nom<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?= get_input('name') ?: e($user->name) ?>" required="required" />
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">Ville<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="city" name="city" value="<?= get_input('city') ?: e($user->city) ?>"required="required" />
                                </div>
                                </div>                  
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country">Pays<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="country" name="country" value="<?= get_input('country') ?: e($user->country) ?>" required="required" />
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sex">Sexe<span class="text-danger">*</span></label>
                                    <select required="required" class="form-control" id="sex" name="sex" />
                                    <option value="H" <?= $user->sex == "H" ? "selected" : "" ?>>
                                        Homme
                                    </option>
                                    <option value="F" <?= $user->sex == "F" ? "selected" : "" ?>>
                                        Femme
                                    </option>
                                    </select>
                                </div>
                                </div>                  
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" class="form-control" id="twitter" name="twitter" value="<?= get_input('twitter') ?: e($user->twitter) ?>" />
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="github">Github</label>
                                    <input type="text" class="form-control" id="github" name="github" value="<?= get_input('github') ?: e($user->github) ?>" />
                                </div>
                                </div>                  
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="available_for_hiring">
                                    <input type="checkbox" id="available_for_hiring" name="available_for_hiring" <?= $user->available_for_hiring ? "checked" : "" ?> />
                                    Disponible pour emploi ?
                                    </label>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bio">Biographie<span class="text-danger">*</span></label>
                                    <textarea required="required" cols="30" rows="10" class="form-control" id="bio" name="bio" placeholder="Je suis un amoureux de la programmation..."><?= get_input('bio') ?: e($user->bio) ?></textarea>
                                </div>
                                </div>                  
                            </div>
                            <input type="submit" class="btn btn-primary" value="Valider" name="update" />
                            </form>              
                        </div>
                    </div>
                </div> 
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include('partials/_footer.php'); ?>
