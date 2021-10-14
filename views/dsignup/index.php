<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
  <link rel="stylesheet" href="public/css/signup.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
			<li><a href="#sidebar">Nosotros</a></li>
			<li><a href="<?php echo constant('URL'); ?>contacto">Contactos</a></li>
		</ul>
		<div class="search-wrapper">
        <span class="las la-search"></span>
        <input type="search" name="" id="" placeholder="Escriba aqui...">
      </div>
</nav>
  <aside class="cuerpo">
  <aside class="usuario" id="usuario">
				<label for="Usuario" class="signup__label">Usuario: </label>
				<aside class="signup__grupo2-input">
					<input type="text" class="signup__input" name="Usuario" id="Usuario" placeholder="Pepeej123"></input>
</aside>
</aside>
      <aside class="contraseña" id="contrasenia">
				<label for="contraseniapp" class="signup__label">Contraseña: </label>
				<aside class="signup__grupo2-input">
					<input type="password" class="signup__input" name="Contrasena" id="contraseniapp" placeholder="Pepeej123"></input>
</aside>
</aside>
			<div class="signup__grupo" id="grupo__nombre">
				<label for="Email" class="signup__label">Email: </label>
				<div class="signup__grupo2-input">
					<input type="text" class="signup__input-email" name="Email" id="Email" placeholder="Ejemplo@.com"></input>
				</div>
			</div>
			<a href="<?php echo constant('URL'); ?>dlogin">Ya tienes una cuenta?</a>
			<div class="contacto__grupo contacto__grupo-btn-enviar">
				<button type="submit" class="contacto__btn">Registrarse</button>
			</div>

  </aside>

  <footer class="footer">Pie de pagina</footer>
</body>
</html>

