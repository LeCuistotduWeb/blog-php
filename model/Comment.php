<?php
/**
 * class comment
 */
class Comment extends Table
{
    private $id;
    private $post_id;
    private $author;
    private $comment;
    private $comment_date;

    // getters
    public function author() { return $this->author; }
    public function comment() { return $this->comment; }
    public function id() { return $this->id; }
    public function post_Id() { return $this->post_id; }
    public function comment_Date() { return $this->comment_date; }

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
    public function setComment($comment) {
      $comment = (string) $comment;
      $this->comment = $comment;
    }
    public function setAuthor($author) {
      $author = (string) $author;
      $this->author = $author;
    }
}
