<?php

return [
  'env' => 'dev',
  'debug' => true,
  'prod' => [
    'dsn' => 'mysql:host={host};dbname={database}',
    'login' => '{login}',
    'password' => '{password}',
    'options' => []
  ],
  'dev' => [
    'dsn' => 'mysql:host=localhost;dbname=simple',
    'login' => 'root',
    'password' => 'root',
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ],
  'admin' => [
    'username' => '',
    'password' => '',
  ]
];
