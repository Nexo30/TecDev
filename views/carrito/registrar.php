<?php

require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link href="<?php echo constant('URL'); ?>public/css/tienda.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Carpeta/css/all.min.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <title>Carrito</title>
</head>

<body class="grid-container">
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require 'views/headerT.php';?>
  <div class="cuerpo">
    <div class="row">
      <div class="col">
        <h1 class="titulo">Lista del Carrito</h1>
      </div><!-- end col-->
    </div><!-- end row-->
    <div class="row" id="itemsCarrito">
      <div id="carritoid"></div>

        </div>
        <div class="col">
        <button class="completar" id="btnCompletarCarrito"><?php echo Translate::__('Car'); ?></button>
      </div>
      </div>
      <div class="low" id="resPedido" style="display:none">
        <div class="col">
          <h1>Resultado del pedido</h1>
          <div class="alerta" role="alert">
            pedido completado con exito <span id="numPedido"></span>
          </div>
        </div>
        </div><!-- end row-->






      <?php require 'views/footerT.php';?>





      <script src="<?php echo constant('URL'); ?>public/js/jquery-3.6.0.min.js"></script>
      <script src="<?php echo constant('URL'); ?>public/js/carrito/index.js"></script>

</body>


</html>