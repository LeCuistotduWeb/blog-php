<?php $title = "Billet simple pour l'Alaska | Accueil"; ?>
<?php $heading = "Billet simple pour l'Alaska"; ?>
<?php $subHeading = "Jean - Forteroche"; ?>

<?php ob_start(); ?>
<div class="container">
  <!-- Main Content -->
    <div class="container">
      <div class="row centered">
        <h2 class="mb-2">Mon dernier billet :</h2>
        <!-- dernier billet -->
        <?php foreach ($lastPost as $donnees) { ?>
        <div class="post-preview first-post">
          <a href="index.php?action=post&id=<?= $donnees->id(); ?>">
            <div class="first-post-thumb_container">
              <img src="public/img/<?= $donnees->post_thumbnail(); ?>" alt="<?= $donnees->post_thumbnail(); ?>" class="firstpost-img">
            </div>
            <h3 class="post-title">
              <?= $donnees->title(); ?>
            </h3>
            <p><?= $donnees->excerpt() ;?></p>
          </a>
          <p class="post-meta">Publié le : <?= $donnees->creation_date(); ?></p>
        </div>
        <?php } ?>
        <!-- dernier billet -->
      </div>
      <hr>
      <div class="row">
      <?php foreach ($posts as $post) { ?>
        <article class="post-preview col-md-6">
          <a href="index.php?action=post&id=<?= $post->id()?>">
            <div class="post-thumb-content">
              <img src="public/img/<?= $post->post_thumbnail()?>" alt="<?= $post->post_thumbnail()?>" class="post-img">
            </div>
            <h3 class="post-title"><?= $post->title();?></h3>
            <p><?= $post->excerpt();?></p>
          </a>
          <p class="post-meta">Publié le : <?= $post->creation_date();?></p>
        </article>
        <?php } ?>
      </div>

      <!-- Pager -->
      <div class="clearfix">
        <a class="btn btn-primary float-right col-xs-6 col-sm-5 col-lg-3 mb-2 px-2" href="index.php?action=listPosts&page=<?= $page + 1; ?>">Anciens billets &rarr;</a>
        <?php if($page != 1){?>
          <a class="btn btn-primary float-left col-xs-6 col-sm-5 col-lg-3 mb-2 px-2" href="index.php?action=listPosts&page=<?= $page - 1; ?>">&larr; Nouveaux billets</a>
          <?php } ?>
      </div>
    </div>

</div>
<?php $content = ob_get_clean(); ?>
<?php require_once 'template.php';
