<?php
class CommentManager
{
    private $db;

    public function __construct(){
      $db = $this->getDb();
    }

    /**
    * function getComments
    * retourne les commentaires d'un article
    * @param $postid
    */
    public function getComments($postId) {
      $comments = [];
      $req = $this->db->prepare('SELECT id, author, comment, comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
      $req->execute(array($postId));
      while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
      $comments[] = new Comment($donnees);
    }
      return $comments;
    }

    /**
    * function postComment
    * ajour un commmentaire
    */
    public function postComment($postId, $author, $comment) {
        $comments = $this->db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
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
    * function modifyComment
    * modifie le commentaire
    * @param $id
    */
    public function modifyComment($id, $author, $comment) {
        $comments = $this->db->prepare('UPDATE comments SET id=:id, author=:author, comment=:comment, comment_date=NOW() WHERE 1');
        $affectedLines = $comments->execute(array($id, $author, $comment));

        return $affectedLines;
    }

    public function getDb(){
      if($this->db === NULL) {
        $db = new PDO('mysql:host=localhost;dbname=blog-php;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->db = $db;
      }
      return $db;
    }
}
