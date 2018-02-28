<?php $title = "Billet simple pour l'Alaska | page d'accueil"; ?>

<?php ob_start(); ?>
<div class="container">
  <!-- Main Content -->
    <div class="container">
      <div class="row centered">
        <p>Mon dernier billet :</p>
        <!-- dernier billet -->
        <?php foreach ($lastPost as $donnees) { ?>
        <div class="post-preview first-post">
          <a href="index.php?action=post&id=<?= $donnees->id(); ?>">
            <img src="public/img/<?= $donnees->post_thumbnail(); ?>" alt="photo d'un orque qui nage" class="post-img">
            <h2 class="post-title">
              <?= $donnees->title(); ?>
            </h2>
            <p><?= $donnees->excerpt() ;?></p>
          </a>
          <p class="post-meta"><?= $donnees->creation_date(); ?></p>
        </div>
        <?php } ?>
        <!-- dernier billet -->
      </div>
      <hr>
      <div class="row">
      <?php foreach ($posts as $post){?>
        <article class="post-preview col-md-6">
          <a href="index.php?action=post&id=<?= $post->id()?>">
            <img src="public/img/<?= $post->post_thumbnail()?>" alt="photo d'un orque qui nage" class="post-img">
            <h2 class="post-title"><?= $post->title();?></h2>
            <p><?= $donnees->excerpt();?></p>
          </a>
          <p class="post-meta"><?= $post->creation_date();?></p>
        </article>
        <?php } ?>
      </div>

      <!-- Pager -->
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Anciens billets &rarr;</a>
        <a class="btn btn-primary float-left" href="#">&larr; Nouveaux billets</a>
      </div>
    </div>

</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');
