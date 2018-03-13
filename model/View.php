<?php

/**
 * class View
 */
class View
{

  private $template;

  function __construct($template)
  {
    $this->template = $template;
  }

  public function render($var = [], $gabarit = 'template'){
    ob_start();
    include($view.'php');
    $content = ob_get_clean();
    include_once('view/frontend/'.$gabarit.'.php');
  }
}
