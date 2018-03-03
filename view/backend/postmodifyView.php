<?php $title = "Billet simple pour l'Alaska | Edition d'article" ?>
<?php ob_start(); ?>

  <!-- content -->
    <div class="container">
      <h1 class="mt-5">Edition de billet</h1>

      <form class="mt-5" action="index.php?action=modifyPost&postId=<?= $post->id()?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="titleBillet">Titre : </label>
          <input type="text" class="form-control" id="title" name="title" placeholder="<?= $post->title(); ?>">
        </div>

        <div class="form-group">
          <label for="contntBillet">Image mise en avant : </label>
          <input type="file" name="post_thumbnail" id="post_thumbnail" class="form-control">
        </div>

        <div class="form-group">
          <label for="contentBillet">Contenu : </label>
          <textarea class="form-control tinymce" id="content" name="content" rows="10" placeholder="<?= $post->content(); ?>"></textarea>
        </div>

        <button class="btn btn-primary float-right" type="submit">Publier</button>
      </form>
    </div>
    <!-- content -->

<?php $content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
