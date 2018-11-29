<?php

namespace Simple\Core;

class Flash
{
  /**
   * Store a flash message into the session
   *
   * @param $level
   * @param $message
   * @return mixed
   */
  public static function message($level, $message)
  {
    return $_SESSION['flash_message'][$level] = $message;
  }
}