
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contactos</title>
  <link rel="stylesheet" href="public/css/contacto.css">
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
<i class="fas fa-sign-in-alt"></i>
</a>
</header>


  <nav class="navbar">
		<ul>
      <li><a href="<?php echo constant('URL'); ?>index">Inicio</a></li>
			<li><a href="<?php echo constant('URL'); ?>tienda">Tienda</a></li>
			<li><a href="<?php echo constant('URL'); ?>index">Nosotros</a></li>
			<li><a href="<?php echo constant('URL'); ?>contacto">Contactos</a></li>
		</ul>
		<div class="search-wrapper">
        <span class="las la-search"></span>
        <input type="search" name="" id="" placeholder="Escriba aqui...">
      </div>
</nav>
  <aside class="sidebar" >
  <div class="contacto__grupo" id="grupo__nombre">
				<label for="Email" class="contacto__label">Email: </label>
				<div class="contacto__grupo-input">
					<input type="text" class="contacto__input2" name="Email" id="Email" placeholder="Ejemplo@.com"></input>
				</div>
			</div>
      <div class="contacto__grupo" id="grupo__nombre">
				<label for="Mensaje" class="contacto__label">Mensaje: </label>
				<div class="contacto__grupo-input">
					<textarea type="text" class="contacto__input" name="Mensaje" id="Mensaje" placeholder="Mensaje..." rows="10" cols="45"></textarea>
				</div>
			</div>
      <div class="contacto__grupo contacto__grupo-btn-enviar">
				<button type="submit" class="contacto__btn">Enviar</button>
			</div>

  </aside>
  <footer class="footer">Pie de pagina</footer>
</body>
</html>

