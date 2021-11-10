<header class="header">
<img src="<?php echo constant('URL'); ?>public/imagenes/articulos/Logo2.png" width="280px">
<a class="ingresar">
<input type="checkbox" id="btn-up">
	<label for="btn-up" class="up"><i id="icon"class="fas fa-user-circle"></i>Registrarse</label> <!-- para vincular un input con label usar el mismo id en este caso btn-up, el nombre de los id generalmente lo relacionamos con el contenido para guiarnos, pero es la palabra que queremos -->

	<div class="ventana">
	<form action="<?php echo constant('URL'); ?>index/ingresar" method="post">
		<div class="contenedor">
			<header>Ingrese sus datos de registro</header>
			<label  class="X" for="btn-up">X</label> <!-- utilizamos el mismo id del checkbox para que funcione -->
			<div class="contenido">


				<input class="Usuario" type="text" placeholder="Usuario">
				<input class="Contraseña" type="password" placeholder="Contraseña">
				<input class="Email" type="text" placeholder="Email">
				<input class="Contenido" type="submit" value="Registrarse">

			</div>
			</form>
		</div>
	</div>

</a>
<a class="ingresar">
<input type="checkbox" id="btn-up2">
<label for="btn-up2" class="up2"><i id="icon"class="fas fa-sign-in-alt"></i>Iniciar Sesion</label> <!-- para vincular un input con label usar el mismo id en este caso btn-up, el nombre de los id generalmente lo relacionamos con el contenido para guiarnos, pero es la palabra que queremos -->

	<div class="ventana2">
	<form action="<?php echo constant('URL'); ?>tienda/ingresar" method="post">
		<div class="contenedor2">
			<header>Ingrese sus datos de usuario</header>
			<label  class="X2" for="btn-up2">X</label> <!-- utilizamos el mismo id del checkbox para que funcione -->
			<div class="contenido2">


				<input class="Contenido2" type="text" placeholder="Usuario" name="nombre">
				<input class="Contenido2" type="password" placeholder="Contraseña" name="pass">
				<input class="Contenido2" type="submit" value="Iniciar">

			</div>
     </form>
		</div>
	</div>

</a>
<a class="Carrito">
<i class="fas fa-shopping-cart"></i>
</a>
<h1 id="Res"><?php echo $this->resultadoLogin; ?></h1>
</header>
  <nav class="navbar">
		<ul>
    <li><a href="<?php echo constant('URL'); ?>index">Inicio</a></li>
			<li><a href="<?php echo constant('URL'); ?>tienda">Tienda</a></li>
			<li><a href="<?php echo constant('URL'); ?>index#sidebar">Nosotros</a></li>
			<li><a href="<?php echo constant('URL'); ?>contacto">Contactos</a></li>
			<li id="Adm"><a href="<?php echo constant('URL'); ?>contacto">Administrar Articulos</a></li>
		</ul>
    <div class="search-wrapper">
        <span class="las la-search"></span>
        <input type="search" name="" id="" placeholder="Escriba aqui...">
      </div>
</nav>