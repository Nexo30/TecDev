
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
<a class="ingresar">
<input type="checkbox" id="btn-up">
	<label for="btn-up" class="up">Registrarse</label> <!-- para vincular un input con label usar el mismo id en este caso btn-up, el nombre de los id generalmente lo relacionamos con el contenido para guiarnos, pero es la palabra que queremos -->

	<div class="ventana">
		<div class="contenedor">
			<header>Ingrese sus datos de registro</header>
			<label  class="X" for="btn-up">X</label> <!-- utilizamos el mismo id del checkbox para que funcione -->
			<div class="contenido">


				<input class="Contenido" type="text" placeholder="Usuario">
				<input class="Contenido" type="password" placeholder="Contraseña">
				<input class="Contenido" type="text" placeholder="Email">
				<input class="Contenido" type="submit" value="Iniciar">

			</div>
		</div>
	</div>

</a>
<a class="ingresar">
<input type="checkbox" id="btn-up2">
	<label for="btn-up2" class="up2">Iniciar Sesión</label> <!-- para vincular un input con label usar el mismo id en este caso btn-up, el nombre de los id generalmente lo relacionamos con el contenido para guiarnos, pero es la palabra que queremos -->

	<div class="ventana2">
		<div class="contenedor2">
			<header>Ingrese sus datos de usuario</header>
			<label  class="X2" for="btn-up2">X</label> <!-- utilizamos el mismo id del checkbox para que funcione -->
			<div class="contenido2">


				<input class="Contenido2" type="text" placeholder="Usuario">
				<input class="Contenido2" type="password" placeholder="Contraseña">
				<input class="Contenido2" type="submit" value="Iniciar">

			</div>
		</div>
	</div>

</a>
<a href="<?php echo constant('URL'); ?>carrito" class="Carrito">
<i class="fas fa-shopping-cart"></i>
</a>
</header>


  <nav class="navbar">
		<ul>
      <li><a href="<?php echo constant('URL'); ?>index">Inicio</a></li>
			<li><a href="<?php echo constant('URL'); ?>tienda">Tienda</a></li>
			<li><a name="sidebar" id="sidebar" href="<?php echo constant('URL'); ?>index#sidebar">Nosotros</a></li>
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
	<iframe class="footer" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d204.93806143241943!2d-56.21868829133565!3d-34.73016795194744!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x233db8c6106abffa!2sEscuela%20T%C3%A9cnica%20de%20Las%20Piedras!5e0!3m2!1ses-419!2suy!4v1634265898778!5m2!1ses-419!2suy" width="1865" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  <footer class="footer2">Pie de pagina</footer>

</body>
</html>

