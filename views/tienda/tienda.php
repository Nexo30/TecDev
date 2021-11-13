
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
<body class="grid-container">
<?php require 'views/headerT.php';?>
 <main class="datos"><?php foreach ($this->articulos as $row) {; # code...
$articulo = $row;
    //echo constant('URL') . "public/imagenes/articulos/" . $articulo->url_img;
    ?><div class="col-lg-4 col-md-6 col-sm-6 col-xs-4 p-3">
      <div class="card">
        <img class="card-img-top" src="<?php echo constant('URL') . "public/imagenes/articulos/" . $articulo->url_img; ?>" alt="Card image cap"/>
        <div class="card-body">
          <h5 class="card-title"><?=$articulo->Nom_art;?></h5>
          <p class="card-text"><?=$articulo->Descripcion;?></p>
          <p class="card-text">$ <?=$articulo->Precio;?></p>
          <input id="art-<?=$articulo->Cod_Art;?>" class="form-control"
          value="1" type="number"
          ></p>
          <button type="button" class="btn btn-primary btnAgregar"
          data-articulo-id="<?php echo $articulo->Cod_art; ?>">Agregar</button>
        </div>

      </div><!-- end card -->
    </div><!-- end col --><?php }
;?>
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

</main>

<?php require 'views/footerT.php';?>
</body>
</html>
