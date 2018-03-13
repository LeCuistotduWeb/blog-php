<?php $title = "Billet simple pour l'Alaska | Edition d'article" ?>
<?php ob_start(); ?>

  <!-- content -->
    <div class="container">
      <h1 class="mt-5">modifier le billet</h1>

      <form class="mt-5" action="index.php?action=modifyPost&postId=<?= $post->id()?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="titleBillet">Titre : </label>
          <input type="text" class="form-control" id="title" name="title" value="<?= $post->title(); ?>">
        </div>

        <div class="form-group">
          <label for="contntBillet">Image mise en avant : </label>
          <input type="file" name="post_thumbnail" id="post_thumbnail" class="form-control">
        </div>
        <p>
          Image actuelle : <br>
          <img src="public/img/<?= $post->post_thumbnail(); ?>" alt="" width="150px">
        </p>
        <div class="form-group">
          <label for="contentBillet">Contenu : </label>
          <textarea class="form-control tinymce" id="content" name="content" rows="10" placeholder="<?= $post->content(); ?>"><?= $post->content(); ?></textarea>
        </div>

        <button class="btn btn-primary float-right mb-5" type="submit">Modifier</button>
      </form>
    </div>
    <!-- content -->

<?php $content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
