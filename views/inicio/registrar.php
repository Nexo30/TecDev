<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HomePage</title>
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/index.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Carpeta/css/all.min.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body class="grid-container">
<?php require 'views/headerT.php';?>
  <aside class="sidebar2"></aside>
  <aside name="sidebar" id="sidebar" class="sidebar3" ></aside>
  <article class="main"></article>
  <?php require 'views/footerT.php';?>
</body>
</html>

