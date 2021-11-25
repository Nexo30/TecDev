<!DOCTYPE html>
<html lang="es">

<head>
  <?php

require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;

?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/idioma.css">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Carpeta/css/all.min.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <title>Cambio de idioma</title>
</head>

<body class="grid-container">
  <?php require_once 'views/headerT.php';?>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <input type="hidden" value="<?=$this->idioma;?>" id="idioma">
  <div id="ResultadoIdioma">
  </div>
  <?php require 'views/footerT.php';?>

  <script src="<?php echo constant('URL'); ?>/public/js/jquery-3.6.0.min.js"></script>
  <script src="<?php echo constant('URL'); ?>public/js/idioma/cambiarIdioma.js"></script>

</body>

</html>