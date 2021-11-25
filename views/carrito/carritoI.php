<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="<?php echo constant('URL'); ?>public/css/tienda.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Carpeta/css/all.min.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <title>Carrito</title>
</head>

<body class="grid-container">
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require 'views/headerI.php';?>
  <div class="cuerpo">
    <div class="row">
      <div class="col">
        <h1 class="titulo">Lista del Carrito</h1>
      </div><!-- end col-->
    </div><!-- end row-->
    <div class="row" id="itemsCarrito">
      <div id="carritoid"></div>
        </div>
      </div>





      <?php require 'views/footerT.php';?>





      <script src="<?php echo constant('URL'); ?>public/js/jquery-3.6.0.min.js"></script>
      <script src="<?php echo constant('URL'); ?>public/js/carrito/index.js"></script>

</body>


</html>