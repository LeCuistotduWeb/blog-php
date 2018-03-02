<?php $title = "login"; ?>

<?php ob_start(); ?>

<!-- content -->
<body>
  <div class="container">
    <div class="card card-login mx-auto px-0">
      <div class="card-header">Connection administration</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">identifiant</label>
            <input class="form-control" type="text" placeholder="Entrer votre identifiant">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" type="password" placeholder="Mot de passe">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Rester connecté</label>
            </div>
          </div>
          <a class="btn btn-primary btn-block" href="index.php?action=backend">Se connecter</a>
        </form>
      </div>
    </div>
  </div>

  <?php $content = ob_get_clean(); ?>

  <?php require('template.php'); ?>
