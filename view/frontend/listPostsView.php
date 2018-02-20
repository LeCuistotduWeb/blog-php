<?php $title = "Billet simple pour l'Alaska | page d'accueil"; ?>

<!-- header -->
<?php require_once 'layout/header.php' ?>
<!-- /header -->

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
        <div class="post-preview col-md-6">
          <a href="index.php?action=post&id=1">
            <img src="public/img/killer-whale.jpg" alt="photo d'un orque qui nage" class="post-img">
            <h2 class="post-title">
                  Science has not yet mastered prophecy
                </h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe fuga quidem, maxime vero a rerum. Ut voluptate, itaque, tenetur dignissimos natus minus illum accusantium cumque cupiditate quia in eos ratione.</p>
          </a>
          <p class="post-meta">Le 15 fevrier 2017</p>
        </div>
        <div class="post-preview col-md-6">
          <a href="index.php?action=post&id=1">
            <img src="public/img/killer-whale.jpg" alt="photo d'un orque qui nage" class="post-img">
            <h2 class="post-title">
                  Failure is not an option
                </h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas culpa, pariatur omnis voluptatum nesciunt earum inventore iusto suscipit obcaecati, ipsam aut modi tempora fugiat cum doloribus ab consequatur rerum soluta.</p>
          </a>
          <p class="post-meta">Le 20 octobre 2017</p>
        </div>
      </div>
      <div class="row">
        <div class="post-preview col-md-6">
          <a href="index.php?action=post&id=1">
            <img src="public/img/killer-whale.jpg" alt="photo d'un orque qui nage" class="post-img">
            <h2 class="post-title">
                  Science has not yet mastered prophecy
                </h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe fuga quidem, maxime vero a rerum. Ut voluptate, itaque, tenetur dignissimos natus minus illum accusantium cumque cupiditate quia in eos ratione.</p>
          </a>
          <p class="post-meta">Le 15 fevrier 2017</p>
        </div>
        <div class="post-preview col-md-6">
          <a href="index.php?action=post&id=1">
            <img src="public/img/killer-whale.jpg" alt="photo d'un orque qui nage" class="post-img">
            <h2 class="post-title">
                  Failure is not an option
                </h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas culpa, pariatur omnis voluptatum nesciunt earum inventore iusto suscipit obcaecati, ipsam aut modi tempora fugiat cum doloribus ab consequatur rerum soluta.</p>
          </a>
          <p class="post-meta">Le 20 octobre 2017</p>
        </div>
      </div>

      <!-- Pager -->
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Anciens billets &rarr;</a>
        <a class="btn btn-primary float-left" href="#">&larr; Nouveaux billets</a>
      </div>
    </div>

<?php $posts->closeCursor();?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php');
