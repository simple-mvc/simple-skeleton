<?php

namespace Simple\Core;

/**
 * Dependency injection container
 *
 * Class App
 * @package Simple\Core
 */
class App
{

  protected static $registry = [];

  /**
   * Store data into the container
   * Ex.: App::bind('config', require '../config.php')
   *
   * @param $key
   * @param $value
   */
  public static function bind($key, $value)
  {
    static::$registry[$key] = $value;
  }

  /**
   * Get data from the container
   * Ex.: App::get('database')
   *
   * @param $key
   * @return mixed
   * @throws \Exception
   */
  public static function get($key)
  {
    if (!array_key_exists($key, static::$registry))
    {
      throw new \Exception("No {$key} is bound in the container");
    }
    return static::$registry[$key];
  }
}