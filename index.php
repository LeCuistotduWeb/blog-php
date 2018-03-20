<?php
session_start();
require_once 'config.php';
include_once(CONTROLLER.'FrontendController.php');
include_once(CONTROLLER.'BackendController.php');
include_once(CONTROLLER.'LoginController.php');

// Chargement de l'autoloader
include_once(MODEL.'Autoloader.php');
Autoloader::start();
// var_dump($_SESSION);
if(isset($_GET['action'])){
  $request = $_GET['action'];
}
try {
  if (isset($request)) {
    // front
    if ($request == 'listPosts') {
      FrontendController::listPosts($page = 1);
    }
    elseif ($request == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
          FrontendController::post($_GET['id']);
        }
        else {
          throw new Exception('Aucun identifiant de billet envoyé');
        }
    }
    elseif ($request == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                FrontendController::addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
      }
    elseif ($request == 'reportComment') {
      if (isset($_GET['commentId']) && $_GET['commentId'] > 0 && isset($_GET['postId']) && $_GET['postId'] > 0) {
        FrontendController::reportComment($_GET['commentId'],$_GET['postId']);
      }
      else {
        throw new Exception('Aucun identifiant de commentaire envoyé');
      }
    }

    // login
    elseif ($request == 'disconnect') {
      LoginController::disconnect();
    }
    elseif ($request == 'login') {
      LoginController::login();
    }
    elseif ($request == 'loginVerify') {
      if(!empty($_POST['username']) && !empty($_POST['password'])) {
        LoginController::loginVerify($_POST['username'], $_POST['password']);
      }else {
        throw new Exception('Tous les champs ne sont pas remplis !');
      }
    }

    // back
    elseif ($request == 'backend') {
      if(Session::islogged()){
        BackendController::backend();
      }else{
        Session::setFlash('vous n\'avez pas acces a cette page.','danger');
        LoginController::login();
      }
    }
    elseif ($request == 'createNewPost') {
      if(Session::islogged()){
        BackendController::createNewPost();
      }else{
        Session::setFlash('vous n\'avez pas acces a cette page.','danger');
        LoginController::login();
      }
    }
    elseif ($request == 'editPost') {
      if(Session::islogged()){
        BackendController::editPost($_GET['postId']);
      }else{
        Session::setFlash('vous n\'avez pas acces a cette page.','danger');
        LoginController::login();
      }
    }
    elseif ($request == 'addPost') {
      if(Session::islogged()){
        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES['post_thumbnail'])) {
          BackendController::addPost($_POST['title'], $_POST['content'], $_FILES['post_thumbnail']);
        }
        else {
          throw new Exception('Tous les champs ne sont pas remplis !');
        }
      }else{
        Session::setFlash('vous n\'avez pas acces a cette page.','danger');
        LoginController::login();
      }
    }
    elseif ($request == 'modifyPost') {
      if(Session::islogged()){
        if(!empty($_GET['postId']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES)){
          BackendController::modifyPost($_GET['postId'], $_POST['title'], $_POST['content'], $_FILES['post_thumbnail']);
        }
        else {
          throw new Exception('tout les champs n\'on pas été remplis');
        }
      }else{
        Session::setFlash('vous n\'avez pas acces a cette page.','danger');
        LoginController::login();
      }
    }
    elseif ($request == 'deletePost') {
      if(Session::islogged()){
        if (isset($_GET['postId']) && $_GET['postId'] > 0) {
          BackendController::deletePost($_GET['postId']);
        }
        else {
          throw new Exception('Aucun identifiant de commentaire envoyé');
        }
      }else{
        Session::setFlash('vous n\'avez pas acces a cette page.','danger');
        LoginController::login();
      }
    }
    elseif ($request == 'deleteComment') {
      if(Session::islogged()){
        if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
          BackendController::deleteComment($_GET['commentId']);
        }
        else {
          throw new Exception('Aucun identifiant de commentaire envoyé');
        }
      }else{
        Session::setFlash('vous n\'avez pas acces a cette page.','danger');
        LoginController::login();
      }
    }
    elseif ($request == 'authorizedComment') {
      if(Session::islogged()){
        if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
          BackendController::authorizedComment($_GET['commentId']);
        }
        else {
          throw new Exception('Aucun identifiant de commentaire envoyé');
        }
      }else{
        Session::setFlash('vous n\'avez pas acces a cette page.','danger');
        LoginController::login();
      }
    }

    else { FrontendController::listPosts($page = 1); }
  }
  else { FrontendController::listPosts($page = 1); }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
