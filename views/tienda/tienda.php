
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda</title>
  <link rel="stylesheet" href="public/css/tienda.css">
  <link rel="stylesheet" href="public/css/Carpeta/css/all.min.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body class="grid-container">
<header class="header">

<?php
$imagen = '<img src="public/imagenes/articulos/' . "Logo" . '.png" / width="200px" heigth="100px" ; > ';
echo $imagen;
?>
<a href="<?php echo constant('URL'); ?>dlogin" class="ingresar">
<i class="fas fa-shopping-cart"></i>
</a>
</header>
  <nav class="navbar">
		<ul>
    <li><a href="<?php echo constant('URL'); ?>index">Inicio</a></li>
			<li><a href="<?php echo constant('URL'); ?>tienda">Tienda</a></li>
			<li><a href="<?php echo constant('URL'); ?>index#sidebar">Nosotros</a></li>
			<li><a href="<?php echo constant('URL'); ?>contacto">Contactos</a></li>
		</ul>
    <div class="search-wrapper">
        <span class="las la-search"></span>
        <input type="search" name="" id="" placeholder="Escriba aqui...">
      </div>
</nav>
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





  <footer class="footer">Pie de pagina</footer>
</body>
</html>
