<?php

function listPosts() {
  $Session = new Session();
  $postManager = new PostManager();
  $posts = $postManager->posts(1,50);
  $lastPost = $postManager->lastPost();

  require('view/frontend/listPostsView.php');
}

function post($post_id) {
  $Session = new Session();
  $postManager = new PostManager();
  $commentManager = new CommentManager();

  $post = $postManager->post($post_id);
  $comments = $commentManager->comments($post_id);

  require('view/frontend/postView.php');
}

function addComment($post_id, $author, $comment) {
  $Session = new Session();
  $commentManager = new CommentManager();
  $commentObj = new Comment(array(
    'post_id' => $post_id,
    'author'  => $author,
    'comment' => $comment
  ));
  $newComment = $commentManager->addComment($commentObj);

  if ($newComment === false) {
      $Session->setFlash('Impossible d\'ajouter le commentaire !','danger');
  }
  else {
    $Session->setFlash('le commentaire a bien été ajouté','success');
  }
  header('Location: index.php?action=post&id=' . $post_id);
}

function reportComment($commentId,$postId) {
  $Session = new Session();
  $commentManager = new CommentManager();
  $reportComment = $commentManager->reportComment($commentId);
  $Session->setFlash('le commentaire a bien été signalé','warning');
  header('Location: index.php?action=post&id=' . $postId);
}
