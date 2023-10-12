<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  body {
    margin: 0;
    color: #fff;
    background-color: #000;
  }
  </style>
  <title>PHPiggy</title>
</head>

<body>
  <h1>PHPiggy</h1>
  <?php
    var_dump(__DIR__);

    echo "<br>";

    $app = include_once __DIR__ . "/../src/App/bootstrap.php";

    $app->run();

  ?>
</body>

</html>
