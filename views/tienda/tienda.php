
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda</title>
  <link rel="stylesheet" href="public/css/tienda.css">
</head>
<body class="grid-container">
<header class="header">

<?php
$imagen = '<img src="public/imagenes/articulos/' . "Logo" . '.png" / width="200px" heigth="100px" ; > ';
echo $imagen;
?>
<a href="<?php echo constant('URL'); ?>dlogin" class="ingresar"><?php
$imagen = '<img src="public/imagenes/articulos/' . "Perfil" . '.png" / width="70px" heigth="70px" ; > ';
echo $imagen;
?></a>
<a href="<?php echo constant('URL'); ?>dlogin" class="ingresar">Ingresar
</a>
</header>
  <nav class="navbar">
		<ul>
    <li><a href="<?php echo constant('URL'); ?>index">Inicio</a></li>
			<li><a href="<?php echo constant('URL'); ?>tienda">Tienda</a></li>
			<li><a href="<?php echo constant('URL'); ?>index">Nosotros</a></li>
			<li><a href="<?php echo constant('URL'); ?>contacto">Contactos</a></li>
		</ul>
</nav>
 <main class="datos" >Productos


<div class="row"> Prueba

</div>
</main>





  <footer class="footer">Pie de pagina</footer>
</body>
</html>
