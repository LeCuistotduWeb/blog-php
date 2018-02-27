<?php

class Comment
{
    private $id;
    private $post_id;
    private $author;
    private $comment;
    private $comment_date;

    /**
     * function hydrate
     * @ $données
     */
    public function hydrate(array $donnees) {
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
    public getAuthor() { return $this->author; }
    public getComment() { return $this->comment; }
    public getId() { return $this->id; }
    public getPost_Id() { return $this->post_id; }
    public getComment_Date() { return $this->comment_date; }

    // setters
    public setId($id) {
      $id = (int) $id;

      if ($id > 0)
      {
        $this->id = $id;
      }
    }
    public setPost_id($postid) {
      $postid = (int) $postid;

      if ($postid > 0)
      {
        $this->$postid = $postid;
      }
    }
    public setComment($comment) {
      $comment = (string) $comment;
      $this->comment = $comment;
    }
    public setAuthor($author) {
      $author = (string) $author;
      $this->author = $author;
    }
}
