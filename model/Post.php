<?php

class Post
{
    private $id;
    private $title;
    private $content;
    private $creation_date;
    private $post_thumbnail;

    /**
     * function hydrate
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
    public getId() { return $this->id; }
    public getTitle() { return $this->title; }
    public getContent() { return $this->content; }
    public getCreationDate() { return $this->creation_date; }
    public getPostThumbnail() { return $this->post_thumbnail; }


    // setters
    public setId($id) {
      $id = (int) $id;

      if ($id > 0)
      {
        $this->_id = $id;
      }
    }
    public setTitle($title) {
      $title = (string) $title;
      $this->_title = $title;
    }
    public setContent($content) {
      $content = (string) $content;
      $this->_content = $content;
    }
    public setCreationDate($creation_date) {
      if (preg_match('/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/', $creation_date))
      {
        $this->_crea = $creation_date;
      }
    }
    public setPostThumbnail($post_thumbnail) {
        return $this->post_thumbnail;
    }
}
