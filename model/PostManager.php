<?php
class PostManager
{
    private $db;

    /**
    * function getPosts
    * retourne tout les article
    */
    public function getPosts() {
        $db = $this->getDb();
        $req = $db->query('SELECT id, title, content, post_thumbnail, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    /**
    * function getPosts
    * retourne un article a l'aide de l'id
    * @param $postid
    */
    public function getPost($postId) {
        $db = $this->getDb();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    /**
    * function getLastPost
    * retourne le dernier article
    */
    public function getLastPost() {
        $db = $this->getDb();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 1');

        return $req;
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
