<?php $title = "Billet simple pour l'Alaska | page d'accueil"; ?>

<?php ob_start(); ?>
<div class="container">
  <!-- Main Content -->
    <div class="container">
      <div class="row centered">
        <p>Mon dernier billet :</p>
        <div class="post-preview first-post">
          <a href="index.php?action=post&id=1">
            <img src="public/img/killer-whale - Copie.jpg" alt="photo d'un orque qui nage" class="post-img">
            <h2 class="post-title">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            </h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, delectus culpa quo repellat quisquam, illo magni ex est quibusdam. Veritatis eos facilis itaque eveniet iusto magnam facere pariatur vitae repellat.
            </p>
          </a>
          <p class="post-meta">Le 24 septembere 2018</p>
        </div>
      </div>
      <hr>
      <div class="row">
      <?php foreach ($posts as $post){?>
        <article class="post-preview col-md-6">
          <a href="index.php?action=post&id=<?= $post->id()?>">
            <img src="public/img/<?= $post->post_thumbnail()?>" alt="photo d'un orque qui nage" class="post-img">
            <h2 class="post-title"><?= $post->title();?></h2>
            <p><?= substr($post->content(), 0, 250);?></p>
          </a>
          <p class="post-meta"><?= $post->creation_date_fr();?></p>
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
