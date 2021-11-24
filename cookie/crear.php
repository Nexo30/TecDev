<?php setcookie("idioma", "en", time() + 60 * 60 * 24, "/");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cC</title>
</head>
<body>
  <h1>Cookie creada</h1>
  <h1><?=$_GET['param01'] ?? "no definido";?></h1>
  <h1><?=$_GET['param02'] ?? "no definido";?></h1>
</body>
</html>