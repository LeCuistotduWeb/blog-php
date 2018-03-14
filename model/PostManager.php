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
    public function posts($page) {
      $limite = (int) 4;

      $posts = [];
      $req = $this->db->query('SELECT id, title, content, post_thumbnail, creation_date FROM posts ORDER BY creation_date DESC LIMIT '.(($page - 1) * $limite).','.$limite);

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
        $req = $this->db->prepare('SELECT id, title, content, post_thumbnail, DATE_FORMAT(creation_date, "%d-%m-%Y") AS creation_date FROM posts WHERE id = ?');
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

      $req = $this->db->query('SELECT id, title, content, creation_date , post_thumbnail FROM posts ORDER BY creation_date DESC LIMIT 1');

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
        $req = $this->db->prepare('INSERT INTO posts(title, content, post_thumbnail, creation_date) VALUES (:title, :content, :post_thumbnail, NOW())');
        $req->execute(array(
          'title'          => $postObj->title(),
          'content'        => $postObj->content(),
          'post_thumbnail' => $postObj->post_thumbnail()
        ));
        return $newPost;
    }
    /**
    * function modifyPost
    * modifie un billet
    */
    public function modifyPost($postObj) {
        $modifyPost = [];
        $req = $this->db->prepare('UPDATE posts SET title=:title, content=:content, post_thumbnail=:post_thumbnail WHERE id=:id');
        $req->execute(array(
          'id' => $postObj->id(),
          'title'   => $postObj->title(),
          'content' => $postObj->content(),
          'post_thumbnail' => $postObj->post_thumbnail()
        ));
        return $modifyPost;
    }
    /**
    * function deletePost
    * supprime le billet
    * @param $id
    */
    public function deletePost($id) {
        $posts = $this->db->prepare('DELETE FROM posts WHERE id = ?');
        $affectedLines = $posts->execute(array($id));
        return $affectedLines;
    }
    /**
    * function addThumbnail
    * verifie puis ajoute une image
    */
    public function addThumbnail($post_thumbnail){
      if ($post_thumbnail[error] === 0){
        $ext = strtolower(substr($post_thumbnail['name'],-3)); //recupere l'extension
        $allow_ext = array("jpg","png","gif","jpeg"); //extensions acceptée

        if(in_array($ext,$allow_ext)){ //verifie l'extension sinon message erreur
          move_uploaded_file($post_thumbnail['tmp_name'], "public/img/".$post_thumbnail['name']);
        }
      }

      return $post_thumbnail;
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
