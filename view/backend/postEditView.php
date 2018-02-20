<?php $title = "Billet simple pour l'Alaska | Edition d'article" ?>
<?php ob_start(); ?>

  <!-- content -->
    <div class="container">
      <h1 class="mt-5">Edition de billet</h1>

      <form class="mt-5" action="" method="post">
        <div class="form-group">
          <label for="titleBillet">Titre : </label>
          <input type="email" class="form-control" id="titleBillet" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
          <label for="contntBillet">Contenu : </label>
          <textarea class="form-control tinymce" id="contntBillet" rows="10"></textarea>
        </div>

        <a class="btn btn-primary float-right" type="submit" href="index.php?action=backend">Publier</a>
      </form>
    </div>
    <!-- content -->

<?php $content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
