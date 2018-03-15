<?php

/**
 * class routeur
 * create routes and find controller
 */
class Routeur
{

  private $request;
  private $routes = [
    "backend"         =>  ["controller" => 'BackendController', "method" => 'backend'],
    "createNewPost"   =>  ["controller" => 'BackendController', "method" => 'createNewPost'],
    "post"            =>  ["controller" => 'FrontendController',   "method" => 'Post'],
    "listPosts"      =>  ["controller" => 'FrontendController',   "method" => 'listPosts'],
    "d"      =>  ["controller" => 'FrontendController',   "method" => 'listPosts']
  ];

  function __construct($request)
  {
    $this->request = $request;
  }

  public function renderController(){

    $request = $this->request;

    if(key_exists($request, $this->routes)){

    $controller = $this->routes[$request]['controller'];
    $method     = $this->routes[$request]['method'];

    $currentController = new $controller();
    $currentController->$method();
    }
    else{
      echo '404';
    }
  }

}
