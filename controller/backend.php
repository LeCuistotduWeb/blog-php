<?php
// Chargement de l'autoloader
require_once 'model/Autoloader.php';

function backend() {
    $commentManager = new CommentManager();
    $postManager = new postManager();
    $postCount = $postManager->postCount();
    $commentCount = $commentManager->commentCount();
    $reportCount = $commentManager->reportCount();

    $posts = $postManager->backendPosts();
    $reportList = $commentManager->reportList();

    if(isset($id)){
      $deleteComment = $commentManager->deleteComment($id);
    }

    require('view/backend/backendView.php');
}

function createNewPost() {
  require('view/backend/postEditView.php');
}

function editPost($post_id) {
  $postManager = new postManager();
  $post = $postManager->post($post_id);
  require('view/backend/postModifyView.php');
}

function modifyPost($post_id, $title, $content) {
  $postManager = new postManager();
  $postObj = new post(array(
    'id' => $post_id,
    'title'   => $title,
    'content' => $content
  ));
  $modifyPost = $postManager->modifyPost($postObj);
  if ($modifyPost === false) {
      throw new Exception('Impossible de modifier le billet !');
  }
  else {
      header('Location: index.php?action=backend');
    }
}

function addPost($title, $content) {
  $postManager = new postManager();
  $postObj = new post(array(
    'title' => $title,
    'content'   => $content,
  ));
  $addPost = $postManager->addPost($postObj);
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
        header('Location: index.php?action=backend');
    }
  }

function deletePost($id) {
    $postManager = new postManager();

    $affectedLines = $postManager->deletePost($id);

    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer le billet !');
    }
    else {
        header('Location: index.php?action=backend');
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
