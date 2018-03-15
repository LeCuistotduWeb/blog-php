<?php
/**
 *
 */
class FrontendController
{

  static public function listPosts($page) {
    $page=(!empty($_GET['page']) ? $_GET['page'] : 1);
    $Session = new Session();
    $postManager = new PostManager();
    $posts = $postManager->posts($page);
    $lastPost = $postManager->lastPost();

    require(VIEW.'frontend/listPostsView.php');
  }

  static public function post($post_id) {
    $Session = new Session();
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->post($post_id);
    $comments = $commentManager->comments($post_id);

    require(VIEW.'frontend/postView.php');
  }

  static public function addComment($post_id, $author, $comment) {
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
    header('Location: post&id=' . $post_id);
  }

  static public function reportComment($commentId,$postId) {
    $Session = new Session();
    $commentManager = new CommentManager();
    $reportComment = $commentManager->reportComment($commentId);
    $Session->setFlash('le commentaire a bien été signalé','warning');
    header('Location: post&id=' . $postId);
  }
}
