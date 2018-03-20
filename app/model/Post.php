<?php
/**
 * class post
 */
class Post
{
    private $id;
    private $title;
    private $content;
    private $creation_date;
    private $creation_date_fr;
    private $post_thumbnail;

    function __construct(array $donnees) {
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
    public function title() { return $this->title; }
    public function content() { return $this->content; }
    public function creation_date() { return $this->creation_date; }
    public function creation_date_fr() { return $this->creation_date_fr; }
    public function post_thumbnail() { return $this->post_thumbnail; }
    public function excerpt(){ return $html = substr($this->content, 0, 250) . '...'; }

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
    public function setCreation_date_fr($creation_date_fr) {


        $this->creation_date_fr = $creation_date_fr;

    }
    public function setPost_thumbnail($post_thumbnail) {
      $post_thumbnail = (string) $post_thumbnail;
      $this->post_thumbnail = $post_thumbnail ;
    }
}
