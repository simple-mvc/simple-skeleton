<?php

namespace Simple\Core;

class Router {

  /**
   * All registered routes.
   *
   * @var array
   */
  public $routes = [
    'GET'  => [],
    'POST' => [],
    'DELETE' => [],
    'PUT' => []
  ];

  /**
   * @param $file
   * @return static
   */
  public static function load($file)
  {
    $router = new static;
    require $file;
    return $router;
  }

  /**
   * Register a GET route.
   *
   * @param  string $uri
   * @param  string $controller
   */
  public function get($uri, $controller)
  {
    $this->routes['GET'][$uri] = $controller;
  }

  /**
   * Register a POST route.
   *
   * @param  string $uri
   * @param  string $controller
   */
  public function post($uri, $controller)
  {
    $this->routes['POST'][$uri] = $controller;
  }

  /**
   * Register a DELETE route.
   *
   * @param  string $uri
   * @param  string $controller
   */
  public function delete($uri, $controller)
  {
    $this->routes['DELETE'][$uri] = $controller;
  }

  /**
   * Register a PUT route.
   *
   * @param  string $uri
   * @param  string $controller
   */
  public function put($uri, $controller)
  {
    $this->routes['PUT'][$uri] = $controller;
  }

  /**
   * Remove any numbers from the URI so the route matches
   *
   * @param $uri
   * @return null|string|string[]
   */
  public function parseUri($uri)
  {
    return preg_replace("|([0-9]+)(?=[^\/]*)|", "{id}", $uri);
  }

  /**
   * @param $uri
   * @param $requestMethod
   * @return mixed
   * @throws \Exception
   */
  public function direct($uri, $requestMethod)
  {
    $id = explode('/', $uri);

    $uri = $this->parseUri($uri);

    if ( ! array_key_exists($uri, $this->routes[$requestMethod])) {
      return $this->callAction('PagesController', 'error');
    }

    $params = explode('@', $this->routes[$requestMethod][$uri]);

    if (isset($id[1])) {
      $params[] = $id[1];
    }

    return $this->callAction(
      ...$params
    );
  }

  /**
   * Load and call the relevant controller action
   *
   * @param $controller
   * @param $action
   * @param array $params
   * @return mixed
   * @throws \Exception
   */
  protected function callAction($controller, $action, $params = [])
  {

    $controller =  "Simple\\App\\Controllers\\{$controller}";
    $controller = new $controller;

    if (! method_exists($controller, $action)) {
      throw new \Exception("Controller does not respond to the action {$action}.");
    }

    if ($params) {
      return $controller->$action($params);
    }

    return $controller->$action();
  }
}
