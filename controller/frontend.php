<?php
// Chargement de l'autoloader
require_once 'model/Autoloader.php';

function listPosts() {
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->posts(); // Appel d'une fonction de cet objet
    $lastPost = $postManager->lastPost(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post() {
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->post($_GET['id']);
    $comments = $commentManager->comments($_GET['id']);

    require('view/frontend/postView.php');
}

function login() {
  require('view/frontend/loginView.php');
}

function addComment($postId, $author, $comment) {
    $commentManager = new CommentManager();
    $newComment = $commentManager->addComment($postId, $author, $comment);

    if ($newComment === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function modifyComment($id, $postId, $author, $comment) {
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->modifyComment($id, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible de modifer le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
    require('view/frontend/comment.php');
}

function reportComment($commentId,$postId) {
  $commentManager = new CommentManager();
  $reportComment = $commentManager->reportComment($commentId);

  header('Location: index.php?action=post&id=' . $postId);
}
