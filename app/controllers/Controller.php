<?php

namespace Simple\App\Controllers;

use Simple\Core\App;

abstract class Controller
{

  /**
   * Return an array with errors if the values are empty
   * @param $values
   * @return array
   */
  protected function validate($values)
  {

    $errors = [];

    foreach ($values as $key => $value) {

      if (empty($value)) {
        $errors[] = ucfirst($key)." is required";
      }

    }

    return $errors;
  }

  protected function render($view, $parameters = [])
  {
    $parts = explode('.', $view);
    echo App::get('twig')->render("{$parts[0]}/{$parts[1]}.html.twig", $parameters);
  }

}