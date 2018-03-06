<?php $title = "Billet simple pour l'Alaska | Administration" ?>
<?php ob_start(); ?>

<div class="content-wrapper">
      <div class="container">
        <div class="row mt-3">
          <!-- Icon Cards-->
          <div class="col-xl-4 col-sm-4 mb-4 pl-md-0">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-edit"></i>
                </div>
                <div class="mr-5">Nb de Billets :</div>
                <div class="mr-5 card-nb"><?= $postCount ?></div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-sm-4 mb-4 p-md-0">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Nb de commentaires :</div>
                <div class="mr-5 card-nb"><?= $commentCount ?></div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-sm-4 mb-4 pr-md-0">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-exclamation-triangle"></i>
                </div>
                <div class="mr-5">Nb de messages signalés :</div>
                <div class="mr-5 card-nb"><?= $reportCount ?></div>
              </div>
            </div>
          </div>
          <!-- /Icon Cards-->
        </div>


        <div class="row mt-5">
          <a href="index.php?action=editPost" class="btn btn-primary mt-1 col-lg-3 col-md-6 col-sm-12">Ajouter un billet</a>
          <a href="#reportList" class="btn btn-danger mt-1 ml-2 col-lg-3 col-md-6 col-sm-12">messages signalés</a>
        </div>
        <div class="row">
          <h2 class="mt-4">Billets : </h2>
        </div>

        <!-- list posts -->
        <ul class="list-group mt-3 row">
          <?php foreach ($posts as $post) { ?>
          <li class="list-group-item col-12">
            <div class="post row d-flex align-items-center ">
              <div class="col-md-9">
                <div class="font-weight-bold">Edité le: <?= $post->creation_date();?></div>
                <div><?= $post->title(); ?></div>
              </div>
              <div class=" col-md-3 d-flex justify-content-md-end">
                <button class="btn btn-warning p-2 "><a href="index.php?action=editPost&postId=<?= $post->id();?>"><i class="fa fa-edit text-white"></i> </a></button>
                <button class="btn btn-danger p-2 ml-2"><a href="index.php?action=deletePost&postId=<?= $post->id();?>"><i class="fa fa-trash text-white"></i></a></button>
              </div>
            </div>
          </li>
          <?php } ?>
        </ul>
        <!-- list posts -->

        <!-- list reportComment -->
        <div class="row" id="reportList">
          <h2 class="mt-5">Commentaires signalés : </h2>
        </div>

        <ul class="list-group mt-3 row">
          <?php foreach ($reportList as $report) { ?>
          <li class="list-group-item col-12 border-danger">
            <div class="post row d-flex align-items-center">
              <div class="col-md-9">
                <div class="font-weight-bold"><?= htmlspecialchars($report->author()); ?> le : <span class="comment-date"><?= htmlspecialchars($report->comment_date()); ?></span></div>
                <div class="comment-text"><?= htmlspecialchars($report->comment()); ?></div>
              </div>
              <div class="col-md-3 d-flex justify-content-md-end">
                <button class="btn btn-success p-2"><a href="index.php?action=authorizedComment&commentId=<?= $report->id();?>"><i class="fa fa-check text-white"></i></a></button>
                <button class="btn btn-danger p-2 ml-2"><a href="index.php?action=deleteComment&commentId=<?= $report->id();?>"><i class="fa fa-trash text-white"></i></a></button>
              </div>
            </div>
          </li>
          <?php } ?>
        </ul>

      </div>
        <!-- list reportComment -->
      </div>
      <!-- /.container-fluid-->

<?php $content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
