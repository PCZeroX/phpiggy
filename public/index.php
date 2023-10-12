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

    .container {
      max-width: 764px;
      margin-inline: auto;
    }
  </style>
  <title>PHPiggy</title>
</head>

<body>
  <div class="container">
    <h1>PHPiggy</h1>
    <?php
    include_once __DIR__ . "/../src/App/functions.php";

    $app = include_once __DIR__ . "/../src/App/bootstrap.php";

    $app->run();

    ?>
  </div>
</body>

</html>
