<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body class="grid-container grid-y align-center-middle" style="min-height: 100vh;">
    <h1>Sorry... Can’t find page “<?= trim($_SERVER['REQUEST_URI'], '/'); ?>”.</h1>
    <p class="lead margin-bottom-0"><a href="/">Go back to home</a></p>
  </body>
</html>


