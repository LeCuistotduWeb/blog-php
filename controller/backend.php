<?php
// Chargement de l'autoloader
require_once 'model/Autoloader.php';

function backend() {
    $commentManager = new CommentManager();
    $postManager = new postManager();
    $postCount = $postManager->postCount();
    $commentCount = $commentManager->commentCount();
    $reportCount = $commentManager->reportCount();

    $posts = $postManager->posts();
    $reportList = $commentManager->reportList();

    if(isset($id)){
      $deleteComment = $commentManager->deleteComment($id);
    }

    require('view/backend/backendView.php');
}

function editPost() {
    require('view/backend/postEditView.php');
}

function addPost($title, $content, $post_thumbnail) {
  $postManager = new postManager();
  $addPost = $postManager->addPost($title, $content, $post_thumbnail);
  if ($newPost === false) {
      throw new Exception('Impossible d\'ajouter le billet !');
  }
  else {
      header('Location: index.php?action=backend');
    }
}

function deleteComment($id) {
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->deleteComment($id);

    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer le commentaire !');
    }
    else {
        header('Location: index.php');
    }
  }

function authorizedComment($commentId) {
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->authorizedComment($commentId);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'autorisé le commentaire !');
    }
    else {
        header('Location: index.php?action=backend');
    }
}
