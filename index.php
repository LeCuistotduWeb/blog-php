<?php
require_once 'config.php';
include_once(CONTROLLER.'FrontendController.php');
include_once(CONTROLLER.'FrontendController.php');
include_once(CONTROLLER.'BackendController.php');

// Chargement de l'autoloader
include_once('model/Autoloader.php');
Autoloader::start();

// routeur
$request = $_GET['action'];
$routeur = new Routeur($request);
$routeur->renderController();

try {
    if (isset($request)) {
        // front
        if ($request == 'listPosts') {
          $controller = new FrontendController();
          $controller->listPosts($page = 1);
        }
        elseif ($request == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
              $controller = new FrontendController();
              $controller->post($_GET['id']);
            }
            else {
              throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($request == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
          }

        // back
        elseif ($request == 'backend') {
          BackendController::backend();
        }
        elseif ($request == 'createNewPost') {
          BackendController::createNewPost();
        }
        elseif ($request == 'editPost') {
          if(isset($_GET['postId'])){
            BackendController::editPost($_GET['postId']);
          }else{
            BackendController::editPost();
          }
        }
        elseif ($request == 'addPost') {
          if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES)) {
                BackendController::addPost($_POST['title'], $_POST['content'], $_FILES['post_thumbnail']);
              }
              else {
                  throw new Exception('Tous les champs ne sont pas remplis !');
              }
        }
        elseif ($request == 'modifyPost') {
          if(!empty($_GET['postId']) && !empty($_POST['title']) && !empty($_POST['content']) && isset($_FILES)){
            BackendController::modifyPost($_GET['postId'], $_POST['title'], $_POST['content'], $_FILES['post_thumbnail']);
          }
          else {
              throw new Exception('Id de billet inconnu');
          }
        }
        elseif ($request == 'deletePost') {
            if (isset($_GET['postId']) && $_GET['postId'] > 0) {
              BackendController::deletePost($_GET['postId']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        elseif ($request == 'deleteComment') {
            if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
              deleteComment($_GET['commentId']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        elseif ($request == 'authorizedComment') {
            if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
              authorizedComment($_GET['commentId']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        elseif ($request == 'reportComment') {
            if (isset($_GET['commentId']) && $_GET['commentId'] > 0 && isset($_GET['postId']) && $_GET['postId'] > 0) {
                reportComment($_GET['commentId'],$_GET['postId']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }

        // login
        elseif ($request == 'disconnect') {
          disconnect();
        }
        elseif ($request == 'login') {
          login();
        }
        elseif ($request == 'loginVerify') {
          if (!empty($_POST['username']) && !empty($_POST['password'])) {
            loginVerify($_POST['username'], $_POST['password']);
          }
          else {
            throw new Exception('Tous les champs ne sont pas remplis !');
          }
        }

        else { $controller = new FrontendController();
        $controller->listPosts($page = 1); }
      }
    else { $controller = new FrontendController();
    $controller->listPosts($page= 1); }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
