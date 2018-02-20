<?php $title = "Billet simple pour l'Alaska | Administration" ?>
<?php ob_start(); ?>

<div class="content-wrapper">
      <div class="container">
        <div class="row mt-3">
          <!-- Icon Cards-->
          <div class="col-xl-4 col-sm-4 mb-4">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Nb de Billets :</div>
                <div class="mr-5 card-nb">10</div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-sm-4 mb-4">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Nb de commentaires :</div>
                <div class="mr-5 card-nb">5</div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-sm-4 mb-4">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Nb de messages signalés :</div>
                <div class="mr-5 card-nb">2</div>
              </div>
            </div>
          </div>
          <!-- /Icon Cards-->
        </div>
        <div class="row mt-5">
          <a href="index.php?action=postEdit" class="btn btn-primary mt-1 col-lg-3 col-md-6 col-sm-12">Ajouter un billet</a>
          <button class="btn btn-warning mt-1 col-lg-3 col-md-6 col-sm-12">messages signalés</button>
        </div>

        <!-- list posts -->
        <ul class="list-group mt-3 row">
          <li class="list-group-item">
            <div class="post row d-flex align-items-center">
              <div class="col-lg-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </div>
              <div class="pt-2 ml-3">
                <button class="btn btn-warning p-2"><i class="fa fa-edit"></i></button>
                <button class="btn btn-danger p-2"><i class="fa fa-trash"></i></button>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="post row d-flex align-items-center">
              <div class="col-lg-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </div>
              <div class="pt-2 ml-3">
                <button class="btn btn-warning p-2"><i class="fa fa-edit"></i></button>
                <button class="btn btn-danger p-2"><i class="fa fa-trash"></i></button>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="post row d-flex align-items-center ">
              <div class="col-lg-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </div>
              <div class="pt-2 ml-3">
                <button class="btn btn-success p-2"><i class="fa fa-check"></i></button>
                <button class="btn btn-warning p-2"><i class="fa fa-edit"></i></button>
                <button class="btn btn-danger p-2"><i class="fa fa-trash"></i></button>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="post row d-flex align-items-center ">
              <div class="col-lg-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </div>
              <div class="pt-2 ml-3">
                <button class="btn btn-success p-2"><i class="fa fa-check"></i></button>
                <button class="btn btn-warning p-2"><i class="fa fa-edit"></i></button>
                <button class="btn btn-danger p-2"><i class="fa fa-trash"></i></button>
              </div>
            </div>
          </li>
        </ul>
        <!-- list posts -->
      </div>
      <!-- /.container-fluid-->

<?php $content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
