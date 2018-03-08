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
    public function posts($v1,$v2) {
      $posts = [];
      $req = $this->db->query('SELECT id, title, content, post_thumbnail, creation_date FROM posts ORDER BY creation_date DESC LIMIT '.$v1.','.$v2);

      while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
      $posts[] = new Post($donnees);
    }
      return $posts;
    }

    public function backendPosts() {
      $posts = [];
      $req = $this->db->query('SELECT id, title, content, post_thumbnail, creation_date FROM posts ORDER BY creation_date DESC');

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
        $req = $this->db->prepare('SELECT id, title, content, creation_date FROM posts WHERE id = ?');
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
    public function addPost($postObj) {
        $newPost = [];
        $req = $this->db->prepare('INSERT INTO posts(title, content, creation_date) VALUES (:title, :content, NOW())');
        $req->execute(array(
          'title'          => $postObj->title(),
          'content'        => $postObj->content()
        ));
        return $newPost;
    }
    /**
    * function modifyPost
    * modifie un billet
    */
    public function modifyPost($postObj) {
        $modifyPost = [];
        $req = $this->db->prepare('UPDATE posts SET title=:title, content=:content WHERE id=:id');
        $req->execute(array(
          'id' => $postObj->id(),
          'title'   => $postObj->title(),
          'content' => $postObj->content()
        ));
        return $modifyPost;
    }

    /**
    * function deletePost
    * supprime le commentaire
    * @param $id
    */
    public function deletePost($id) {
        $posts = $this->db->prepare('DELETE FROM posts WHERE id = ?');
        $affectedLines = $posts->execute(array($id));

        return $affectedLines;
    }

    /**
    * function getDb
    * connection bdd
    */
    public function getDb(){
      if($this->db === NULL) {
        $db = new PDO('mysql:host=localhost;dbname=blog-php;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->db = $db;
      }
      return $db;
    }
}
