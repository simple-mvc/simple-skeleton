<?php

session_start();

use Simple\Core\App;
use Simple\Core\Database\QueryBuilder;
use Simple\Core\Database\Connection;

$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, [
  'cache' => false,
  'debug' => true
]);
$twig->addExtension(new Twig_Extension_Debug());
$twig->addGlobal('session', $_SESSION);

App::bind('twig', $twig);
App::bind('config', require '../config.php');
App::bind('env', App::get('config')['env']);
App::bind('debug', App::get('config')['debug']);
App::bind('database', new QueryBuilder(
  Connection::make(App::get('config')['dev'])
));