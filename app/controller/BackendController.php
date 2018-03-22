<?php
/**
 *
 */
class BackendController
{

  public static function backend() {
    $Session = new Session();
    $commentManager = new CommentManager();
    $postManager = new PostManager();
    $postCount = $postManager->postCount();
    $commentCount = $commentManager->commentCount();
    $reportCount = $commentManager->reportCount();

    $posts = $postManager->backendPosts();
    $reportList = $commentManager->reportList();

    if(isset($id)){
      $deleteComment = $commentManager->deleteComment($id);
    }
    require(VIEW.'backend/backendView.php');
  }

  public static function createNewPost() {
    $Session = new Session();
    require(VIEW.'backend/postEditView.php');
  }

  public static function editPost($post_id) {
    $Session = new Session();
    $postManager = new PostManager();
    $post = $postManager->post($post_id);
    require(VIEW.'backend/postModifyView.php');
  }

  public static function modifyPost($post_id, $title, $content, $post_thumbnail) {
    $Session = new Session();
    $postManager = new PostManager();
    $modifyPost = $postManager->addThumbnail($post_thumbnail);
    if($post_thumbnail['error'] == 0){
      $postObj = new Post(array(
        'id'             => $post_id,
        'title'          => $title,
        'content'        => $content,
        'post_thumbnail' => $post_thumbnail['name']
      ));
    }else{
      $postObj = new Post(array(
        'id'             => $post_id,
        'title'          => $title,
        'content'        => $content
      ));
    }
    $modifyPost = $postManager->modifyPost($postObj);
    if ($modifyPost === false) {
        Session::setFlash('Impossible de modifier le billet !','danger');
        header('Location: backend');
    }
    else {
        Session::setFlash('Le billet a bien été modifié','success');
        header('Location: backend');
      }
  }

  public static function addPost($title, $content, $post_thumbnail) {
    $Session = new Session();
    $postManager = new PostManager();
    $modifyPost = $postManager->addThumbnail($post_thumbnail);
    $postObj = new Post(array(
      'title'            => $title,
      'content'          => $content,
      'post_thumbnail'   => $post_thumbnail['name']
    ));
    $addPost = $postManager->addPost($postObj);
    if ($newPost === false) {
      Session::setFlash('Impossible d\'ajouter le billet !','danger');
    }
    else {
      Session::setFlash('Le billet a bien été ajouté','success');
    }
    header('Location: backend');
  }

  public static function deleteComment($id) {
    $Session = new Session();
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->deleteComment($id);

    if ($affectedLines === false) {
      Session::setFlash('Impossible de supprimer le commentaire !','danger');
    }
    else {
      Session::setFlash('Le commentaire a bien été supprimé','success');
    }
    header('Location: backend');
  }

  public static function deletePost($id) {
    $Session = new Session();
    $postManager = new PostManager();
    $affectedLines = $postManager->deletePost($id);

    $commentManager = new CommentManager();
    $affectedLines = $commentManager->deleteCommentPost($id);

    if ($affectedLines === false) {
      Session::setFlash('Impossible de supprimer le billet !','danger');
    }
    else {
      Session::setFlash('le billet a bien été supprimé','success');
    }
    header('Location: backend');
  }

  public static function authorizedComment($commentId) {
    $Session = new Session();
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->authorizedComment($commentId);

    if ($affectedLines === false) {
      Session::setFlash('Impossible d\'autorisé le commentaire !','danger');
    }
    else {
      Session::setFlash('Le commentaire a bien été validé','success');
    }
    header('Location: backend');
  }
}
