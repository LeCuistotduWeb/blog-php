<?php
// requires
require_once 'config.php';
require_once 'controller/frontend.php';
require_once 'controller/backend.php';


// Chargement de l'autoloader
require_once 'model/Autoloader.php';
Autoloader::register();

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'backend') {
                backend();
        }
        elseif ($_GET['action'] == 'editPost') {
                editPost();
        }
        elseif ($_GET['action'] == 'addPost') {
          if (!empty($_POST['title']) && !empty($_POST['content'])) {
                addPost($_POST['title'], $_POST['content'], $_FILES['post_thumbnail']['name']);
              }
              else {
                  throw new Exception('Tous les champs ne sont pas remplis !');
              }
        }
        elseif ($_GET['action'] == 'login') {
                login();
        }
        elseif ($_GET['action'] == 'addComment') {
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
        elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
              deleteComment($_GET['commentId']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        elseif ($_GET['action'] == 'authorizedComment') {
            if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
              authorizedComment($_GET['commentId']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        elseif ($_GET['action'] == 'modifyComment') {
            if (isset($_GET['commentId']) && $_GET['commentId'] > 0 && isset($_GET['postId']) && $_GET['postId'] > 0) {
                modifyComment($_GET['commentId'], $_GET['postId']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        elseif ($_GET['action'] == 'reportComment') {
            if (isset($_GET['commentId']) && $_GET['commentId'] > 0 && isset($_GET['postId']) && $_GET['postId'] > 0) {
                reportComment($_GET['commentId'],$_GET['postId']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        else { listPosts(); }
      }
    else { listPosts(); }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
