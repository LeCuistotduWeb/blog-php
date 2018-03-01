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
    public function posts() {
      $posts = [];
      $req = $this->db->query('SELECT id, title, content, post_thumbnail, creation_date FROM posts ORDER BY creation_date DESC LIMIT 1, 5');

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
    public function post($postId) {
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));

        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        $post = new Post($donnees);

        return $post;
    }

    /**
    * function getLastPost
    * retourne le dernier article
    */
    public function lastPost() {

      $req = $this->db->query('SELECT id, title, content, creation_date, post_thumbnail FROM posts ORDER BY creation_date DESC LIMIT 1');

      while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
      $lastPost[] = new Post($donnees);
      }
      return $lastPost;
    }

    /**
    * function postCount
    * compte le nombre de post
    */
    public function postCount() {
        $req = $this->db->query('SELECT COUNT(*) as postNb FROM posts');
        $donnees = $req->fetch(PDO::FETCH_ASSOC);

        return $donnees['postNb'];
    }

    /**
    * function addPost
    * ajoute un billet
    */
    public function addPost($title, $content, $post_thumbnail) {
        $newPost = [];
        $req = $this->db->prepare('INSERT INTO posts(title, content, post_thumbnail, creation_date) VALUES(:title, :content, :post_thumbnail, NOW()');
        $req->execute(array(
          'title'          => $title,
          'content'        => $content,
          'post_thumbnail' => $post_thumbnail
        ));
        return $newPost;
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
