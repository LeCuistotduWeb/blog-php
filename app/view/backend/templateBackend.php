<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title ?></title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Custom fonts for this template -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="<?= PUBLICS ;?>css/styles.css" rel="stylesheet" type="text/css">
</head>

  <body class="fixed-nav sticky-footer" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-dark bg-dark fixed-top d-flex jusify-content-center" id="mainNav">
      <div class="nav-item">
        <a class="navbar-brand" href="backend">Administration</a>
      </div>
      <div class="nav-item navbar-logo">
        <a href="#"><img src="<?= PUBLICS ;?>img/billet-simple-pour-l-alaska-logo-icon.png" alt="" width="50px"></a>
      </div>
      <div class="nav-item">
        <a class="nav-link text-white btn btn-logout" data-toggle="modal" data-target="#logout-modal">
        <i class="fa fa-fw fa-sign-out"></i>Déconnexion</a>
      </div>
    </nav>
    <!-- /navigation -->

    <div class="conaitner-fluid pt-3">
    <!-- messages errors -->
    <?php $Session->flash(); ?>
    <!-- messages errors -->
    </div>

    <!-- Content -->
    <?= $content ?>
    <!-- Content -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logout-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Déconnexion</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">Voulez-vous vraimment vous deconnecter ?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
            <a class="btn btn-primary" href="disconnect">Déconnexion</a>
          </div>
          </div>
        </div>
      </div>
      <!-- tinyMce -->
      <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
      <script>
        tinymce.init({
          selector: '.tinymce'
        });
      </script>
      <!-- Bootstrap core JavaScript -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="<?= PUBLICS ;?>js/app.js" type="text/javascript"></script>
  </body>

</html>
