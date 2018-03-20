<?php $title = "Login"; ?>
<?php $subHeading = " "?>
<?php $heading = "Connection administration"?>
<?php ob_start(); ?>

<!-- content -->
<body>
  <div class="container">
    <div class="card card-login mx-auto px-0">
      <div class="card-body">
        <form action="index.php?action=loginVerify" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">identifiant</label>
            <input class="form-control" type="text" placeholder="Entrer votre identifiant" name="username" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" type="password" placeholder="Mot de passe" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
      </div>
    </div>
  </div>

  <?php $content = ob_get_clean(); ?>

  <?php require('template.php'); ?>
