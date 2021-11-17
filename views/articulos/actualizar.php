
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Document</title>
</head>
<body>
<input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
    <?php require 'views/header4log.php';?>
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




    <?php require 'views/footer2.php';?>

    <script src="<?php echo constant('URL'); ?>/public/js/jquery-3.6.0.min.js"></script>
    <!-- importo el javascript-->
    <script src="<?php echo constant('URL'); ?>/public/js/articulos/actualizar.js"></script>
    <!--<script src="<?php echo constant('URL'); ?>/public/js/main.js"></script> -->

</body>
</html>