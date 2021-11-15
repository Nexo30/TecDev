
<!DOCTYPE html>
<html lang="en">
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
<?php require 'views/headerT.php';?>
 <main class="datos">
 <div class="dropdown">
  <button class="mainmenubtn">Categorias</button>
  <div class="dropdown-child">
    <a>Ofertas</a>
    <a>Recomendados</a>
    <a>Piezas de Recambio</a>
    <a>Repuestos Originales</a>
    <a>Repuestos Alternativos</a>
  </div>
</div>
<div class="row">
      <?php foreach ($this->articulos as $key => $value) {
    $articulo = new Articulo();
    $articulo = $value;
    ?>
      <div class="col">
        <div class="card">
          <!--ID: <?=$value->Cod_Art;?>-->
          <img class="Img" src="<?php echo $articulo->url_img; ?>" alt="Imagen Producto" />
          <p class=""> <?=$value->Nom_art;?></p>
          <p class=""> <?=$articulo->Descripcion;?></p>
          <p class="">$ <?=$articulo->Precio;?></p>
          <input class="val" id="art-<?=$articulo->Cod_Art;?>" value="1" type="number"></p>
          <button class="Agregar" type="button" data-articulo-id="<?php echo $value->Cod_Ar; ?>">Agregar</button>
        </div>
      </div><?php }
;?>
    </div>
  </div>
</main>

<?php require 'views/footerT.php';?>
<script src="<?php echo constant('URL'); ?>/public/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo constant('URL'); ?>/public/js/articulos/listarP.js"></script>
</body>
</html>
