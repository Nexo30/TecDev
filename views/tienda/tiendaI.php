<?php

require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda</title>
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/tienda.css">
  <link rel="stylesheet" href="tienda.css">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Carpeta/css/all.min.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
<body class="grid-container">
<?php require 'views/headerI.php';?>
 <main class="datos">
 <div class="dropdown">
  <button class="mainmenubtn"><?php echo Translate::__('Cat'); ?></button>
  <div class="dropdown-child">
    <a><?php echo Translate::__('Ofe'); ?></a>
    <a><?php echo Translate::__('Rec'); ?></a>
    <a><?php echo Translate::__('PiRe'); ?></a>
    <a><?php echo Translate::__('ReOr'); ?></a>
    <a><?php echo Translate::__('ReAl'); ?></a>
  </div>
</div>
<div class="row">
      <?php foreach ($this->articulos as $datos => $value) {
    $articulo = new Articulo();
    $articulo = $value;
    ?>
      <div class="col">
        <div class="card">
          <!--ID: <?=$value->Cod_Art;?>-->
          <img class="Img" src="<?php echo $articulo->urlP; ?>" alt="Imagen Producto" />
          <p class=""> <?=$value->Nom_art;?></p>
          <p class=""> <?=$value->Descripcion;?></p>
          <p class="">$ <?=$value->Precio;?></p>
          <input class="val" id="art-<?=$articulo->Cod_Art;?>" value="1" type="number"></p>
          <button class="btnAgregar" type="button" data-id="<?php echo $value->Cod_Art; ?>"><?php echo Translate::__('Add'); ?></button>
        </div>
      </div><?php }
;?>
    </div>
  </div>
</main>

<?php require 'views/footerT.php';?>
<script src="<?php echo constant('URL'); ?>/public/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/articulos/listarP.js"></script>
</body>
</html>
