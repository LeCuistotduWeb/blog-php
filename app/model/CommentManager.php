<?php
class CommentManager extends Database
{
    private $reportNbn=[];

    /**
    * function getComments
    * retourne les commentaires d'un article
    * @param $postid
    */
    public function comments($postId) {
      $comments = [];
      $req = $this->db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d-%m-%Y à %Hh%imin") AS comment_date_fr FROM comments WHERE post_id = ? AND report = 0 ORDER BY comment_date DESC');
      $req->execute(array($postId));

      while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
      $comments[] = new Comment($donnees);
    }
      return $comments;
    }

    /**
    * function reportComment
    * compte le nombre de commentaires total
    */
    public function commentCount() {
        $req = $this->db->query('SELECT COUNT(*) as commentNb FROM comments');
        $donnees = $req->fetch(PDO::FETCH_ASSOC);

        return $donnees['commentNb'];
    }

    /**
    * function postComment
    * ajoute un commmentaire
    */
    public function addComment($commentObj) {
        $newComment = [];
        $req = $this->db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(:post_id, :author, :comment, NOW())');
        $req->execute(array(
          'post_id' => $commentObj->post_id(),
          'author'  => $commentObj->author(),
          'comment' => $commentObj->comment()
        ));

        return $newComment;
    }

    /**
    * function deleteComment
    * supprime le commentaire
    * @param $id
    */
    public function deleteComment($id) {
        $comments = $this->db->prepare('DELETE FROM comments WHERE id = ?');
        $affectedLines = $comments->execute(array($id));

        return $affectedLines;
    }
    /**
    * function deleteCommentPost
    * supprime les commentaire d'un billet
    * @param $id
    */
    public function deleteCommentPost($id) {
        $comments = $this->db->prepare('DELETE FROM comments WHERE post_id = ?');
        $affected = $comments->execute(array($id));

        return $affected;
    }

    /**
    * function modifyComment
    * modifie le commentaire
    * @param $id
    */
    public function authorizedComment($commentId) {
        $comments = $this->db->prepare('UPDATE comments SET report=:report WHERE id=:id');
        $affectedLines = $comments->execute(array(
          'report' => 0,
          'id'     => $commentId
        ));

        return $affectedLines;
    }

    /**
    * function reportList
    * retourne la liste des commentaires signalés
    */
    public function reportList() {
      $reportList = [];
      $req = $this->db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d-%m-%Y à %Hh%imin") AS comment_date_fr, report FROM comments WHERE report = true ORDER BY comment_date DESC');

      while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
      $reportList[] = new Comment($donnees);
    }
      return $reportList;
    }

    /**
    * function reportComment
    * signal le commentaire au backend
    * @param $commentid
    */
    public function reportComment($commentId) {
        $req = $this->db->prepare('UPDATE comments SET report=:report WHERE id=:id');
        $affectedLines = $req->execute(array(
          'report' => true,
          'id'     => $commentId
        ));

        return $affectedLines;
    }

    /**
    * function reportCount
    * compte le nombre de commentaires signalés
    */
    public function reportCount() {
        $req = $this->db->query('SELECT COUNT(*) as reportNb FROM comments WHERE report=true');
        $donnees = $req->fetch(PDO::FETCH_ASSOC);

        return $donnees['reportNb'];
    }
}
