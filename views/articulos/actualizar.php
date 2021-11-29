
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Carpeta/css/all.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/articulos.css">

    <title>Document</title>
</head>
<body class="grid-container">
<input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
    <?php require 'views/headerI.php';?>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <h1>Resultado actualizar</h1>
          <?php if ($this->respuesta) {;?>
      <div class="alert alert-success" role="alert">
        articulo actualizado con exito
      </div>
      <?php } else {
    ;?><div class="alert alert-danger" role="alert">
    error al actualizar
  </div>
<?php }
;?>
        </div>
      </div>
    </div>




    <?php require 'views/footerT.php';?>

    <script src="<?php echo constant('URL'); ?>/public/js/jquery-3.6.0.min.js"></script>
    <!-- importo el javascript-->
    <script src="<?php echo constant('URL'); ?>/public/js/articulos/actualizar.js"></script>
    <!--<script src="<?php echo constant('URL'); ?>/public/js/main.js"></script> -->

</body>
</html>