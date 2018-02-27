<?php
class CommentManager
{
    private $db;

    /**
    * function getComments
    * retourne les commentaires d'un article
    * @param $postid
    */
    public function getComments($postId)
    {
        $db = $this->getDb();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d.%m.%Y à %Hh %imin %ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    /**
    * function postComment
    * ajour un commmentaire
    */
    public function postComment($postId, $author, $comment)
    {
        $db = $this->getDb();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    /**
    * function deleteComment
    * supprime le commentaire
    * @param $id
    */
    public function deleteComment($id)
    {
        $db = $this->getDb();
        $comments = $db->prepare('DELETE FROM comments WHERE id = ?');
        $affectedLines = $comments->execute(array($id));

        return $affectedLines;
    }

    /**
    * function modifyComment
    * modifie le commentaire
    * @param $id
    */
    public function modifyComment($id, $author, $comment)
    {
        $db = $this->getDb();
        $comments = $db->prepare('UPDATE comments SET id=:id, author=:author, comment=:comment, comment_date=NOW() WHERE 1');
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
