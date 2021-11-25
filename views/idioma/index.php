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
  <title>Cambio de Idioma</title>
</head>
<body class="grid-container" >
<?php require_once 'views/headerT.php';?>
<input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
<div class="datos">
    <div class="">
        <div class="">
        <h1 class="changelg"><?php echo Translate::__('Change_lg'); ?></h1>
    </div>

    <form class="" action="<?php echo constant('URL'); ?>idioma/cambiarIdioma" method="post"
        id="form01">
        <div class="form-group">
        <label for="exampleFormControlSelect1"><?php echo Translate::__('Select'); ?></label>
        <select class="form-control" id="exampleFormControlSelect1" name="idioma">
          <option>es</option>
          <option>en</option>
        </select>
      </div>


        <div class="">
            <button type="submit" class="btn btn-primary"><?php echo Translate::__('Change'); ?></button>
        </div>
      </form>
</div>
</div>
      <?php require_once 'views/footerT.php';?>
      <script src="<?php echo constant('URL'); ?>/public/js/jquery-3.6.0.min.js"></script>
</body>

</html>