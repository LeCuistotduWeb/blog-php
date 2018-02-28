<?php
/**
 * class comment
 */
class Comment
{
    private $id;
    private $post_id;
    private $author;
    private $comment;
    private $comment_date;

    public function __construct(array $donnees) {
      $this->hydrate($donnees);
    }

    /**
     * function hydrate
     */
    private function hydrate(array $donnees) {
      foreach ($donnees as $key => $value)
      {
        // On récupère le nom du setter correspondant à l'attribut.
        $method = 'set'.ucfirst($key);

        // Si le setter correspondant existe.
        if (method_exists($this, $method))
        {
          // On appelle le setter.
          $this->$method($value);
        }
      }
    }

    // getters
    public function id() { return $this->id; }
    public function post_Id() { return $this->post_id; }
    public function author() { return $this->author; }
    public function comment() { return $this->comment; }
    public function comment_date() { return $this->comment_date; }

    // setters
    public function setId($id) {
      $id = (int) $id;

      if ($id > 0)
      {
        $this->id = $id;
      }
    }
    public function setPost_id($postid) {
      $postid = (int) $postid;

      if ($postid > 0)
      {
        $this->$postid = $postid;
      }
    }
    public function setAuthor($author) {
      $author = (string) $author;
      $this->author = $author;
    }
    public function setComment($comment) {
      $comment = (string) $comment;
      $this->comment = $comment;
    }
    public function setcomment_date($comment_date) {
      $this->comment_date = $comment_date;
    }
}
