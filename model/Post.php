<?php
/**
 * class post
 */
class Post extends Table
{
    private $id;
    private $title;
    private $content;
    private $creation_date;
    private $post_thumbnail;

    // getters
    public function id() { return $this->id; }
    public function title() { return $this->title; }
    public function content() { return $this->content; }
    public function creation_date() { return $this->creation_date; }
    public function post_thumbnail() { return $this->post_thumbnail; }

    // setters
    public function setId($id) {
      $id = (int) $id;

      if ($id > 0)
      {
        $this->id = $id;
      }
    }
    public function setTitle($title) {
      $title = (string) $title;
      $this->title = $title;
    }
    public function setContent($content) {
      $content = (string) $content;
      $this->content = $content;
    }
    public function setCreation_date($creation_date) {
      if (preg_match('/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/', $creation_date))
      {
        $this->creation_date = $creation_date;
      }
    }
    public function setPost_thumbnail($post_thumbnail) {
      $this->post_thumbnail = $post_thumbnail ;
    }
}
