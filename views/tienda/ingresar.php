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
<?php require 'views/headerI.php';?>
 <main class="datos" >Productos

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
