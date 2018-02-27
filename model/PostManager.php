<?php
class PostManager
{
    private $db;


    public function __construct(){
      $db = $this->getDb();
    }
    /**
    * function getPosts
    * retourne tout les article
    */
    public function getPosts() {
      $posts = [];
      $req = $this->db->query('SELECT id, title, content, post_thumbnail, creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

      while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
      $posts[] = new Post($donnees);
    }
      return $posts;
    }

    /**
    * function getPosts
    * retourne un article a l'aide de l'id
    * @param $postid
    */
    public function getPost($postId) {
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));

        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
        $post[] = new Post($donnees);
        }
        return $post;
    }

    /**
    * function getLastPost
    * retourne le dernier article
    */
    public function getLastPost() {

      $req = $this->db->query('SELECT id, title, content, creation_date, post_thumbnail FROM posts ORDER BY creation_date DESC LIMIT 1');

      while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
      $lastPost[] = new Post($donnees);
      }
      return $lastPost;
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
