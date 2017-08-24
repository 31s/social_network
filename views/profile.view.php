
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
                  <img src="<?= get_avatar_url($user->email) ?>" alt="Image de profil de <?= e($user->pseudo) ?>" class="img-circle">
                </div>
                
              </div>
              <div class="row">
                <div class="col-md-6">
                  <strong><?= e($user->pseudo) ?></strong><br />
                  <a href="mailto:<?= e($user->email) ?>"><?= e($user->email) ?></a>
                </div>              
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
          <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Completer mon profil</h3>
              </div>
            <div class="panel-body">
              <?php include('partials/_errors.php'); ?>

                <form method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Nom<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="" required="required" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="city">Ville<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="city" name="city" required="required" />
                      </div>
                    </div>                  
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="country">Pays<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="country" name="country" required="required" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="sex">Sexe<span class="text-danger">*</span></label>
                        <select class="form-control" id="sex" name="sex" />
                          <option value="H">
                            Homme
                          </option>
                          <option value="F">
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
                        <input type="text" class="form-control" id="twitter" name="twitter" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="github">Github</label>
                        <input type="text" class="form-control" id="github" name="github" />
                      </div>
                    </div>                  
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="available_for_hiring">
                          <input type="checkbox" id="available_for_hiring" name="available_for_hiring" />
                          Disponible pour emploi ?
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="bio">Biographie<span class="text-danger">*</span></label>
                        <textarea cols="30" rows="10" class="form-control" id="bio" name="bio" placeholder="Je suis un amoureux de la programmation..."></textarea>
                      </div>
                    </div>                  
                  </div>
                  <input type="submit" class="btn btn-primary" value="Valider" name="update" />
                </form>              
            </div>
          </div>
      </div>    
    </div>
  </div><!-- /.container -->

</div>

<?php include('partials/_footer.php'); ?>
