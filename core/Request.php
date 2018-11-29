<?php

namespace Simple\Core;

class Request
{
  /**
   * Fetch the requested URI.
   *
   * @return string
   */
  public static function uri()
  {
    return trim(
      parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
    );
  }

  /**
   * Fetch the requested method.
   *
   * @return string
   */
  public static function method()
  {
    if (isset($_POST['_method'])) {
      return $_POST['_method'];
    }
    return $_SERVER['REQUEST_METHOD'];
  }
}