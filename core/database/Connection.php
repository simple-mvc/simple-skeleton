<?php

namespace Simple\Core\Database;

class Connection
{

  /**
   * Use the config file to return
   * a PDO instance
   *
   * @param $config
   * @return \PDO
   */
  public static function make($config) {
    try {
      return $pdo = new \PDO($config['dsn'], $config['login'], $config['password'], $config['options']);
    } catch(\PDOException $e) {
      die($e->getMessage());
    }
  }

}
