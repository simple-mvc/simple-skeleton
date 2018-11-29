<?php

require '../vendor/autoload.php';
require '../core/bootstrap.php';

use Simple\Core\{Router, Request};

Router::load('../app/routes.php')
  ->direct(Request::uri(), Request::method());
