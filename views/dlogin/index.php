<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="public/css/login.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body class="grid-container">
<header class="header">

<?php
$imagen = '<img src="public/imagenes/articulos/' . "Logo" . '.png" / width="200px" heigth="100px" ; > ';
echo $imagen;
?>
</header>
   <nav class="navbar">
		<ul>
      <li><a href="<?php echo constant('URL'); ?>index">Inicio</a></li>
			<li><a href="<?php echo constant('URL'); ?>tienda">Tienda</a></li>
			<li><a href="#sidebar">Nosotros</a></li>
			<li><a href="<?php echo constant('URL'); ?>contacto">Contactos</a></li>
		</ul>
		<div class="search-wrapper">
        <span class="las la-search"></span>
        <input type="search" name="" id="" placeholder="Escriba aqui...">
      </div>
</nav>
  <aside class="cuerpo">
  <div class="login__grupo" id="grupo__nombre2">
				<label for="Usuario" class="login__label">Usuario: </label>
				<div class="login__grupo2-input">
					<input type="text" class="login__input" name="Usuario" id="Usuario" placeholder="Pepeej123"></input>
				</div>
			</div>
      <div class="login__grupo" id="grupo__nombre">
				<label for="Contrasena" class="login__label">Contraseña: </label>
				<div class="login__grupo2-input">
					<input type="text" class="login__input" name="Contrasena" id="Contrasena" placeholder="Pepeej123"></input>
				</div>
			</div>
			<a href="<?php echo constant('URL'); ?>dsignup">Registrarse</a>
			<div class="login__grupo login__grupo-btn-enviar">
				<button type="submit" class="login__btn">Iniciar</button>
			</div>

  </aside>

  </aside>
  <footer class="footer">Pie de pagina</footer>
</body>
</html>

