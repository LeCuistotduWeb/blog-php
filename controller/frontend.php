<?php
// Chargement de l'autoloader
require_once 'model/Autoloader.php';

function listPosts() {
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->posts(1,4); // Appel d'une fonction de cet objet
    $lastPost = $postManager->lastPost(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post($post_id) {
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->post($post_id);
    $comments = $commentManager->comments($post_id);

    require('view/frontend/postView.php');
}

function login() {
  require('view/frontend/loginView.php');
}

function addComment($post_id, $author, $comment) {
    $commentManager = new CommentManager();
    $commentObj = new Comment(array(
      'post_id' => $post_id,
      'author'  => $author,
      'comment' => $comment
    ));
    $newComment = $commentManager->addComment($commentObj);

    if ($newComment === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $post_id);
    }
}

function reportComment($commentId,$postId) {
  $commentManager = new CommentManager();
  $reportComment = $commentManager->reportComment($commentId);

  header('Location: index.php?action=post&id=' . $postId);
}
