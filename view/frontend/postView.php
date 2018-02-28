<?php ob_start(); ?>

<?php foreach ($post as $donnees){?>
<?php $title = htmlspecialchars($donnees->title()); ?>

<!-- header -->
<?php require_once 'layout/header.php' ?>
<!-- /header -->

<!-- content -->

<!-- Post Content -->
<div class="container">
    <article>
        <div class="row">
          <div class="col-lg-10 col-md-12 mx-auto">
            <!-- post title -->
            <h1><?= $donnees->title(); ?></h1>
            <!-- post title -->

            <!-- content -->
            <?= $donnees->content(); ?>
            <!-- content -->
        </div>
      </div>
    </article>
</div>
    <!-- espace commentaires -->
    <div class="container">
      <hr class="col-lg-10 col-md-12">
      <!-- laisser commentaire -->
      <div class="row">
        <div class="col-lg-10 col-md-12 mx-auto">
        <h3 class="mt-3">Ajouter un commentaire</h3>

        <form action="index.php?action=addComment&id=<?= $donnees->id()?>" method="post" class="mt-3">
          <div class="form-group">
            <label for="author">Nom</label><br />
            <input type="text" id="author" name="author" class="form-control" placeholder="Entrer votre pseudo"/>
          </div>
          <div class="form-group">
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment" class="form-control" rows="8"></textarea>
          </div>
          <div>
              <input type="submit" class="btn btn-primary mb-4 mt-2"/>
          </div>
        </form>
      </div>
      </div>
      <!-- laisser commentaire -->
<?php } ?>

      <!-- liste commentaires -->
      <div class="row">
        <div class="col-lg-10 col-md-12 mx-auto">
          <h3 class="pb-3">Commentaires :</h3>

          <?php foreach ($comments as $comment){?>
          <!-- commentaire -->
          <div class="comment-content comment-wrap border-bottom border-left border-dark mb-4 p-2 ">
            <div class="comment-name"><span class="font-weight-bold"><?= $comment->author(); ?></span> le : <span class="comment-date"><?= $comment->comment_date(); ?></span></div>
            <div class="comment-text text-justify text-sm-left"><?= $comment->comment(); ?></div>
            <div class="text-right"><a href="">Signaler</a></div>
          </div>
          <!-- commentaire -->

        <?php } ?>

        </div>
      </div>
      <!-- liste commentaires -->

    </div>
    <!-- espace commentaires -->
<!-- content -->

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
