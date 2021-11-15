
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HomePage</title>
  <?php require 'views/headerT.php';?>
  <link rel="stylesheet" href="public/css/index.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="public/css/Carpeta/css/all.min.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body class="grid-container">
<input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <h1>Lista del carrito</h1>
        </div><!-- end col-->
      </div><!-- end row-->
      <div class="row" id="itemsCarrito">
        <div id="carritoid"></div>


      </div>
      <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 p-4">
        <button class="btn btn-success" id="btnCompletarCarrito">completar carrito</button>
      </div>

      <div class="row" id="resPedido" style="display:none">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <h1>Resultado del pedido</h1>
            <div class="alert alert-success" role="alert">
              pedido completado con exito <span id="numPedido"></span>
            </div>
        </div><!-- end col-->
      </div><!-- end row-->

      <?php require 'views/footerT.php';?>
</body>
<script src="<?php echo constant('URL'); ?>public/js/carrito/index.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/jquery-3.6.0.min.js"></script>
</html>